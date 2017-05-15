<?php

/** @var \yii\web\View $this */
/** @var string $content */

use haqqi\metronic\helpers\Layout;
use haqqi\metronic\Metronic;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var Metronic $metronic */
$metronic = Metronic::getComponent();
$metronic->registerAsset($this);

$this->beginPage();

?>

    <!DOCTYPE html>
    <!--[if IE 8]>
    <html lang="en" class="ie8 no-js"> <![endif]-->
    <!--[if IE 9]>
    <html lang="en" class="ie9 no-js"> <![endif]-->
    <!--[if !IE]><!-->
    <html lang="<?= Yii::$app->language ?>" class="no-js"><!--<![endif]-->
    <head>
        <meta charset="<?php echo Yii::$app->charset; ?>">
        <meta name="viewport"
              content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="content-type" content="text/html;charset=UTF-8">

        <!-- icon -->
        <?php echo Html::csrfMetaTags(); ?>
        <title><?php echo Html::encode($this->title); ?></title>

        <!-- js helper -->
        <script type="text/javascript">
          var BASE_URL = '<?= Url::base(true); ?>';
        </script>

        <!-- SEO things -->
        <?php $this->head(); ?>
    </head>
    <body <?php
    
    // handle custom body attribute
    $customBodyAttr = [
        'class' => ArrayHelper::getValue($this->params, 'bodyClass', [])
    ];
    
    if(empty($customBodyAttr['class'])) {
        $customBodyAttr = Layout::getHtmlOptions('body');
    }
    
    echo Html::renderTagAttributes($customBodyAttr);
    
    ?>>
    <?php $this->beginBody(); ?>

    <?php echo $content; ?>

    <?php $this->endBody(); ?>
    
    </body>
    </html>

<?php

$this->endPage();
