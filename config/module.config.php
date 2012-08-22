<?php

return array(
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view'
        ),
    ),
    'router' => array(
        'routes' => array(
            'image-uploader' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/image-uploader',
                    'defaults' => array(
                        'controller' => 'imageuploader',
                    ),
                ),
                'may_terminate' => false,
                'child_routes' => array(
                    'upload-image' => array(
                        'type'    => 'Literal',
                        'options' => array(
                            'route'    => '/upload-image',
                            'defaults' => array(
                                'action' => 'uploadImage',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'imageuploader'         => 'ImageUploader\Controller\ImageUploaderController',
        ),
    ),
    'service_manager' => array(
        'invokables' => array(
            'image_uploader_filter'  => 'ImageUploader\Filter\Image',
            'image_uploader_service' => 'ImageUploader\Service\Uploader',
        ),
    ),
);
