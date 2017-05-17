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
        VersionAsset::noPublish(); // no need to publish version asset, but we need the other

        $this->view->params['bodyClass'] = ['login'];

        $loginForm = new LoginForm();

        return $this->render('login-v1', [
            'loginForm' => $loginForm
        ]);
    }

    public function actionRegister()
    {
        echo 'register';
    }
}
