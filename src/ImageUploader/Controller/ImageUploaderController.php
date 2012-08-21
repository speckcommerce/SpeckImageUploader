<?php

namespace ImageUploader\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ImageUploaderController extends AbstractActionController
{
    public function uploadImageAction()
    {
        die(nl2br($this->getServiceLocator()->get('image_uploader_service')->uploadImage($_FILES['image'])));
    }

    public function uploadImageJsonAction()
    {
        return json_encode($this->getServiceLocator()->get('image_uploader_service')->uploadImage($_FILES['image']));
    }
}
