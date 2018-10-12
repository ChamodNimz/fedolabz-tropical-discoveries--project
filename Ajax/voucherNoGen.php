<?php

require_once '../core/init.php'; 
require_once '../security/filters.php'; 
	
	
	$hotelName = sanitize($_POST['hotelName']);

	//hotelCode 
	$query="select hotelCode from hotel where hotelName = '$hotelName' ";
	$data=mysqli_query($connection,$query);	
	$hotelCode=mysqli_fetch_array($data);

	//voucher count
	$query="select cnt from hotel where hotelName= '$hotelName' ";
	$data=mysqli_query($connection,$query);	
	$count=mysqli_fetch_array($data);

	//max id for voucher making
	$query="select max(ID_H) from voucherh ";
	$data=mysqli_query($connection,$query);	
	$id=mysqli_fetch_array($data);

	$obj = new stdClass();
	$obj->hotelCode = $hotelCode[0];
	$obj->count = $count[0];
	$obj->vid = $id[0];
	$data=json_encode($obj);
	echo''.$data.'';
 ?>