<?php 
    include('connection.php');
    session_start();
    if(isset($_POST['token']) && password_verify("university", $_POST['token']))
    {
    	$uname=test_input($_POST['uname']);

    	$check=$db->prepare('INSERT INTO uni_details(uname) VALUES (?)');
    	$data=array($uname);
    	$execute = $check->execute($data);
    	if($execute)
    	{
    		echo 0;
    	}

    	else
    	{
    		echo 2;
    	}
    }

    function test_input($data) {
    	$data = trim($data);
    	$data = stripslashes($data);
    	$data = htmlspecialchars($data);
    	return $data;
    }


?>