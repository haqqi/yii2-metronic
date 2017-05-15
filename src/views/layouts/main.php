<?php

/** @var \yii\web\View $this */

use haqqi\metronic\Metronic;
use haqqi\metronic\widgets\NavBar;
use haqqi\metronic\widgets\SidebarMenu;
use yii\helpers\Html;

$this->beginContent(__DIR__ . '/base.php');

/** @var Metronic $metronic */
$metronic = Metronic::getComponent();

?>

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
        <div class="clearfix"></div>
        <!-- END HEADER & CONTENT DIVIDER -->

        <div class="page-container">
            <?php
            if ($metronic->sidebarMenuItemFile !== false) {
                echo SidebarMenu::widget();
            }
            ?>

            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <?= $content; ?>
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
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
<?php

$this->endContent();
