<?php
$action = $_POST['action'];

if($action == 'create') {
    $titel = $_POST['titel'];
    $status = $_POST['status'];
    $afdeling = $_POST['afdeling'];
    $beschrijving = $_POST['beschrijving'];

    //1. Verbinding
    require_once '../backend/conn.php';

    //2. Query
    $query = "INSERT INTO taken (titel, beschrijving, afdeling, status)
        VALUES(:titel, :beschrijving, :afdeling, :status)";

    //3. prepare
    $statement = $conn->prepare($query);

    //4. excute
    $statement->execute([
        ":titel" => $titel,
        ":beschrijving" => $beschrijving,
        ":afdeling" => $afdeling,
        ":status" => $status,
    ]);

    //index
    header("Location:'/../../board.php?afdeling=horeca");
}

if($action == 'edit') {
    $id = $_POST['id'];
    $titel = $_POST['titel'];


    //1. Verbinding
    require_once '../backend/conn.php';
    //require_once(__DIR__ . '/backend/conn.php');

    //2. Query
    $query = "
    UPDATE taken
    SET titel = :titel

    WHERE id = :id
    ";

    //3. Prepare
    $statement = $conn->prepare($query);

    //4. Execute
    $statement->execute([
        ":titel" => $titel,
        ":id" => $id
    ]);
    header("Location:'/../../board.php?afdeling=horeca");
}
if ($action == 'delete' ) {
    //voer deze code uit als action delete is
    $id = $_POST['id'];
    //1. Verbinding
    require_once '../backend/conn.php';

    //2. Query
    $query = "
        DELETE FROM taken
        WHERE id = :id
        ";

        //3. Prepare
        $statement = $conn->prepare($query);

        //4. Execute
        $statement->execute([
            ":id" => $id
        ]);
        header("Location:'/../../board.php?afdeling=horeca");

}

?>