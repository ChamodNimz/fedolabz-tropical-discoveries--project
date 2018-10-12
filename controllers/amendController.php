<?php 
	require_once '../core/init.php';
	require_once '../helpers/helpers.php';

	$hotelName=$_POST['hotelName'];
	$voucherNo=$_POST['voucherNo'];
	$voucherDate=$_POST['voucherDate'];
	$type=$_POST['roomType'];
	$receivedFrom=$_POST['receivedFrom'];
	$amendCount=$_POST['amendCount'];

	//id_h gen
	$id_hNew=idIncrement($connection);

	//old value
	$query="SELECT `ID_H` FROM `voucherh` where status='pending' and voucherNo='$voucherNo' ";
	$dataSet=mysqli_query($connection,$query);
	$row=mysqli_fetch_array($dataSet);

	$id_hOld = (int)$row[0];
	
	//update status
	$query= "UPDATE `voucherh` SET `status`='amended',`AmendCount`= '$amendCount' where ID_H= '$id_hOld' ";
	$rs=mysqli_query($connection,$query);

	if($rs==1){
		echo "success";
	}
	else{
		echo "error";
	}

	//insert into voucher Header
	$query="INSERT INTO `voucherh`(`ID_H`, `voucherNo`, `voucherDate`, `hotelName`, `type`, `status`, `AmendCount`, `conformationCode`, `receivedFrom`) VALUES ( '$id_hNew',
													'$voucherNo',
													'$voucherDate',
													'$hotelName',
													'$type',
													'pending',
													0,
													'',
													'$receivedFrom')";
	$rs=mysqli_query($connection,$query);

	if($rs==1){
		echo "success";
	}
	else{
		echo "error";
	}

	//injecting details table values
	$row=$_POST['row'];
	$array=array_chunk($row,11,false);
	$count=0;

		for ($i=0; $i < sizeof($array) ; $i++) { 
			
			$row=$array[$i];
			
		
					$query="INSERT INTO `voucherd`(`ID_H`, `voucherNo`, `guestName`, `roomType`, `roomCatagory`, `mealPlan`, `checkIn`, `checkOut`, `roomCount`, `extras`, `specialRequest`, `ADL`, `CHD`) VALUES (
				'$id_hNew',
				'$voucherNo',
				'$row[0]',
				'$row[1]',
				'$row[2]',
				'$row[3]',
				'$row[4]',
				'$row[5]',
				'$row[8]',
				'$row[9]',
				'$row[10]',
				'$row[6]',
				'$row[7]')";
				$result=mysqli_query($connection,$query);	
				if($result==1){
					$count+=1;
				}
				else{
					echo"Error";
				}


		}

		header("Location: ../core/printer.php?id=".$id_hNew."");

	

?>