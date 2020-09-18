<?php

namespace Sysco\Aurora\Model;

use Zend\Filter\Word\UnderscoreToCamelCase;
use Sysco\Aurora\Filter\ArrayKeyCamelCaseToUnderscore;

class Model
{

    public function __construct($attributes = array())
    {
        $this->exchangeArray(array_merge($this->getDefaultValues(), $attributes));
        $this->init();
    }

    public function init()
    {
        
    }

    protected function toCamelCase($string)
    {
        $filter = new UnderscoreToCamelCase;
        return lcfirst($filter($string));
    }

    public function exchangeArray($data = array())
    {
        if (!empty($data)) {
            foreach ($data as $attribute => $value) {
                $attribute = $this->toCamelCase($attribute);
                $this->{'set' . ucfirst($attribute)}($value);
            }
        }
    }

    public function getArrayCopy($toUnderscore = true)
    {
        $vars = get_object_vars($this);

        if ($toUnderscore) {
            $filter = new ArrayKeyCamelCaseToUnderscore;
            $vars = $filter->filter($vars);
        }

        return $vars;
    }

    public function getDefaultValues()
    {
        return array();
    }

    public function __call($name, $arguments)
    {
        switch (substr($name, 0, 3)) {
            case 'get':
                $attribute = lcfirst(substr($name, 3));
                return $this->get($attribute);

                break;
            case 'set':
                $attribute = lcfirst(substr($name, 3));
                $this->set($attribute, $arguments[0]);
                return $this;

                break;
            case 'has':
                $attribute = lcfirst(substr($name, 3));
                return !(null === $this->{$attribute} || empty($this->{$attribute}));

                break;
        }

        throw new \Exception("Call to undefined method '{$name}'.");
    }

    public function set($attribute, $value)
    {
        if (!empty($attribute)) {
            if (property_exists($this, $attribute)) {
                $this->{$attribute} = $value;
            } else {
                throw new \Exception("Attribute '{$attribute}' does not exist.");
            }

            return $this;
        }
    }

    public function get($attribute)
    {
        if (property_exists($this, $attribute)) {
            return $this->{$attribute};
        }

        throw new \Exception("Attribute '{$attribute}' does not exist.");
    }

}