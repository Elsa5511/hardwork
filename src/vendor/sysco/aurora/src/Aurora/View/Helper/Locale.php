<?php

namespace Sysco\Aurora\View\Helper;

use Zend\View\Helper\AbstractHelper;

class Locale extends AbstractHelper
{

    public function __construct($locale)
    {
        return $this->locale = $locale;
    }

    public function __invoke()
    {
        return $this;
    }

    public function getLanguage()
    {
        return substr($this->locale, 0, 2);
    }

    public function getLocale()
    {
        return $this->locale;
    }

    public function __toString()
    {
        return $this->locale;
    }

}