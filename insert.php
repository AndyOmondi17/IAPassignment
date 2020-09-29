
<?php
    $Firstname = $_POST['Firstname'];
    $Surname = $_POST['Surname'];
    $Username = $_POST['Username'];
    $Email = $_POST['Email'];
    $City = $_POST['City'];
    $UploadFile = $_POST['UploadFile'];
    $Password = $_POST['Password'];
    $ConfirmPassword = $_POST['ConfirmPassword'];

    if(!empty($Firstname) || !empty($Surname) || !empty($Username) || !empty($Email) || !empty($UploadFile) || !empty($Password) || !empty($ConfirmPassword)){
        if(strcmp($ConfirmPassword,$Password) == 0){
            $user='root';
            $password='';
            $db='userinformation';

            $conn = new mysqli('localhost',$user,$password,$db);
            if(mysqli_connect_error){
                die('Connection Error');
            }else{

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
                $stmt->bind_param("s,s,s,s,s,s,s",$Firstname,$Surname,$Username,$Email,$City,$UploadFile,$Password);
                $stmt-> execute();
                echo "New record inserted succesfully";
            }else{
                echo "Email already exists";
            }
            $stmt -> close();
            $conn -> close();
            }
        }else{
            echo "Password and Confirm Password does not match";
        }
    }else{
        echo "All fields are required";
        die();
    }
?>