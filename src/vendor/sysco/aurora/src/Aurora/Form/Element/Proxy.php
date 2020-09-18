<?php

namespace Sysco\Aurora\Form\Element;

use RuntimeException;
use ReflectionMethod;
use Zend\Db\ResultSet\ResultSetInterface;
use Zend\ServiceManager\ServiceManager;
use Zend\Filter\Word\UnderscoreToCamelCase;

class Proxy
{

    /**
     * @var array
     */
    protected $objects;

    /**
     * @var string
     */
    protected $repository;

    /**
     * @var array
     */
    protected $valueOptions = array();

    /**
     * @var array
     */
    protected $findMethod = array();

    /**
     * @var
     */
    protected $property;

    /**
     * @var
     */
    protected $isMethod;

    public function setOptions($options)
    {
        if (isset($options['repository'])) {
            $this->setRepository($options['repository']);
        }

        if (isset($options['property'])) {
            $this->setProperty($options['property']);
        }

        if (isset($options['find_method'])) {
            $this->setFindMethod($options['find_method']);
        }

        if (isset($options['is_method'])) {
            $this->setIsMethod($options['is_method']);
        }
    }

    public function getValueOptions()
    {
        if (empty($this->valueOptions)) {
            $this->loadValueOptions();
        }
        return $this->valueOptions;
    }

    /**
     * @return array
     */
    public function getObjects()
    {
        $this->loadObjects();
        return $this->objects;
    }

    /**
     * Set the FQCN of the target object
     *
     * @param  string         $targetClass
     * @return Proxy
     */
    public function setRepository($repository)
    {
        $this->repository = $repository;
        return $this;
    }

    /**
     * Get the target class
     *
     * @return string
     */
    public function getRepository()
    {
        return $this->repository;
    }

    /**
     * Set the property to use as the label in the options
     *
     * @param  string         $property
     * @return Proxy
     */
    public function setProperty($property)
    {
        $this->property = $property;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getProperty()
    {
        return $this->property;
    }

    /**
     * Set if the property is a method to use as the label in the options
     *
     * @param  boolean         $method
     * @return Proxy
     */
    public function setIsMethod($method)
    {
        $this->isMethod = (bool) $method;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIsMethod()
    {
        return $this->isMethod;
    }

    /** Set the findMethod property to specify the method to use on repository
     *
     * @param array $findMethod
     * @return Proxy
     */
    public function setFindMethod($findMethod)
    {
        $this->findMethod = $findMethod;
        return $this;
    }

    /**
     * Get findMethod definition
     *
     * @return array
     */
    public function getFindMethod()
    {
        return $this->findMethod;
    }

    /**
     * @param  $value
     * @return array|mixed|object
     * @throws \RuntimeException
     */
    public function getValue($value)
    {
        if (!($repository = $this->getRepository())) {
            throw new RuntimeException('No repository was set');
        }

        $metadata = $repository->getMetadata();
        if (is_object($value)) {
            if ($value instanceof ResultSetInterface) {
                $data = array();
                foreach ($value as $object) {
                    $values = $metadata->getIdentifierValues($object);
                    $data[] = array_shift($values);
                }

                $value = $data;
            }/* else {
              $metadata = $sl->getClassMetadata(get_class($value));
              $identifier = $metadata->getIdentifierFieldNames();

              // TODO: handle composite (multiple) identifiers
              if (count($identifier) > 1) {
              //$value = $key;
              } else {
              $value = current($metadata->getIdentifierValues($value));
              }
              } */
        }

        return $value;
    }

    /**
     * Load objects
     *
     * @return void
     */
    protected function loadObjects()
    {
        if (!empty($this->objects)) {
            return;
        }

        $findMethod = (array) $this->getFindMethod();

        if (!$findMethod) {
            $this->objects = $this->repository->getAll();
        } else {
            if (!isset($this->findMethod['name'])) {
                throw new RuntimeException('No method name was set');
            }
            $findMethodName = $findMethod['name'];
            $findMethodParams = isset($findMethod['params']) ? array_change_key_case($findMethod['params']) : array();

            $repository = $this->repository;

            if (!method_exists($repository, $findMethodName)) {
                throw new RuntimeException(sprintf(
                        'Method "%s" could not be found in respository "%s"', $findMethodName, get_class($repository)
                ));
            }

            $r = new ReflectionMethod($repository, $findMethodName);
            $args = array();

            foreach ($r->getParameters() as $param) {
                if (array_key_exists(strtolower($param->getName()), $findMethodParams)) {
                    $args[] = $findMethodParams[strtolower($param->getName())];
                } else {
                    $args[] = $param->getDefaultValue();
                }
            }
            $this->objects = $r->invokeArgs($repository, $args);
        }
    }

    /**
     * Load value options
     *
     * @throws \RuntimeException
     * @return void
     */
    protected function loadValueOptions()
    {
        if (!($repository = $this->getRepository())) {
            throw new RuntimeException('No repository was set');
        }

        $metadata = $repository->getMetadata();

        $identifier = $repository->getPrimary();
        $objects = $this->getObjects();
        $options = array();

        if (empty($objects)) {
            $options[''] = '';
        } else {
            foreach ($objects as $key => $object) {
                if (($property = $this->property)) {
                    if ($this->isMethod == false && !$metadata->hasField($property)) {
                        throw new RuntimeException(sprintf(
                                'Property "%s" could not be found in object "%s"', $property, get_class($repository)
                        ));
                    }

                    $getter = 'get' . ucfirst($property);
                    if (!is_callable(array($object, $getter))) {
                        throw new RuntimeException(sprintf(
                                'Method "%s::%s" is not callable', get_class($repository), $getter
                        ));
                    }

                    $label = $object->{$getter}();
                } else {
                    if (!is_callable(array($object, '__toString'))) {
                        throw new RuntimeException(sprintf(
                                '%s must have a "__toString()" method defined if you have not set a property or method to use.', get_class($repository)
                        ));
                    }

                    $label = (string) $object;
                }

                if (count($identifier) > 1) {
                    $value = $key;
                } else {
                    $value = $object->{'get' . ucfirst($this->toCamelCase(current($identifier)))}();
                }

                $options[] = array('label' => $label, 'value' => $value);
            }
        }

        $this->valueOptions = $options;
    }

    public function toCamelCase($string)
    {
        $filter = new UnderscoreToCamelCase();
        return lcfirst($filter->filter($string));
    }

}