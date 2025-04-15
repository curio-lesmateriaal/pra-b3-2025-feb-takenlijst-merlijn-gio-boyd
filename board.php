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
    <title>Boord</title>

    <?php require_once __DIR__ . '/resources/views/head.php'; ?>
</head>

<body>
    <?php require_once __DIR__ . '/resources/views/header.php'; ?>
    <main>
        <div class="container">
            <?php
            if (!isset($_GET['afdeling'])) {
                header('Location:' . $base_url . '/index.php');
            }

            $afdeling = $_GET['afdeling'];
            $user = $_SESSION['user_id'];
            require_once(__DIR__ . '../backend/conn.php');
            ?>
            <div class="select-board">
                <select name="afdeling" id="boordNaam" class="afdeling">
                    <option value="horeca" <?php if ($afdeling == "horeca") echo "selected" ?>>Horeca</option>
                    <option value="personeel" <?php if ($afdeling == "personeel") echo "selected" ?>>Personeel</option>
                    <option value="techniek" <?php if ($afdeling == "techniek") echo "selected" ?>>Techniek</option>
                    <option value="inkoop" <?php if ($afdeling == "inkoop") echo "selected" ?>>Inkoop</option>
                    <option value="groen" <?php if ($afdeling == "groen") echo "selected" ?>>Groen</option>
                    <option value="klantenservice" <?php if ($afdeling == "klantenservice") echo "selected" ?>>Klantenservice</option>
                    <option value="alles" <?php if ($afdeling == "alles") echo "selected" ?>>Alles</option>
                </select>
            </div>
            <div class="boord">
                <div class="colum">
                    <h2 style="border-bottom: 3px solid greenyellow;">To-do</h2>
                    <?php
                    //todo
                    
                    if ($afdeling === 'alles') {
                        $query = "SELECT * FROM taken WHERE status = 'todo' AND user = :user";
                        $statement = $conn->prepare($query);
                        $statement->execute([
                            ":user" => $user,
                        ]);
                    } else {
                        $query = "SELECT * FROM taken WHERE afdeling = :afdeling AND status = 'todo' AND user = :user";
                        $statement = $conn->prepare($query);
                        $statement->execute([
                            ":afdeling" => $afdeling,
                            ":user" => $user,
                    ]);
                    }
                    $meldingen = $statement->fetchAll(PDO::FETCH_ASSOC);
                    ?>

                    <div class="card-container">
                        <?php foreach ($meldingen as $melding): ?>
                            <div class="card" id="<?php echo $melding['id'] ?>">
                                <div class="top" style="background-color: greenyellow;"></div>
                                <h3><?php echo $melding['id'] . ' - ' . $melding['titel'] . '<br>Afdeling: ' . $melding['afdeling']; ?></h3>
                                <a class="fa-solid fa-pencil" href="edit.php?id=<?php echo $melding['id']; ?>"></a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <button class="cButton" onclick="button()">+</button>
                </div>

                <div class="colum">
                    <h2 style="border-bottom: 3px solid orange;">Doing</h2>
                    <?php
                    //doing
                    if ($afdeling === 'alles') {
                        $query = "SELECT * FROM taken WHERE status = 'doing' AND user = :user";
                        $statement = $conn->prepare($query);
                        $statement->execute([
                            ":user" => $user,
                        ]);
                    } else {
                        $query = "SELECT * FROM taken WHERE afdeling = :afdeling AND status = 'doing' AND user = :user";
                        $statement = $conn->prepare($query);
                        $statement->execute([
                            ":afdeling" => $afdeling,
                            ":user" => $user,
                    ]);
                    }
                    $meldingen = $statement->fetchAll(PDO::FETCH_ASSOC);
                    ?>

                    <div class="card-container">
                        <?php foreach ($meldingen as $melding): ?>
                            <div class="card" id="<?php echo $melding['id'] ?>">
                                <div class="top" style="background-color: orange;"></div>
                                <h3><?php echo $melding['id'] . ' - ' . $melding['titel'] . '<br>Afdeling: ' . $melding['afdeling']; ?></h3>
                                <a class="fa-solid fa-pencil" href="edit.php?id=<?php echo $melding['id']; ?>"></a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <button class="cButton" onclick="button()">+</button>
                </div>

                <div class="colum">
                    <h2 style="border-bottom: 3px solid purple;">Done</h2>
                    <?php
                    //done
                    if ($afdeling === 'alles') {
                        $query = "SELECT * FROM taken WHERE status = 'done' AND user = :user";
                        $statement = $conn->prepare($query);
                        $statement->execute([
                            ":user" => $user,
                        ]);
                    } else {
                        $query = "SELECT * FROM taken WHERE afdeling = :afdeling AND status = 'done' AND user = :user";
                        $statement = $conn->prepare($query);
                        $statement->execute([
                            ":afdeling" => $afdeling,
                            ":user" => $user,
                    ]);
                    }
                    $meldingen = $statement->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <div class="card-container">
                        <?php foreach ($meldingen as $melding): ?>
                            <div class="card" id="<?php echo $melding['id'] ?>">
                                <div class="top" style="background-color: purple;"></div>
                                <h3><?php echo $melding['id'] . ' - ' . $melding['titel'] . '<br>Afdeling: ' . $melding['afdeling']; ?></h3>
                                <a class="fa-solid fa-pencil" href="edit.php?id=<?php echo $melding['id']; ?>"></a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <button class="cButton" onclick="button()">+</button>
                </div>

            </div>
        </div>
    </main>

    <script>
        //create.php
        function button() {
            window.location.href = "create.php";
        }
        //afdeling manager:
        document.getElementById("boordNaam").addEventListener('change', () => {
            let naam = document.getElementById('boordNaam').value;
            window.location.href = "board.php?afdeling=" + naam;
        })
    </script>
</body>

</html>