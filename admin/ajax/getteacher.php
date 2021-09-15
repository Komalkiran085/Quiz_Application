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
    		<tr style="display: inline-flex;">
                <td style="border:1px solid black;">SR NO</td>
    			<td style="border:1px solid black;">NAME</td>
    			<td style="border:1px solid black;">CLASS</td>
    			<td style="border:1px solid black;">UNIVERSITY</td>
    		</tr>
    		<?php
                $srno = 1;
    		while($datarow=$check->fetch())
    		{
    			?>
    			<tr style="display: inline-flex;">
                    <td style="border:1px solid black;"><?php echo $srno?></td>
    				<td style="border:1px solid black;"><?php echo $datarow['name']?></td>
    				<td style="border:1px solid black;"><?php echo $datarow['cname']?></td>
    				<td style="border:1px solid black;"><?php echo $datarow['uname']?></td>
    			</tr>
    	<?php
            $srno++;
        	} ?>
    	</table>
    	<?php
    }

?>