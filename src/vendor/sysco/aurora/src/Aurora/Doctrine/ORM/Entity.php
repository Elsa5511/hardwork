<?php

namespace Sysco\Aurora\Doctrine\ORM;

class Entity
{

    public function __call($name, $arguments)
    {
        switch (substr($name, 0, 3)) {
            case 'get':
                $attribute = lcfirst(substr($name, 3));
                if (property_exists($this, $attribute)) {
                    return $this->{$attribute};
                }

                break;
            case 'set':
                $attribute = lcfirst(substr($name, 3));
                if (property_exists($this, $attribute)) {
                    $this->{$attribute} = $arguments[0];
                    return $this;
                }

                break;
            case 'has':
                $attribute = lcfirst(substr($name, 3));
                return !(null === $this->{$attribute});

                break;
        }

        trigger_error("Call to undefined method '" . __CLASS__ . "::{$name}() in " . __FILE__ . " on line " . __LINE__, E_USER_ERROR);
    }

}