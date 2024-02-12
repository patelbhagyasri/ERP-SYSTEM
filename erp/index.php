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
	error_reporting(0);
	error_reporting(0);
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
				<a class="nav-link active" id="v-pills-request-tab" data-toggle="pill" href="#v-pills-request" role="tab" aria-controls="v-pills-request" aria-selected="true">New Requests</a>
					<a class="nav-link" id="v-pills-item-tab" data-toggle="pill" href="#v-pills-item" role="tab" aria-controls="v-pills-item" aria-selected="false">Item</a>
					
					<a class="nav-link" id="v-pills-purchase-tab" data-toggle="pill" href="#v-pills-purchase" role="tab" aria-controls="v-pills-purchase" aria-selected="false">Purchase</a>
					<a class="nav-link" id="v-pills-vendor-tab" data-toggle="pill" href="#v-pills-vendor" role="tab" aria-controls="v-pills-vendor" aria-selected="false">Vendor</a>
					<a class="nav-link" id="v-pills-sale-tab" data-toggle="pill" href="#v-pills-sale" role="tab" aria-controls="v-pills-sale" aria-selected="false">Transfer</a>
					<a class="nav-link" id="v-pills-customer-tab" data-toggle="pill" href="#v-pills-customer" role="tab" aria-controls="v-pills-customer" aria-selected="false">Department</a>
					<a class="nav-link" id="v-pills-search-tab" data-toggle="pill" href="#v-pills-search" role="tab" aria-controls="v-pills-search" aria-selected="false">Search</a>
					<a class="nav-link" id="v-pills-reports-tab" data-toggle="pill" href="#v-pills-reports" role="tab" aria-controls="v-pills-reports" aria-selected="false">Reports</a>
					
				</div>
			</div>
			<div class="col-lg-10">
				<div class="tab-content" id="v-pills-tabContent">
					<div class="tab-pane fade" id="v-pills-item" role="tabpanel" aria-labelledby="v-pills-item-tab">
						<div class="card card-outline-secondary my-4">
							<div class="card-header">Item Details</div>
							<div class="card-body">
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" data-toggle="tab" href="#itemDetailsTab">Item</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#itemImageTab">Upload Image</a>
									</li>
								</ul>

								<!-- Tab panes for item details and image sections -->
					<div class="tab-content">
									<div id="itemDetailsTab" class="container-fluid tab-pane active">
										<br>
										<!-- Div to show the ajax message from validations/db submission -->
										<div id="itemDetailsMessage"></div>
										<form>
											<div class="form-row">
												<div class="form-group col-md-3" style="display:inline-block">
													<label for="itemDetailsItemNumber">Item Number<span class="requiredIcon">*</span></label>
													<input type="text" class="form-control" name="itemDetailsItemNumber" id="itemDetailsItemNumber" autocomplete="off">
													<div id="itemDetailsItemNumberSuggestionsDiv" class="customListDivWidth"></div>
												</div>
												<div class="form-group col-md-3">
													<label for="itemDetailsProductID">Product ID</label>
													<input class="form-control invTooltip" type="number" readonly  id="itemDetailsProductID" name="itemDetailsProductID" title="This will be auto-generated when you add a new item">
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col-md-6">
													<label for="itemDetailsItemName">Item Name<span class="requiredIcon">*</span></label>
													<input type="text" class="form-control" name="itemDetailsItemName" id="itemDetailsItemName" autocomplete="off">
													<div id="itemDetailsItemNameSuggestionsDiv" class="customListDivWidth"></div>
												</div>
												<div class="form-group col-md-2">
													<label for="itemDetailsStatus">Status</label>
													<select id="itemDetailsStatus" name="itemDetailsStatus" class="form-control chosenSelect">
														<?php include('inc/statusList.html'); ?>
													</select>
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col-md-6" style="display:inline-block">
													<!-- <label for="itemDetailsDescription">Description</label> -->
													<textarea rows="4" class="form-control" placeholder="Description" name="itemDetailsDescription" id="itemDetailsDescription"></textarea>
												</div>
											</div>
											<div class="form-row">
							<!--	<div class="form-group col-md-3">
								<label for="itemDetailsDiscount">Discount %</label> -->
								<input type="hidden" class="form-control" value="0" name="itemDetailsDiscount" id="itemDetailsDiscount">
								<!--	</div>
								<div class="form-group col-md-3">
									<label for="itemDetailsQuantity">Quantity<span class="requiredIcon">*</span></label> -->
									<input type="hidden" class="form-control" value="0" name="itemDetailsQuantity" id="itemDetailsQuantity">
								<!--	</div>
								<div class="form-group col-md-3">
									<label for="itemDetailsUnitPrice">Unit Price<span class="requiredIcon">*</span></label> -->
									<input type="hidden" class="form-control" value="0" name="itemDetailsUnitPrice" id="itemDetailsUnitPrice">
									<!--	</div> -->
									<div class="form-group col-md-3">
										<label for="itemDetailsTotalStock">Total Stock</label>
										<input type="text" class="form-control" name="itemDetailsTotalStock" id="itemDetailsTotalStock" readonly>
									</div>
									<div class="form-group col-md-3">
										<div id="imageContainer"></div>
									</div>
								</div>
								<button type="button" id="addItem" class="btn btn-success">Add Item</button>
								<button type="button" id="updateItemDetailsButton" class="btn btn-primary">Update</button>
								<button type="button" id="deleteItem" class="btn btn-danger">Delete</button>
								<button type="reset" class="btn" id="itemClear">Clear</button>
							</form>
						</div>
						<div id="itemImageTab" class="container-fluid tab-pane fade">
							<br>
							<div id="itemImageMessage"></div>
							<p>You can upload an image for a particular item using this section.</p> 
							<p>Please make sure the item is already added to database before uploading the image.</p>
							<br>							
							<form name="imageForm" id="imageForm" method="post">
								<div class="form-row">
									<div class="form-group col-md-3" style="display:inline-block">
										<label for="itemImageItemNumber">Item Number<span class="requiredIcon">*</span></label>
										<input type="text" class="form-control" name="itemImageItemNumber" id="itemImageItemNumber" autocomplete="off">
										<div id="itemImageItemNumberSuggestionsDiv" class="customListDivWidth"></div>
									</div>
									<div class="form-group col-md-4">
										<label for="itemImageItemName">Item Name</label>
										<input type="text" class="form-control" name="itemImageItemName" id="itemImageItemName" readonly>
									</div>
								</div>
								<br>
								<div class="form-row">
									<div class="form-group col-md-7">
										<label for="itemImageFile">Select Image ( <span class="blueText">jpg</span>, <span class="blueText">jpeg</span>, <span class="blueText">gif</span>, <span class="blueText">png</span> only )</label>
										<input type="file" class="form-control-file btn btn-dark" id="itemImageFile" name="itemImageFile">
									</div>
								</div>
								<br>
								<button type="button" id="updateImageButton" class="btn btn-primary">Upload Image</button>
								<button type="button" id="deleteImageButton" class="btn btn-danger">Delete Image</button>
								<button type="reset" class="btn">Clear</button>
							</form>
						</div>
					</div>
				</div> 
			</div>
		</div>
		<div class="tab-pane fade" id="v-pills-purchase" role="tabpanel" aria-labelledby="v-pills-purchase-tab">
			<div class="card card-outline-secondary my-4">
				<div class="card-header">Purchase Details</div>
				<div class="card-body">
					<div id="purchaseDetailsMessage"></div>
					<form>
						<div class="form-row">
							<div class="form-group col-md-3">
								<label for="purchaseDetailsItemNumber">Item Number<span class="requiredIcon">*</span></label>
								<input type="text" class="form-control" id="purchaseDetailsItemNumber" name="purchaseDetailsItemNumber" autocomplete="off">
								<div id="purchaseDetailsItemNumberSuggestionsDiv" class="customListDivWidth"></div>
							</div>
							<div class="form-group col-md-3">
								<label for="purchaseDetailsPurchaseDate">Purchase Date<span class="requiredIcon">*</span></label>
								<input type="text" class="form-control datepicker" id="purchaseDetailsPurchaseDate" name="purchaseDetailsPurchaseDate" readonly value="2018-05-24">
							</div>
							<div class="form-group col-md-2">
								<label for="purchaseDetailsPurchaseID">Purchase ID</label>
								<input type="text" class="form-control invTooltip" id="purchaseDetailsPurchaseID" name="purchaseDetailsPurchaseID" title="This will be auto-generated when you add a new record" autocomplete="off">
								<div id="purchaseDetailsPurchaseIDSuggestionsDiv" class="customListDivWidth"></div>
							</div>
						</div>
						<div class="form-row"> 
							<div class="form-group col-md-4">
								<label for="purchaseDetailsItemName">Item Name<span class="requiredIcon">*</span></label>
								<input type="text" class="form-control invTooltip" id="purchaseDetailsItemName" name="purchaseDetailsItemName" readonly title="This will be auto-filled when you enter the item number above">
							</div>
							<div class="form-group col-md-2">
								<label for="purchaseDetailsCurrentStock">Current Stock</label>
								<input type="text" class="form-control" id="purchaseDetailsCurrentStock" name="purchaseDetailsCurrentStock" readonly>
							</div>
							<div class="form-group col-md-4">
								<label for="purchaseDetailsVendorName">Vendor Name<span class="requiredIcon">*</span></label>
								<select id="purchaseDetailsVendorName" name="purchaseDetailsVendorName" class="form-control chosenSelect">
									<?php 
									require('model/vendor/getVendorNames.php');
									?>
								</select>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-2">
								<label for="purchaseDetailsQuantity">Quantity<span class="requiredIcon">*</span></label>
								<input type="number" class="form-control" id="purchaseDetailsQuantity" name="purchaseDetailsQuantity" value="0">
							</div>
							<div class="form-group col-md-2">
								<label for="purchaseDetailsUnitPrice">Unit Price<span class="requiredIcon">*</span></label>
								<input type="text" class="form-control" id="purchaseDetailsUnitPrice" name="purchaseDetailsUnitPrice" value="0">

							</div>
							<div class="form-group col-md-2">
								<label for="purchaseDetailsTotal">Total Cost</label>
								<input type="text" class="form-control" id="purchaseDetailsTotal" name="purchaseDetailsTotal" readonly>
							</div>
						</div>
						<button type="button" id="addPurchase" class="btn btn-success">Add Purchase</button>
						<button type="button" id="updatePurchaseDetailsButton" class="btn btn-primary">Update</button>
						<button type="reset" class="btn">Clear</button>
					</form>
				</div> 
			</div>
		</div>

		<div class="tab-pane fade" id="v-pills-vendor" role="tabpanel" aria-labelledby="v-pills-vendor-tab">
			<div class="card card-outline-secondary my-4">
				<div class="card-header">Vendor Details</div>
				<div class="card-body">
					<!-- Div to show the ajax message from validations/db submission -->
					<div id="vendorDetailsMessage"></div>
					<form> 
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="vendorDetailsVendorFullName">Full Name<span class="requiredIcon">*</span></label>
								<input type="text" class="form-control" id="vendorDetailsVendorFullName" name="vendorDetailsVendorFullName" placeholder="">
							</div>
							<div class="form-group col-md-2">
								<label for="vendorDetailsStatus">Status</label>
								<select id="vendorDetailsStatus" name="vendorDetailsStatus" class="form-control chosenSelect">
									<?php include('inc/statusList.html'); ?>
								</select>
							</div>
							<div class="form-group col-md-3">
								<label for="vendorDetailsVendorID">Vendor ID</label>
								<input type="text" class="form-control invTooltip" id="vendorDetailsVendorID" name="vendorDetailsVendorID" title="This will be auto-generated when you add a new vendor" autocomplete="off">
								<div id="vendorDetailsVendorIDSuggestionsDiv" class="customListDivWidth"></div>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-3">
								<label for="vendorDetailsVendorMobile">Phone (mobile)<span class="requiredIcon">*</span></label>
								<input type="text" class="form-control invTooltip" id="vendorDetailsVendorMobile" name="vendorDetailsVendorMobile" title="Do not enter leading 0">
							</div>
							<div class="form-group col-md-3">
								<label for="vendorDetailsVendorPhone2">Phone 2</label>
								<input type="text" class="form-control invTooltip" id="vendorDetailsVendorPhone2" name="vendorDetailsVendorPhone2" title="Do not enter leading 0">
							</div>
							<div class="form-group col-md-6">
								<label for="vendorDetailsVendorEmail">Email</label>
								<input type="email" class="form-control" id="vendorDetailsVendorEmail" name="vendorDetailsVendorEmail">
							</div>
						</div>
						<div class="form-group">
							<label for="vendorDetailsVendorAddress">Address<span class="requiredIcon">*</span></label>
							<input type="text" class="form-control" id="vendorDetailsVendorAddress" name="vendorDetailsVendorAddress">
						</div>
						<div class="form-group">
							<label for="vendorDetailsVendorAddress2">Address 2</label>
							<input type="text" class="form-control" id="vendorDetailsVendorAddress2" name="vendorDetailsVendorAddress2">
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="vendorDetailsVendorCity">City</label>
								<input type="text" class="form-control" id="vendorDetailsVendorCity" name="vendorDetailsVendorCity">
							</div>
							<div class="form-group col-md-4">
								<label for="vendorDetailsVendorDistrict">District</label>
								<select id="vendorDetailsVendorDistrict" name="vendorDetailsVendorDistrict" class="form-control chosenSelect">
									<?php include('inc/districtList.html'); ?>
								</select>
							</div>
						</div>					  
						<button type="button" id="addVendor" name="addVendor" class="btn btn-success">Add Vendor</button>
						<button type="button" id="updateVendorDetailsButton" class="btn btn-primary">Update</button>
						<button type="button" id="deleteVendorButton" class="btn btn-danger">Delete</button>
						<button type="reset" class="btn">Clear</button>
					</form>
				</div> 
			</div>
		</div>

		<div class="tab-pane fade" id="v-pills-sale" role="tabpanel" aria-labelledby="v-pills-sale-tab">
			<div class="card card-outline-secondary my-4">
				<div class="card-header">Transfer Item Details</div>
				<div class="card-body">
					<div id="saleDetailsMessage"></div>
					<form>
						<div class="form-row">
							<div class="form-group col-md-3">
								<label for="saleDetailsItemNumber">Item Number<span class="requiredIcon">*</span></label>
								<input type="text" class="form-control" id="saleDetailsItemNumber" name="saleDetailsItemNumber" autocomplete="off">
								<div id="saleDetailsItemNumberSuggestionsDiv" class="customListDivWidth"></div>
							</div>
							<div class="form-group col-md-3">
								<label for="saleDetailsCustomerID">Department ID<span class="requiredIcon">*</span></label>
								<input type="text" class="form-control" id="saleDetailsCustomerID" name="saleDetailsCustomerID" autocomplete="off">
								<div id="saleDetailsCustomerIDSuggestionsDiv" class="customListDivWidth"></div>
							</div>
							<div class="form-group col-md-4">
								<label for="saleDetailsCustomerName">Department Name</label>
								<input type="text" class="form-control" id="saleDetailsCustomerName" name="saleDetailsCustomerName" readonly>
							</div>
							<div class="form-group col-md-2">
								<label for="saleDetailsDiscount">Room Number</label> 
								<input type="text" class="form-control" id="saleDetailsDiscount" name="saleDetailsDiscount" value="0">
							</div>
							<div class="form-row">
								<div class="form-group col-md-5">
									<label for="saleDetailsItemName">Item Name</label>
									<!--<select id="saleDetailsItemNames" name="saleDetailsItemNames" class="form-control chosenSelect"> -->
										<?php 
									//require('model/item/getItemDetails.php');
										?>
										<!-- </select> -->
										<input type="text" class="form-control invTooltip" id="saleDetailsItemName" name="saleDetailsItemName" readonly title="This will be auto-filled when you enter the item number above">
									</div>

								</div>
								<div class="form-row">
									<div class="form-group col-md-2">
										<label for="saleDetailsTotalStock">Total Stock</label>
										<input type="text" class="form-control" name="saleDetailsTotalStock" id="saleDetailsTotalStock" readonly>
									</div>



									<div class="form-group col-md-3">
										<label for="saleDetailsSaleDate">Transfer Date<span class="requiredIcon">*</span></label>
										<input type="text" class="form-control datepicker" id="saleDetailsSaleDate" value="2018-05-24" name="saleDetailsSaleDate" readonly>
									</div>

									<div class="form-group col-md-2">
										<label for="saleDetailsQuantity">Quantity<span class="requiredIcon">*</span></label>
										<input type="number" class="form-control" id="saleDetailsQuantity" name="saleDetailsQuantity" value="0">
									</div>
									<div class="form-group col-md-2">
										<!--<label for="saleDetailsUnitPrice">Unit Price<span class="requiredIcon">*</span></label>-->
										<input type="hidden" class="form-control" id="saleDetailsUnitPrice" name="saleDetailsUnitPrice" value="0">
									</div>
									<div class="form-group col-md-3">
										<!--<label for="saleDetailsTotal">Total</label>-->
										<input type="hidden" class="form-control" id="saleDetailsTotal" name="saleDetailsTotal">
									</div>


								</div>

							</div>
							<div class="form-row">
								<div class="form-group col-md-3">
									<div id="saleDetailsImageContainer"></div>
								</div>

								<div class="form-group col-md-3">
									<label for="saleDetailsSaleID">Transfer ID</label>
									<input type="text" class="form-control invTooltip" id="saleDetailsSaleID" name="saleDetailsSaleID" title="This will be auto-generated when you add a new record" autocomplete="off">
									<div id="saleDetailsSaleIDSuggestionsDiv" class="customListDivWidth"></div>
								</div>

							</div>
							<button type="button" id="addSaleButton" class="btn btn-success">Add to Transfer</button>
							<button type="button" id="updateSaleDetailsButton" class="btn btn-primary">Update</button>
							<button type="reset" id="saleClear" class="btn">Clear</button>
						</form>
					</div> 
				</div>
			</div>
			<div class="tab-pane fade" id="v-pills-customer" role="tabpanel" aria-labelledby="v-pills-customer-tab">
				<div class="card card-outline-secondary my-4">
					<div class="card-header">Department Details</div>
					<div class="card-body">
						<!-- Div to show the ajax message from validations/db submission -->
						<div id="customerDetailsMessage"></div>
						<form> 
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="customerDetailsCustomerFullName">Department Name<span class="requiredIcon">*</span></label>
									<input type="text" class="form-control" id="customerDetailsCustomerFullName" name="customerDetailsCustomerFullName">
								</div>
								<div class="form-group col-md-2">
									<label for="customerDetailsStatus">Status</label>
									<select id="customerDetailsStatus" name="customerDetailsStatus" class="form-control chosenSelect">
										<?php include('inc/statusList.html'); ?>
									</select>
								</div>
								<div class="form-group col-md-3">
									<label for="customerDetailsCustomerID">Department ID</label>
									<input type="text" class="form-control invTooltip" id="customerDetailsCustomerID" name="customerDetailsCustomerID" title="This will be auto-generated when you add a new customer" autocomplete="off">
									<div id="customerDetailsCustomerIDSuggestionsDiv" class="customListDivWidth"></div>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-3">
									<label for="customerDetailsCustomerMobile">Phone (mobile)<span class="requiredIcon">*</span></label>
									<input type="text" class="form-control invTooltip" id="customerDetailsCustomerMobile" name="customerDetailsCustomerMobile" title="Do not enter leading 0">
								</div>
								<div class="form-group col-md-3">
									<label for="customerDetailsCustomerPhone2">Phone 2</label>
									<input type="text" class="form-control invTooltip" id="customerDetailsCustomerPhone2" name="customerDetailsCustomerPhone2" title="Do not enter leading 0">
								</div>
								<div class="form-group col-md-6">
									<label for="customerDetailsCustomerEmail">Email</label>
									<input type="email" class="form-control" id="customerDetailsCustomerEmail" name="customerDetailsCustomerEmail">
								</div>
							</div>
							<div class="form-group">
								<label for="customerDetailsCustomerAddress">Address<span class="requiredIcon">*</span></label>
								<input type="text" class="form-control" id="customerDetailsCustomerAddress" name="customerDetailsCustomerAddress">
							</div>
							<div class="form-group">
								<!--<label for="customerDetailsCustomerAddress2">Address 2</label> -->
								<input type="hidden" value="" class="form-control" id="customerDetailsCustomerAddress2" name="customerDetailsCustomerAddress2">
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<!--  <label for="customerDetailsCustomerCity">City</label> -->
									<input type="hidden" value="" class="form-control" id="customerDetailsCustomerCity" name="customerDetailsCustomerCity">
								</div>
								<div class="form-group col-md-4">
									<!--  <label for="customerDetailsCustomerDistrict">District</label>-->
									<input type="hidden"  value="" name="customerDetailsCustomerDistrict" class="form-control" >


								</div>
							</div>					  
							<button type="button" id="addCustomer" name="addCustomer" class="btn btn-success">Add Department</button>
							<button type="button" id="updateCustomerDetailsButton" class="btn btn-primary">Update</button>
							<button type="button" id="deleteCustomerButton" class="btn btn-danger">Delete</button>
							<button type="reset" class="btn">Clear</button>
						</form>
					</div> 
				</div>
			</div>

			<div class="tab-pane fade" id="v-pills-search" role="tabpanel" aria-labelledby="v-pills-search-tab">
				<div class="card card-outline-secondary my-4">
					<div class="card-header">Search Inventory<button id="searchTablesRefresh" name="searchTablesRefresh" class="btn btn-warning float-right btn-sm">Refresh</button></div>
					<div class="card-body">										
						<ul class="nav nav-tabs" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" data-toggle="tab" href="#itemSearchTab">Item</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#customerSearchTab">Department</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#saleSearchTab">Transfer Details</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#purchaseSearchTab">Purchase</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#vendorSearchTab">Vendor</a>
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
							<div id="purchaseSearchTab" class="container-fluid tab-pane fade">
								<br>
								<p>Use the grid below to search purchase details</p>
								<div class="table-responsive" id="purchaseDetailsTableDiv"></div>
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

			<div class="tab-pane fade" id="v-pills-reports" role="tabpanel" aria-labelledby="v-pills-reports-tab">
				<div class="card card-outline-secondary my-4">
					<div class="card-header">Reports<button id="reportsTablesRefresh" name="reportsTablesRefresh" class="btn btn-warning float-right btn-sm">Refresh</button></div>
					<div class="card-body">										
						<ul class="nav nav-tabs" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" data-toggle="tab" href="#itemReportsTab">Item</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#customerReportsTab">Department</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#saleReportsTab">Transfer Details</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#purchaseReportsTab">Purchase</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#vendorReportsTab">Vendor</a>
							</li>
						</ul>

						<!-- Tab panes for reports sections -->
						<div class="tab-content">
							<div id="itemReportsTab" class="container-fluid tab-pane active">
								<br>
								<p>Use the grid below to get reports for items</p>
								<div class="table-responsive" id="itemReportsTableDiv"></div>
							</div>
							<div id="customerReportsTab" class="container-fluid tab-pane fade">
								<br>
								<p>Use the grid below to get reports for Department</p>
								<div class="table-responsive" id="customerReportsTableDiv"></div>
							</div>
							<div id="saleReportsTab" class="container-fluid tab-pane fade">
								<br>
								<!-- <p>Use the grid below to get reports for sales</p> -->
								<form> 
									<div class="form-row">
										<div class="form-group col-md-3">
											<label for="saleReportStartDate">Start Date</label>
											<input type="text" class="form-control datepicker" id="saleReportStartDate" value="2018-05-24" name="saleReportStartDate" readonly>
										</div>
										<div class="form-group col-md-3">
											<label for="saleReportEndDate">End Date</label>
											<input type="text" class="form-control datepicker" id="saleReportEndDate" value="2018-05-24" name="saleReportEndDate" readonly>
										</div>
									</div>
									<button type="button" id="showSaleReport" class="btn btn-dark">Show Report</button>
									<button type="reset" id="saleFilterClear" class="btn">Clear</button>
								</form>
								<br><br>
								<div class="table-responsive" id="saleReportsTableDiv"></div>
							</div>
							<div id="purchaseReportsTab" class="container-fluid tab-pane fade">
								<br>
								<!-- <p>Use the grid below to get reports for purchases</p> -->
								<form> 
									<div class="form-row">
										<div class="form-group col-md-3">
											<label for="purchaseReportStartDate">Start Date</label>
											<input type="text" class="form-control datepicker" id="purchaseReportStartDate" value="2018-05-24" name="purchaseReportStartDate" readonly>
										</div>
										<div class="form-group col-md-3">
											<label for="purchaseReportEndDate">End Date</label>
											<input type="text" class="form-control datepicker" id="purchaseReportEndDate" value="2018-05-24" name="purchaseReportEndDate" readonly>
										</div>
									</div>
									<button type="button" id="showPurchaseReport" class="btn btn-dark">Show Report</button>
									<button type="reset" id="purchaseFilterClear" class="btn">Clear</button>
								</form>
								<br><br>
								<div class="table-responsive" id="purchaseReportsTableDiv"></div>
							</div>
							<div id="vendorReportsTab" class="container-fluid tab-pane fade">
								<br>
								<p>Use the grid below to get reports for vendors</p>
								<div class="table-responsive" id="vendorReportsTableDiv"></div>
							</div>
						</div>
					</div> 
				</div>
			</div>

			<div class="tab-pane fade show active" id="v-pills-request" role="tabpanel" aria-labelledby="v-pills-request-tab" style="overflow:auto" width="100%">
				<div class="card card-outline-secondary my-4">
					<div class="card-header">Requests<button id="reportsTablesRefresh" name="reportsTablesRefresh" class="btn btn-warning float-right btn-sm">Refresh</button></div>
					<div class="card-body">										
						<ul class="nav nav-tabs" role="tablist">
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#itemNewRequest">New Requests</a>
							</li>
							<li class="nav-item">	
								<a class="nav-link" data-toggle="tab" href="#ApprovedRequest">Approved Requests</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#RejectedRequest">Rejected Requests</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#TransferRequest">Completed Transfered Requests</a>
							</li>
							<li class="nav-item">
								<a class="nav-link active" data-toggle="tab" href="#Approved1Request">Print Approved Requests</a>
							</li>
							
						</ul>
						
						
						<div class="tab-content">
							<div id="itemNewRequest" class="container-fluid tab-pane fade">
								<br>			
							<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%" style=font-size:13px>
									<thead>
										<tr>
											<th>#</th>
											<th>Item No</th>
											<th>Item Name</th>
											<th>Customer ID</th>
											<th>Item Requested By</th>											
											
											<th>Req. Quantity</th>                                            
											<th>App. Quantity</th>
											<th>Item Pick From</th>
											<th>Room Number</th>
											<th>Validity</th>
											<th>Status </th>								
											<th>Action</th>	

										</tr>
									</thead>
									

									<tbody>
										<?php
										if(isset($_REQUEST['approve']) && $_REQUEST['id']== $_SESSION['id'])
										{
											$id=$_REQUEST['id'];
											
											$status="Approved";
											$approveQuantity=$_REQUEST['approveQuantity'];
											$itemName=$_REQUEST['itemName'];
											$Dept=$_REQUEST['Selectdept'];
											$RoomNo=$_POST['RoomNo'];
											$approvedDate = date('Y-m-d');
										    $Validity=$_REQUEST['Validity'];
											
											
										$sql = "SELECT quantity from  sale where customerName='$Dept' and itemName='$itemName' and roomNo='$RoomNo'";
										//$query = $conn -> prepare($sql);
										//$query-> bindParam(':Dept',$Dept, PDO::PARAM_STR);
										//$query-> bindParam(':RoomNo',$RoomNo, PDO::PARAM_STR);
										//$query-> bindParam(':itemName',$itemName, PDO::PARAM_STR);
										
										$result = mysqli_query($con, $sql);
										while($row   = mysqli_fetch_row($result))
										{
											$q=$row[0];
										}
																												
									
							
											if($q >= $approveQuantity)
											{
												
											$sql1 = "UPDATE itemrequest SET status=:status,approveQuantity=:approveQuantity,Dept=:Dept,RoomNo=:RoomNo,Validity=:Validity, approvedDate=:approvedDate,returnDate=DATE_ADD(:approvedDate, INTERVAL :Validity DAY) WHERE  id=:id";
											
											$query1 = $conn->prepare($sql1);
											$query1 ->bindParam(':status',$status, PDO::PARAM_STR);
											$query1-> bindParam(':id',$id, PDO::PARAM_STR);
											$query1-> bindParam(':approveQuantity',$approveQuantity, PDO::PARAM_STR);
											$query1-> bindParam(':Dept',$Dept, PDO::PARAM_STR);
											$query1-> bindParam(':RoomNo',$RoomNo, PDO::PARAM_STR);
											$query1-> bindParam(':Validity',$Validity, PDO::PARAM_STR);
											$query1-> bindParam(':approvedDate',$approvedDate, PDO::PARAM_STR);
											$query1 -> execute();
											$msg="Changes Sucessfully";
											echo '<script>alert("Your request approved Successfully")</script>';
											}
											else{
											
											echo '<script>alert("Item not available")</script>';
												}
																				
																				
										}
										
										

										if(isset($_REQUEST['rejected']))
										{
											$id=$_REQUEST['id'];
											
											$status="Rejected";
											$sql = "UPDATE itemrequest SET status=:status WHERE  id=:id";
											$query = $conn->prepare($sql);
											$query -> bindParam(':status',$status, PDO::PARAM_STR);
											$query-> bindParam(':id',$id, PDO::PARAM_STR);
											$query -> execute();
											$msg="Changes Sucessfully";

										}
										?>


										<?php 
										$sql = "SELECT * from  itemrequest where status='pending'";
										$query = $conn -> prepare($sql);
										$query->execute();
										$results=$query->fetchAll(PDO::FETCH_OBJ);
										$cnt=1;
										if($query->rowCount() > 0)
										{
											foreach($results as $result)
												{				?>	
												<form method="post" action="index.php">
													<tr>
														<td><?php echo htmlentities($result->id);?></td>											
														<td><?php echo htmlentities($result->itemNo);?></td>
														<td><?php echo htmlentities($result->itemName);?></td>
														<input type="hidden" name="itemName" class="form-control"  value="<?php echo htmlentities($result->itemName);?>">
														<td><?php echo htmlentities($result->customerID);?></td>
														<td><?php echo htmlentities($result->fullName);?></td>                                          
														
														<td><?php echo htmlentities($result->quantity);?></td>  
														<td>
														<input type="text" name="approveQuantity" class="form-control" required value="<?php echo htmlentities($result->quantity);?>">
														
														<td> <select onChange="getroomno(this.value);" id="Selectdept" name="Selectdept" class="form-control">                                             
														  <!--option value="">Select</option>
														<option value="ENGINEERING MAIN BUILDING">ENGINEERING MAIN BUILDING</option>
														<option value="SSA Building">SSA Building</option>
														<option value="Nursing and physio Building">Nursing and physio Building</option>
														<option value="Homeopathy">Homeopathy</option>
														<option value="School building">School building</option>
														<option value="Workshop lab building">Workshop lab building</option>
														</select--> 
														 <option value="">Select</option>
														<?php $query =mysqli_query($con,"SELECT distinct customerName FROM sale");
															while($row=mysqli_fetch_array($query))
															{ ?>
															<option value="<?php echo $row['customerName'];?>">
															<?php     
															echo $row['customerName'];?></option>
																													
															<?php
															}
															?>
                                                         </select></td>
														<td><select name="RoomNo" id="RoomNo" class="form-control">
														<option value="">Select</option>
														</select></td>
														<!--td><input type="hidden" name="RoomNo" class="form-control"  value="<!--?php echo htmlentities($result->RoomNo);?>"></td-->
														<td><input type="text" name="Validity" class="form-control" required value="<?php echo htmlentities($result->Validity);?>"></td>
														<td style="color:green;"><?php echo htmlentities($result->status);?>

														
													</td>


													<td>
														 <?php
                                                           
                                                           $_SESSION['id']=$result->id;
                                                                ?>
                                                        

															<input type="hidden" name="id" value="<?php echo $result->id;?>"/>

                                                           
															<button  style='margin-bottom:10px;margin-top:10px' type="submit" name="approve" class="btn btn-success" >Approve</button><br/>
															<button style='margin-bottom:16px' type="submit" name="rejected" class="btn btn-danger" >Reject</button>
														</form>
													</td>

												</tr>
												<?php $cnt=$cnt+1; }} ?>
											</tbody>
										</table>
									</ul>

								</div>

								<div id="ApprovedRequest" class="container-fluid tab-pane fade">
									<br>			

									<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th>#</th>
												<th  style="text-align: center">Item Name</th>		
												<th  style="text-align: center">Item Requested By</th>
												<th  style="text-align: center">Item Transfered From</th>	
												<th  style="text-align: center">Requested Quantity</th>                                            
												<th  style="text-align: center">Approved Quantity</th>
												<th  style="text-align: center">Item Status</th>
												<th  style="text-align: center">Approved Date</th>
												<th  style="text-align: center">Return Date</th>
												<th style="text-align: center"> Download </th>
												

											</tr>
										</thead>


										<tbody>



											<?php


											$sql = "SELECT * from  itemrequest where status='Approved'";
											$query = $conn -> prepare($sql);
											$query->execute();
											$results=$query->fetchAll(PDO::FETCH_OBJ);
											$cnt=1;
											if($query->rowCount() > 0)
											{
												foreach($results as $result)
													{		$returnDate1=$result->returnDate;
															$returnDate2 = date("d-m-Y", strtotime($returnDate1));	$approvedDate1=$result->approvedDate;
																        $approvedDate2 = date("d-m-Y", strtotime($approvedDate1));	?>	
														<tr>
															<td><?php echo htmlentities($cnt);?></td>								
															
															<td style="text-align: center"><?php echo htmlentities($result->itemName);?></td>
																		
															<td style="text-align: center"><?php echo htmlentities($result->fullName);?></td>                                          
															<td style="text-align: center"><?php echo htmlentities($result->Dept);?></td>   
															<td style="text-align: center"><?php echo htmlentities($result->quantity);?></td>  
															<td style="text-align: center"><?php echo htmlentities($result->approveQuantity);?></td>
															<td style="text-align: center"><?php echo htmlentities($result->status);?></td>
															<td style="text-align: center"><?php echo htmlentities($approvedDate2);?></td>

															<td style="text-align: center"><?php echo htmlentities($returnDate2);?></td>
															<div>
															<td>
															<button type="button" class="btn btn-basic" name="create_pdf">
															<span class="glyphicon glyphicon-download-alt"></span><a href="pdfcreater.php?id=<?php echo htmlentities($result->id);?>" target="_blank">&nbsp;&nbsp;Download Receipt</a></button>
															</div>   
															</td>
															

															

															</tr>
															<?php $cnt=$cnt+1; }} ?>

														</tbody>
													</table>
												</ul>

								</div> 




								<div id="RejectedRequest" class="container-fluid tab-pane fade">
												<br>			


												<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
													<thead>
														<tr>
															<th>#</th>
															<th>Item No</th>
															<th>Item Name</th>
															<th>Customer ID</th>
															<th>FullName</th>											
															<th>Email</th>
															<th>Requested Quantity</th>                                            
															<th>Approved Quantity</th>



														</tr>
													</thead>


													<tbody>



														<?php


														$sql = "SELECT * from  itemrequest where status='Rejected'";
														$query = $conn -> prepare($sql);
														$query->execute();
														$results=$query->fetchAll(PDO::FETCH_OBJ);
														$cnt=1;
														if($query->rowCount() > 0)
														{
															foreach($results as $result)
																{				?>	
																	<tr>
																		<td><?php echo htmlentities($cnt);?></td>											
																		<td><?php echo htmlentities($result->itemNo);?></td>
																		<td><?php echo htmlentities($result->itemName);?></td>
																		<td><?php echo htmlentities($result->customerID);?></td>
																		<td><?php echo htmlentities($result->fullName);?></td>                                          
																		<td><?php echo htmlentities($result->email);?></td>   
																		<td><?php echo htmlentities($result->quantity);?></td>  
																		<td><?php echo htmlentities($result->approveQuantity);?></td>

																		<td>

																		</tr>
																		<?php $cnt=$cnt+1; }} ?>

																	</tbody>
																</table>
															</ul>

										</div> 
										
							<div id="TransferRequest" class="container-fluid tab-pane fade">
												<br>			


												<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
													<thead>
														<tr style=word-wrap: break-word;>
															<th  style="text-align: center">#</th>
															
															<th  style="text-align: center">Item Name</th>
															
															<th  style="text-align: center">Item Requested By</th><th  style="text-align: center">Item Transfered From</th>										
															
															<th  style="text-align: center">Requested Quantity</th>                                            
															<th  style="text-align: center">Approved Quantity</th>
															<th  style="text-align: center">Item Status</th>
															
															<th  style="text-align: center">Return Date</th>
															<th style="text-align: center"> Send Email Reminder </th>
															<th style="text-align: center">Action</th>	
															



														</tr>
													</thead>


													<tbody>
												<?php
													if(isset($_REQUEST['return']))
													{
														$id=$_REQUEST['id'];
														//echo $id;
														$approveQuantity=$_REQUEST['approveQuantity'];
														$dept=$_REQUEST['dept'];
														$itemName=$_REQUEST['itemName'];
														$status="Returned";
														$sql = "UPDATE itemrequest SET status=:status WHERE  id=:id";
														
														$query = $conn->prepare($sql);
														$query -> bindParam(':status',$status, PDO::PARAM_STR);
														$query-> bindParam(':id',$id, PDO::PARAM_STR);
														$query -> execute();
														
														
														
														
														
														$sql1 = "UPDATE sale SET quantity=quantity+$approveQuantity WHERE  customerName=:dept and itemName=:itemName";
											            $query1 = $conn->prepare($sql1);
											            $query1-> bindParam(':dept',$dept, PDO::PARAM_STR);;
											            $query1-> bindParam(':itemName',$itemName, PDO::PARAM_STR);
											            $query1 -> execute();

													}
													?>


														<?php


														$sql = "SELECT * from  itemrequest where status='Transfered'";
														$query = $conn -> prepare($sql);
														$query->execute();
														$results=$query->fetchAll(PDO::FETCH_OBJ);
														$cnt=1;
														if($query->rowCount() > 0)
														{
															foreach($results as $result)
																		
																{		$returnDate1=$result->returnDate;
																        $returnDate2 = date("d-m-Y", strtotime($returnDate1));
																		
																		
																		
																		
																?>	
																	<tr>
																		<td style="text-align: center"><?php echo htmlentities($cnt);?></td>																			
																		<td style="text-align: center"><?php echo htmlentities($result->itemName);?></td>
																		
																		<td style="text-align: center"><?php echo htmlentities($result->fullName);?></td>                                          
																		<td style="text-align: center"><?php echo htmlentities($result->Dept);?></td>   
																		<td style="text-align: center"><?php echo htmlentities($result->quantity);?></td>  
																		<td style="text-align: center"><?php echo htmlentities($result->approveQuantity);?></td>
																		<td style="text-align: center"><?php echo htmlentities($result->status);?></td>
																		<td style="text-align: center"><?php echo htmlentities($returnDate2);?></td>
																		
																														                                                     <td>
															<div>
															
															<button style='margin-bottom:10px;margin-top:10px;' type="button" class="btn btn-basic" name="send">
															<span class="glyphicon glyphicon-download-alt"></span><a href="send.php?id=<?php echo htmlentities($result->id);?>" target="_blank">&nbsp;&nbsp;Send Reminder</a></button>
															</div>   
															</td>			
																																										<td>
													<form method="post" action="index.php" >
													<input type="hidden" name="id" value="<?php echo $result->id;?>"/>
													<input type="hidden" name="approveQuantity" value="<?php echo $result->approveQuantity;?>"/>
													<input type="hidden" name="dept" value="<?php echo $result->Dept;?>"/>
													<input type="hidden" name="itemName" value="<?php echo $result->itemName;?>"/>
													
												<button  style='margin-bottom:10px;margin-top:10px' type="submit" name="return"  class="btn btn-primary" >Click here <br/> if Item Returned</button><br/>
													</td>		
												</form>

																		</tr>
																		<?php $cnt=$cnt+1; }} ?>

																	</tbody>
																</table>
															</ul>

										</div> 										
										
