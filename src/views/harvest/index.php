<?php
/**
 * User: Haqqi
 * Date: 5/5/2017
 * Time: 6:14 PM
 */

use haqqi\metronic\models\Plant;
use kartik\helpers\Enum;
use yii\helpers\Html;

$plants = Plant::find()->all();

$links = [];
foreach ($plants as $p) {
    $links[] = Html::a($p->name, ['harvest/index', 'plantId' => $p->id], [
        'class' => 'btn'
    ]);
}

?>

<div>
    <?= implode('', $links); ?>
</div>

<div>
    <ul>
        <li>Name: <?= $plant->name; ?></li>
        <li>Crop: <?= $plant->crop->name; ?></li>
    </ul>
</div>

<?php

echo Enum::array2table($data, false, true);
