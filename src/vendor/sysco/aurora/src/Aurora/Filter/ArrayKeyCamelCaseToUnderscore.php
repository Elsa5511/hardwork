<?php

namespace Sysco\Aurora\Filter;

use Zend\Filter\FilterInterface;
use Zend\Filter\Word\CamelCaseToUnderscore;

class ArrayKeyCamelCaseToUnderscore implements FilterInterface
{

    public function filter($array)
    {
        $filter = new CamelCaseToUnderscore;

        $arrayUnderscore = array();
        
        foreach ($array as $key => $value) {
            $arrayUnderscore[strtolower($filter($key))] = $value;
        }

        return $arrayUnderscore;
    }

}

?>