<?php session_start(); 
require_once 'backend/config.php';

if(!isset($_SESSION['user_id'])) {
    $msg = "je moet ingelogd zijn om deze pagina te zien";
    header('Location:' . $base_url . '/login.php?msg='.$msg);
}

?>

<!doctype html>
<html lang="nl">

<head>
    <title>testpagina</title>
    <?php require_once 'resources/views/head.php'; ?>
</head>

<body>
    <?php require_once 'resources/views/header.php'; ?>

    <main>
        <div class="container">
            <form action="<?php echo $base_url; ?>/controllers/meldingController.php" method="POST">
                <input type="hidden" name="action" value="create">

                <!--<div class="user">
                <label for="user">Gebruikers Naam:</label>
                <input type="text" name="user" id="user" class="form-input">
            </div>-->

                <div class="form-group">
                    <label for="titel">Naam Titel:</label>
                    <input type="text" name="titel" id="titel" class="form-input">
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status">
                        <option value="todo">Todo</option>
                        <option value="doing">Doing</option>
                        <option value="done">Done</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="afdeling">Afdeling</label>
                    <select name="afdeling">
                        <option value="horeca">Horeca</option>
                        <option value="personeel">Personeel</option>
                        <option value="techniek">Techniek</option>
                        <option value="inkoop">Inkoop</option>
                        <option value="groen">Groen</option>
                        <option value="klantenservice">Klantenservice</option>
                    </select>
                </div>

                <div class="beschrijving">
                    <label for="beschrijving">Beschrijving</label>
                    <textarea name="beschrijving" id="beschrijving" class="form-input" rows="4"></textarea>
                </div>


                <input type="submit" value="Maak taak">
            </form>
        </div>
    </main>
</body>

</html>