<div id="Approved1Request" class="container-fluid tab-pane active">

  
  
<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<?php
	 $con=mysqli_connect('localhost','root','','shop_inventory');
	 function fill_brand($con)  
	 {  
		 
		  $output = '';  
		  $sql = "SELECT * FROM customer";  
		  $result = mysqli_query($con, $sql);  
		  while($row = mysqli_fetch_array($result))  
		  {  
			   $output .= '<option value="'.$row["customerID"].'">'.$row["fullName"].'</option>';  
		  }  
		
		  return $output;  
	 } 

?>


<form method="post">
<?php
$con=mysqli_connect('localhost','root','','shop_inventory');
$sub_sql="";
$toDate=$fromDate="";
$res="";
if(isset($_POST['submit'])){
	$from=$_POST['from'];
	$dept=$_POST['dept'];
	$fromDate=$from;
	$fromArr=explode("/",$from);
	//echo $fromArr[0];
	//echo $fromArr[1];
	//echo $fromArr[2];
	$from=$fromArr['2'].'/'.$fromArr['0'].'/'.$fromArr['1'];
	//echo $from;
	//$from=$from." 00:00:00";
	
	$to=$_POST['to'];
	$toDate=$to;
	$toArr=explode("/",$to);
	$to=$toArr['2'].'/'.$toArr['0'].'/'.$toArr['1'];
	//echo $to;
	//$to=$to." 23:59:59";
	
	$sub_sql= " where approvedDate >= '$from' && approvedDate <= '$to' and customerID='$dept' and status='Approved'";
    $res=mysqli_query($con,"select * from itemrequest $sub_sql");	
	}
