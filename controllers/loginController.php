<?php
session_start();
$username = $_POST['username'];
$password = $_POST['password'];

//1. Verbinding
require_once '../backend/conn.php';

//2. Query
$query = "SELECT * FROM users WHERE username = :username";
//3. Prepare
$statement = $conn->prepare($query);
//4. Execute
$statement->execute([
    ":username" => $username
]);

$user = $statement->fetch(PDO::FETCH_ASSOC);

if($statement->rowCount() < 1 ){
    die("Error:wachtwoord of account is niet juist");
}

if(!password_verify($password, $user['password'])) {
    die("Error:wachtwoord of account is niet juist");
}

$_SESSION['user_id'] = $user['id'];
$_SESSION['user_name'] = $user['username'];
header('Location:' . $base_url . '/index.php');
?>