<?php  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "shop_inventory");  
	  $from=$_GET['from'];
	  $to=$_GET['to'];
	  $dept=$_GET['dept'];
	  //$fullName=$_GET['fullName'];
      $sql = "SELECT * FROM itemrequest where approvedDate >= '$from' && approvedDate <= '$to' and customerID='$dept'";  
      $result1 = mysqli_query($connect, $sql); 
	  $row1 = mysqli_fetch_array($result1);
	 // $row1 = mysqli_fetch_array($result);
	  $fullName=$row1["fullName"];
	  $approvedDate=$row1["approvedDate"];
		$approvedDate1 = date("d-m-Y", strtotime($approvedDate));
	  
  
      
      require_once('tcpdf/tcpdf.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
	  $pagelayout = array(100,100);
	  $obj_pdf->setPageOrientation('P');
      $obj_pdf->SetCreator(PDF_CREATOR); 
      			
      $obj_pdf->SetTitle("S.S. Agarwal Institute of Engineering and Technology, Navsari");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins('20', '20', '10');  
	  $obj_pdf->SetLineStyle( array( 'width' => 15, 'color' => array(0,0,0)));
	  $obj_pdf->SetFillColor(255,255,127);
	  $obj_pdf->SetTextColor(0,0,128);
	  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 13);  
      $obj_pdf->AddPage();  
      $content = '';  
      $content .= '
      
      <table border="0" cellspacing="0" cellpadding="5" style="border-left: 1px solid #orange;border-top: 1px solid #orange;border-right: 1px solid #orange;border-bottom: 1px solid #orange" >  
      
	  <tr>
      <td align="center"><img src="ssaiet_logo.jpg" width="100" height="100" ></td>
	  <td colspan="4"><h3 align="center">Agrawal Education Foundation Managed</h3>
      <h2 align="center">S.S. AGRAWAL CAMPUS,NAVSARI</h2>
	  <h4 align="center">Address : Veeranajali Marg,</h4>   
	  <h4 align="center"> Near Devina Park Society, Gandevi Road, Navsari-396445, Gujarat. <br/>Phone No.: 02637-232667/232857 </h4>
	  </td>
	  </tr>
	  <tr><td &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;>
	  </td>
	 
	 </tr>
	 
	  <tr><td colspan="8"><h3 style="border-top-width: 1px #000; border-bottom-width: 1px #000;" align="center">Inventory Item Request</h3></td></tr>
	 
	 <tr><td colspan="8" align="right" style="line-height: 25.5em;">
	 Date: <b><u>' .$approvedDate1.' </u></b>&nbsp;&nbsp; 
	 </td>
	 </tr>
	  
	
	  <tr><td colspan="8" style="line-height: 25.5em;">
	 Item Requested By: <b><u>PRINCIPAL OF ' .$fullName.' </u></b>&nbsp;&nbsp; 
	 </td>
	 </tr>
	
	  
	</table>
	
	 <table border="1" cellspacing="0" cellpadding="5" style="border-left: 1px solid #orange;border-top: 1px solid #orange;border-right: 1px solid #orange;border-bottom: 1px solid #orange" >  
	
	
	 <tr>

	 <td style="text-align: center; vertical-align: middle; font-size: 10px;">Item</td>
	 <td style="text-align: center; vertical-align: middle; font-size: 10px;">Requested Quantity</td>
	 <td style="text-align: center; vertical-align: middle; font-size: 10px;">Approved Quantity</td>
	 <td style="text-align: center; vertical-align: middle; font-size: 10px;">Items Picked From</td>
	 <td style="text-align: center; vertical-align: middle; font-size: 10px;">Room No.</td>
	 <td style="text-align: center; vertical-align: middle; font-size: 10px;">Returned Days</td>
	 <td style="text-align: center; vertical-align: middle ;font-size: 10px;">Returned Date</td>

	 
	 </tr>
	 ';
	  $result = mysqli_query($connect, $sql); 
	  while($row = mysqli_fetch_array($result))  
      {  
		$itemName=$row["itemName"];
	    $fullName=$row["fullName"];
	    $Dept=$row["Dept"];
	    $quantity=$row["quantity"];
		$approveQuantity=$row["approveQuantity"];
	    $RoomNo=$row["RoomNo"];
	    $Validity=$row["Validity"];
		$returnDate=$row["returnDate"];
		$returnDate1 = date("d-m-Y", strtotime($returnDate));
		
	   
	   $content=$content . '
	   
	 <tr>
	 <td style="text-align: center; vertical-align: middle; font-size: 10px;">'.$itemName.'</td>
	 <td style="text-align: center; vertical-align: middle; font-size: 10px;">'.$quantity.'</td>
	 <td style="text-align: center; vertical-align: middle ; font-size: 10px;">'.$approveQuantity.'</td>
	 <td style="text-align: center; vertical-align: middle; font-size: 10px;">'.$Dept.'</td>
	 <td style="text-align: center; vertical-align: middle; font-size: 10px;">'.$RoomNo.'</td>
	 <td style="text-align: center; vertical-align: middle; font-size: 10px;">'.$Validity.'</td>
	 <td style="text-align: center; vertical-align: middle; font-size: 10px;">'.$returnDate1.'</td>
	 </tr>
     
	 ';
	  }

	  $content = $content . '
	 

	 </table>
	 <table>
	 <tr><td &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;>
	  </td>
	 
	 </tr>
	 <tr><td &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;>
	  </td>
	 
	 </tr>
	  <tr><td &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;>
	  </td>
	 
	 </tr>
	  <tr><td &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;>
	  </td>
	 
	 </tr>
	 
	

	 
	 <tr><td>
	 Signature of Admin Department &nbsp;&nbsp; 
	  </td>
	 
	 </tr>
	 </table> 		 
      ';
	 
	 

		 
      // output the HTML content
   //    $obj_pdf->writeHTML($html, true, false, true, false, '');	 
          
       $obj_pdf->writeHTML($content);  
       $obj_pdf->Output('Receipt.pdf', 'I');  
   ?>  