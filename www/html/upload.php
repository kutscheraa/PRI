<?php // nahrát recept
require '../prolog.php';
require INC . '/html-begin.php';
require INC . '/nav.php';
require INC . '/boxes.php';
require INC . '/xmlTools.php';

if (!isUser()) die; ?>

<div class="absolute top-0 z-[-2] h-screen w-screen bg-neutral-950 bg-[radial-gradient(ellipse_80%_80%_at_50%_-20%,rgba(120,119,198,0.3),rgba(255,255,255,0))]"></div>

<div class="flex justify-center m-12 mt-44">
    <form class="shadow-2xl rounded-xl ring-1 ring-white ring-opacity-50 px-8 pt-6 pb-8 mb-4" enctype="multipart/form-data" method="POST">
        <div class="mb-4 font-extralight text-2xl text-white flex justify-center">Upload guide</div>
        <div class="mb-4">
            <input class='flex justify-center text-white font-extralight' title="tt" id="fileInput" name="xml" type="file" accept="text/xml" data-max-file-size="2M">
        </div>
        <div class='flex justify-center'>
        <input class="shadow-2xl rounded-xl ring-1 ring-white ring-opacity-50 text-white font-extralight py-2 px-4 flex justify-center mb-4 hover:bg-white hover:text-black" type="submit" value="Upload" />
        </div>
        <div class="flex justify-center">
        <button class="shadow-2xl rounded-xl ring-1 ring-white ring-opacity-50 font-extralight py-2 px-4 text-white hover:bg-white hover:text-black" type="button" onclick="location.href='create.php';">
            Create from form
        </button>
        </div>
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
