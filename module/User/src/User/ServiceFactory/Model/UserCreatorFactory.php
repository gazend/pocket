<?php
/**
 * Created by PhpStorm.
 * User: gopa
 * Date: 11/7/14
 * Time: 3:55 PM
 */

namespace User\ServiceFactory\Model;

use User\Model\UserCreator;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\FactoryInterface;

class UserCreatorFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @var \User\Model\UsersRepository $repo */
        $repo = $serviceLocator->get('User\Model\UsersRepository');
        /** @var \User\Model\UserFactory $userFactory */
        $userFactory = $serviceLocator->get('User\Model\UserFactory');

        return new UserCreator($repo, $userFactory);
    }
} 