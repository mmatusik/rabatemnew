<?php

namespace Offer\Form;

use Zend\Form\Form;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\InputFilter\InputFilter;
use Zend\Form\Element;

class PhotoForm extends Form implements InputFilterProviderInterface
{
    public function __construct($name = null, $options = array())
    {
        parent::__construct($name, $options);
        $this->addElements();
    }

    public function addElements()
    {
        // File Input
        $file = new Element\File('image');
        $file->setLabel('Zdjęcia')
             ->setAttribute('id', 'image-file')
             ->setAttribute('multiple', true)
                ->setAttribute('class', 'button round blue image-right');
        $this->add($file);
    }

    public function getInputFilterSpecification()
    {
        return array(
            
            
        );
    }
}

