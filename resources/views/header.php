<?php require_once 'backend/config.php'; ?>

<?php
// Start sessie als dat nog niet is gedaan
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>


<header>
    <div class="container">
        <a href="<?php echo $base_url; ?>/index.php"><img src="<?php echo $base_url; ?>/img/logo-big-v4.png" class="logo"></a>
        <nav>
            
            <a href="<?php echo $base_url; ?>/board.php?afdeling=horeca">Horeca</a>
            <a href="<?php echo $base_url; ?>/board.php?afdeling=personeel">Personeel</a>
            <a href="<?php echo $base_url; ?>/board.php?afdeling=techniek">Techniek</a>
            <a href="<?php echo $base_url; ?>/board.php?afdeling=inkoop">Inkoop</a>
            <a href="<?php echo $base_url; ?>/board.php?afdeling=klantenservice">Klantenservice</a>
            <a href="<?php echo $base_url; ?>/board.php?afdeling=groen">Groen</a>
            <a href="<?php echo $base_url; ?>/board.php?afdeling=alles">Alles</a>
             
            <?php if (isset($_SESSION['user_id'])): ?>
                <span>Hallo <?php echo ($_SESSION['user_name']) ?>  | </span>
                <a href="<?php echo $base_url; ?>/logout.php">Uitloggen</a>
            <?php else: ?>
                <a href="<?php echo $base_url; ?>/login.php">Inloggen</a>
            <?php endif; ?>
        </nav>
    </div>
</header>