?>



	<tr><td><label for="from">Department:</label></td>	
	<td><select name="dept" id="dept">  
		
		<option value="" > Department</option>  
		</option>  
                    <?php echo fill_brand($con); ?>  
        </select> <br/> <br/></td></tr>
		
		<tr><td><label for="from">From</label></td>
		<td><input type="text" id="from" name="from" required value="<?php echo $fromDate?>">
		<td><label for="to">to</label>
		<input type="text" id="to" name="to" required value="<?php echo $toDate?>">
		<tr><td colspan="3">
	
		<div style="text-align:center;"><input type="submit" name="submit" style="background-color:Tomato;color:white;width:150px;height:40px;" value="Filter"></td></tr></div>
	</form>
	 </table>
	 <br/>
	 
	 <?php if(mysqli_num_rows($res)>0){?>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th style="text-align: center; vertical-align: middle; font-size: 14px;">Item Name</th>
        <th style="text-align: center; vertical-align: middle; font-size: 14px;">Requested Quantity</th>
        <th style="text-align: center; vertical-align: middle; font-size: 14px;">Approved Quantity</th>
		<th style="text-align: center; vertical-align: middle; font-size: 14px;">Items Picked From</th>
		<th style="text-align: center; vertical-align: middle; font-size: 14px;">Room No.</th>
		<th style="text-align: center; vertical-align: middle; font-size: 14px;">Returned Date</th>
      </tr>
    </thead>
    <tbody>
      <?php while($row=mysqli_fetch_assoc($res)){?>
      <tr>
        <td style="text-align: center; vertical-align: middle; font-size: 14px;"><?php echo $row['itemName']?></td>
        <td style="text-align: center; vertical-align: middle; font-size: 14px;"><?php echo $row['quantity']?></td>
		<td style="text-align: center; vertical-align: middle; font-size: 14px;"><?php echo $row['approveQuantity']?></td>
		<td style="text-align: center; vertical-align: middle; font-size: 14px;"><?php echo $row['Dept']?></td>
		<td style="text-align: center; vertical-align: middle; font-size: 14px;"><?php echo $row['RoomNo']?></td>
		<td style="text-align: center; vertical-align: middle; font-size: 14px;"><?php echo $row['returnDate']?></td>
			
      </tr>
	  
	 
	  <?php } ?>
	  <button type="button" class="btn btn-basic" name="create_pdf">
	<span class="glyphicon glyphicon-download-alt"></span><a href="pdfcreater1.php?from=<?php echo htmlentities($from);?>&to=<?php echo htmlentities($to);?>&dept=<?php echo htmlentities($dept);?>" target="_blank">&nbsp;&nbsp;Download Receipt</a></button>
    </tbody>
  </table>
  <?php } else {
	echo "No data found";  
  }
  ?>
  
  
  
  <script>
  $( function() {
    var dateFormat = "dd/mm/yy",
      from = $( "#from" )
        .datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          numberOfMonths: 1,
		  dateFormat:"dd/mm/yy",
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( "#to" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 1,
		dateFormat:"dd/mm/yy",
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
      });
 
    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }
 
      return date;
    }
  } );

function getroomno(val) {
	//window.alert(val);
	$.ajax({
	type: "POST",
	url: "get_roomno.php",
	data:'customerID='+val,
	success: function(data){
		$("#RoomNo").html(data);
	}
	});

}

</script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
</div> 										
							</div>

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
