<?php

namespace Sysco\Aurora\Service;

use Zend\Filter\Word\UnderscoreToCamelCase;

class Service
{

    protected $dependencies = array();

    public function __construct($options = array())
    {
        foreach ($options as $key => $option) {
            $attribute = $this->toCamelCase($key);
            $this->{$attribute} = $option;
        }
    }

    public function addDependency($name, $dependency)
    {
        $this->dependencies[$name] = $dependency;
        return $this;
    }

    public function getDependency($name)
    {
        return $this->dependencies[$name];
    }

    public function getDependencies()
    {
        return $this->dependencies;
    }

    public function hasDependency($name)
    {
        return array_key_exists($name, $this->dependencies);
    }

    private function toCamelCase($string)
    {
        $filter = new UnderscoreToCamelCase;
        return lcfirst($filter($string));
    }

    protected function translate($text)
    {
        if ($this->hasDependency('translator')) {
            return $this->getDependency('translator')->translate($text);
        }

        return $text;
    }

}

?>
