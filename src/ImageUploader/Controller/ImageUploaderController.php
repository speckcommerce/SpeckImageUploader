<?php

namespace ImageUploader\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ImageUploaderController extends AbstractActionController
{
    public function uploadImageAction()
    {
        $fileName = $_FILES['image']['name'];
        $params = $this->params()->fromPost();

        $uploader = $this->getServiceLocator()->get('image_uploader_service');
        $validator = new \Zend\Validator\File\Upload();
        if($validator->isValid($fileName)) {
            $response = $uploader->uploadImage($_FILES['image'], $params);
        } else {
            $response = implode('', $validator->getMessages());
        }

        $view = new ViewModel(array(
            'response' => $response,
        ));

        return $view->setTemplate('response')->setTerminal(true);
    }
}
