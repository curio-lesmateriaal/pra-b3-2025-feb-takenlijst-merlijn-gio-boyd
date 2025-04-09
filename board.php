<!doctype html>
<html lang="nl">

<head>
    <title>Boord</title>

    <?php require_once __DIR__ . '/resources/views/head.php'; ?>
</head>

<body>
    <?php require_once __DIR__ . '/resources/views/header.php'; ?>
    <div class="container">
        <?php
        if (!isset($_GET['afdeling'])) {
            header('Location:' . $base_url . '/index.php');
        }

        $afdeling = $_GET['afdeling'];
        require_once(__DIR__ . '../backend/conn.php');
        ?>
        <div class="select-board">
            <select name="afdeling" id="boordNaam">
                <option value="horeca" <?php if ($afdeling == "horeca") echo "selected" ?>>Horeca</option>
                <option value="personeel" <?php if ($afdeling == "personeel") echo "selected" ?>>Personeel</option>
                <option value="techniek" <?php if ($afdeling == "techniek") echo "selected" ?>>Techniek</option>
                <option value="inkoop" <?php if ($afdeling == "inkoop") echo "selected" ?>>Inkoop</option>
                <option value="groen" <?php if ($afdeling == "groen") echo "selected" ?>>Groen</option>
                <option value="klantenservice" <?php if ($afdeling == "klantenservice") echo "selected" ?>>Klantenservice</option>
            </select>
        </div>
        <div class="boord">
            <div class="colum">
                <h2 style="border-bottom: 3px solid greenyellow;">To-do</h2>
                <?php
                $query = "SELECT * FROM taken WHERE afdeling = :afdeling AND status = 'todo'";
                $statement = $conn->prepare($query);
                $statement ->execute([":afdeling" => $afdeling]);
                $meldingen = $statement->fetchAll(PDO::FETCH_ASSOC);
                ?>

                <?php foreach ($meldingen as $melding): ?>
                    <div class="card" id="<?php echo $melding['id'] ?>">
                        <div class="top" style="background-color: greenyellow;"></div>
                        <h3><?php echo $melding['id'] . ' - ' . $melding['titel']; ?></h3>
                        <a class="fa-solid fa-pencil" href="edit.php?id=<?php echo $melding['id']; ?>"></a>
                        
                    </div>   
                <?php endforeach; ?>
                <button class="cButton" onclick="button()">+</button>
            </div>

            <div class="colum">
                <h2 style="border-bottom: 3px solid greenyellow;">Doing</h2>
                <?php
                $query = "SELECT * FROM taken WHERE afdeling = :afdeling AND status = 'doing'";
                $statement = $conn->prepare($query);
                $statement ->execute([":afdeling" => $afdeling]);
                $meldingen = $statement->fetchAll(PDO::FETCH_ASSOC);
                ?>

                <?php foreach ($meldingen as $melding): ?>
                    <div class="card" id="<?php echo $melding['id'] ?>">
                        <div class="top" style="background-color: greenyellow;"></div>
                        <h3><?php echo $melding['id'] . ' - ' . $melding['titel']; ?></h3>
                        <a class="fa-solid fa-pencil" href="edit.php?id=<?php echo $melding['id']; ?>"></a>
                        
                    </div>   
                <?php endforeach; ?>
                <button class="cButton" onclick="button()">+</button>
            </div>

            <div class="colum">
                <h2 style="border-bottom: 3px solid greenyellow;">Done</h2>
                <?php
                $query = "SELECT * FROM taken WHERE afdeling = :afdeling AND status = 'done'";
                $statement = $conn->prepare($query);
                $statement ->execute([":afdeling" => $afdeling]);
                $meldingen = $statement->fetchAll(PDO::FETCH_ASSOC);
                ?>

                <?php foreach ($meldingen as $melding): ?>
                    <div class="card" id="<?php echo $melding['id'] ?>">
                        <div class="top" style="background-color: greenyellow;"></div>
                        <h3><?php echo $melding['id'] . ' - ' . $melding['titel']; ?></h3>
                        <a class="fa-solid fa-pencil" href="edit.php?id=<?php echo $melding['id']; ?>"></a>
                        
                    </div>   
                <?php endforeach; ?>
                <button class="cButton" onclick="button()">+</button>
            </div>
            
        </div>
    </div>


    <script>
        //create.php
        function button() {
            window.location.href = "create.php";
        }
        //afdeling manager:
        document.getElementById("boordNaam").addEventListener('change',() =>{
            let naam =document.getElementById('boordNaam').value;
            window.location.href ="board.php?afdeling="+naam;
        })
    </script>
</body>

</html>