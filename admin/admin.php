<!DOCTYPE html>
<html>
<head>
	<title>Admin login</title>
	<link rel="stylesheet" type="text/css" href="css/admin.css">
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
			<div class="col-sm-12">
				<div class="col-sm-6 paddoff">
					<button type="submit" id="bton">As a Student</button>
				</div>
				<div class="col-sm-6 paddoff">
					<button type="submit" id="btn">As a Teacher</button>
				</div>
			</div>
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
							<div class="user_fields">
								<label for="role">Role:</label>
								<input type="role" name="role" id="role" class="form-control" placeholder="Enter your role">
							</div>
							<div class="submit_btn">
								<button type="submit" name="Submit" id="submit" onclick="sendlogin();">Submit</button>
							</div>
				    </div>
			</form>	
			<div class="bottom_space">
				
			</div>			
			</div>

					<div class="form hidden" id="tea_login">
						<form>
							<div class="contain">
							<div class="user_fields">
								<label for="email">Teacher Email:</label>
								<input type="email" name="email" id="email1" class="form-control" placeholder="Enter your teacher email">
							</div>
							<div class="user_fields">
								<label for="password">Password:</label>
								<input type="password" name="password" id="password1" class="form-control" placeholder="Enter your password">
							</div>
<!-- 							<div class="user_fields">
								<label for="role">Role:</label>
								<input type="role" name="role" id="role" class="form-control" placeholder="Enter your role">
							</div> -->
							<div class="submit_btn">
								<button type="submit" name="Submit" id="submit1" onclick="tealogin();">Submit</button>
							</div>
							</div>
						</form>
						
					</div>

		</div>
		<div class="col-sm-2"></div>
	</div>	
	</section>
	<script src='https://code.jquery.com/jquery-3.2.1.min.js'></script>
	<script type="text/javascript">
    	var btn = document.getElementById('btn');
    	     var bton = document.getElementById('bton');
            var  stu_login = document.getElementById('stu_login');
             var tea_login = document.getElementById('tea_login');

        btn.addEventListener("click", function(){
        	// form2.classList.remove('show');
        	tea_login.classList.remove('hidden');

        	stu_login.classList.add('hidden');
        	tea_login.classList.add('show');
        });

        bton.addEventListener('click', function(){
        	
        	stu_login.classList.remove('hidden');
        	// form1.classList.remove('show');

        	stu_login.classList.add('show');
        	tea_login.classList.add('hidden');
        });



        function sendlogin()
		{
			var email = document.getElementById('email').value;
			var password = document.getElementById('password').value;
			
			var token = "<?php echo password_hash("logintoken", PASSWORD_DEFAULT);?>";
			if(email != "" && password != "")
			{
				$.ajax(
				{
					type:'POST',
					url:"ajax/login.php",
					data:{email:email,password:password,token:token},
					success:function(data)
					{
						// alert (data);
						if(data == 0)
						{
							window.location="dashboard.php";
						}
					}
				});
			}
			else
			{
				alert('please fill all the details.');
			}
		}

		function tealogin()
		{
			var email = document.getElementById('email1').value;
			var password = document.getElementById('password1').value;
			
			var token = "<?php echo password_hash("teatoken", PASSWORD_DEFAULT);?>";
			if(email!="" && password!="")
			{
				$.ajax(
				{
					type:'POST',
					url:"ajax/tealogin.php",
					data:{email:email,password:password,token:token},
					success:function(data)
					{
						// alert(data);
						if(data == 0)
						{
							window.location="teacher.php";
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
    
    </script>
<script type="text/javascript">
    $('form').submit(function(e) {
    e.preventDefault();
});</script>
</body>
</html>