<?php

require_once '../core/init.php';
	$no = $_POST['ih'];

	$query="SELECT `roomType`, `roomCatagory`, `mealPlan`, `checkIn`, `checkOut`, `roomCount`, `rate`, `night` FROM `voucherd` where  ID_H='$no' ";
	$dataSet=mysqli_query($connection,$query);

	//2D array to store data values
	//$array[][];
	$count=0;
	while ($row=mysqli_fetch_array($dataSet)) {

			$array[$count][]=$row['roomType'];
			$array[$count][]=$row['roomCatagory'];
			$array[$count][]=$row['mealPlan'];
			$array[$count][]=$row['checkIn'];
			$array[$count][]=$row['checkOut'];
			$array[$count][]=$row['roomCount'];
			$array[$count][]=$row['rate'];
			$array[$count][]=$row['night'];

			$count+=1;

	}

	$obj= json_encode($array);
	echo$obj;

	?>
