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
                    return new \ImageUploader\View\Helper\ImageUploader(null);
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
                    return new \ImageJoiner\Options\ModuleOptions(isset($config['image_uploader']) ? $config['image_uploader'] : array());
                },
            ),
        );
    }
}
