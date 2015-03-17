<?php
/**
 * Created by PhpStorm.
 * User: gopa
 * Date: 11/7/14
 * Time: 2:09 PM
 */

namespace User\ServiceFactory\Form;

use User\Form\PasswordChange;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class PasswordChangeFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @var \User\Form\InputFilter\PasswordChange $inputFilter */
        $inputFilter = $serviceLocator->get('User\Form\InputFilter\PasswordChange');

        return new PasswordChange($inputFilter);
    }
} 