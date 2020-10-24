<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Resset Password</title>
        <link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="../css/styles.css" rel="stylesheet" type="text/css">
        <script src="../js/jquery-3.4.1.js" type="text/javascript"></script>
        <script src="../js/scripts.js" type="text/javascript"></script>
    </head>
    <body>
            <div class="container">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <form action="http://localhost/IAPassignment/phpfiles/changePassword.php" method="POST">
                            <div class="form-group">
                                <input type="text" class="form-control" name="Username" autocomplete="off" placeholder="Username" required><br>
                                <input type="submit" class="btn-primary" id="getNewPassword" value="Get New Password"><br><br>
                
                                <!-- <input type="text" class="form-control" id="oldPassword" name="OldPassword" autocomplete="off" placeholder="Oldpassword" required><br> -->
                                <input type="text" class="form-control" id="newPassword" name="Newpassword" autocomplete="off" placeholder="Newpassword" required><br>
                                <input type="text" class="form-control" id="confirmNewPassword" name="Confirmnewpassword" autocomplete="off" placeholder="Confirmnewpassword" required><br>
                                <input type="submit" class="btn-primary" id="changePassword" value="Change Password"><br>
                            </div>    
                        </form>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>        
    </body>
</html>