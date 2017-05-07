<?php

/** @var \yii\web\View $this */

use haqqi\metronic\Metronic;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

Metronic::getComponent()->registerAsset($this);

$this->beginPage();

?>

    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language; ?>" class="">
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
    <body class="<?= implode(ArrayHelper::getValue($this->params, 'bodyClass', []), ' '); ?>">
    <?php $this->beginBody(); ?>

    <?php echo $content; ?>

    <?php $this->endBody(); ?>
    </body>
    </html>

<?php

$this->endPage();
