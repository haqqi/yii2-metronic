<?php
/**
 * User: Haqqi
 * Date: 5/15/2017
 * Time: 5:49 AM
 */

use haqqi\metronic\assets\core\PageLevelAsset;
use haqqi\metronic\assets\core\VersionAsset;
use haqqi\metronic\forms\LoginForm;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/** @var LoginForm $loginForm */

// custom definition for version asset in login page
VersionAsset::noPublish();

$this->params['bodyClass'] = ['login'];

// custom css for register enable and other
if($loginForm->registerEnable === false && $loginForm->socialMediaLoginEnable === false) {
    $this->registerCss('.login .content {padding-bottom: 10px;}');
    $this->registerCss('.login .content .form-actions {border-bottom: none;}');
}

?>

    <div class="logo">
        <?= $loginForm->logoTargetUrl !== null ? Html::beginTag('a', ['href' => $loginForm->logoTargetUrl]) : ''; ?>
        <?= Html::img($loginForm->logoImageUrl === null ? \Yii::$app->assetManager->getBundle(PageLevelAsset::className())->baseUrl . '/img/logo-big.png' : $loginForm->logoImageUrl, ['alt' => 'Logo']); ?>
        <?= $loginForm->logoTargetUrl !== null ? Html::endTag('a') : ''; ?>
    </div>

    <div class="content">
        <!-- BEGIN LOGIN FORM -->
        <?php
        $form = ActiveForm::begin([
            'id'          => 'login-form',
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
        <h3 class="form-title font-green">Sign In</h3>
        <?= $form->field($loginForm, 'email', [
            'inputOptions' => [
                'tabindex'    => 1,
                'placeholder' => $loginForm->getAttributeLabel('email')
            ]
        ]); ?>
        <?= $form->field($loginForm, 'password', [
            'inputOptions' => [
                'tabindex'    => 2,
                'placeholder' => $loginForm->getAttributeLabel('password')
            ]
        ])->passwordInput(); ?>
        <div class="form-actions">
            <?= Html::submitButton('Login',
                ['class' => 'btn green uppercase', 'tabindex' => 4]); ?>

            <?= $form->field($loginForm, 'rememberMe', [
                'options'          => [
                    'tag' => null
                ],
                'checkboxTemplate' => "<label class='rememberme check mt-checkbox mt-checkbox-outline'>\n{input}\n{labelTitle}\n<span></span></label>"
            ])->label('Remember')->checkbox(['tabindex' => 3]); ?>
            <?php
            if ($loginForm->forgotPasswordEnable) {
                echo Html::a('Forgot password?', $loginForm->forgotPasswordUrl,
                    ['id' => 'forget-password', 'class' => 'forget-password', 'tabindex' => 5]);
            }
            ?>
        </div>
        <?php if ($loginForm->socialMediaLoginEnable) { ?>
            <div class="login-options">
                <h4>Or login with</h4>
                <ul class="social-icons">
                    <?php foreach ($loginForm->socialMediaLoginUrl as $socmed => $url) {

                        $url = Html::a('', Yii::$app->urlManager->createUrl($url), [
                            'class' => [
                                'social-icon-color',
                                $socmed
                            ]
                        ]);
                        echo Html::tag('li', $url);

                    } ?>
                </ul>
            </div>
        <?php } ?>
        <?php if ($loginForm->registerEnable) { ?>
            <div class="create-account">
                <p>
                    <a href="<?= Yii::$app->urlManager->createUrl($loginForm->registerUrl) ?>" id="register-btn"
                       class="uppercase">Create an account</a>
                </p>
            </div>
        <?php } ?>
        <?php ActiveForm::end(); ?>
        <!-- END LOGIN FORM -->
    </div>

    <div class="copyright">
        <?= isset ($copyRight) && !is_null($copyRight) ? $copyRight : Yii::$app->params['metronic']['copyright']; ?>
    </div>

<?php
