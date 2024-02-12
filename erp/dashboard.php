<?php
	session_start();
	// Redirect the user to login page if he is not logged in.
	if(!isset($_SESSION['loggedIn'])){
		header('Location: login.php');
		exit();
	}
	//change --Priyanka Nangi--
   
    $cid = $_SESSION['customerID'];
	//print_r($emaill = $_SESSION['email']);
   	$fullname=$_SESSION['fullName'];
	//print_r($_SESSION['customerID']);
	// = $row['customerID'];
	require_once('inc/config/constants.php');
	require_once('inc/config/db.php');
	require_once('inc/header.html');

?>
  <body>
<?php
	require 'inc/navigation.php';
?>
    <!-- Page Content -->
    <div class="container-fluid">
	  <div class="row">
		<div class="col-lg-2">
		<h1 class="my-4"></h1>
			<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
			<a class="nav-link" id="v-pills-dashboard-tab" data-toggle="pill" href="#v-pills-dashboard" role="tab" aria-controls="v-pills-dashboard" aria-selected="false">Dashboard</a>		
			  <a class="nav-link active" id="v-pills-item-tab" data-toggle="pill" href="#v-pills-item" role="tab" aria-controls="v-pills-item" aria-selected="true">Item Request</a>
			  </div>
		</div>
		 <div class="col-lg-10">
			<div class="tab-content" id="v-pills-tabContent">
			  <div class="tab-pane fade show active" id="v-pills-item" role="tabpanel" aria-labelledby="v-pills-item-tab">
				<div class="card card-outline-secondary my-4">
				  <div class="card-header">Item Details</div>
				  <div class="card-body">
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#itemDetailsTab">Item</a>
						</li>
						
					</ul>
					
					<!-- Tab panes for item details and image sections -->
					<div class="tab-content">
						<div id="itemDetailsTab" class="container-fluid tab-pane active">
							<br>
							<!-- Div to show the ajax message from validations/db submission -->
							<div id="itemDetailsMessage"></div>
							<form method="post" action="dashboard.php">
					  <div class="form-row">
						<div class="form-group col-md-3">
						  <label for="requestItemNumber">Item Number<span class="requiredIcon">*</span></label>
						  <input type="text" class="form-control" id="requestItemNumber" name="requestItemNumber" autocomplete="off">
						  <div id="requestItemNumberSuggestionsDiv" class="customListDivWidth"></div>
						</div>
						<div class="form-group col-md-3">
						  <label for="requestItemName">Item Name<span class="requiredIcon">*</span></label>
						  <input type="text" class="form-control" id="requestItemName" name="requestItemName" autocomplete="off">
						  <div id="requestItemNameSuggestionsDiv" class="customListDivWidth"></div>
						</div>
						<div class="form-group col-md-2">
						  <label for="requestItemQuantity">Quantity</label>
						  <input type="number" class="form-control" id="requestItemQuantity" name="requestItemQuantity" title="This will be auto-generated when you add a new record" autocomplete="off">
						  <div id="itemDetailsitemIDSuggestionsDiv" class="customListDivWidth"></div>
						</div>
					  </div>
					   <!--Priyanka Nangi-->
					  <div class="form-row"> 
						  <div class="form-group col-md-4">
							<label for="requestItemCustomerId">Customer ID<span class="requiredIcon">*</span></label>
							<input type="number" class="form-control" id="requestItemCustomerId" value='<?php echo $cid; ?>' name="requestItemCustomerId" readonly>
						  </div>
						  <div class="form-group col-md-2">
							  <label for="requestItemFullName">FullName</label>
							  <input type="text" class="form-control" id="requestItemFullName" value='<?php echo $fullname; ?>' name="requestItemFullName" readonly>
						  </div>
						  <div class="form-group col-md-4">
							<label for="requestItemEmailId">Email Id<span class="requiredIcon">*</span></label>
							<!--<input type="text" class="form-control" id="requestItemEmailId" value='<?php echo $emaill; ?>' name="requestItemEmailId" >-->
							<input type="text" class="form-control" id="requestItemEmailId"  name="requestItemEmailId" >
						  </div>
					  </div>
					
					  <button type="submit" id="additem" name="additem" class="btn btn-success">Add Item Request</button>
					 <!-- <button type="button" id="updateitemDetailsButton" class="btn btn-primary">Update</button>-->
					  <button type="reset" class="btn">Clear</button>
					</form>		
						</div>					
					</div>
				  </div> 
				</div>
			  </div>

			  <div class="tab-pane fade" id="v-pills-item" role="tabpanel" aria-labelledby="v-pills-item-tab">
				
			  </div>
			  
			  
			  
			  <div class="tab-pane fade" id="v-pills-search" role="tabpanel" aria-labelledby="v-pills-search-tab">
				<div class="card card-outline-secondary my-4">
				  <div class="card-header">Search Inventory<button id="searchTablesRefresh" name="searchTablesRefresh" class="btn btn-warning float-right btn-sm">Refresh</button></div>
				  <div class="card-body">										
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#itemSearchTab">Item</a>
						</li>
					
					</ul>
  
					<!-- Tab panes -->
					<div class="tab-content">
						<div id="itemSearchTab" class="container-fluid tab-pane active">
						  <br>
						  <p>Use the grid below to search all details of items</p>
						  <!-- <a href="#" class="itemDetailsHover" data-toggle="popover" id="10">wwwee</a> -->
							<div class="table-responsive" id="itemDetailsTableDiv"></div>
						</div>
						<div id="customerSearchTab" class="container-fluid tab-pane fade">
						  <br>
						  <p>Use the grid below to search all details of customers</p>
							<div class="table-responsive" id="customerDetailsTableDiv"></div>
						</div>
						<div id="saleSearchTab" class="container-fluid tab-pane fade">
							<br>
							<p>Use the grid below to search sale details</p>
							<div class="table-responsive" id="saleDetailsTableDiv"></div>
						</div>
						<div id="itemSearchTab" class="container-fluid tab-pane fade">
							<br>
							<p>Use the grid below to search item details</p>
							<div class="table-responsive" id="itemDetailsTableDiv"></div>
						</div>
						<div id="vendorSearchTab" class="container-fluid tab-pane fade">
							<br>
							<p>Use the grid below to search vendor details</p>
							<div class="table-responsive" id="vendorDetailsTableDiv"></div>
						</div>
					</div>
				  </div> 
				</div>
			  </div>
			  
			  <div class="tab-pane fade" id="v-pills-dashboard" role="tabpanel" aria-labelledby="v-pills-dashboard-tab">
				<div class="card card-outline-secondary my-4">
				  <div class="card-header">Reports<button id="reportsTablesRefresh" name="reportsTablesRefresh" class="btn btn-warning float-right btn-sm">Refresh</button></div>
				  <div class="card-body">										
					
				 
				  <ul class="nav nav-tabs" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#item">Item</a>
						</li>
					
					</ul>

				
						
  
					
