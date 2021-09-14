<?php
    include("connection.php");
    session_start();

    if(isset($_POST['token']) && password_verify("getteacher", $_POST['token']))
    {
    	$check = $db->prepare('SELECT * FROM tea_details JOIN class_details ON tea_details.classid = class_details.id JOIN uni_details ON class_details.uid = uni_details.id');
    	$data = array();
    	$execute = $check->execute($data);
    	?>
    	<table class="table table-bordered">
    		<tr>
    			<td>NAME</td>
    			<td>CLASS</td>
    			<td>UNIVERSITY</td>
    		</tr>
    		<?php

    		while($datarow=$check->fetch())
    		{
    			?>
    			<tr>
    				<td><?php echo $datarow['name']?></td>
    				<td><?php echo $datarow['cname']?></td>
    				<td><?php echo $datarow['uname']?></td>
    			</tr>
    	<?php	} ?>
    	</table>
    	<?php
    }

?>