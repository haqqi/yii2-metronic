<?php
/**
 * User: Haqqi
 * Date: 5/15/2017
 * Time: 5:49 AM
 */

use haqqi\metronic\assets\core\PageLevelAsset;
use haqqi\metronic\assets\core\VersionAsset;
use haqqi\metronic\forms\ForgotPasswordForm;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\web\View;

/** @var View $this */
/** @var ForgotPasswordForm $forgotPasswordForm */

// custom definition for version asset in login page
VersionAsset::noPublish();

$this->params['bodyClass'] = ['login'];
$this->registerCss('.login .content {padding-bottom: 10px;}');


?>

    <div class="logo">
        <?= $forgotPasswordForm->logoTargetUrl !== null ? Html::beginTag('a',
            ['href' => $forgotPasswordForm->logoTargetUrl]) : ''; ?>
        <?= Html::img($forgotPasswordForm->logoImageUrl === null ? \Yii::$app->assetManager->getBundle(PageLevelAsset::className())->baseUrl . '/img/logo-big.png' : $forgotPasswordForm->logoImageUrl,
            ['alt' => 'Logo']); ?>
        <?= $forgotPasswordForm->logoTargetUrl !== null ? Html::endTag('a') : ''; ?>
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
        <h3 class="form-title font-green">Forget Password?</h3>
        <?= isset($message) ? $message : '';?>
        <?= $forgotPasswordForm->message; ?>
        <?= $form->field($forgotPasswordForm, 'email', [
            'inputOptions' => [
                'tabindex'    => 1,
                'placeholder' => $forgotPasswordForm->getAttributeLabel('email')
            ]
        ]); ?>
        <div class="form-actions">
            <?= Html::a('Back', $forgotPasswordForm->loginUrl,
                ['class' => 'btn green btn-outline', 'id' => 'back-btn']); ?>
            <?= Html::submitButton('Request Reset Link',
                ['class' => 'btn green uppercase pull-right', 'tabindex' => 2]); ?>
        </div>
        <?php ActiveForm::end(); ?>
        <!-- END LOGIN FORM -->
    </div>

    <div class="copyright">
        <?= isset ($copyRight) && !is_null($copyRight) ? $copyRight : Yii::$app->params['metronic']['copyright']; ?>
    </div>

<?php
