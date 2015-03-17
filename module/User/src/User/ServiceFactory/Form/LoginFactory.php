<?php
/**
 * Created by PhpStorm.
 * User: gopa
 * Date: 11/5/14
 * Time: 10:20 PM
 */

namespace User\ServiceFactory\Form;

use User\Form\InputFilter\Login as InputFilterLogin;
use User\Form\Login;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class LoginFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /**
         * @var \User\Form\InputFilter\Login $inputFilter
         */
        $inputFilter = new InputFilterLogin();

        return new Login($inputFilter);
    }
} 