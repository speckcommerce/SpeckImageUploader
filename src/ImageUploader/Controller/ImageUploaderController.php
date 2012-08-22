<?php

namespace ImageUploader\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ImageUploaderController extends AbstractActionController
{
    public function uploadImageAction()
    {
        $fileName = $_FILES['image']['name'];

        $form = $this->getServiceLocator()->get('image_uploader_form');
        $validator = new \Zend\Validator\File\Upload();

        $data = array();
        if($validator->isValid($fileName)) {
            $this->getServiceLocator()->get('image_uploader_service')->uploadImage($_FILES['image']);
            $data['file'] = $fileName;
        }
        echo $validator->isValid($fileName);
        $form->setData($data);
        $form->isValid();

        $view = new ViewModel(array('form' => $form));
        $view->setTerminal(true)->setTemplate('/image-uploader.phtml');
        return $view;
    }

    public function uploadImageJsonAction()
    {
        return json_encode($this->getServiceLocator()->get('image_uploader_service')->uploadImage($_FILES['image']));
    }
}
