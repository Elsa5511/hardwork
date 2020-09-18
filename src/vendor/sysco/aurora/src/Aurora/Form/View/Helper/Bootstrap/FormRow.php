<?php

namespace Sysco\Aurora\Form\View\Helper\Bootstrap;

use Zend\Form\ElementInterface;
use Zend\Form\View\Helper\AbstractHelper;

class FormRow extends AbstractHelper
{

    public function __invoke(ElementInterface $element = null)
    {
        if (!$element) {
            return $this;
        }

        return $this->render($element);
    }

    public function render($element)
    {

        if ($element->getAttribute('type') === 'hidden') {
            return $this->getView()->formRow($element);
        }

        $useLabel = true;

        switch ($element->getAttribute('type')) {
            case 'submit':
                $useLabel = false;
                $element->setAttribute('class', 'btn btn-primary btn-default');
                break;
            case 'button':
                $useLabel = false;
                $element->setAttribute('class', 'btn btn-default');
                break;
        }

        $bootstrapVersion = $this->getView()->layout()->auroraConfig['bootstrap_version'];

        return $this->getView()->partial('partial/bootstrap/' . $bootstrapVersion . '/form-row', array(
                    'element' => $element,
                    'useLabel' => $useLabel
        ));
    }

}