<?php

namespace haqqi\metronic\controllers;

use haqqi\metronic\base\MetronicController;

class DashboardController extends MetronicController
{

    public function actionIndex() {
        return $this->render('index');
    }
    
    public function actionV1() {
        return $this->render('index');
    }
}