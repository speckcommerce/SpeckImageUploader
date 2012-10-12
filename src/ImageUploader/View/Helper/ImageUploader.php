<?php
namespace ImageUploader\View\Helper;
use Zend\View\Helper\HelperInterface;
use Zend\View\Model\ViewModel;
use Zend\View\Helper\AbstractHelper;

class ImageUploader extends AbstractHelper
{
    protected $form;

    public function __construct($form=null)
    {
        $this->setForm($form);
    }

    public function __invoke($elements=null)
    {
        $view = $this->getView();
        $form = $this->getForm();
        if ($elements) {
            $form->addElements($elements);
        }
        $uploader = new ViewModel(array('form' => $form));
        $uploader->setTemplate('image-uploader.phtml');

        return $view->render($uploader);
    }

    function getForm()
    {
        return $this->form;
    }

    function setForm($form)
    {
        $this->form = $form;
    }
}
