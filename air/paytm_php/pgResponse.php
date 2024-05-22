<?php

include '../../conn.php';


header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");


// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;

$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		//echo "<b>Transaction status is success</b>" . "<br/>";
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
		
			$ORDER_ID = $_POST["ORDER_ID"];
			$TXN_AMOUNT = $_POST["TXN_AMOUNT"];
			$DATE=$_POST['TXNDATE'];
			$status=$_POST['STATUS'];
            $MODE=$_POST['PAYMENTMODE'];
			
		$query="UPDATE payment_details SET payment_date='$DATE',payment_mode='$MODE',txnstatus='$status'where ref='$ORDER_ID'";	
		if(!mysqli_query($conn,$query))
			echo mysqli_error($conn);
		

		$sql1="UPDATE ticket_details set booking_status='CONFIRMED' where  ref='$ORDER_ID' ";
		if(!mysqli_query($conn,$sql1))
			echo mysqli_error($conn);
		
	
	?>
	<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="row">
           <div class="col-md-6 mx-auto mt-5">
              <div class="payment">
                 <div class="payment_header">
                    <div class="check"><i class="bx bx-check" aria-hidden="true"></i></div>
                 </div>
                 <div class="content">
                    <h1>Payment Success !</h1>
                    <p>ORDER ID :<?php echo $ORDER_ID ?>  </p>
                    <a href="../air.php">Back</a>
                 </div>
                 
              </div>
           </div>
        </div>
     </div>
</body>
</html>
	<?PHP
	}
	else {
		echo "<b>Transaction status is failure</b>" . "<br/>";
	}

	if (isset($_POST) && count($_POST)>0 )
	{ 
		
		//foreach($_POST as $paramName => $paramValue) {
				//echo "<br/>" . $paramName . " = " . $paramValue;
				
		//}
	}
	

}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}

?>

<?php
function genSeat($id, $type, $number)
{
    $conn = connect();
    $type_seat = $conn->query("SELECT train.first_seat as first, train.second_seat as second FROM tschedule INNER JOIN train ON train.id = tschedule.train_id WHERE tschedule.id = '$id'")->fetch_assoc();
    $me = $type_seat[$type];
    $query = $conn->query("SELECT SUM(no) AS no FROM tbooked WHERE schedule_id = '$id' AND class = '$type'")->fetch_assoc();
    $no = $query['no'];
    if ($no == null) $no = 1;
    else $no++;
    //Multiple Seats or Not
    if ($number == 1) {
        while (strlen($no) != strlen($me)) {
            $no = "0" . $no;
        }
        return strtoupper(substr($type, 0, 1)) . "$no";
    } else {
        $start = $no;
        $end = $no + ($number - 1);
        while (strlen($start) != strlen($me)) {
            $start = "0" . $start;
        }
        while (strlen($end) != strlen($me)) {
            $end = "0" . $end;
        }
        $append = strtoupper(substr($type, 0, 1));

        return $append . $start . " - " . $append . $end;
    }
}

function genCode($id, $user, $type)
{
    $conn = connect();
    $query = $conn->query("SELECT SUM(no) AS no FROM tbooked WHERE schedule_id = '$id'")->fetch_assoc();
    $no = $query['no'];
    if ($no == null) $no = 1;
    else $no++;
    $number = "";
    switch (strlen($id)) {
        case 1:
            $number = "00";
            break;
        case 2:
            $number = "0";
            break;
        default:
            $number = "0";
            break;
    }
    $code = date('Y') . "/$number" . $id . "/" . $no . mt_rand(1, 882);
	return $code;
}
?>