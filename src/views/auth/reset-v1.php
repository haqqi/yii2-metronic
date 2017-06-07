<?php

use haqqi\metronic\assets\core\PageLevelAsset;
use haqqi\metronic\assets\core\VersionAsset;
use haqqi\metronic\forms\ResetPasswordForm;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\web\View;

/** @var View $this */
/** @var ResetPasswordForm $resetPasswordForm */

// custom definition for version asset in login page
VersionAsset::noPublish();

$this->params['bodyClass'] = ['login'];
$this->registerCss('.login .content {padding-bottom: 10px;}');


?>

    <div class="logo">
        <?= $resetPasswordForm->logoTargetUrl !== null ? Html::beginTag('a',
            ['href' => $resetPasswordForm->logoTargetUrl]) : ''; ?>
        <?= Html::img($resetPasswordForm->logoImageUrl === null ? \Yii::$app->assetManager->getBundle(PageLevelAsset::className())->baseUrl . '/img/logo-big.png' : $resetPasswordForm->logoImageUrl,
            ['alt' => 'Logo']); ?>
        <?= $resetPasswordForm->logoTargetUrl !== null ? Html::endTag('a') : ''; ?>
    </div>

    <div class="content">
        <!-- BEGIN LOGIN FORM -->
        <?php
        $form = ActiveForm::begin([
            'id'          => 'forgot-form',
            'options'     => [
                'class' => ['forget-form'],
                'style' => 'display: block;'
            ],
            'fieldConfig' => [
                'template'     => "{label}\n{input}\n{hint}\n{error}",
                'labelOptions' => [
                    'class' => 'control-label visible-ie8 visible-ie9'
                ],
                //                'options'      => [
                ////                    'class'       => 'form-group',
                //                ],
                'inputOptions' => [
                    'class' => 'form-control form-control-solid placeholder-no-fix'
                ],
            ]
        ]);
        ?>
        <h3 class="form-title font-green">Reset Password</h3>
        <p>Enter new password for your account.</p>
        <?= $form->field($resetPasswordForm, 'password', [
            'inputOptions' => [
                'tabindex'    => 1,
                'placeholder' => $resetPasswordForm->getAttributeLabel('password')
            ]
        ])->passwordInput(); ?>
        <div class="form-actions">
            <?= Html::a('Back', $resetPasswordForm->loginUrl,
                ['class' => 'btn green btn-outline', 'id' => 'back-btn']); ?>
            <?= Html::submitButton('Submit',
                ['class' => 'btn green uppercase pull-right', 'tabindex' => 2]); ?>
        </div>
        <?php ActiveForm::end(); ?>
        <!-- END LOGIN FORM -->
    </div>

    <div class="copyright">
        <?= isset ($copyRight) && !is_null($copyRight) ? $copyRight : Yii::$app->params['metronic']['copyright']; ?>
    </div>

<?php
