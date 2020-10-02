<?php
 $user='root';
 $password='';
 $db='userinformation';
 $conn = new mysqli('localhost',$user,$password,$db) or die("Unable to connect");

 $Username1 = $_POST['Username'];
 $Password1 = md5($_POST['Password']);
 $sql = "SELECT * FROM userdetails WHERE Username='$Username1' AND Password='$Password1'";

 


if (isset($_POST['Username']) && isset($_POST['Password'])){
    // function validate($data){
    //         $data = trim($data);
    //         $data = stripslashes($data);
    //         $data = htmlspecialchars($data);
    //         return $data;
    // }  
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_assoc($result);
            if($row['Username'] === $Username1 && $row['Password'] === $Password1){
                $_SESSION['UploadFile'] = $row['UploadFile'];
                $_SESSION['Firstname'] = $row['Firstname'];
                $_SESSION['Surname'] = $row['Surname'];
                $_SESSION['Username'] = $row['Username'];

            }
        }else{
            echo "User not found";
        }
    }
else{
    header("Location: fetch.php?error");
    exit();
}
// require_once "config.php";
// include "config.php";
/*



*/
// $result = mysqli_query($query); 
//instead of 
// $result = mysqli_query($dbc, $query);
//and then 
// $row=mysql_fetch_array($result);  
?>