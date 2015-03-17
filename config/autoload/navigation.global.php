<?php
return array(
    // ...

    'navigation' => array(
        'default' => array(
            array(
                'label' => 'Home',
                'route' => 'home',
                'resource' => 'home'
            ),
            array(
                'label' => 'Login',
                'route' => 'login',
                'resource' => 'login'
            ),
            array(
                'label' => 'Register',
                'route' => 'register',
                'resource' => 'register'
            ),
            array(
                'label' => 'Change Password',
                'route' => 'change-password',
                'resource' => 'change_password'
            ),
            array(
                'label' => 'Add Article',
                'route' => 'add-article',
                'resource' => 'articles',
                'privilege' => 'add'
            ),
            array(
                'label' => 'Logout',
                'route' => 'logout',
                'resource' => 'logout'
            ),
        )
    )
);