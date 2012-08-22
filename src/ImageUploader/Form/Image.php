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
}
