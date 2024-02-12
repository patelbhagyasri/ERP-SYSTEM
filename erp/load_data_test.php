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
	
 
 
 if(isset($_POST["from_date"]))  
 {  
      if($_POST["from_date"] != '')  
      {  
         // $sql = "SELECT * FROM itemrequest WHERE customerID = '".$_POST["id1"]."'"; 
		  $sql="Select * from itemrequest where approvedDate between '".$from_date."' AND '".$to_date."'";
          // echo $sql;	
			$query = $conn -> prepare($sql);
			$query->execute();
			$results=$query->fetchAll(PDO::FETCH_OBJ);
			$cnt=1;		   
      }  
      else  
      {  
           $sql = "SELECT * FROM itemrequest";  
		   echo $sql;
      } 
 }
 	  
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
											<?php if($query->rowCount() > 0)
											{
												foreach($results as $result)
													{				?>	
														<tr>
															<td><?php echo htmlentities($result->itemNo);?></td>
															
															<td><?php echo htmlentities($result->itemName);?></td>
															<td><?php echo htmlentities($result->customerID);?></td>
															<td><?php echo htmlentities($result->fullName);?></td>                                          
															  
															<td><?php echo htmlentities($result->quantity);?></td>  
															<td><?php echo htmlentities($result->approveQuantity);?></td>											
															<td>
													</tr>
													
															

													
													<?php }
											}?>
											
											
													</tbody>
													</table>
