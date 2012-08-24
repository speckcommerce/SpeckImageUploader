<?php

namespace ImageUploader\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ImageUploaderController extends AbstractActionController
{
    public function uploadImageAction()
    {
        $fileName = $_FILES['image']['name'];
        $validator = new \Zend\Validator\File\Upload();

        if($validator->isValid($fileName)) {
            echo $this->getServiceLocator()->get('image_uploader_service')->uploadImage($_FILES['image']);
        } else {
            var_dump($validator->getMessages());
            die();

        }

        $form = $this->getServiceLocator()->get('image_uploader_form');
        $view = new ViewModel(array('form' => $form));
        $view->setTerminal(true)->setTemplate('/image-uploader.phtml');
        return $view;
    }

    public function uploadImageJsonAction()
    {
        return json_encode($this->getServiceLocator()->get('image_uploader_service')->uploadImage($_FILES['image']));
    }
}
