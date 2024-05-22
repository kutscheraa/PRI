<?php // vypsat návody:
require '../prolog.php';
require INC . '/html-begin.php';
require INC . '/nav.php';
require INC . '/xmlTools.php';
require INC . '/db.php';
?>

<h1 class="py-6 text-center text-5xl">GUIDES</h1>

<div class="bg-zinc-50 flex justify-center">
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
            <h2 id="title" class="text-center text-2xl m-4" />
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