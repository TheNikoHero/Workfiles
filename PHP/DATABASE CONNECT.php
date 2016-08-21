<?php
session_start();

$userId_fromDB = $_SESSION['userSession'];

$host = "localhost";
$hostUsername = 'hostUsername';
$password = 'thisIsAPassword1234';
$database = "databaseName";

try {
    $dbCon = new PDO("mysql:host={$host};dbname={$database};charset=utf8", $hostUsername, $password);
    $dbCon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
} catch (PDOException $example) {
    echo $example->getMessage();
}


include_once 'class/user.php';
include_once 'class/crud.php';

$user = new user($dbCon);
$crud = new crud($dbCon);
?>