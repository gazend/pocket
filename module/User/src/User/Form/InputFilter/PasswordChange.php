<?php
/**
 * Created by PhpStorm.
 * User: gopa
 * Date: 11/7/14
 * Time: 11:11 AM
 */

namespace User\Form\InputFilter;


use User\Entity\User;
use Zend\InputFilter\InputFilter;
use Zend\Validator\Callback;

class PasswordChange extends InputFilter
{
    /**
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->add(array(
        'name' => 'old-password',
        'required' => true,
        'filters' => [
            ['name' => 'StringTrim']
        ],
        'validators' => [
            [
                'name' => 'callback',
                'options' => [
                    'callback' => function ($value) use ($user) {
                            $passwordHash = sha1($value);
                            if ($passwordHash == $user->getPassword()) {
                                return true;
                            }
                            return false;
                        },
                    'messages' => [
                        Callback::INVALID_VALUE => 'Wrong password entered!'
                    ]
                ]
            ]
        ]
        ));

        $this->add([
            'name' => 'new-password',
            'required' => true,
            'filters' => [
                ['name' => 'StringTrim'],
            ],
            'validators' => [
                [
                    'name' => 'StringLength',
                    'options' => [
                        'encoding' => 'UTF-8',
                        'min' => 6,
                        'max' => 100,
                    ],
                ],
            ],
        ]);

        $this->add([
            'name' => 'repeat-new-pass',
            'required' => true,
            'filters' => [
                ['name' => 'StringTrim'],
            ],
            'validators' => [
                [
                    'name' => 'identical',
                    'options' => ['token' => 'new-password']
                ]
            ],
        ]);
    }
} 