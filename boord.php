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
                <option value=""> - Kies type afdeling - </option>
                <option value="horeca" <?php if ($afdeling == "horeca") echo "selected" ?>>Horeca</option>
                <option value="personeel" <?php if ($afdeling == "personeel") echo "selected" ?>>Personeel</option>
                <option value="techniek" <?php if ($afdeling == "techniek") echo "selected" ?>>Techniek</option>
                <option value="inkoop" <?php if ($afdeling == "inkoop") echo "selected" ?>>Inkoop</option>
                <option value="groen" <?php if ($afdeling == "groen") echo "selected" ?>>Groen</option>
                <option value="klantenservice" <?php if ($afdeling == "klantenservice") echo "selected" ?>>Klantenservice</option>
            </select>
        </div>
        <p>test</p>
    </div>


    <script>
        //afdeling manager:
        document.getElementById("boordNaam").addEventListener('change',() =>{
            let naam =document.getElementById('boordNaam').value;
            window.location.href ="boord.php?afdeling="+naam;
        })
    </script>
</body>

</html>