<?php

namespace haqqi\metronic\widgets;

use yii\base\Widget;
use yii\helpers\Html;

/**
 * Class DashboardStat
 *
 * @author Haqqi <me@haqqi.net>
 * @package haqqi\metronic\widgets
 *
 * Supported version 1 dashboard
 */
class DashboardStats extends Widget
{
    /** @var string color class to be used. You can use metronic color library */
    public $color;

    /** @var string html of icon */
    public $icon;

    /** @var string Number at the top of stat */
    public $number;

    /** @var string Description under the stat */
    public $desc;

    /** @var string More text */
    public $moreText = 'View more';
    
    /** @var string|array Url to be parsed by UrlManager  */
    public $moreUrl = '#';
    
    /** @var string Icon for more link */
    public $moreIcon = '<i class="m-icon-swapright m-icon-white"></i>';

    public function run()
    {
        echo Html::beginTag('div', [
            'class' => 'dashboard-stat ' . $this->color
        ]);

        echo Html::tag('div', $this->icon, ['class' => 'visual']);

        echo Html::beginTag('div', ['class' => 'details']);

        echo Html::tag('div', $this->number, ['class' => 'number']);
        echo Html::tag('div', $this->desc, ['class' => 'desc']);

        echo Html::endTag('div');
        
        echo ($this->moreText === false) ? '' : Html::a($this->moreText . ' ' . $this->moreIcon, $this->moreUrl, ['class' => 'more']);

        echo Html::endTag('div');
    }
}
