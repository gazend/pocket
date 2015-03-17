<?php
/**
 * Created by PhpStorm.
 * User: gopa
 * Date: 11/5/14
 * Time: 9:37 PM
 */

namespace User\Form\InputFilter;


use Zend\InputFilter\InputFilter;
use Zend\Validator\EmailAddress;

class Login extends InputFilter
{
    /**
     * Add Filters and Validators for Login form
     */
    public function init()
    {
        $this->add([
            'name' => 'email',
            'required' => true,
            'filters' => [
                ['name' => 'StringTrim'],
                ['name' => 'StripTags']
            ],
            'validators' => [
                ['name' => 'EmailAddress',
                    'options' => [
                        'encoding' => 'UTF8',
                        'min' => 5,
                        'max' => 255,
                        'messages' => [
                            EmailAddress::INVALID_FORMAT => 'Invalid email address!'
                        ]
                    ]
                ],
            ],
        ]);

        $this->add([
            'name' => 'password',
            'required' => true,
            'filters' => [
                ['name' => 'StringTrim']
            ],
            'validators' => [
                [
                    'name' => 'StringLength',
                    'options' => [
                        'encoding' => 'UTF8',
                        'min' => 6,
                        'max' => 55,
                        'messages' =>
                            ['passLength' => 'Password length not correct!'
                        ],

                    ],
                ],
            ],
        ]);
    }
} 