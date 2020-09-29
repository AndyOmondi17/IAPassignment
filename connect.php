<?php
    $user='root';
    $password='';
    $db='userinformation';

    $conn = new mysqli('localhost',$user,$password,$db) or die("Unable to connect");
    echo "Connection Succesful";

?>