<?php

namespace Sysco\Aurora\View\Helper\Bootstrap;

use Zend\View\Helper\AbstractHtmlElement;

class HtmlLink extends AbstractHtmlElement
{

    public function __invoke($label, $attribs = array(), $icon = false)
    {
        $bootstrapVersion = $this->getView()->layout()->auroraConfig['bootstrap_version'];
        
        $tag = 'a';
        
        $attribs = $this->htmlAttribs(array_merge(array('href' => '#'), $attribs));
        
        $iconHtml = '';

        if ($icon) {
            switch ($bootstrapVersion) {
                case 2:
                    $iconHtml = '<i class="icon-' . $icon . '"></i>' . self::EOL;
                    break;
                case 3:
                    $iconHtml = '<span class="glyphicon glyphicon-' . $icon . '"></span>' . self::EOL;
                    break;
            }
        }

        return '<' . $tag . $attribs . '>' . self::EOL . $iconHtml . $label . '</' . $tag . '>' . self::EOL;
    }

}