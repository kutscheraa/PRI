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

<h1 class="py-6 text-center text-5xl text-white">GUIDES</h1>

<div class="flex justify-center text-white max-w-2xl mx-auto">
    <ol class="fa-ul">
        <?php foreach (xmlFileList(GUIDES) as $basename) { ?>
            <li>
                <i class="fa fa-folder"></i>
                <a class="hover:underline" href="?guide=<?= $basename ?>">
                    <?= $basename ?> (<?= precteno($basename) ?>)
                </a>
            </li>
        <?php } ?>
    </ol>
</div>

<section class="flex justify-center">
    <?php // zvolený navod:
    if ($guide = @$_GET['guide']) {
        if (TRANSFORM_SERVER_SIDE) { ?>
            <?= xmlTransform(GUIDES . "/$guide.xml", XML . '/guide.xsl') ?>
        <?php } else { ?>
            <h2 id="title" class="text-center text-2xl m-4"></h2>
            <script>
                loadXML(
                    "/serve/getGuide.php?guide=<?= $guide ?>",
                    (xmlDom) => {
                        // zde je možné pracovat s DOM ...
                        document.getElementById("title").innerHTML =
                            xmlDom.getElementsByTagName("title")[0].textContent;
                        // ... atd.
                    })
            </script>
        <?php }
    } ?>
</section>

<?php require INC . '/html-end.php';