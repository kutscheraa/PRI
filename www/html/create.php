<?php
require '../prolog.php';
require INC . '/html-begin.php';
require INC . '/boxes.php';
require INC . '/xmlTools.php';
require INC . '/nav.php';
?>

<div class="min-h-screen bg-neutral-950 bg-[radial-gradient(ellipse_80%_80%_at_50%_-20%,rgba(120,119,198,0.3),rgba(255,255,255,0))]">
    <div class="flex justify-center text-white py-10">

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // PHP code for form handling here
        }
        ?>

        <div class='shadow-2xl rounded-xl ring-1 ring-white ring-opacity-50 mt-10 font-extralight bg-neutral-950 bg-[radial-gradient(ellipse_80%_80%_at_50%_-20%,rgba(120,119,198,0.3),rgba(255,255,255,0))] p-8'>
            <h1 class='text-white text-2xl mb-4 text-center'>Create New Guide</h1>
            <form action="" method="post">
                <div class="mb-4">
                    <label for="title" class="block text-white font-bold mb-2">Title:</label>
                    <input class='w-full bg-transparent text-white font-extralight rounded ring-1 ring-white ring-opacity-50 focus:outline-none' type="text" id="title" name="title" required>
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-white font-bold mb-2">Description:</label>
                    <textarea class='w-full bg-transparent text-white font-extralight rounded ring-1 ring-white ring-opacity-50 focus:outline-none' id="description" name="description" required></textarea>
                </div>

                <div class="mb-4">
                    <label for="category" class="block text-white font-bold mb-2">Category:</label>
                    <select class='w-full bg-neutral-950 text-white font-extralight rounded ring-1 ring-white ring-opacity-50 focus:outline-none' id="category" name="category" required>
                        <option value="PVP">PVP</option>
                        <option value="PVE">PVE</option>
                        <option value="Arena">Arena</option>
                        <option value="Gathering">Gathering</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="difficulty" class="block text-white font-bold mb-2">Difficulty:</label>
                    <select class='w-full bg-neutral-950 text-white font-extralight rounded ring-1 ring-white ring-opacity-50 focus:outline-none' id="difficulty" name="difficulty" required>
                        <option value="Beginner">Beginner</option>
                        <option value="Advanced">Advanced</option>
                        <option value="Pro">Pro</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="author" class="block text-white font-bold mb-2">Author:</label>
                    <input class='w-full bg-transparent text-white font-extralight rounded ring-1 ring-white ring-opacity-50 focus:outline-none' type="text" id="author" name="author" required>
                </div>

                <div class="mb-4">
                    <label for="gear" class="block text-white font-bold mb-2 text-2xl">Gear</label>
                    <div id="gear">
                        <div>
                            <label for="gear_piece_1" class="block text-white font-bold mb-2">Gear Piece:</label>
                            <input class='bg-transparent text-white font-extralight rounded ring-1 ring-white ring-opacity-50 focus:outline-none mb-2' type="text" name="gear_pieces[]" required>
                            <select class='bg-neutral-950 text-white font-extralight rounded ring-1 ring-white ring-opacity-50 focus:outline-none mb-2' name="gear_tiers[]" required>
                                <option value="4">Tier 4</option>
                                <option value="5">Tier 5</option>
                                <option value="6">Tier 6</option>
                                <option value="7">Tier 7</option>
                                <option value="8">Tier 8</option>
                            </select>
                            <select class='bg-neutral-950 text-white font-extralight rounded ring-1 ring-white ring-opacity-50 focus:outline-none' name="gear_types[]" required>
                                <option value="head">Head</option>
                                <option value="chest">Chest</option>
                                <option value="boots">Boots</option>
                                <option value="weapon">Weapon</option>
                                <option value="off-hand">Off-hand</option>
                                <option value="cape">Cape</option>
                                <option value="food">Food</option>
                                <option value="potion">Potion</option>
                            </select>
                        </div>
                    </div>
                    <button class='w-full mb-4 flex justify-center text-white text-2xl font-extralight rounded ring-1 ring-white ring-opacity-50 focus:outline-none hover:bg-white hover:text-black' type="button" onclick="addGearPiece()">Add Gear Piece</button>
                </div>

                <div class="flex justify-center">
                    <input class='w-full mb-4 flex justify-center text-white text-2xl font-extralight rounded ring-1 ring-white ring-opacity-50 focus:outline-none hover:bg-white hover:text-black' type="submit" value="Create Guide">
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function addGearPiece() {
        const gearDiv = document.getElementById('gear');
        const newGearPiece = document.createElement('div');
        newGearPiece.innerHTML = `
            <div class="mb-4">
                <label for="gear_piece_${gearDiv.children.length + 1}" class="block text-white font-bold mb-2">Gear Piece:</label>
                <input class='  bg-transparent text-white font-extralight rounded ring-1 ring-white ring-opacity-50 focus:outline-none' type="text" name="gear_pieces[]" required>
                <select class='bg-neutral-950 text-white font-extralight rounded ring-1 ring-white ring-opacity-50 focus:outline-none' name="gear_tiers[]" required>
                    <option value="4">Tier 4</option>
                    <option value="5">Tier 5</option>
                    <option value="6">Tier 6</option>
                    <option value="7">Tier 7</option>
                    <option value="8">Tier 8</option>
                </select>
                <select class='bg-neutral-950 text-white font-extralight rounded ring-1 ring-white ring-opacity-50 focus:outline-none' name="gear_types[]" required>
                    <option value="head">Head</option>
                    <option value="chest">Chest</option>
                    <option value="boots">Boots</option>
                    <option value="weapon">Weapon</option>
                    <option value="off-hand">Off-hand</option>
                    <option value="cape">Cape</option>
                    <option value="food">Food</option>
                    <option value="potion">Potion</option>
                </select>
            </div>
        `;
        gearDiv.appendChild(newGearPiece);
    }
</script>
<?php require INC . '/html-end.php'; ?>
