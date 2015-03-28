<?php

return array(
    'router' => array(
        'routes' => array(
            'login' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/admin',
                    'defaults' => array(
                        'controller' => 'User\Controller\Index',
                        'action' => 'login'
                    ),
                ),
            ),
            'loggedin' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/loggedin',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Index',
                        'action' => 'loggedin'
                    ),
                ),
            ),
            'register' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/register',
                    'defaults' => array(
                        'controller' => 'User\Controller\Index',
                        'action' => 'register'
                    ),
                ),
            ),
            'change-password' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/change-password',
                    'defaults' => array(
                        'controller' => 'User\Controller\Index',
                        'action' => 'passwordChange'
                    ),
                ),
            ),
            'logout' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/logout',
                    'defaults' => array(
                        'controller' => 'User\Controller\Index',
                        'action' => 'logout'
                    ),
                ),
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'User\Controller\Index' => 'User\Controller\IndexController'
        ),
    ),
    'service_manager' => array(
        'factories' => array(

            'user' => function (\Zend\ServiceManager\ServiceLocatorInterface $sm) {
                /** @var \Zend\Authentication\AuthenticationServiceInterface $auth */
                $auth = $sm->get('auth');
                if (!$auth->hasIdentity()) {
                    throw new \RuntimeException('User not logged in');
                }
                return $auth->getIdentity();
            },

            //MODELS
            'User\Model\UsersRepository' => 'User\ServiceFactory\Model\UsersRepositoryFactory',
            'User\Model\UserCreator' => 'User\ServiceFactory\Model\UserCreatorFactory',
            'User\Model\UserFactory' => 'User\ServiceFactory\Model\UserFactoryFactory',
            'User\Model\PasswordChanger' => 'User\ServiceFactory\Model\PasswordChangerFactory',

            //FORMS
            'User\Form\Login' => 'User\ServiceFactory\Form\LoginFactory',
            'User\Form\Register' => 'User\ServiceFactory\Form\RegisterFactory',
            'User\Form\InputFilter\Register' => 'User\ServiceFactory\Form\InputFilter\RegisterFactory',
            'User\Form\InputFilter\PasswordChange' => 'User\ServiceFactory\Form\InputFilter\PasswordChangeFactory',
            'User\Form\PasswordChange' => 'User\ServiceFactory\Form\PasswordChangeFactory',
        ),
        'aliases' => [
            'auth' => 'doctrine.authenticationservice.orm_default'
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
                'paths' => array(__DIR__ . '/../src/User/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    'User\Entity' => 'UserDriver'
                ),
            ),
        ),
        'authentication' => array(
            'orm_default' => array(
                'object_manager' => 'Doctrine\ORM\EntityManager',
                'identity_class' => 'User\Entity\User',
                'identity_property' => 'email',
                'credential_property' => 'password',
                'credential_callable' => function(\User\Entity\User $user, $passwordGiven) {
                        $expectedHash = sha1($passwordGiven);
                        return $expectedHash === $user->getPassword();
                    },
            )
        ),
    ),

);