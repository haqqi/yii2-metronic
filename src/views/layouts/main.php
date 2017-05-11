<?php

/** @var \yii\web\View $this */

use haqqi\metronic\assets\core\VersionAsset;
use haqqi\metronic\helpers\Layout;
use haqqi\metronic\Metronic;
use haqqi\metronic\widgets\NavBar;
use yii\helpers\Html;
use yii\helpers\Url;

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
    <html lang="en" class="no-js"><!--<![endif]-->
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
    <body <?= Layout::getHtmlOptions('body', [], true); ?>>
    <?php $this->beginBody(); ?>

    <div class="page-wrapper">

        <!-- BEGIN HEADER -->
        <?php
        NavBar::begin([
            // customizable using params
        ]);
        
        NavBar::end();
        
        ?>
        <!-- END HEADER -->

        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        
        <div class="page-container">
            
        </div>

        <?= ($metronic->layoutOption == Metronic::LAYOUT_BOXED)
            ? Html::beginTag('div', ['class' => 'container'])
            : ''; ?>

        <!-- BEGIN FOOTER -->
        <div class="page-footer">
            <div class="page-footer-inner">
                <?= Yii::$app->params['metronic']['footer']; ?>
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        <!-- END FOOTER -->

        <?= ($metronic->layoutOption == Metronic::LAYOUT_BOXED)
            ? Html::endTag('div')
            : ''; ?>
    </div>


    <?php $this->endBody(); ?>
    </body>
    </html>

<?php

$this->endPage();
