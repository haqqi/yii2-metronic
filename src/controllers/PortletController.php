<?php

namespace haqqi\metronic\controllers;

use yii\web\Controller;

class PortletController extends Controller
{
    public $layout = '@haqqi/metronic/views/layouts/main';
    
    public function actionSolid() {
        return $this->render('solid');
    }
}