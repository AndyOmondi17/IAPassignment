<?php
session_start();
$user = '';

if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];
}
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <title>Document</title>
    </head>
    <body>
        <h1>Welcome <?php echo $user;?> You Have Logged In Succesfuly</h1>
        <button type="button" onclick="window.location.href='logout.php'">Log Out</button><br><br>
        <button type="button" onclick="window.location.href='Resetpassword.php'">Change Password</button>
    </body>
</html>