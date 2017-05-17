<?php

namespace haqqi\metronic\controllers;

use haqqi\metronic\base\MetronicController;

class PortletController extends MetronicController
{
    public function actionSolid() {
        return $this->render('solid');
    }
}