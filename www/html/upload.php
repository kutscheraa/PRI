<?php // nahrát recept
require '../prolog.php';
require INC . '/html-begin.php';
require INC . '/nav.php';
require INC . '/boxes.php';
require INC . '/xmlTools.php';

if (!isUser()) die; ?>

<div class="flex justify-center m-12">
    <form class="bg-zinc-50 rounded px-8 pt-6 pb-8 mb-4" enctype="multipart/form-data" method="POST">
        <div class="mb-4">Upload guide:</div>
        <div class="mb-4">
            <input title="tt" id="fileInput" name="xml" type="file" accept="text/xml" data-max-file-size="2M">
        </div>
        <input class="bg-blue-500 text-white font-bold rounded py-2 px-4" type="submit" value="Upload" />
    </form>
</div>

<?php
if (($xmlFile = @$_FILES['xml']) && ($tmpName = @$xmlFile['tmp_name'])) {
    $isValid = xmlValidate($tmpName, XML . '/guide.xsd');
    if (!$isValid) {
        errorBox('XML is not valid.');
    } else {
        $guide = $xmlFile['name'];
        $target = GUIDES . "/$guide";
        if (file_exists($target)) {
            errorBox('Already got this guide.');
        } else {
            // Debugging output
            echo "Temp file: $tmpName<br>";
            echo "Target file: $target<br>";

            if (rename($tmpName, $target)) {
                successBox("OK - $guide - uploaded");
            } else {
                errorBox("Failed to move uploaded file.");
            }
        }
    }
}

require INC . '/html-end.php';
