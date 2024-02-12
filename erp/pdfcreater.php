<?php  
 	
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "shop_inventory");  
	  $aeid=intval($_GET['id']);
      $sql = "SELECT * FROM itemrequest where id=$aeid";  
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
		$approvedDate=$row["approvedDate"];
		$approvedDate1 = date("d-m-Y", strtotime($approvedDate));
		                  
      }  
      
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
	  <tr><td colspan="8" style="line-height: 25.5em;">
	  Requested Item: <b><u>' .$itemName.' </u></b>&nbsp;&nbsp; 
	 </td>
	 </tr>
	 <tr><td colspan="8" style="line-height: 25.5em;">
	  Requested Quantity: <b><u>' .$quantity.' </u></b>&nbsp;&nbsp; 
	 </td>
	 </tr>
	 <tr><td colspan="8" style="line-height: 25.5em;">
	  Approved Quantity: <b><u>' .$approveQuantity.' </u></b>&nbsp;&nbsp; 
	 </td>
	 </tr>
	 <tr><td colspan="8" style="line-height: 25.5em;">
	  Items Pick From: <b><u>' .$Dept.' </u></b>department and Room No: <b><u>' .$RoomNo.'</u></b>&nbsp;&nbsp; 
	 </td>
	 </tr>
	  <tr><td colspan="8" style="line-height: 25.5em;">
	  Items to be return in: <b><u>' .$Validity.' </u></b>days &nbsp;&nbsp; 
	 </td>
	 </tr>
	 	  <tr><td colspan="8" style="line-height: 25.5em;">
	  Items to be return on Date: <b><u>' .$returnDate1.' </u></b> &nbsp;&nbsp; 
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
	 	 <tr><td &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;>
	  </td>
	 
	 </tr>
	 <tr><td &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;>
	  </td>
	 
	 </tr>


	 
	 <tr><td colspan="8" style="line-height: 25.5em;">
	 Signature of Admin Department &nbsp;&nbsp; 
	  </td>
	 
	 </tr>
	 
	 
      </table> 		 
      ';
      // output the HTML content
   //    $obj_pdf->writeHTML($html, true, false, true, false, '');	 
          
       $obj_pdf->writeHTML($content);  
       $obj_pdf->Output('sample.pdf', 'I');  
   
 ?>  
 