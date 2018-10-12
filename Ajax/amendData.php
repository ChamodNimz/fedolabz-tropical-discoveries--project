<?php 
	require_once '../core/init.php';

//header table get
	$no = $_POST['no'];

	$query="SELECT `ID_H`, `hotelName`, `AmendCount`,`typeName`, `receivedFrom`, `receivedCode`, `nationalty`, `extra`, `specialRequests`, `guestName` FROM `voucherh` where status='pending' and voucherNo='$no' ";
	$dataSet=mysqli_query($connection,$query);
	$row1=mysqli_fetch_array($dataSet);


	$query="SELECT count(status) as cnt FROM `voucherh` WHERE status ='amended' and voucherNo='$no'";
	$dataSet=mysqli_query($connection,$query);
	$row=mysqli_fetch_array($dataSet);

	$data= array_merge($row1,$row);
	$a=json_encode($data);
	echo $a;
 ?>