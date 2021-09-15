<?php 
    include('connection.php');
    if(isset($_POST['token']) && password_verify("addstudent",$_POST['token']))
    {
    	// echo "hello";
    	$name = $_POST['name'];
    	$email = $_POST['email'];
    	$tuid = $_POST['tuid'];

    	if($name != "" && $email != "" && $tuid != "")
    	{
            $password_hash=password_hash(substr($name,0,4)."1234", PASSWORD_DEFAULT); 
    		$query = $db->prepare("INSERT INTO stu_details(name,email,tuid,password) VALUES (?,?,?,?)");
    		$data = array($name,$email,$tuid,$password_hash);

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