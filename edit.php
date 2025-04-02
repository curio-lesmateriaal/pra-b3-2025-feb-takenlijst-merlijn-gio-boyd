<!doctype html>
<html lang="nl">

<head>
    <title>testpagina</title>
    <?php require_once 'resources/views/head.php'; ?>
</head>

<body>
    <?php require_once 'resources/views/header.php'; ?>

    <?php 
        $id = $_GET['id'];

        require_once 'backend/conn.php';
        $query = "SELECT * FROM taken Where id = :id";
        $statement = $conn->prepare($query);
        $statement->execute([
            ":id" => $id,
        ]);

        $melding = $statement->fetch(PDO::FETCH_ASSOC);
    ?>

    <div class="container">
        <form action="<?php echo $base_url; ?>/controllers/meldingController.php" method="POST">
            <input type="hidden" name="action" value="edit">
            <input type="hidden" name="id" value="<?php echo $id;?>">

            <div class="form-group">
                <label>Naam Titel:</label>
                <input type="text" name="titel" id="titel" class="form-input" value="<?php echo $melding['titel']; ?>">
            </div>

            <input type="submit" value="Melding opslaan">
        </form>
    </div>

</body>

</html>
