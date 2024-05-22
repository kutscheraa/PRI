<?php
// pro zobrazení chyby
function errorBox($text)
{ ?>
    <div class="bg-red-900 border border-red-700 text-red-300 m-8 p-4 rounded">
        <?= $text ?>
    </div>
<?php }

// pro zobrazení úspěchu
function successBox($text)
{ ?>
    <div class="bg-green-900 border border-green-700 text-green-300 m-8 p-4 rounded">
        <?= $text ?>
    </div>
<?php }