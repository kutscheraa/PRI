<?php // přečti a odešli XML soubor s návodem

$guide = @$_GET['guide'];
$file = "/var/albion/guides/$guide.xml";

header("Content-type: text/xml;");
if (file_exists($file))
    readfile($file);