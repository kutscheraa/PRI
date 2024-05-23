<?php // úvodní stránka:
require '../prolog.php';
require INC . '/html-begin.php';
require INC . '/nav.php';
?>

<style>

  p {
    margin-bottom: .6em;
  }
</style>

<div class="absolute top-0 z-[-2] h-screen w-screen bg-neutral-950 bg-[radial-gradient(ellipse_80%_80%_at_50%_-20%,rgba(120,119,198,0.3),rgba(255,255,255,0))]"></div>
<main class='pb-10 m-6 mt-48'>
  <h1 class="pb-6 text-7xl font-extralight text-center text-white">
    <?= TITLE ?>
  </h1>

  <p class='font-extralight text-center text-white'>
    Create your albion online gear guides
  </p>

</main>

<?php require INC . '/html-end.php';