<?php  
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception; 
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php'; 
require 'PHPMailer/src/SMTP.php';
 	
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "shop_inventory");  
	//  $aeid=intval($_GET['id']);
	  date_default_timezone_set('Asia/Kolkata');
	  $d=date('Y-m-d');
      $sql = "SELECT * FROM itemrequest where DATE_FORMAT(returnDate,'%m-%d')=DATE_FORMAT('$d','%m-%d')";  
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
		$email=$row["email"];
		//$msg="Dear".$email."\n You have not returned item".$itemName." ";
		$subject="Reminder from SSA Inventory for returning your item";
		//echo "hello".$msg;
	
$mail = new PHPMailer(true); 
$mail->isSMTP(); 
$mail->Host = 'smtp.gmail.com'; 
$mail->SMTPAuth = true; 
$mail->Username = 'ssagrawalinventory@gmail.com'; 
$mail->Password = 'kzumzglukccgqlir'; 
$mail->SMTPSecure = 'ssl'; 
$mail->Port = 465; 
$mail->setFrom('ssagrawalinventory@gmail.com'); 
$mail->addAddress($email); 
$mail->isHTML(true); 
$mail->Subject = $subject;
$mail->Body = "<h3>Dear Principal of " .$fullName."</h3>
<h4>I would like to inform that you have issued ".$itemName." in quantity of ".$approveQuantity. "</h4>
<h4>Your Last date of returning the item was ".$returnDate1. "<h4>
<h4>Kindly return it as soon as possible<h4><br/><br/>
<h4>Regards<h4>
<h4>Admin Department</h4>

";
$mail->send(); 

echo '<script language="javascript">';
echo 'alert("Reminder Email Sent Successfully")';
echo '</script>';
echo "<script>window.close();</script>";
	  }?>
