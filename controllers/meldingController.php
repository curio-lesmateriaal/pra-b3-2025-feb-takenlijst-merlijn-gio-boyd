<?php
$action = $_POST['action'];

if($action == 'create') {

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
    header("Location: ../board.php?msg=Melding aangepast");
}
?>