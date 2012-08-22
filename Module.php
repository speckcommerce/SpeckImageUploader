<?php

namespace ImageUploader;

use Zend\ModuleManager;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;

class Module implements AutoloaderProviderInterface
{
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php'
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__
                )
            )
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }


    public function getViewHelperConfig()
    {
        return array(
            'factories' => array(
                'imageUploader' => function ($sm) {
                    $sm = $sm->getServiceLocator();
                    $form = $sm->get('image_uploader_form');
                    return new \ImageUploader\View\Helper\ImageUploader($form);
                },
            ),
        );
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'image_uploader_options' => function ($sm) {
                    $config = $sm->get('Config');
                    return new \ImageUploader\Options\ModuleOptions(isset($config['image_uploader']) ? $config['image_uploader'] : array());
                },
                'image_uploader_form' => function ($sm) {
                    $form = new \ImageUploader\Form\Image();
                    $form->setHydrator(new \Zend\Stdlib\Hydrator\ClassMethods());
                    $form->setInputFilter($sm->get('image_uploader_filter'));
                    return $form;
                },
            ),
        );
    }
}
