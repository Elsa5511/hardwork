<?php

/* @TODO: Implement different markup for form-inline */

namespace Sysco\Aurora\Form\View\Helper\Bootstrap;

use Zend\Form\FieldsetInterface;
use Zend\Form\ElementInterface;
use Zend\Form\FormInterface;
use Zend\Form\View\Helper\AbstractHelper;

/**
 * View helper for rendering Form objects
 */
class Form extends AbstractHelper
{
    
    protected $labelSize = 2;

    /**
     * Attributes valid for this tag (form)
     *
     * @var array
     */
    protected $validTagAttributes = array(
        'accept-charset' => true,
        'action' => true,
        'autocomplete' => true,
        'enctype' => true,
        'method' => true,
        'name' => true,
        'novalidate' => true,
        'target' => true,
        'role' => true
    );

    /**
     * Invoke as function
     *
     * @param  null|FormInterface $form
     * @return Form
     */
    public function __invoke(FormInterface $form = null, $attributes = array())
    {
        if (!$form) {
            return $this;
        }

        $form->setAttributes($attributes);
        
        return $this->render($form);
    }

    public function renderElement(ElementInterface $element)
    {
        return $this->getView()->bootstrapFormRow($element);
    }

    public function renderFieldset(FieldsetInterface $element)
    {
        $output = '<fieldset>';

        if ($element->getLabel()) {
            $output .= '<legend>' . $this->getView()->translate($element->getLabel()) . '</legend>';
        }

        foreach ($element->getIterator() as $elementOrFieldset) {
            if ($elementOrFieldset instanceof FieldsetInterface) {
                $output .= $this->renderFieldset($elementOrFieldset);
            } elseif ($elementOrFieldset instanceof ElementInterface) {
                $output .= $this->renderElement($elementOrFieldset);
            }
        }

        $output .= '</fieldset>';

        return $output;
    }

    /**
     * Render a form from the provided $form,
     *
     * @param  FormInterface $form
     * @return string
     */
    public function render(FormInterface $form)
    {
        if (method_exists($form, 'prepare')) {
            $form->prepare();
        }

        $renderElements = '';

        foreach ($form as $element) {
            if ($element instanceof FieldsetInterface) {
                $renderElements .= $this->renderFieldset($element);
            } else {
                $renderElements .= $this->renderElement($element);
            }
        }

        return $this->openTag($form) . $renderElements . $this->closeTag();
    }

    /**
     * Generate an opening form tag
     *
     * @param  null|FormInterface $form
     * @return string
     */
    public function openTag(FormInterface $form = null)
    {
        $attributes = array(
            'class' => 'form-horizontal'
        );

        if ($form instanceof FormInterface) {
            $formAttributes = $form->getAttributes();
            if (!array_key_exists('id', $formAttributes) && array_key_exists('name', $formAttributes)) {
                $formAttributes['id'] = $formAttributes['name'];
            }
            $attributes = array_merge($attributes, $formAttributes);
        }

        $tag = sprintf('<form %s>', $this->createAttributesString($attributes));

        return $tag;
    }

    /**
     * Generate a closing form tag
     *
     * @return string
     */
    public function closeTag()
    {
        return '</form>';
    }
    
    public function setLabelSize($labelSize){
        $this->labelSize = $labelSize;
    }
    
    public function getLabelSize(){
        return $this->labelSize;
    }

}