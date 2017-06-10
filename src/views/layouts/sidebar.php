<?php

use haqqi\metronic\widgets\SidebarMenu;

?>

<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <?= SidebarMenu::widget([
            'items' => require(Yii::getAlias('@haqqi/metronic/config/sidebar-menu.php'))
        ]); ?>
    </div>
</div>

<?php
