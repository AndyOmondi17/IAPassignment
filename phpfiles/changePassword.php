<?php
session_start();
include_once './db.php';
include_once './user.php';


$con = new DBConnector();
$pdo = $con->connectToDB();

$user = new User();
$user->changePassword($pdo);
?>