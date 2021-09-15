<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>
	<link rel="stylesheet" type="text/css" href="css/addstudent.css">
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
			<div class="teacher">Teacher</div>
			<div class="menu-bar">
				<ul>
					<li><a href="addstudent.php"><i class="fa fa-user-circle" aria-hidden="true"></i></a>Student</li>
					<li><a href="addtest.php"><i class="fa fa-university" aria-hidden="true"></i></a>Test</li>
					<li><a href="showresult.php"><i class="fa fa-desktop" aria-hidden="true"></i></a>Result</li>
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
								<label for="cname">Class:</label>
								<input type="cname" name="cname" id="cname" class="form-control" placeholder="Enter your name">
								<div class="list" id="list" style="width:100%;float:left;color:black;"></div>
							</div>
							<div class="user_fields">
								<label for="test">Test name:</label>
								<input type="tname" name="tname" id="tname" class="form-control" placeholder="Enter your email">
							</div>
							<div class="col-sm-12">
								<div class="col-sm-3"></div>
							<div class="col-sm-6 submit_btn">
								<button type="submit" name="Submit" id="submit" onclick="addtest();">Submit</button>
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

		getclass();

		function getclass()
		{
			var token='<?php echo password_hash("getclass", PASSWORD_DEFAULT);?>';
			
				$.ajax(
				{
					type:'POST',
					url:"ajax/getclass.php",
					data:{token:token},
					success:function(data)
					{
						$('#list').html(data);
					}
				});
			
		}

		function addtest()
		{
			var tname=document.getElementById('tname').value;
			var cid=document.getElementById('class').value;
			alert(tname);
			var token='<?php echo password_hash("test", PASSWORD_DEFAULT);?>';
			if(tname!="")
			{
				$.ajax(
				{
					type:'POST',
					url:"ajax/addtest.php",
					data:{tname:tname,cid:cid,token:token},
					success:function(data)
					{
						// alert(data);
						if(data == 0)
						{
							alert("Test added successfully");
						}
					}
				});
			}
		}

    </script>
<script type="text/javascript">
    $('form').submit(function(e) {
    e.preventDefault();
});</script>

</body>
</html>