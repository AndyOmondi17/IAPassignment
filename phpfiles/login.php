<?php
session_start();
include_once './db.php';
include_once './user.php';

// Check if the user is already logged in, if yes then redirect him to welcome page


// $user_login = !empty($_POST['Username']) ? ($_POST['Username']):null;
// $passwordAttempt = !empty($_POST['Password']) ? ($_POST['Password']):null;

// prevents mysql injection
// $Username = stripcslashes($Username);
// $Password = stripcslashes($Password);
// $Username = mysql_real_escape_string($Username);
// $Password = mysql_real_escape_string($Password);
// $Email = $_POST['Email'];
// $Firstname = $_GET['Firstname'];
// $Surname = $_GET['Surname'];

$con = new DBConnector();
$pdo = $con->connectToDB();


// $_SESSION['user'] = $user_login;
$user = new User();
// $user->getFirstname();
// $user->getSurname();


$user->login($pdo);

?>