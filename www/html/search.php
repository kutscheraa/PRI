<?php // vypsat návody:
require '../prolog.php';
require INC . '/html-begin.php';
require INC . '/nav.php';
require INC . '/xmlTools.php';
require INC . '/db.php';
?>
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
function parseXML($file)
{
    $xml = simplexml_load_file($file);
    return $xml;
}

$category = $_GET['category'] ?? '';
$difficulty = $_GET['difficulty'] ?? '';

$files = glob('/var/albion/guides/*.xml');
$filtered_guides = [];

foreach ($files as $file) {
    $guide = parseXML($file);

    $guide_category = '';
    if (isset($guide->header->category->PVP)) {
        $guide_category = 'PVP';
    } elseif (isset($guide->header->category->PVE)) {
        $guide_category = 'PVE';
    } elseif (isset($guide->header->category->Arena)) {
        $guide_category = 'Arena';
    } elseif (isset($guide->header->category->Gathering)) {
        $guide_category = 'Gathering';
    } elseif (isset($guide->header->category->Other)) {
        $guide_category = 'Other';
    }

    $guide_difficulty = '';
    if (isset($guide->header->difficulty->Beginner)) {
        $guide_difficulty = 'Beginner';
    } elseif (isset($guide->header->difficulty->Advanced)) {
        $guide_difficulty = 'Advanced';
    } elseif (isset($guide->header->difficulty->Pro)) {
        $guide_difficulty = 'Pro';
    }

    if (empty($category) || strtolower($guide_category) == strtolower($category)) {
        if (empty($difficulty) || strtolower($guide_difficulty) == strtolower($difficulty)) {
            $filtered_guides[] = $guide;
        }
    }
}

function printGuide($guide, $guide_category, $guide_difficulty)
{
    echo "<div class='bg-zinc-700 h-fit rounded shadow-md p-4 mb-4 text-white mr-4'>";
    echo "<h2 class='font-bold'>{$guide->header->title}</h2>";
    echo "<p>Category: {$guide_category}</p>";
    echo "<p>Difficulty: {$guide_difficulty}</p>";
    echo "<p>{$guide->description}</p>";
    echo "</div>";
}

?>
        <h1 class='py-6 text-center text-5xl text-white'>Search guides</h1>
    <div class="flex justify-center mb-12">
        <form action="search.php" method="get" class="bg-zinc-700 shadow-2xl rounded px-8 pt-6 pb-8 mb-4">
            <div class="flex justify-center mb-4">
            <label for="category" class='mb-2 text-white mr-2'>Category:</label>
            <select class='bg-zinc-700 text-white' name="category" id="category">
                <option value="">All</option>
                <option value="PVP">PVP</option>
                <option value="PVE">PVE</option>
                <option value="Arena">Arena</option>
                <option value="Gathering">Gathering</option>
                <option value="Other">Other</option>
            </select>
            </div>
            <div class="flex justify-center mb-4">
            <label for="difficulty" class='mb-2 text-white mr-2'>Difficulty:</label>
            <select class='bg-zinc-700 text-white' name="difficulty" id="difficulty">
                <option value="">All</option>
                <option value="Beginner">Beginner</option>
                <option value="Advanced">Advanced</option>
                <option value="Pro">Pro</option>
            </select>
            </div>
            <div class="flex justify-center">
            <input type="submit" value="Filter" class="bg-stone-900 text-white font-bold rounded py-2 px-4 hover:bg-white hover:text-black">
            </div>
        </form>
    </div>

    <div class="flex flex-wrap justify-center">
        <?php foreach ($filtered_guides as $guide): ?>
            <?php printGuide($guide, $guide_category, $guide_difficulty); ?>
        <?php endforeach; ?>
    </div>
</div>