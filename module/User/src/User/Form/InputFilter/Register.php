<?php
/**
 * Created by PhpStorm.
 * User: gopa
 * Date: 11/6/14
 * Time: 6:42 PM
 */

namespace User\Form\InputFilter;
use DoctrineModule\Validator\NoObjectExists;

use Zend\InputFilter\InputFilter;
use Zend\Validator\EmailAddress;

class Register extends InputFilter
{
    /**
     * Validator checking for duplicate values
     *
     * @var \DoctrineModule\Validator\NoObjectExists
     */
    private $noEmailExistsValidator;

    /**
     * Constructor
     *
     * Sets dependencies
     *
     * @param \DoctrineModule\Validator\NoObjectExists $noEmailExistsValidator
     */
    public function __construct(NoObjectExists $noEmailExistsValidator){

        $this->noEmailExistsValidator = $noEmailExistsValidator;
        $this->init();

    }

    public function init()
    {
        $this->add([
            'name' => 'name',
            'required' => true,
            'filters' => [
                ['name' => 'StringTrim'],
                ['name' => 'StripTags']
            ]
        ]);

        $this->add([
            'name' => 'email',
            'required' => true,
            'filters' => [
                ['name' => 'StringTrim']
            ],
            'validators' => [
                ['name' => 'EmailAddress',
                'options' => [
                    'encoding' => 'UTF-8',
                    'min' => 5,
                    'max' => 55,
                    'messages' => [
                        EmailAddress::INVALID_FORMAT => 'Invalid Email Address!'
                    ]
                ]
                ],
                $this->noEmailExistsValidator
            ]
        ]);

        $this->add([
            'name' => 'password',
            'required' => true,
            'filters' => [
                ['name' => 'StringTrim'],
            ],
            'validators' =>[
                ['name' => 'StringLength',
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 6,
                        'max' => 55
                    ]
                ],
            ],
        ]);

        $this->add([
            'name' => 'repeat-password',
            'required' => true,
            'filters' => [
                ['name' => 'StringTrim']
            ],
            'validators' => [
                ['name' => 'identical',
                    'options' => ['token' => 'password']
                ]
            ]
        ]);
    }

} 