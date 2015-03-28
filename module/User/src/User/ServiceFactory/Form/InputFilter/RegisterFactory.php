<?php
/**
 * Created by PhpStorm.
 * User: gopa
 * Date: 11/6/14
 * Time: 8:35 PM
 */

namespace User\ServiceFactory\Form\InputFilter;

use User\Form\InputFilter\Register;
use DoctrineModule\Validator\NoObjectExists;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class RegisterFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $validator = new NoObjectExists([
            'object_repository' => $serviceLocator->get('User\Model\UsersRepository'),
            'fields' => ['email'],
            'messageTemplates' => [
                NoObjectExists::ERROR_OBJECT_FOUND =>
                   'This e-mail is already registered!'
            ]
        ]);
        return new Register($validator);
    }
} 