<?php

namespace haqqi\metronic\controllers;

use haqqi\metronic\assets\core\VersionAsset;
use haqqi\metronic\base\MetronicController;
use haqqi\metronic\forms\LoginForm;

class AuthController extends MetronicController
{
    public $layout = '@haqqi/metronic/views/layouts/base';

    public function actionLoginV1()
    {
        $loginForm = new LoginForm();

        return $this->render('login-v1', [
            'loginForm' => $loginForm,
            'copyRight' => null
        ]);
    }

    public function actionRegister()
    {
        echo 'register';
    }
}
