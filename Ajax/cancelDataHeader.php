<?php 
	require_once '../core/init.php';

	$vNo= $_POST['no'];
	$query="select ID_H,receivedFrom,hotelName,conformationCode from voucherh where voucherNo= '$vNo' and status='pending' ";
	$dataSet= mysqli_query($connection,$query);
	$row= mysqli_fetch_array($dataSet);

	$data = json_encode($row);
	echo $data;
 ?>