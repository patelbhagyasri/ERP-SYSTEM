<?php   
 //load_data_select.php  
 $connect = mysqli_connect("localhost", "root", "", "shop_inventory");  
 function fill_brand($connect)  
 {  
      $output = '';  
      $sql = "SELECT * FROM customer";  
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '<option value="'.$row["customerID"].'">'.$row["fullName"].'</option>';  
      }  
      return $output;  
 }  
 function fill_product($connect)  
 {  
      $output = '';  
      $sql = "SELECT * FROM customer";  
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '<div class="col-md-3">';  
           $output .= '<div style="border:1px solid #ccc; padding:20px; margin-bottom:20px;">'.$row["fullName"].'';  
           $output .=     '</div>';  
           $output .=     '</div>';  
      }  
      return $output;  
 }

 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | Multiple Image Upload</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
	
<script type="text/javascript">
$(document).ready(function(){
  $("#generate_report").click(function(){
	  var from_date=jQuery("#fromdate").val();
	  var to_date=jQuery("#todate").val();
	  var data =
	  {		
	  	from_date	 : from_date,
		to_date		 : to_date
	  }
	jQuery.ajax({	
					type: "POST",
					url: "load_data.php",
					data: data,
					success: function(responce){
						$("#txtHint").after(responce);
				  }	
			 });
  });
});
</script>   
      </head>  
      <body>  
           <br /><br />  
           <div class="container">  
                <h3>  
                     <select name="brand" id="brand">  
                          <option value="">Show All Product</option>  
                          <?php echo fill_brand($connect); ?>  
                     </select> 
					 <br/>
                      <br/>					 
		
	        From date: <input type="text" id="fromdate" value="2023-02-17">   
			To date: <input type="text" id="todate" value="2023-02-21">  
<input type="button" name="generate_report" id="generate_report" value="Generate Report" />
<br>
<div id="txtHint"><b>User informations will be listed here.</b></div>	
		<input type="submit" name="go" value="Search" >
	
</form>
                   
                     <br /><br />  
                     <div class="row" id="show_product">  
                          <?php echo fill_product($connect);?>  
                     </div>  
                </h3>  
                </h3>  
           </div>  
      </body>  
 </html>  
 
  