<!--
	SaleitemNumber
itemName
saleDate
quantity -->

					<!-- Tab panes for reports sections -->
					<div class="tab-content">
						<div id="item" class="container-fluid tab-pane active">
							
<div class="tab-content">
							<div id="item" class="container-fluid tab-pane active">
								<br>			
							<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
											
											<th>Item No</th>
											<th>Item Name</th>
											<th>Customer ID</th>
											<th>SalesDate</th>	
											<th>Quantity</th>												
	

										</tr>
									</thead>
									
									<tbody>
										
										<?php 
										//$id=$_REQUEST['id'];
										$sql = "SELECT * from  sale where customerID=$cid";
										$query = $conn -> prepare($sql);
										$query->execute();
										$results=$query->fetchAll(PDO::FETCH_OBJ);
										$cnt=1;
										if($query->rowCount() > 0)
										{
											foreach($results as $result)
												{				?>	
													<tr>
																									
														<td><?php echo htmlentities($result->itemNumber);?></td>
														<td><?php echo htmlentities($result->itemName);?></td>
														<td><?php echo htmlentities($result->customerID);?></td>
														<td><?php echo htmlentities($result->saleDate);?></td>                                          
														 
														<td><?php echo htmlentities($result->quantity);?></td>  
														

														

														
													</td>


													

												</tr>
												<?php $cnt=$cnt+1; }} ?>
											</tbody>
										</table>
									</ul>

								</div>

							

						</div>
						
							<p>Use the grid below to get reports for items</p>
							<div class="table-responsive" id="itemleDiv"></div>
						</div>
						<div id="customerReportsTab" class="container-fluid tab-pane fade">
							<br>
							<p>Use the grid below to get reports for Department</p>
							<div class="table-responsive" id="customerReportsTableDiv"></div>
						</div>
						<div id="saleReportsTab" class="container-fluid tab-pane fade">
							<br>
							<!-- <p>Use the grid below to get reports for sales</p> -->
						
							<br><br>
							<div class="table-responsive" id="saleReportsTableDiv"></div>
						</div>
						<div id="item" class="container-fluid tab-pane fade">
							<br>
							<!-- <p>Use the grid below to get reports for items</p> -->
							<form> 
							  <div class="form-row">
								<!--  <div class="form-group col-md-3">
									<label for="itemReportStartDate">Start Date</label>
									<input type="text" class="form-control datepicker" id="itemReportStartDate" value="2018-05-24" name="itemReportStartDate" readonly>
								  </div>
								  <div class="form-group col-md-3">
									<label for="itemReportEndDate">End Date</label>
									<input type="text" class="form-control datepicker" id="itemReportEndDate" value="2018-05-24" name="itemReportEndDate" readonly>
								  </div>-->
							  </div>
							  <button type="button" id="showitemReport" class="btn btn-dark">Show Report</button>
							  <button type="reset" id="itemFilterClear" class="btn">Clear</button>
							</form>
							<br><br>
							<div class="table-responsive" id="itemleDiv"></div>
						</div>
					<!--	<div id="vendorReportsTab" class="container-fluid tab-pane fade">
							<br>
							<p>Use the grid below to get reports for vendors</p>
							<div class="table-responsive" id="vendorReportsTableDiv"></div>
						</div>-->
					</div>
				  </div> 
				</div>
			  </div>
			</div>
		 </div>
	  </div>
    </div>

<?php 
	$cid = $_SESSION['customerID'];
	//$email =$_SESSION['email'];
	$fullname=$_SESSION['fullName'];

if (isset($_POST['additem'])) {

	if (isset($_POST['additem'])) {
		echo "submit";
		//$rollno = $_POST['rollno'];
		$rinumber = $_POST['requestItemNumber'];
		$riname = $_POST['requestItemName'];
		$ritemqty = $_POST['requestItemQuantity'];
		$rifullname = $_POST['requestItemFullName'];
		$riemailid = $_POST['requestItemEmailId'];

		$insertPurchaseSql = 'INSERT INTO itemrequest(itemNo,itemName,quantity,customerID, fullName,email) VALUES(:itemNo,:itemName, :quantity, :customerID, :fullName, :email)';
		$insertPurchaseStatement = $conn->prepare($insertPurchaseSql);
		$insertPurchaseStatement->execute(array('itemNo'=> $rinumber,'itemName' => $riname, 'quantity' => $ritemqty,'customerID' => $cid, 'fullName' => $fullname, 'email' =>$riemailid ));

	}
}

?>

<?php
	require 'inc/footer.php';
?>
  </body>
</html>



