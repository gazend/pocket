<?php
/**
 * Created by PhpStorm.
 * User: gopa
 * Date: 11/7/14
 * Time: 2:24 PM
 */

namespace User\ServiceFactory\Form\InputFilter;


use User\Entity\User;
use User\Form\InputFilter\PasswordChange;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class PasswordChangeFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @var \Zend\Authentication\AuthenticationService $authService */
        $authService = $serviceLocator->get('doctrine.authenticationservice.orm_default');
        /** @var User $user */
        $user = $authService->getIdentity();


        return new PasswordChange($user);
    }
} 