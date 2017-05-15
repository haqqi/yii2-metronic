<?php
/**
 * User: Haqqi
 * Date: 5/15/2017
 * Time: 5:49 AM
 */

use haqqi\metronic\assets\core\PageLevelAsset;
use haqqi\metronic\forms\LoginForm;
use yii\helpers\Html;

/** @var LoginForm $loginForm */

?>

    <div class="logo">
        <?php $img = \Yii::$app->assetManager->getBundle(PageLevelAsset::className())->baseUrl . '/img/logo-big.png';
        echo Html::img($img, ['alt' => 'Logo']);
        ?>
    </div>

    <div class="content">
        <!-- BEGIN LOGIN FORM -->
        <form class="login-form" action="index.html" method="post">
            <h3 class="form-title font-green">Sign In</h3>
            <div class="form-group">
                <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                <label class="control-label visible-ie8 visible-ie9">Username</label>
                <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off"
                       placeholder="Username" name="username"/></div>
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Password</label>
                <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off"
                       placeholder="Password" name="password"/></div>
            <div class="form-actions">
                <button type="submit" class="btn green uppercase">Login</button>
                <label class="rememberme check mt-checkbox mt-checkbox-outline">
                    <input type="checkbox" name="remember" value="1"/>Remember
                    <span></span>
                </label>
                <a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a>
            </div>
            <div class="login-options">
                <h4>Or login with</h4>
                <ul class="social-icons">
                    <li>
                        <a class="social-icon-color facebook" data-original-title="facebook" href="javascript:;"></a>
                    </li>
                    <li>
                        <a class="social-icon-color twitter" data-original-title="Twitter" href="javascript:;"></a>
                    </li>
                    <li>
                        <a class="social-icon-color googleplus" data-original-title="Goole Plus"
                           href="javascript:;"></a>
                    </li>
                    <li>
                        <a class="social-icon-color linkedin" data-original-title="Linkedin" href="javascript:;"></a>
                    </li>
                </ul>
            </div>

            <?php if ($loginForm->registerEnable) { ?>
                <div class="create-account">
                    <p>
                        <a href="<?= Yii::$app->urlManager->createUrl($loginForm->registerUrl) ?>" id="register-btn" class="uppercase">Create an account</a>
                    </p>
                </div>
            <?php } ?>
        </form>
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
