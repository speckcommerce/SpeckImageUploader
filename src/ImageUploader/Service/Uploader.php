<?php

namespace ImageUploader\Service;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class Uploader implements ServiceLocatorAwareInterface
{
    protected $options;

    protected $serviceLocator;

    public function UploadImage($image)
    {
        try{
            if ($image["error"] > 0){
                throw new \Exception($image["error"]);
            }
            $imageModel = new \ImageUploader\Model\Image($image);

            $fileLocation = $this->getOptions()->getDestination() . '/' . $imageModel->getFileName();

            if (false === is_writable($this->getOptions()->getDestination())) {
                throw new \Exception("directory not writable: " . $this->getOptions()->getDestination());
            }
            if (false === $this->getOptions()->getOverwrite() && file_exists($fileLocation)) {
                throw new \Exception("file already exists: " . $fileLocation . "\nOptions do not allow overwrite");
            }

            //test dimensions
            $results = array();
            if (true === $this->getOptions()->getUseMax()) {
                if ($imageModel->getWidth() > $this->getOptions()->getMaxWidth()) {
                    $results['wide'] = 'Image exceeds the max width: ' . $this->getOptions()->getMaxWidth();
                }
                if ($imageModel->getHeight() > $this->getOptions()->getMaxHeight()) {
                    $results['tall'] = 'Image exceeds the max height: ' . $this->getOptions()->getMaxHeight();
                }
            }
            if (true === $this->getOptions()->getUseMin()) {
                if ($imageModel->getWidth() < $this->getOptions()->getMinWidth()) {
                    $results['narrow'] = 'Image below the min width: ' . $this->getOptions()->getMinWidth();
                }
                if ($imageModel->getHeight() < $this->getOptions()->getMinHeight()) {
                    $results['short'] = 'Image below the min height: ' . $this->getOptions()->getMinHeight();
                }
            }
            if (isset($results['short']) || isset($results['narrow'])) {
                $errorMsg  = (isset($results['short'])  ? $results['short']  . "\n" : '');
                $errorMsg .= (isset($results['narrow']) ? $results['narrow'] . "\n" : '');
                throw new \Exception($errorMsg);
            }
            if (isset($results['tall']) || isset($results['wide'])) {
                if (false === $this->getOptions()->getResizeOversized()) {
                    $errorMsg  = (isset($results['tall']) ? $results['tall'] . " and options do not allow resize\n" : '');
                    $errorMsg .= (isset($results['wide']) ? $results['wide'] . " and options do not allow resize\n" : '');
                    throw new \Exception($errorMsg);
                } else {
                    $imageModel = $this->resizeImage($imageModel);
                }
            }
            move_uploaded_file($imageModel->getTempName(), $fileLocation);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return 'Upload Success: ' . $fileLocation;
    }

    function getOptions()
    {
        if (null === $this->options) {
            $this->options = $this->getServiceLocator()->get('image_uploader_options');
        }
        return $this->options;
    }

    function setOptions($options)
    {
        $this->options = $options;
    }

    function getServiceLocator()
    {
        return $this->serviceLocator;
    }

    function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;
    }
}
