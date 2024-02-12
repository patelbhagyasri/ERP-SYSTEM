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
	
	if(isset($_GET['edit']))
	{
		$editid=$_GET['edit'];
	}
	
	
?>
  <body>
<?php
	require 'inc/navigation.php';
	


if(isset($_POST['submit']))
  {

	
	$itemNo=$_POST['itemNo'];
	$itemName=$_POST['itemName'];
	$CustomerID=$_POST['CustomerID'];
	$fullName=$_POST['fullName'];
	$email=$_POST['email'];
	$quantity=$_POST['quantity'];
	$approveQuantity=$_POST['approveQuantity'];


	$sql="UPDATE itemrequest SET approveQuantity=(:approveQuantity) WHERE id=(:editid)";
	$query = $conn->prepare($sql);
	
	$query-> bindParam(':approveQuantity', $approveQuantity, PDO::PARAM_STR);

	$query-> bindParam(':editid', $editid, PDO::PARAM_STR);
	$query->execute();
	$msg="Information Updated Successfully";
	
	 echo "<script>window.close();</script>";

}    
?>	
	
<?php
		$sql = "SELECT * from itemrequest where id = :editid";
		$query = $conn -> prepare($sql);
		$query->bindParam(':editid',$editid,PDO::PARAM_INT);
		$query->execute();
		$result=$query->fetch(PDO::FETCH_OBJ);
		$cnt=1;	
?>
    <div class="container-fluid">
	  <div class="row">
		<div class="col-lg-2">
		<h1 class="my-4"></h1>
			<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
			  <a class="nav-link " id="v-pills-item-tab" data-toggle="pill" href="#v-pills-item" role="tab" aria-controls="v-pills-item" aria-selected="true">Item</a>
			  <a class="nav-link" id="v-pills-purchase-tab" data-toggle="pill" href="#v-pills-purchase" role="tab" aria-controls="v-pills-purchase" aria-selected="false">Purchase</a>
			  <a class="nav-link" id="v-pills-vendor-tab" data-toggle="pill" href="#v-pills-vendor" role="tab" aria-controls="v-pills-vendor" aria-selected="false">Vendor</a>
			  <a class="nav-link" id="v-pills-sale-tab" data-toggle="pill" href="#v-pills-sale" role="tab" aria-controls="v-pills-sale" aria-selected="false">Transfer</a>
			  <a class="nav-link" id="v-pills-customer-tab" data-toggle="pill" href="#v-pills-customer" role="tab" aria-controls="v-pills-customer" aria-selected="false">Department</a>
			  <a class="nav-link" id="v-pills-search-tab" data-toggle="pill" href="#v-pills-search" role="tab" aria-controls="v-pills-search" aria-selected="false">Search</a>
			  <a class="nav-link" id="v-pills-reports-tab" data-toggle="pill" href="#v-pills-reports" role="tab" aria-controls="v-pills-reports" aria-selected="false">Reports</a>
			   <a class="nav-link active" id="v-pills-request-tab" data-toggle="pill" href="#v-pills-request" role="tab" aria-controls="v-pills-request" aria-selected="false">New Requests</a>
			</div>
		</div>
		
		
		
				 <div class="col-lg-10">
			<div class="tab-content" id="v-pills-tabContent">
			  <div class="tab-pane fade show active" id="v-pills-item" role="tabpanel" aria-labelledby="v-pills-item-tab">
				<div class="card card-outline-secondary my-4">
				  <div class="card-header">Edit Details</div>
				  <div class="card-body">
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#itemDetailsTab">Item</a>
						</li>
					
					</ul>
		           

        <form method="post" class="form-horizontal" enctype="multipart/form-data" name="editform">
		<div class="form-group">
		<label class="col-sm-2 control-label">Item No<span style="color:red">*</span></label>
			<div class="col-sm-4">
		<input type="text" name="itemNo" class="form-control"  disabled   required value="<?php echo htmlentities($result->itemNo);?>">
		</div>

		<label class="col-sm-2 control-label">Item Name<span style="color:red">*</span></label>
		<div class="col-sm-4">
		<input type="text" name="itemName" class="form-control"  disabled required value="<?php echo htmlentities($result->itemName);?>">
		</div>
		
		<label class="col-sm-2 control-label">Customer ID<span style="color:red">*</span></label>
		<div class="col-sm-4">
		<input type="text" name="CustomerID" class="form-control" disabled required value="<?php echo htmlentities($result->customerID);?>">
		</div>
		
		<label class="col-sm-2 control-label">FullName<span style="color:red">*</span></label>
		<div class="col-sm-4">
		<input type="text" name="fullName" class="form-control" disabled required value="<?php echo htmlentities($result->fullName);?>">
		</div>
		
				
		<label class="col-sm-2 control-label">Email<span style="color:red">*</span></label>
		<div class="col-sm-4">
		<input type="email" name="email" class="form-control"  disabled required value="<?php echo htmlentities($result->email);?>">
		</div>
		
		<label class="col-sm-2 control-label">Requested Quantity<span style="color:red">*</span></label>
		<div class="col-sm-4">
		<input type="text" name="quantity" class="form-control" disabled required value="<?php echo htmlentities($result->quantity);?>">
		</div>
				
				
		<label class="col-sm-2 control-label">Approved Quantity<span style="color:red">*</span></label>
		<div class="col-sm-4">
		<input type="text" name="approveQuantity" class="form-control" required value="<?php echo htmlentities($result->approveQuantity);?>">
		</div>
		
		
		</div>	

<div class="form-group">
	<div class="col-sm-8 col-sm-offset-2">
		<button class="btn btn-primary" name="submit" onclick="return confirm('Information Updated Successfully');" type="submit">Save Changes</button>
	</div>
</div>		
	
	</div>
	</div>