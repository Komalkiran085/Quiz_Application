<?php 
include ('connection.php');
session_start();
if(isset($_POST['token']) && password_verify("gettest", $_POST['token']))
{
	$check = $db->prepare('SELECT * FROM test_details');
	$data = array();
	$execute = $check->execute($data);
	?>
	<select name="test" id="test" class="form-control">
		<option value="0">SELECT TEST</option>
		<?php 
		while($datarow = $check->fetch())
		{
			?>
			<option value="<?php echo $datarow['id'];?>"><?php echo $datarow['tname'];?></option>
			<?php
		} ?>
	</select>
	<?php
}
?>