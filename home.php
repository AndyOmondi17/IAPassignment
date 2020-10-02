<?php
session_start();
if (isset($_SESSION['id'])) && isset($_SESSION['Username']){



?>

<!DOCTYPE html>
<html>
    <head>
        <title>HOME</title>
        <link rel="stylesheet" type="text/css" href="css/styles.css">
    </head>
    <body>
        <h1>Hello, <?php echo $_SESSION['Firstname']; ?></h1>
    </body>
</html>

<?php
}else{
    exit();
}

?>