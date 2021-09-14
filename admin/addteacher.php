<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>
	<link rel="stylesheet" type="text/css" href="css/addteacher.css">
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
	<div class="col-sm-12 page">
		<div class="col-sm-2 index">
			<div class="dashboard">Dashboard<hr></div>
			<div class="admin">Admin</div>
			<div class="menu-bar">
				<ul>
					<li><a href="addteacher.php"><i class="fa fa-user-circle" aria-hidden="true"></i></a>Teacher</li>
					<li><a href="adduni.php"><i class="fa fa-university" aria-hidden="true"></i></a>University</li>
					<li><a href="addclass.php"><i class="fa fa-desktop" aria-hidden="true"></i></a>Class</li>
				</ul>
				
			</div>
		</div>
		<div class="col-sm-8 background">
			<h1>Hello!! <?php echo $_SESSION['email'];?></h1>
			<div class="col-sm-12">
				<div class="col-sm-4"></div>
				<div class="form">
			<form>
				<div class="contain">
							<div class="user_fields">
								<label for="name">Name:</label>
								<input type="name" name="name" id="name" class="form-control" placeholder="Enter your name">
							</div>
							<div class="user_fields">
								<label for="email">Email:</label>
								<input type="email" name="email" id="email" class="form-control" placeholder="Enter your email">
							</div>
							<div class="user_fields">
								<label for="university">University:</label>
								<div class="list" id="list" style="width:100%;float:left;color:black;"></div>
							</div>
							<div class="user_fields">
								<label for="class">Class:</label>
								<div class="listclass" id="listclass" style="width:100%;float:left;color:black;"></div>
							</div>
							<div class="col-sm-12">
								<div class="col-sm-3"></div>
							<div class="col-sm-6 submit_btn">
								<button type="submit" name="Submit" id="submit" onclick="adduser();">Submit</button>
							</div>
							<div class="col-sm-3"></div>
						</div>
				    </div>
				    <div>
				    	<div class="teacherlist" id="teacherlist"></div>
				    </div>
			</form>				
			</div>
				<div class="col-sm-4"></div>
			</div>
		</div>
		<div class="col-sm-2 background">
			<button type="submit" class="profile_btn">My Profile<a href="#"><i class="fa fa-chevron-down" aria-hidden="true"></i></a></button>
		</div>
	<script src='https://code.jquery.com/jquery-3.2.1.min.js'></script>
	<script type="text/javascript">
        getuni();
		function getuni()
		{
			var token='<?php echo password_hash("getuni", PASSWORD_DEFAULT);?>';
			
				$.ajax(
				{
					type:'POST',
					url:"ajax/getuni.php",
					data:{token:token},
					success:function(data)
					{
						$('#list').html(data);
					}
				});
			
		}

		function getclass()
		{
			var uid = document.getElementById('university').value;
			var token='<?php echo password_hash("getclass", PASSWORD_DEFAULT);?>';
			
				$.ajax(
				{
					type:'POST',
					url:"ajax/getclass.php",
					data:{token:token,uid:uid},
					success:function(data)
					{
						$('#listclass').html(data);
					}
				});
			
		}

		function adduser()
		{
			var name = document.getElementById('name').value; 
			var email = document.getElementById('email').value; 
			var uniid = document.getElementById('university').value; 
			var classid = document.getElementById('class').value;
			var token='<?php echo password_hash("tea_login", PASSWORD_DEFAULT);?>';
			if(email!="" && classid!="")
			{
				$.ajax(
				{
					type:'POST',
					url:"ajax/addteacher.php",
					data:{name:name,email:email,uniid:uniid,classid:classid,token:token},
					success:function(data)
					{
						// alert(data);
						if(data == 0)
						{
							alert("registered successfully");
						}
					}
				});
			} 
		}
		getallteacher();

		function getallteacher()
		{
			var token='<?php echo password_hash("getteacher", PASSWORD_DEFAULT);?>';
				$.ajax(
				{
					type:'POST',
					url:"ajax/getteacher.php",
					data:{token:token},
					success:function(data)
					{
						// alert(data);
						
						$('#teacherlist').html(data);
					}
				});

		}


    </script>
<script type="text/javascript">
    $('form').submit(function(e) {
    e.preventDefault();
});</script>

</body>
</html>