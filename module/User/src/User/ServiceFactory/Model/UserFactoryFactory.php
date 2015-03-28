<?php
/**
 * Created by PhpStorm.
 * User: gopa
 * Date: 11/7/14
 * Time: 4:08 PM
 */

namespace User\ServiceFactory\Model;


use User\Model\UserFactory;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class UserFactoryFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new UserFactory();
    }
} 