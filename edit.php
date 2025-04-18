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
    <title>Edit</title>
    <?php require_once 'resources/views/head.php'; ?>
</head>

<body>
    <?php require_once 'resources/views/header.php'; ?>

    <?php
    $id = $_GET['id'];

    require_once 'backend/conn.php';
    $query = "SELECT * FROM taken WHERE id = :id";
    $statement = $conn->prepare($query);
    $statement->execute([
        ":id" => $id,
    ]);

    $melding = $statement->fetch(PDO::FETCH_ASSOC);
    ?>
    <main>
        <div class="create-container">
            <form action="<?php echo $base_url; ?>/controllers/meldingController.php" method="POST">
                <input type="hidden" name="action" value="edit">
                <input type="hidden" name="id" value="<?php echo $id; ?>">

                <h1>Edit</h1>
                <div class="form-group">
                    <label for="titel">Naam Titel:</label>
                    <input type="text" name="titel" id="titel" class="form-input" value="<?php echo $melding['titel']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="status">Status:</label>
                    <select name="status" id="status" class="form-input" required>
                        <option value="todo" <?php if ($melding['status'] == 'todo') echo 'selected'; ?>>Todo</option>
                        <option value="doing" <?php if ($melding['status'] == 'doing') echo 'selected'; ?>>Doing</option>
                        <option value="done" <?php if ($melding['status'] == 'done') echo 'selected'; ?>>Done</option>
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

                <div class="form-group">
                    <label for="beschrijving">Beschrijving:</label>
                    <textarea name="beschrijving" id="beschrijving" class="form-input" rows="4" required><?php echo $melding['beschrijving']; ?></textarea>
                </div>

                <div class="form-group">
                    <label for="deadline">Deadline: </label>
                    <input type="date" name="deadline" id="deadline" value="<?php echo $melding['deadline'];?>">
                </div>

                <input type="submit" value="Melding opslaan">
            </form>

            <form action="<?php echo $base_url; ?>/controllers/meldingController.php" method="POST" style="margin-top: 1rem;">
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="submit" value="Verwijderen">
            </form>
        </div>
    </main>
</body>

</html>