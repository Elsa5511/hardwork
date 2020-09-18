<?php

namespace Sysco\Aurora\Filter;

use Zend\Filter\FilterInterface;
use Zend\Filter\Word\UnderscoreToCamelCase;

class ArrayKeyUnderscoreToCamelCase implements FilterInterface
{

    public function filter($array)
    {
        $filter = new UnderscoreToCamelCase;

        $arrayUnderscore = array();
        
        foreach ($array as $key => $value) {
            $arrayUnderscore[lcfirst($filter($key))] = $value;
        }

        return $arrayUnderscore;
    }

}

?>