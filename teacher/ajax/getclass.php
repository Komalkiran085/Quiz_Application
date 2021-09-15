<?php 
include ('connection.php');
session_start();
if(isset($_POST['token']) && password_verify("getclass", $_POST['token']))
{
	// $uid = $_POST['uid'];
	$check = $db->prepare('SELECT * FROM class_details');
	$data = array();
	$execute = $check->execute($data);
	?>
	<select name="class" id="class" class="form-control" onchange="gettest();">
		<option value="0">SELECT CLASS</option>
		<?php 
		while($datarow = $check->fetch())
		{
			?>
			<option value="<?php echo $datarow['id'];?>"><?php echo $datarow['cname'];?></option>
			<?php
		} ?>
	</select>
	<?php
}
?>
