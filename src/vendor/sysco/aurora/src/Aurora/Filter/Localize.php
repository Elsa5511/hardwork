<?php

namespace Sysco\Aurora\Filter;

use Zend\Filter\FilterInterface;

class Localize implements FilterInterface {

    public function filter($string, $language = '[a-z]{0,2}')
    {
        $string = stripslashes($string);

        preg_match('/<!--:[a-z]{2}-->[\s\S]*?<!--:-->/', $string, $match);

        if ($match) {
            preg_match('/<!--:' . $language . '-->[\s\S]*?<!--:-->/', $string, $matchLanguage);
            if ($matchLanguage) {
                return preg_replace('/<!--:[a-z]{0,2}-->/', '', current($matchLanguage));
            } else {
                return preg_replace('/<!--:[a-z]{0,2}-->/', '', current($match));
            }
        } else {
            return $string;
        }
    }

}