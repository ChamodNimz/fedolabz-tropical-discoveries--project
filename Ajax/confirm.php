<?php 
	require_once '../core/init.php';

	$vId= $_POST['id'];
	$code= $_POST['code'];
	$query="update voucherh set conformationCode= '$code' where ID_H = '$vId'  ";
	$rs= mysqli_query($connection,$query);
	echo $rs;
	
?>