<?php
   include('connection.php');
   if(isset($_POST['token']) && password_verify("signuptoken",$_POST['token']))
     {
          // echo "hello";
     	$name = $_POST['name'];
     	$email1 = $_POST['email1'];
     	$password = $_POST['password'];
     	$cpassword = $_POST['cpassword'];
          $role = $_POST['role'];
          // echo "hi";

     	if($name != "" && $email1 != "" && $password != "" && $cpassword != "" && $role != "")
     	{
     		$query = $db->prepare("INSERT INTO user_details(name,email,password,role) VALUES (?,?,?,?)");

     		$data = array($name,$email1,password_hash($password, PASSWORD_DEFAULT),$role);

     		$execute = $query->execute($data);
     		if($execute)
     		{
     			echo 0;
     		}
     		else
     		{
     			echo "something went wrong";
     		}
     	}



     }
     else
     {
     	echo "server error";
     }

?>