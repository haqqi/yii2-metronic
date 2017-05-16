<?php
/**
 * User: Haqqi
 * Date: 5/15/2017
 * Time: 5:49 AM
 */

use haqqi\metronic\assets\core\PageLevelAsset;
use haqqi\metronic\forms\LoginForm;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/** @var LoginForm $loginForm */

?>

    <div class="logo">
        <?= Html::img($loginForm->logoUrl, ['alt' => 'Logo']); ?>
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

<?php
if (isset ($copyRight)) {
    echo $copyRight;
} else { ?>
    <div class="copyright">
        Yii2 Metronic Admin Template Integration by <a href="https://github.com/haqqi" target="_blank">Haqqi</a>
    </div>
<?php } ?>

<?php