<?php

namespace Sysco\Aurora\Form;

use Zend\Form\Fieldset as ZendFieldset;
use Zend\InputFilter\InputFilterProviderInterface;

class Fieldset extends ZendFieldset implements InputFilterProviderInterface
{

    protected $dependencies = array();

    /**
     * Set options for a fieldset. Accepted options are:
     * - use_as_base_fieldset: is this fieldset use as the base fieldset?
     *
     * @param  array|Traversable $options
     * @return Element|ElementInterface
     * @throws Exception\InvalidArgumentException
     */
    public function setOptions($options)
    {
        if (isset($options['dependencies'])) {
            $this->setDependencies($options['dependencies']);
            unset($options['dependencies']);
        }

        return parent::setOptions($options);
    }

    public function setDependencies($dependencies = array())
    {
        $this->dependencies = $dependencies;
        return $this;
    }

    /**
     * Return all the dependencies of the fieldset.
     * @return array
     */
    public function getDependencies()
    {
        return $this->dependencies;
    }

    public function getDependency($name)
    {
        if (array_key_exists($name, $this->dependencies)) {
            return $this->dependencies[$name];
        }

        throw new \Exception('Undefined dependency \'' . $name . '\'');
    }

    public function addDependency($name, $dependency)
    {
        $this->dependencies[$name] = $dependency;
        return $this;
    }

    /**
     * Return an array specification compatible with
     * {@link Zend\InputFilter\Factory::createInputFilter()}.
     *
     * @return array
     */
    public function getInputFilterSpecification()
    {
        return array();
    }

    /**
     * Return the same string from imput but works for making the string detectable by Poedit or similar.
     * @param string $text
     * @return string
     */
    public function translate($text)
    {
        return $text;
    }

    public function __call($name, $arguments)
    {
        switch (substr($name, 0, 3)) {
            case 'get':
                $attribute = lcfirst(substr($name, 3));
                return $this->{$attribute};

                break;
            case 'set':
                $attribute = lcfirst(substr($name, 3));
                $this->{$attribute} = $arguments[0];
                return $this;

                break;
        }

        trigger_error("Call to undefined method '{" . __CLASS__ . "}::{$name}() in " . __FILE__ . " on line ", E_ERROR);
    }

}