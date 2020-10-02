<?php
if (isset($_POST['submit'])){
    $file = $FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.',fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg','jpeg','png');
    if (in_array($fileActualExt, $allowed)){
         if($fileError === 0){
            if($fileSize < 1000000){
                $fileNameNew = uniqid('',true).".".$fileActualEXt;
            $fileDestination = 'uploads/'.$fileNameNew;
            move_uploaded_file($fileTmpName,$fileDestination);
            header("Location:index.php?uploadsuccess");
        }else{
                echo "Your file is too big"
            }
         }else{
             echo "An error occured";
         }
    }else{
        echo "You can't upload files of this type";
    }

}
?>
<!-- $result = mysql_query("select * from userdetails where Username ='$Username1' and Password='$Password1'");
 $run = mysqli_query($conn,$result);
 $row = mysqli_fetch_array($result); -->