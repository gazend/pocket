<?php
/**
 * Created by PhpStorm.
 * User: gopa
 * Date: 11/6/14
 * Time: 5:48 PM
 */

namespace User\Form;


use Zend\Form\Form;
use Zend\InputFilter\InputFilter;

class Register extends Form
{
    public function __construct(InputFilter $inputFilter)
    {
        parent::__construct('register');
        $this->setInputFilter($inputFilter);
        $this->setAttribute('method', 'post');
        $this->setAttribute('class','form-horizontal');

        $this->add([
            'type' => 'text',
            'name' => 'name',
            'options' => [
                'label' => 'Name:',
                'label_attributes' => [
                    'class' => 'col-sm-2 control-label'
                ]
            ],
            'attributes' => [
                'class' => 'form-control',
                'placeholder' => 'Name'
            ]

        ]);

        $this->add([
            'type' => 'email',
            'name' => 'email',
            'options' => [
                'label' => 'Email:',
                'label_attributes' => [
                    'class' => 'col-sm-2 control-label'
                ]
            ],
            'attributes' => [
                'class' => 'form-control',
                'placeholder' => 'Email'
            ]
        ]);

        $this->add([
            'type' => 'password',
            'name' => 'password',
            'options' => [
                'label' => 'Password:',
                'label_attributes' => [
                    'class' => 'col-sm-2 control-label'
                ]
            ],
            'attributes' => [
                'class' => 'form-control',
                'placeholder' => 'Password'
            ]
        ]);

        $this->add([
            'type' => 'password',
            'name' => 'repeat-password',
            'options' => [
                'label' => 'Repeat Password:',
                'label_attributes' => [
                    'class' => 'col-sm-2 control-label'
                ]
            ],
            'attributes' => [
                'class' => 'form-control',
                'placeholder' => 'Repeat Password'
            ]
        ]);

        $this->add([
            'type' => 'csrf',
            'name' => 'csrf'
        ]);

        $this->add([
            'type' => 'submit',
            'name' => 'submit',
            'attributes' => [
                'required' => false,
                'class' => 'btn btn-primary',
                'value' => 'Register'

            ]
        ]);
    }
} 