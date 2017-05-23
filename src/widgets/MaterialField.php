<?php
namespace haqqi\metronic\widgets;

use yii\bootstrap\ActiveField;

class MaterialField extends ActiveField
{
    public $options = ['class' => 'form-group form-md-line-input form-md-floating-label'];
    public $template = "{input}\n{label}\n{hint}\n{error}";
    public $horizontalCssClasses = [
        'label' => 'col-md-3',
        'offset' => 'col-md-offset-3',
        'wrapper' => 'col-md-9',
        'error' => '',
        'hint' => '',
    ];
}