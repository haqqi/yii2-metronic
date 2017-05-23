<?php
namespace haqqi\metronic\widgets;

use yii\web\View;
use yii\web\JsExpression;
use yii\bootstrap\ActiveForm;

class MaterialForm extends ActiveForm
{
    public $fieldClass = 'haqqi\metronic\widgets\MaterialField';

    public function init()
    {
        parent::init();

        $customJS = new JsExpression("$('.form-md-floating-label .form-control').each(function(){
            if($(this).val() != '') $(this).addClass('edited');
        });");

        $this->getView()->registerJs($customJS, View::POS_READY, 'MaterialForm');
    }
}
