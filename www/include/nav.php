<?php // navbar – navigační lišta
require INC . '/pages.php';
?>

<!-- top navigation bar -->
<nav class="sticky top-0 bg-darkgrey border-gray-200 shadow-md dark:bg-darker-grey">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <!-- logo & title -->
        <a href='/'>
            <div class="flex">
                <img src="./assets/logo.png" class="h-10 mr-3" />
                <span class="text-2xl font-semibold whitespace-nowrap text-white">
                    <?= TITLE . getJmeno(': ') ?>
                </span>
            </div>
        </a>

        <!-- hamburger menu (md:hidden) -->
        <button id="menu-toggle"
            class="md:hidden inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-600 rounded-lg hover:bg-gray-100">
            <i class="fa fa-bars fa-lg"></i>
        </button>

        <!-- menu items -->
        <div class="hidden w-full md:block md:w-auto mr-3" id="menu">
            <ul class="font-medium flex flex-col md:p-0 mt-4 border border-gray-100 rounded-lg md:flex-row md:mt-0 dark:border-gray-700">
                <?php foreach ($pages as $href => $title) { ?>
                    <li>
                        <a href="<?= $href ?>" class="block p-2 rounded text-blue-700 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-800">
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