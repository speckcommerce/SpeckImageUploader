<?php

namespace ImageUploader\Form;

use Zend\Form\Form as ZendForm;

class Image extends ZendForm
{
    protected $companyService;

    public function __construct()
    {
        parent::__construct();

        $this->add(array(
            'name' => 'image',
            'attributes' => array(
                'type' => 'file'
            ),
            'options' => array(
                'label' => 'File',
            ),
        ));
    }

    public function addElements(array $elements)
    {
        foreach ($elements as $name => $value)
        {
            $this->add(array(
                'name' => $name,
                'attributes' => array(
                    'value' => $value,
                    'type' => 'hidden',
                ),
            ));
        }
    }
}
