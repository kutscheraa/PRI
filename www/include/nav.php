<?php // navbar – navigační lišta
require INC . '/pages.php';
?>

<!-- top navigation bar -->
<nav class="sticky top-0 shadow-2xl">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <!-- logo & title -->
        <a href='/'>
            <div class="flex">
                <img src="./assets/logo.png" class="h-10 mr-3" />
            </div>
        </a>

        <!-- hamburger menu (md:hidden) -->
        <button id="menu-toggle"
            class="md:hidden inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-xl hover:bg-gray-800">
            <i class="fa fa-bars fa-lg"></i>
        </button>

        <!-- menu items -->
        <div class="hidden w-full md:block md:w-auto mr-3" id="menu">
            <ul class="font-extralight flex flex-col md:p-0 mt-4 border border-white-700 rounded-xl md:flex-row md:mt-0">
                <?php foreach ($pages as $href => $title) { ?>
                    <li>
                        <a href="<?= $href ?>" class="block p-2 rounded-xl text-white hover:bg-white hover:text-black">
                            <?= $title ?>
                        </a>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        let menu = document.getElementById('menu');
        let toggleMenu = () => menu.classList.toggle('hidden')

        let button = document.getElementById('menu-toggle');
        button.addEventListener('click', toggleMenu)
    });
</script>