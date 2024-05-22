<?php
// pro zobrazení chyby
function errorBox($text)
{ ?>
    <div class="bg-red-900 border border-red-700 text-red-300 dark:bg-red-800 dark:border-red-600 dark:text-red-100 m-8 p-4 rounded">
        <?= $text ?>
    </div>
<?php }

// pro zobrazení úspěchu
function successBox($text)
{ ?>
    <div class="bg-green-900 border border-green-700 text-green-300 dark:bg-green-800 dark:border-green-600 dark:text-green-100 m-8 p-4 rounded">
        <?= $text ?>
    </div>
<?php }