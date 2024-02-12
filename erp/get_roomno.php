<?php

	require('inc/config/constants.php');
    require('inc/config/db.php');
	
if(!empty($_POST["customerID"])) 
{

$query =mysqli_query($con,"SELECT distinct roomNo FROM sale WHERE customerName ='" . $_POST["customerID"] . "'");


?>
<option value="">Select</option>
<?php
while($row=mysqli_fetch_array($query))  
{
?>
<option value="<?php echo $row["roomNo"]; ?>"><?php echo $row["roomNo"]; ?></option>
<?php
}
}
?>
