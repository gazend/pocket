<?php
/**
 * Created by PhpStorm.
 * User: gopa
 * Date: 11/7/14
 * Time: 10:48 AM
 */

namespace User\Form;


use Zend\Form\Form;
use Zend\InputFilter\InputFilter;

class PasswordChange extends Form
{
    public function __construct(InputFilter $inputFilter)
    {
        $this->setInputFilter($inputFilter);

        parent::__construct('password-change');

        $this->setAttribute('method', 'post');
        $this->setAttribute('class','form-horizontal');

        $this->add([
            'name' => 'old-password',
            'type' => 'password',
            'options' => [
                'label' => 'Old Password:',
                'label_attributes' => [
                    'class' => 'col-sm-2 control-label'
                ]
            ],
            'attributes' => [
                'class' => 'form-control',
                'placeholder' => 'Old Password'
            ]
        ]);

        $this->add([
            'name' => 'new-password',
            'type' => 'password',
            'options' => [
                'label' => 'New Password:',
                'label_attributes' => [
                    'class' => 'col-sm-2 control-label'
                ]
            ],
            'attributes' => [
                'class' => 'form-control',
                'placeholder' => 'New Password'
            ]
        ]);

        $this->add([
            'name' => 'repeat-new-pass',
            'type' => 'password',
            'options' => [
                'label' => 'Repeat New Password:',
                'label_attributes' => [
                    'class' => 'col-sm-2 control-label'
                ]
            ],
            'attributes' => [
                'class' => 'form-control',
                'placeholder' => 'Repeat New Password'
            ]
        ]);

        $this->add([
            'name' => 'button',
            'type' => 'submit',
            'attributes' => [
                'required' => false,
                'class' => 'btn btn-primary',
                'value' => 'Save'
            ]
        ]);
    }
} 