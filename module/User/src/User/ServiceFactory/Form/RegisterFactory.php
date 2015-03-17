<?php
/**
 * Created by PhpStorm.
 * User: gopa
 * Date: 11/6/14
 * Time: 7:55 PM
 */

namespace User\ServiceFactory\Form;

use User\Form\Register;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class RegisterFactory implements  FactoryInterface {

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {

        /** @var \User\Form\InputFilter\Register $inputFilter */
        $inputFilter = $serviceLocator->get('User\Form\InputFilter\Register');

        return new Register($inputFilter);
    }


} 