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
  <body>
<?php
	require 'inc/navigation.php';
	    
?>	
	
    <div class="container-fluid">
	  <div class="row">
		<div class="col-lg-2">
		<h1 class="my-4"></h1>
			<div class="nav flex-column nav-pills active" id="v-pills-tab" role="tablist" aria-orientation="vertical">
			  <a class="nav-link active" id="v-pills-transfer" data-toggle="pill" href="#v-pills-transfer" role="tab" aria-controls="v-pills-transfer" aria-selected="true">Transfer Requests</a>
			 </div>
		</div>
		
		
		
		<div class="col-lg-10">
			<div class="tab-content" id="v-pills-tabContent">
			  <div class="tab-pane fade show active" id="v-pills-transfer" role="tabpanel" aria-labelledby="v-pills-transfer">
				<div class="card card-outline-secondary my-4">
				  <div class="card-header">Transfer Requests</div>
				  <div class="card-body">
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#TransferDetails">Pending Transfer requests</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#CompletedTransferDetails">Completed Transfer requests</a>
						</li>
					</ul>
					
			<div class="tab-content">
					<div id="TransferDetails" class="container-fluid tab-pane active">
								<br>			
							<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th  style="text-align: center">Item Name</th>				
											<th  style="text-align: center">Item Requested By</th><th  style="text-align: center">Item Transfered From</th>						
											<th  style="text-align: center">Requested Quantity</th>                                            
											<th  style="text-align: center">Approved Quantity</th>
											<th  style="text-align: center">Item Status</th>
											<th  style="text-align: center">Approved Date</th>
											<th  style="text-align: center">Return Date</th>					
											<th>Action</th>	

										</tr>
									</thead>
									

									<tbody>
									<?php
										if(isset($_REQUEST['Transfer']) && $_REQUEST['id']== $_SESSION['id'])
										{
											$id=$_REQUEST['id'];
											$approveQuantity=$_REQUEST['approveQuantity'];
											$dept=$_REQUEST['dept'];
											$itemName=$_REQUEST['itemName'];
											$status="Transfered";
											$sql = "UPDATE itemrequest SET status=:status WHERE  id=:id";
											
											$query = $conn->prepare($sql);
											$query -> bindParam(':status',$status, PDO::PARAM_STR);
											$query-> bindParam(':id',$id, PDO::PARAM_STR);
											$query -> execute();
											$msg="Changes Sucessfully";
											
											
											$sql1 = "UPDATE sale SET quantity=quantity-$approveQuantity WHERE  customerName=:dept and itemName=:itemName";
											$query1 = $conn->prepare($sql1);
											$query1-> bindParam(':dept',$dept, PDO::PARAM_STR);;
											$query1-> bindParam(':itemName',$itemName, PDO::PARAM_STR);
											$query1 -> execute();
										

										}
										?>


										<?php 
										$sql = "SELECT * from  itemrequest where status='Approved'";
										$query = $conn -> prepare($sql);
										$query->execute();
										$results=$query->fetchAll(PDO::FETCH_OBJ);
										$cnt=1;
										if($query->rowCount() > 0)
										{
											foreach($results as $result)
												{			$returnDate1=$result->returnDate;
																        $returnDate2 = date("d-m-Y", strtotime($returnDate1));
															$approvedDate1=$result->approvedDate;
																        $approvedDate2 = date("d-m-Y", strtotime($approvedDate1));
																		?>	
													<tr>
														<td style="text-align: center"><?php echo htmlentities($result->itemName);?></td>
																		
																		<td style="text-align: center"><?php echo htmlentities($result->fullName);?></td>                                          
																		<td style="text-align: center"><?php echo htmlentities($result->Dept);?></td>   
																		<td style="text-align: center"><?php echo htmlentities($result->quantity);?></td>  
																		<td style="text-align: center"><?php echo htmlentities($result->approveQuantity);?></td>
																		<td style="text-align: center"><?php echo htmlentities($result->status);?></td>
																		<td style="text-align: center"><?php echo htmlentities($approvedDate2);?></td>

																		<td style="text-align: center"><?php echo htmlentities($returnDate2);?></td>


													<td>
													 <?php $_SESSION['id']=$result->id;
                                                                ?>
													<form method="post" action="index_transfer.php" >
													 
                                                           
                                                         
													<input type="hidden" name="id" value="<?php echo $result->id;?>"/>
													<input type="hidden" name="approveQuantity" value="<?php echo $result->approveQuantity;?>"/>
													<input type="hidden" name="dept" value="<?php echo $result->Dept;?>"/>
													<input type="hidden" name="itemName" value="<?php echo $result->itemName;?>"/>
													
												<button  style='margin-bottom:10px;margin-top:10px' type="submit" name="Transfer"  class="btn btn-primary" >Click here<br/> to Transfer</button><br/>
													</td>
													
											</form>
                                                   
												</tr>
												<?php $cnt=$cnt+1; }} ?>
											</tbody>
										</table>
									</ul>
				
					</div>		
					
					
					
					
					<div id="CompletedTransferDetails" class="container-fluid tab-pane fade">
									<br>			

									<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th  style="text-align: center">Item Name</th>				
											<th  style="text-align: center">Item Requested By</th><th  style="text-align: center">Item Transfered From</th>						
											<th  style="text-align: center">Requested Quantity</th>                                            
											<th  style="text-align: center">Approved Quantity</th>
											<th  style="text-align: center">Item Status</th>
											<th  style="text-align: center">Approved Date</th>
											<th  style="text-align: center">Return Date</th>

												

											</tr>
										</thead>

										<tbody>

											<?php


											$sql = "SELECT * from  itemrequest where status='Transfered'";
											$query = $conn -> prepare($sql);
											$query->execute();
											$results=$query->fetchAll(PDO::FETCH_OBJ);
											$cnt=1;
											if($query->rowCount() > 0)
											{
												foreach($results as $result)
													{				$returnDate1=$result->returnDate;
																        $returnDate2 = date("d-m-Y", strtotime($returnDate1));
															$approvedDate1=$result->approvedDate;
																        $approvedDate2 = date("d-m-Y", strtotime($approvedDate1));
																		?>	
													<tr>
														<td style="text-align: center"><?php echo htmlentities($result->itemName);?></td>
																		
																		<td style="text-align: center"><?php echo htmlentities($result->fullName);?></td>                                          
																		<td style="text-align: center"><?php echo htmlentities($result->Dept);?></td>   
																		<td style="text-align: center"><?php echo htmlentities($result->quantity);?></td>  
																		<td style="text-align: center"><?php echo htmlentities($result->approveQuantity);?></td>
																		<td style="text-align: center"><?php echo htmlentities($result->status);?></td>
																		<td style="text-align: center"><?php echo htmlentities($approvedDate2);?></td>

																		<td style="text-align: center"><?php echo htmlentities($returnDate2);?></td>

															</tr>
															<?php $cnt=$cnt+1; }} ?>

														</tbody>
													</table>
												</ul>

					</div> 

			</div>
		   </div>		   
	</div>
	</div> 
	</div>
</div>

	
	<?php
require 'inc/footer.php';
?>

</body>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
</html>
