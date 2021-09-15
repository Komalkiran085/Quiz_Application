<!DOCTYPE html>
<html>
<head>
	<title>Admin login</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/normalize.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Antonio:wght@200&display=swap" rel="stylesheet">	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
	<section>
	<div class="col-sm-12 background">
		<div class="col-sm-2"></div>
		<div class="col-sm-8 middle_bar">
			<div class="head">Quiz Portal</div>
			<div class="form" id="stu_login">
			<form>
				<div class="contain">
							<div class="user_fields">
								<label for="email">Student Email:</label>
								<input type="email" name="email" id="email" class="form-control" placeholder="Enter your student email">
							</div>
							<div class="user_fields">
								<label for="password">Password:</label>
								<input type="password" name="password" id="password" class="form-control" placeholder="Enter your password">
							</div>
							<div class="submit_btn">
								<button type="submit" name="Submit" id="submit" onclick="sendlogin();">Submit</button>
							</div>
				    </div>
			</form>	
			<div class="bottom_space">
				
			</div>			
		<div class="col-sm-2"></div>
	</div>	
	</section>
	<script src='https://code.jquery.com/jquery-3.2.1.min.js'></script>
	<script type="text/javascript">

		function sendlogin()
		{
			var email = document.getElementById('email').value;
			var password = document.getElementById('password').value;
			
			var token = "<?php echo password_hash("stutoken", PASSWORD_DEFAULT);?>";
			if(email!="" && password!="")
			{
				$.ajax(
				{
					type:'POST',
					url:"ajax/login.php",
					data:{email:email,password:password,token:token},
					success:function(data)
					{
						// alert(data);
						if(data == 0)
						{
							window.location="student.php";
						} 
					}
				});
			}
			else
			{
				alert('please fill all the details.');
			}
		}
    </script>
<script type="text/javascript">
    $('form').submit(function(e) {
    e.preventDefault();
});</script>
</body>
</html>