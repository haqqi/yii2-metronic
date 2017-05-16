<?php

use haqqi\metronic\widgets\Portlet;

?>

    <div class="ro">
        <div class="col-md-6">
            <?php

            Portlet::begin([
                'color' => 'purple',
//                'type' => Portlet::TYPE_SOLID,
                'titleSubject' => 'Portlet',
                'titleIconClass' => 'icon-speech',
                'titleHelper' => 'Finish it...',
                'bordered' => true
            ]);

            ?>

            <p> Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras
                mattis consectetur purus sit amet fermentum. est non commodo luctus, nisi erat porttitor
                ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis,
                est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.
                Cras mattis consectetur purus sit amet fermentum. est non commodo luctus, nisi erat porttitor ligula,
                eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. </p>
            <p> Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras
                mattis consectetur purus sit amet fermentum. est non commodo luctus, nisi erat porttitor
                ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis,
                est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.
                Cras mattis consectetur purus sit amet fermentum. est non commodo luctus, nisi erat porttitor ligula,
                eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. </p>
            <p> Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras
                mattis consectetur purus sit amet fermentum. est non commodo luctus, nisi erat porttitor
                ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Duis mollis,
                est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.
                Cras mattis consectetur purus sit amet fermentum. est non commodo luctus, nisi erat porttitor ligula,
                eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. </p>

            <?php

            Portlet::end();

            ?>
        </div>
    </div>


<?php
