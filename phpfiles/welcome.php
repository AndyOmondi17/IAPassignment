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
        <link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="../css/styles.css" rel="stylesheet" type="text/css">
        <script src="../js/jquery-3.4.1.js" type="text/javascript"></script>
        <script src="../js/scripts.js" type="text/javascript"></script>
    </head>
    <body>
        <h1>Welcome <?php echo $user;?> You Have Logged In Succesfuly</h1>
        <button type="button" onclick="window.location.href='logout.php'">Log Out</button><br><br>
        <button type="button" onclick="window.location.href='Resetpassword.php'">Change Password</button><br><br>
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                <centre>
                    <!-- http://localhost/IAPassignment/insert.php -->
                 <form action="#" method="POST" class="form-group">
                     <div>
                        <label for="Food">Food</label>
                        <input type="text" class="form-control" name="Food" autocomplete="off" placeholder="Type of Food" required><br>
    
                        <label for="Order">Order</label>
                        <input type="number" class="form-control" name="Order" autocomplete="off" placeholder="Order" required><br>
                        <input type="submit" name="fetchData" class="btn-primary" value="Order"><br><br>
                     </div>
                 </form>  
                </centre>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>

        
    </body>
</html>