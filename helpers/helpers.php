<?php 
include '../core/init.php';

	function idIncrement($con){

		$query="select max(id_h) from voucherh";
		$dataSet=mysqli_query($con,$query);
		$row=mysqli_fetch_array($dataSet);
		$a=(int)$row[0]+1;

		return $a;
	}

 ?>