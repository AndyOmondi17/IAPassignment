<?php
    $Firstname = $_POST['Firstname'];
    $Surname = $_POST['Surname'];
    $Username = $_POST['Username'];
    $Email = $_POST['Email'];
    $City = $_POST['City'];
    $Password = $_POST['Password'];
     $encryptedPassword = md5($Password);
    $ConfirmPassword = $_POST['ConfirmPassword'];
    $UploadFile = $_FILES['UploadFile']['name'];
    $temp_profile = $_FILES['UploadFile']['tmp_name'];
    move_uploaded_File($temp_profile,"images/$UploadFile");
    

    if(!empty($Firstname) || !empty($Surname) || !empty($Username) || !empty($Email) || !empty($UploadFile) || !empty($Password) || !empty($ConfirmPassword)){
        // if(strcmp($ConfirmPassword,$Password) == 0){}
         // else{
        //     echo "Password and Confirm Password does not match";
        // }
        // Fix error database is not inserting new records after inserting row with id 0 
            $user='root';
            $password='';
            $db='userinformation';

            $conn = new mysqli('localhost',$user,$password,$db) or die("Unable to connect");
            // require_once "config.php";
            $SELECT = "SELECT Email From userdetails Where Email = ? Limit 1";
            $INSERT = "INSERT Into userdetails (Firstname, Surname, Username, Email, City, UploadFile, Password) values (?,?,?,?,?,?,?)";
            // Prepare statement
            $stmt = $conn->prepare($SELECT);
            $stmt-> bind_param("s",$Email);
            $stmt-> execute();
            $stmt-> bind_result($Email);
            $stmt->store_result();
            $rnum = $stmt->num_rows;

            if($rnum==0){
                $stmt-> close();
                $stmt = $conn->prepare($INSERT);
                $stmt->bind_param("sssssss",$Firstname,$Surname,$Username,$Email,$City,$UploadFile,$encryptedPassword);
                $stmt-> execute();
                echo "New record inserted succesfully";
            }else{
                echo "Email already exists";
            }
            $stmt -> close();
            $conn -> close();   
    }else{
        echo "All fields are required";
        die();
    }
?>