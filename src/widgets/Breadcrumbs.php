<?php

namespace haqqi\metronic\widgets;

use rmrevin\yii\fontawesome\FA;

class Breadcrumbs extends \yii\widgets\Breadcrumbs
{
    public $separator;

    public $itemTemplate = "<li>{link} {separator}</li>\n";

    public $activeItemTemplate = "<li><span>{link}</span></li>\n";

    public function __construct(array $config = [])
    {
        $this->separator        = FA::icon('angle-right');
        $this->options['class'] = 'page-breadcrumb';

        parent::__construct($config);
    }

    protected function renderItem($link, $template)
    {
        $item = parent::renderItem($link, $template);

        return strtr($item, ['{separator}' => $this->separator]);
    }
}
