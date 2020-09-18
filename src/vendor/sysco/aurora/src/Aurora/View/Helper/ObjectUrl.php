<?php

namespace Sysco\Aurora\View\Helper;

use Zend\View\Helper\AbstractHelper;

class ObjectUrl extends AbstractHelper
{

    public function __invoke($object, $isMethod = false, $name = null, $params = array(), $options = array(), $reuseMatchedParams = false)
    {
        if (count(func_get_args()) > 3) {
            $url = $this->getView()->url($name, $params, $options, $reuseMatchedParams);
        } else {
            $url = $name;
        }

        return preg_replace_callback('/:([a-zA-Z0-9_]+)/', function($matches) use ($object, $isMethod) {
                    if ($isMethod) {
                        $output = $object->{'get' . ucfirst($matches[1])}();
                    } else {
                        $output = $object->{$matches[1]};
                    }

                    return $output;
                }, $this->sanitizeUrl($url));
    }

    private function sanitizeUrl($url)
    {
        return str_replace('%3A', ':', $url);
    }

}