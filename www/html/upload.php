<?php // nahrát recept
require '../prolog.php';
require INC . '/html-begin.php';
require INC . '/nav.php';
require INC . '/boxes.php';
require INC . '/xmlTools.php';

if (!isUser()) die; ?>

<style>
  body {
    background: #BA8B02;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to left, #181818, #BA8B02);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to left, #181818, #BA8B02); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    background-attachment: fixed;
  }

  p {
    margin-bottom: .6em;
  }
</style>

<div class="flex justify-center m-12">
    <form class="bg-zinc-50 rounded px-8 pt-6 pb-8 mb-4" enctype="multipart/form-data" method="POST">
        <div class="mb-4 font-bold flex justify-center">Upload guide</div>
        <div class="mb-4">
            <input class='flex justify-center' title="tt" id="fileInput" name="xml" type="file" accept="text/xml" data-max-file-size="2M">
        </div>
        <div class='flex justify-center'>
        <input class="bg-black hover:bg-green text-white font-bold rounded py-2 px-4 flex justify-center mb-4" type="submit" value="Upload" />
        </div>
        <div class="flex justify-center">
        <button class="bg-black text-white font-bold py-2 px-4 rounded" type="button" onclick="location.href='create.php';">
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
