<?php // úvodní stránka:
require '../prolog.php';
require INC . '/html-begin.php';
require INC . '/nav.php';
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

<main class='pb-10 m-6 mt-48'>
  <h1 class="pb-6 text-5xl font-semibold text-center text-white">
    <?= TITLE ?>
  </h1>

  <p class='font-extralight text-center text-white'>
    Upload your albion online gear guides
  </p>

</main>

<?php require INC . '/html-end.php';