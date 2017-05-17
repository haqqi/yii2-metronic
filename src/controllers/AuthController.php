<?php

namespace haqqi\metronic\controllers;

use haqqi\metronic\assets\core\PageLevelAsset;
use haqqi\metronic\assets\core\VersionAsset;
use haqqi\metronic\forms\LoginForm;
use yii\web\Controller;

class AuthController extends Controller
{
    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub

        $this->layout = '@haqqi/metronic/views/layouts/base';
    }
    
    public function actionLoginV1() {
        VersionAsset::noPublish(); // no need to publish version asset, but we need the other
        
        $this->view->params['bodyClass'] = ['login'];
        
        $loginForm = new LoginForm();
        
        return $this->render('login-v1', [
            'loginForm' => $loginForm
        ]);
    }

    public function actionRegister() {
        echo 'register';
    }
}
