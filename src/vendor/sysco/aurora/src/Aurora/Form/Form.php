<?php

namespace Sysco\Aurora\Form;

use Zend\Form\Form as ZendForm;

class Form extends ZendForm
{

    const CSRF_ELEMENT = 'csrf';

    protected $csrfElementTimeout = 600;
    protected $dependencies = array();

    public function __construct($name = null, $options = array())
    {
        if (null === $name) {
            $name = 'form-' . strtolower(str_replace('\\', '_', substr(get_class($this), 0, -4)));
        }

        if (!array_key_exists('action', $this->attributes)) {
            $this->attributes['action'] = $_SERVER['REQUEST_URI'];
        }

        parent::__construct($name, $options);

        $this->add(array(
            'type' => 'Zend\Form\Element\Csrf',
            'name' => self::CSRF_ELEMENT,
            'options' => array(
                'csrf_options' => array(
                    'timeout' => $this->csrfElementTimeout
                )
            )
        ));
    }

    /**
     * Set options for a form. Accepted options are:
     * - prefer_form_input_filter: is form input filter is preferred?
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
     * Return all the dependencies of the fieldset
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

        trigger_error("Call to undefined method '" . __CLASS__ . "::{$name}() in " . __FILE__ . " on line " . __LINE__, E_ERROR);
    }

}