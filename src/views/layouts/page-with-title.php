<?php

use haqqi\metronic\widgets\Breadcrumbs;
use yii\helpers\Html;
use yii\web\View;

/** @var View $this */
/** @var string $content */

$this->beginContent(__DIR__ . '/main.php');

?>

<?php if (isset($this->params['pageBreadcrumb'])) { ?>
    <div class="page-bar">
        <?= Breadcrumbs::widget([
            'links' => $this->params['pageBreadcrumb']
        ]); ?>
        
        <?= isset($this->params['pageToolbar']) ? Html::tag('div', $this->params['pageToolbar']) : ''; ?>
    </div>
<?php } ?>

<?php if(isset($this->params['pageTitle'])) { ?>
<h1 class="page-title">
    <?= $this->params['pageTitle'] ?>
    <?= isset($this->params['pageDescription']) ? Html::tag('small', $this->params['pageDescription']) : ''; ?>
</h1>
<?php } ?>

<?= $content ?>

<?php

$this->endContent();