<?php 
session_start();

define('BASEURL','colombo25_hotel/' );

$connection=mysqli_connect("localhost","root","","colombo25_hotel");


		if(mysqli_connect_error()){
			echo"connection failed to esatablish : Error Code - ".mysqli_connect_error()."";
		}



function isLoggedIn(){

	if(isset($_SESSION['userID'])){

		return true;
	}
	else{
		
		return false;
	}

}

function isAdmin(){
	if(isset($_SESSION['userID']) && $_SESSION['userType']=='admin'){
		return true;
	}
	else{
		return false;
	}
}

function isUser(){
	if(isset($_SESSION['userID']) && $_SESSION['userType']=='user'){
		return true;
	}
	else{
		return false;
	}
}

	//  log data when acting
		//$con - connection
		//$action - action type ex:- amend or voucher or cancell
	 function log_data($con,$action,$vNo,$userName,$id_h){
	 	date_default_timezone_set('Asia/Colombo');

	 	if(mysqli_query($con,"INSERT INTO `userlog`( `voucherNo`, `userName`, `date`, `time`, `action`, `ID_H`) VALUES ('$vNo',
	 		'$userName[0]',
	 		'".date('Y-m-d')."',
	 		'".date("H:i")."',
	 		'$action',
	 		'$id_h')")){

	 		return true;
	 	}
	 	else{
	 		return false;
	 	}
	 	
	 }
		
?>