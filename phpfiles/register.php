<?php
include_once './db.php';
include_once './user.php';
   $Firstname = $_POST['Firstname'];
   $Surname = $_POST['Surname'];
   $Username = $_POST['Username'];
   $Email = $_POST['Email'];
   $City = $_POST['City'];
   $Password = $_POST['Password'];
   $ConfirmPassword = $_POST['ConfirmPassword'];
   $UploadFile = $_FILES['UploadFile']['name'];
   $temp_profile = $_FILES['UploadFile']['tmp_name'];
   move_uploaded_File($temp_profile,"../images/$UploadFile"); 

   $con = new DBConnector();
   $pdo = $con->connectToDB();

   $user = new User();

   $user->setFirstName($Firstname);
   $user->setSurName($Surname);
   $user->setUserName($Username);
   $user->setEmail($Email);
   $user->setCity($City);
   $user->setPassword($Password);
   $user->setUploadFile($UploadFile);

   $user->register($pdo);

?>