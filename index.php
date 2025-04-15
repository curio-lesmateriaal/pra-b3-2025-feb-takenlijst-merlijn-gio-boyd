<?php session_start(); ?>
<!doctype html>
<html lang="nl">

<head>
    <title></title>
    <?php require_once 'resources/views/head.php'; ?>
</head>
<body>
    <?php require_once 'resources/views/header.php'; ?>
    <main>
        <div class="container-index">

            <?php if (isset($_GET['msg'])) {
                echo "<div class='msg'>" . $_GET['msg'] . "</div>";
            } ?>

            <h1>BOARDEN</h1>
            <a href="<?php echo $base_url; ?>/board.php?afdeling=alles"><button class="center">TOON ALLE BOARDEN</button></a>
            <div class="grid-container">
                <div class="grid-item">
                    <a href="<?php echo $base_url; ?>/board.php?afdeling=horeca"><button class="horeca">HORECA</button></a>
                </div>

                <div class="grid-item">
                    <a href="<?php echo $base_url; ?>/board.php?afdeling=personeel"><button class="personeel">PERSONEEL</button></a>
                </div>

                <div class="grid-item">
                    <a href="<?php echo $base_url; ?>/board.php?afdeling=techniek"><button class="techniek">TECHNIEK</button></a>
                </div>

                <div class="grid-item">
                    <a href="<?php echo $base_url; ?>/board.php?afdeling=inkoop"><button class="inkoop">INKOOP</button></a>
                </div>

                <div class="grid-item">
                    <a href="<?php echo $base_url; ?>/board.php?afdeling=groen"><button class="groen">GROEN</button></a>
                </div>

                <div class="grid-item">
                    <a href="<?php echo $base_url; ?>/board.php?afdeling=klantenservice"><button class="klantenservice">KLANTENSERVICE</button></a>
                </div>
            </div>
        </div>
    </main>
</body>

</html>