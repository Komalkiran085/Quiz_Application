<?php
    include('connection.php');
    session_start();
    if(isset($_POST['token']) && password_verify("logintoken",$_POST['token']))
    {
        $email =test_input($_POST['email']);
        $password =test_input($_POST['password']);
    
            $check=$db->prepare('SELECT * FROM user_details WHERE email=?');
            $data=array($email);
            $check->execute($data);
            if($check->rowcount()>0)
            {
                while($datarow=$check->fetch())
                {
                    if(password_verify($password,$datarow['password']))
                    {
                        $_SESSION['id'] =$datarow['id'];
                        $_SESSION['email'] =$datarow['email'];
                        echo 0;
                    }
                    else
                    {
                        echo 1;
                    }
                }
            }
    }
    else
    {
        echo "servor error";
    }


  function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

 ?>