<?php 
	require_once '../core/init.php';
	require_once '../helpers/helpers.php';

	//id_h gen
	$id_h=idIncrement($connection);


	//username get

	$user = $_SESSION['userID'];
	$query="select username from user where id ='$user'";
	$data = mysqli_query($connection,$query);
	$username = mysqli_fetch_array($data);

	$hotelName=$_POST['hotelName'];
	$voucherNo=$_POST['voucherNo'];
	$voucherDate=$_POST['voucherDate'];
	$receivedFrom=$_POST['receivedFrom'];
	$nationality= $_POST['nationality'];
	$guestName= $_POST['guestName'];
	$roomCat= $_POST['roomCat'];
	$mealPlan= $_POST['mealPlan'];
	$arriveDate= $_POST['arriveDate'];
	$nationality= $_POST['nationality'];
	$depDate= $_POST['depDate'];
	$roomCount= $_POST['roomCount'];
	$night= $_POST['night'];
	$single= $_POST['single'];
	$double= $_POST['double'];
	$triple= $_POST['triple'];
	$rate= $_POST['rate'];
	$extra= $_POST['extra'];
	$message= $_POST['message'];

var_dump($_POST);

date_default_timezone_set("Asia/Dili");


//voucher header injection
	$query="INSERT INTO `voucherh`(`ID_H`, `voucherNo`, `voucherDate`, `hotelName`, `type`, `status`, `AmendCount`, `conformationCode`, `receivedFrom`, `guestName`, `nationality`, `roomCategory`, `mealPlan`, `arrivalDate`, `departureDate`, `roomsCount`, `nightCount`, `single`, `double`, `triple`, `user`, `time`, `rate`) VALUES (
				'$id_h',
				'$voucherNo',
				'$voucherDate',
				'$hotelName',
				'n/a',
				'pending',
				'0',
				'n/a',
				'$receivedFrom',
				'$guestName',
				'$nationality',
				'$roomCat',
				'$mealPlan',
				'$arriveDate',
				'$depDate',
				'$roomCount',
				'$night',
				'$single',
				'$double',
				'$triple',
				'$username[0]',
				'".date('H:i')."',
				'$rate')";

	$result=mysqli_query($connection,$query);
	if($result==1){
		echo"success";
	}
	else{
		echo"error";
	}

// //voucher details injection
// 		$count=0;
// 		for ($i=0; $i < sizeof($array) ; $i++) { 
			
// 			$row=$array[$i];
			
		
// 					$query="INSERT INTO `voucherd`(`ID_H`, `voucherNo`, `guestName`, `roomType`, `roomCatagory`, `mealPlan`, `checkIn`, `checkOut`, `roomCount`, `extras`, `specialRequest`, `ADL`, `CHD`) VALUES (
// 				'$id_h',
// 				'$voucherNo',
// 				'$row[0]',
// 				'$row[1]',
// 				'$row[2]',
// 				'$row[3]',
// 				'$row[4]',
// 				'$row[5]',
// 				'$row[8]',
// 				'$row[9]',
// 				'$row[10]',
// 				'$row[6]',
// 				'$row[7]')";
// 				$result=mysqli_query($connection,$query);	
// 				if($result==1){
// 					$count+=1;
// 				}
// 				else{
// 					echo"Error";
// 				}


// 		}

// 		echo $count. "of Rows affeted";
			
		//header("Location:../core/printer.php?id=".$id_h."");
 ?>