<?php

namespace Podglad\Form;

use Zend\Form\Form;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\InputFilter\InputFilter;

class DownForm extends Form implements InputFilterProviderInterface
{
     public function init()
    {
        $this->add(array(
            'name' => 'email',
            'attributes' => array(
                'type' => 'text',
                'class'  => 'down-email',
                'id' => 'tags'
            ),
            'options' => array(
                'label' => '',
                'label_attributes' => array(
                    'for'  => 'tags',
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Wyślij',
                'class' => 'orange-button',
            ),
        ));
    }

    public function getInputFilterSpecification()
    {

        return array(
            array(
                'name' => 'email',
                'validators' => array(
                    array(
                        'name' => 'EmailAddress', 
                    )
                ), 
                'required' => true,
            ),
        );
    }
}
