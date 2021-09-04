<?php
$servername = "localhost";
$email = "root";
$password = "";


    $db = new PDO("mysql:host=$servername;dbname=quiz", $email, $password);
   
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    


?>