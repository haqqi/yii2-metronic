<?php
/**
 * User: Haqqi
 * Date: 5/5/2017
 * Time: 6:14 PM
 */

use kartik\helpers\Enum;

?>

<div>
    <ul>
        <li>Name: <?= $plant->name; ?></li>
        <li>Crop: <?= $plant->crop->name; ?></li>
    </ul>
</div>

<?php

echo Enum::array2table($data, false, true);
