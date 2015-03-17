<?php
/**
 * Created by PhpStorm.
 * User: gopa
 * Date: 11/5/14
 * Time: 7:58 PM
 */

namespace User\Form;

use Zend\Form\Form;
use Zend\InputFilter\InputFilter;

class Login extends Form
{
    public function __construct(InputFilter $inputFilter)
    {
        parent::__construct('login');
        $this->setInputFilter($inputFilter);

        $this->setAttribute('method','post');
        $this->setAttribute('class','form-horizontal');

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
                'type' => 'email',
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
            'type' => 'csrf',
            'name' => 'csrf'
        ]);

        $this->add([
            'name' => 'button',
            'type' => 'submit',
            'attributes' => [
                'required' => false,
                'class' => 'btn btn-primary',
                'value' => 'Login'
            ]
        ]);
    }
} 