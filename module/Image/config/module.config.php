<?php

return array(
    'router' => array(
        'routes' => array(
            'images' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/list-images',
                    'defaults' => array(
                        'controller' => 'Image\Controller\Index',
                        'action' => 'listImages'
                    ),
                ),
            ),
            'add-image' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/add-image',
                    'defaults' => array(
                        'controller' => 'Image\Controller\Index',
                        'action' => 'addImage'
                    ),
                ),
            ),
            'delete-image' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/delete-image/:id',
                    'defaults' => array(
                        'controller' => 'Image\Controller\Index',
                        'action' => 'deleteImage'
                    ),
                ),
            ),
            'read-image' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/read-image/:id',
                    'defaults' => array(
                        'controller' => 'Image\Controller\Index',
                        'action' => 'readImage'
                    ),
                ),
            ),
            'update-image' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/update-image/:id',
                    'defaults' => array(
                        'controller' => 'Image\Controller\Index',
                        'action' => 'updateImage'
                    ),
                ),
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Image\Controller\Index' => 'Image\Controller\IndexController'
        ),
    ),
    'service_manager' => array(
        'factories' => [
            //MODELS
            'Image\Model\ImagesRepository' => 'Image\ServiceFactory\ImagesRepositoryFactory',
            'Image\ImageDoctrineHydrator' => 'Image\ServiceFactory\ImageDoctrineHydrator',

            //FORMS
            'Image\Form\NewImage' => 'Image\ServiceFactory\Form\NewImageFactory',
            'Image\Form\UpdateImage' => 'Image\ServiceFactory\Form\UpdateImageFactory',
            'Image\Form\UpdateImageFactory' => 'Image\ServiceFactory\Form\UpdateImageFactoryFactory'
        ]
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    'doctrine' => array(
        'driver' => array(
            'UserDriver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/Image/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    'Image\Entity' => 'UserDriver'
                ),
            ),
        ),

    ),

);