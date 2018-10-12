<?php 
	require_once '../core/init.php';

	$vId= $_POST['id'];
	$query="update voucherh set status = 'cancelled' where ID_H = '$vId' ";
	$rs= mysqli_query($connection,$query);
	echo $rs;
 ?>