 <?php  
	
	session_start();
	// Redirect the user to login page if he is not logged in.
	if(!isset($_SESSION['loggedIn'])){
	header('Location: login.php');
	exit();
	}

	require('inc/config/constants.php');
	require('inc/config/db.php');
	require('inc/header.html');
	
 ?>
 
<?php
error_reporting(0);

extract($_POST);
$sql1=mysql_query("Select * from itemrequest where approvedDate between '".$from_date."' AND '".$to_date."'");
 	  
      ?> 
  
          <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
										<thead>
											<tr>
												
												<th style="text-align: center">Item No</th>
												<th style="text-align: center">Item Name</th>
												<th style="text-align: center">Customer ID</th>
												<th style="text-align: center">FullName</th>											
											
												<th style="text-align: center">Requested Quantity</th>                                            
												<th style="text-align: center">Approved Quantity</th>
                                             

											</tr> 
										</thead>
										<tbody>
											<?php while($row = mysql_fetch_array($sql1))
											{
												 echo "<tr>";
			                                                 echo "<td>" . $row['itemNo'] . "</td>";
															
															 echo "<td>" . $row['itemName'] . "</td>";
															  echo "<td>" . $row['customerID'] . "</td>";
															  echo "<td>" . $row['fullName'] . "</td>";
															  echo "<td>" . $row['quantity'] . "</td>";
															  echo "<td>" . $row['approveQuantity'] . "</td>";
															 
														  echo "</tr>";
														}
												echo "</table>";
												?>
