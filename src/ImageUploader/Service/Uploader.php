<?php

namespace ImageUploader\Service;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class Uploader implements ServiceLocatorAwareInterface
{
    protected $options;

    protected $serviceLocator;

    public function UploadImage($image, $destination=null)
    {
        if (null === $destination) {
            $destination = $this->getOptions()->getDestination();
        }
        $image = $this->prepareImageForUpload();
    }

    public function PrepareImageForUpload($image)
    {
        $results = array();

        if (true === $this->getOptions()->getUseMax()) {
            $width = 600;//todo:this
            if ($width > $this->getOptions()->getMaxWidth()) {
                $results['wide'] = 'Image exceeds the max width: ' . $this->getOptions()->getMaxWidth();
            }
            $height = 600;//todo:this
            if ($width > $this->getOptions()->getMaxHeight()) {
                $results['tall'] = 'Image exceeds the max height: ' . $this->getOptions()->getMaxHeight();
            }
        }

        if (true === $this->getOptions()->getUseMin()) {
            $width = 600;//todo:this
            if ($width < $this->getOptions()->getMinWidth()) {
                $results['narrow'] = 'Image below the min width: ' . $this->getOptions()->getMinWidth();
            }
            $height = 600;//todo:this
            if ($width < $this->getOptions()->getMinHeight()) {
                $results['short'] = 'Image below the min height: ' . $this->getOptions()->getMinHeight();
            }
        }

        if (isset($results['short']) || isset($results['narrow'])) {
            $errorMsg  = (isset($results['short'])  ? $results['short']  . "\n" : '');
            $errorMsg .= (isset($results['narrow']) ? $results['narrow'] . "\n" : '');
            throw new \Exception($errorMsg);
        }

        if ((isset($results['tall']) || isset($results['wide']))) {
            if (false === $this->getOptions()->getResizeOversized()) {
                $errorMsg  = (isset($results['tall']) ? $results['tall'] . " and options do not allow resize\n" : '');
                $errorMsg .= (isset($results['wide']) ? $results['wide'] . " and options do not allow resize\n" : '');
                throw new \Exception($errorMsg);
            } else {
                $image = $this->resizeImage($image);
            }
        }

        return $image;
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
