<?php
require '../prolog.php';
require INC . '/html-begin.php';
require INC . '/nav.php';
require INC . '/xmlTools.php';
require INC . '/db.php';
?>
<div class="absolute top-0 z-[-2] h-screen w-screen bg-neutral-950 bg-[radial-gradient(ellipse_80%_80%_at_50%_-20%,rgba(120,119,198,0.3),rgba(255,255,255,0))]"></div>
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
            $filtered_guides[] = [
                'guide' => $guide,
                'category' => $guide_category,
                'difficulty' => $guide_difficulty,
            ];
        }
    }
}

function printGuide($guide, $guide_category, $guide_difficulty)
{
    echo "<div class='shadow-2xl rounded-xl ring-1 ring-white ring-opacity-50 h-fit rounded-xl p-4 mb-4 text-white mr-4'>";
    echo "<h2 class='font-extralight text-2xl'>{$guide->header->title}</h2>";
    echo "<p>Category: {$guide_category}</p>";
    echo "<p>Difficulty: {$guide_difficulty}</p>";
    echo "<p>{$guide->description}</p>";
    echo "</div>";
}

?>
<h1 class='py-6 text-center text-5xl text-white font-extralight'>Search guides</h1>
<div class="flex justify-center mb-12">
    <form action="search.php" method="get" class="shadow-2xl rounded-xl ring-1 ring-white ring-opacity-50 px-8 pt-6 pb-8 mb-4">
        <div class="flex justify-center mb-4">
            <label for="category" class='mb-2 text-white mr-2 font-extralight'>Category:</label>
            <select class='bg-neutral-900 text-white font-extralight rounded ring-1 ring-white ring-opacity-50 focus:outline-none' name="category" id="category">
                <option value="">All</option>
                <option value="PVP">PVP</option>
                <option value="PVE">PVE</option>
                <option value="Arena">Arena</option>
                <option value="Gathering">Gathering</option>
                <option value="Other">Other</option>
            </select>
        </div>
        <div class="flex justify-center mb-4">
            <label for="difficulty" class='mb-2 text-white mr-2 font-extralight'>Difficulty:</label>
            <select class='bg-neutral-900 text-white font-extralight rounded ring-1 ring-white ring-opacity-50 focus:outline-none' name="difficulty" id="difficulty">
                <option value="">All</option>
                <option value="Beginner">Beginner</option>
                <option value="Advanced">Advanced</option>
                <option value="Pro">Pro</option>
            </select>
        </div>
        <div class="flex justify-center">
            <input type="submit" value="Filter" class="ring-1 ring-white ring-opacity-50 text-white font-extralight rounded py-2 px-4 hover:bg-white hover:text-black">
        </div>
    </form>
</div>

<div class="flex flex-wrap justify-center font-extralight bg-neutral-950">
    <?php foreach ($filtered_guides as $guide_info): ?>
        <?php printGuide($guide_info['guide'], $guide_info['category'], $guide_info['difficulty']); ?>
    <?php endforeach; ?>
</div>
</div>
<?php require INC . '/html-end.php';