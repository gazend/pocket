<?php

return array(
    'router' => array(
        'routes' => array(
            'articles' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/articles',
                    'defaults' => array(
                        'controller' => 'Article\Controller\Index',
                        'action' => 'listArticles'
                    ),
                ),
            ),
            'add-article' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/add-article',
                    'defaults' => array(
                        'controller' => 'Article\Controller\Index',
                        'action' => 'addArticle'
                    ),
                ),
            ),
            'delete-article' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/delete-article/:id',
                    'defaults' => array(
                        'controller' => 'Article\Controller\Index',
                        'action' => 'deleteArticle'
                    ),
                ),
            ),
            'read-article' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/read-article/:id',
                    'defaults' => array(
                        'controller' => 'Article\Controller\Index',
                        'action' => 'readArticle'
                    ),
                ),
            ),
            'update-article' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/update-article/:id',
                    'defaults' => array(
                        'controller' => 'Article\Controller\Index',
                        'action' => 'updateArticle'
                    ),
                ),
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Article\Controller\Index' => 'Article\Controller\IndexController'
        ),
    ),
    'service_manager' => array(
        'factories' => [
            //MODELS
            'Article\Model\ArticlesRepository' => 'Article\ServiceFactory\ArticlesRepositoryFactory',
            'Article\ArticleDoctrineHydrator' => 'Article\ServiceFactory\ArticleDoctrineHydrator',

            //FORMS
            'Article\Form\NewArticle' => 'Article\ServiceFactory\Form\NewArticleFactory',
            'Article\Form\UpdateArticle' => 'Article\ServiceFactory\Form\UpdateArticleFactory',
            'Article\Form\UpdateArticleFactory' => 'Article\ServiceFactory\Form\UpdateArticleFactoryFactory'
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
                'paths' => array(__DIR__ . '/../src/Article/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    'Article\Entity' => 'UserDriver'
                ),
            ),
        ),

    ),

);