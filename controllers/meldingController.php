<?php
session_start();
$action = $_POST['action'];

if($action == 'create') {
    $titel = $_POST['titel'];
    $status = $_POST['status'];
    $afdeling = $_POST['afdeling'];
    $beschrijving = $_POST['beschrijving'];
    $deadline = $_POST['deadline'];


    $user = $_SESSION['user_id'];

    //1. Verbinding
    require_once '../backend/conn.php';

    //2. Query
    $query = "INSERT INTO taken (titel, beschrijving, afdeling, status, deadline ,user)
        VALUES(:titel, :beschrijving, :afdeling, :status, :deadline, :user)";

    //3. prepare
    $statement = $conn->prepare($query);

    //4. excute
    $statement->execute([
        ":titel" => $titel,
        ":beschrijving" => $beschrijving,
        ":afdeling" => $afdeling,
        ":status" => $status,
        ":deadline" => $deadline,
        ":user" => $user,
    ]);

    //index
    header("Location:'/../../board.php?afdeling=horeca");
}

if($action == 'edit') {
    $id = $_POST['id'];
    $titel = $_POST['titel'];
    $status = $_POST['status'];
    $afdeling = $_POST['afdeling'];
    $beschrijving = $_POST['beschrijving'];
    $deadline = $_POST['deadline'];

    //1. Verbinding
    require_once '../backend/conn.php';

    //2. Query (zonder foutieve komma)
    $query = "
    UPDATE taken
    SET titel = :titel,
        status = :status,
        afdeling = :afdeling,
        beschrijving = :beschrijving,
        deadline = :deadline
    WHERE id = :id
    ";

    //3. Prepare
    $statement = $conn->prepare($query);

    //4. Execute
    $statement->execute([
        ":titel" => $titel,
        ":status" => $status,
        ":afdeling" => $afdeling,
        ":beschrijving" => $beschrijving,
        ":deadline" => $deadline,
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