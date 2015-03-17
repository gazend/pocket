<?php
/**
 * Created by PhpStorm.
 * User: gopa
 * Date: 11/7/14
 * Time: 5:13 PM
 */

namespace User\ServiceFactory\Model;


use User\Model\PasswordChanger;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class PasswordChangerFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @var \User\Model\UsersRepository $usersRepository */
        $usersRepository = $serviceLocator->get('User\Model\UsersRepository');

        return new PasswordChanger($usersRepository);
    }
} 