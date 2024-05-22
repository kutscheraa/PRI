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
<?php
require '../prolog.php';
require INC . '/html-begin.php';
require INC . '/nav.php';
require INC . '/boxes.php';
require INC . '/xmlTools.php';

if (!isUser()) die;


$directory = '/var/albion/guides';

// Načtení všech XML souborů z adresáře
function getXmlFiles($directory) {
    return glob($directory . '/*.xml');
}

// Vyhodnocení obtížnosti XML souboru
function getDifficulty($xml) {
    $difficulty = 'Unknown';
    if (isset($xml->header->difficulty->Beginner)) {
        $difficulty = 'Beginner';
    } elseif (isset($xml->header->difficulty->Advanced)) {
        $difficulty = 'Advanced';
    } elseif (isset($xml->header->difficulty->Pro)) {
        $difficulty = 'Pro';
    }
    return $difficulty;
}

// Načtení souborů
$files = getXmlFiles($directory);

$guides = [];
foreach ($files as $file) {
    $xml = simplexml_load_file($file);
    $difficulty = getDifficulty($xml);
    $guides[] = [
        'file' => $file,
        'title' => (string) $xml->header->title,
        'difficulty' => $difficulty,
        'xml' => $xml
    ];
}

// Zobrazení seřazených souborů
echo '<div class="m-12 p-4 bg-gray-100 rounded">';
echo '<b>Guides listed by difficulty</b>';
foreach ($guides as $guide) {
    $color = '';
    switch ($guide['difficulty']) {
        case 'Beginner':
            $color = 'green';
            break;
        case 'Advanced':
            $color = 'orange';
            break;
        case 'Pro':
            $color = 'red';
            break;
        default:
            $color = 'black'; // Pokud není obtížnost definována, použije se černá barva.
    }
    echo '<h3 style="color: ' . $color . '">' . htmlspecialchars($guide['title']) . ' (' . $guide['difficulty'] . ')</h3>';
}
echo '</div>';
require INC . '/html-end.php';
?>