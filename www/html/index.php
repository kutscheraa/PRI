<?php // úvodní stránka:
require '../prolog.php';
require INC . '/html-begin.php';
require INC . '/nav.php';
?>

<style>
  p {
    margin-bottom: .6em;
  }
  body {
    background-color: darkgray;
  }
</style>

<main class='pb-10 m-6'>
  <h1 class="pb-6 text-5xl text-center">
    <?= TITLE ?>
  </h1>

  <p class='text-1xl text-center'>
Upload your guide
  </p>

</main>

<?php require INC . '/html-end.php';