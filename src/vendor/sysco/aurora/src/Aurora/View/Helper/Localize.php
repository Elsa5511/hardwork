<?php

namespace Sysco\Aurora\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Sysco\Aurora\Filter\Localize;

class Localize extends AbstractHelper {

    public function __invoke($string, $language = 'en') {
        $filter = new Localize();
        return $filter->filter($string, $language);
    }

}