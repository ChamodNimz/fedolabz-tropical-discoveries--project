<?php require_once 'core/init.php' ?>
<?php 

	if(isset($_POST['email'])){
			
			require_once 'security/filters.php';
			

			$username=sanitize($_POST['email']);
			$password=sanitize($_POST['pass']);
			
			$r=mysqli_query($connection,"select id,username,password,type  from user where username='$username' ");
			
			$row=mysqli_fetch_assoc($r);
			if(password_verify($password,$row['password'])){
				
				$_SESSION['userID']=$row['id'];
				$_SESSION['userType'] = $row['type'];
				$_SESSION['username']= $row['username'];
				header("Location: Voucher.php");
			}
			else{
				$Errorflag=1;
				echo 'error logging'; 
			}
		}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>FEDO-LAB Software</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>

<style type="text/css">
	
	#toast-container {
  display: block;
  position: fixed;
  z-index: 10000;
}

@media only screen and (max-width: 600px) {
  #toast-container {
    min-width: 100%;
    bottom: 0%;
  }
}

@media only screen and (min-width: 601px) and (max-width: 992px) {
  #toast-container {
    left: 5%;
    bottom: 7%;
    max-width: 90%;
  }
}

@media only screen and (min-width: 993px) {
  #toast-container {
    top: 10%;
    right: 7%;
    max-width: 86%;
  }
}

.toast {
  border-radius: 2px;
  top: 35px;
  width: auto;
  margin-top: 10px;
  position: relative;
  max-width: 100%;
  height: auto;
  min-height: 48px;
  line-height: 1.5em;
  background-color: orange;
  padding: 10px 25px;
  font-size: 1.1rem;
  font-weight: 300;
  color: #fff;
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
      -ms-flex-align: center;
          align-items: center;
  -webkit-box-pack: justify;
  -webkit-justify-content: space-between;
      -ms-flex-pack: justify;
          justify-content: space-between;
  cursor: default;
}

.toast .toast-action {
  color: red;
  font-weight: 500;
  margin-right: -25px;
  margin-left: 3rem;
}

.toast.rounded {
  border-radius: 24px;
}

@media only screen and (max-width: 600px) {
  .toast {
    width: 100%;
    border-radius: 0;
  }
}

</style>
</head>
<body>	
	<div class="limiter">

		<div class="container-login100">

			<div class="wrap-login100">

				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG"  >
				</div>

				<form class="login100-form" action="#" method="post">
					

					<span class="login100-form-title">
						Tropical Discoveries<br>User Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email" autocomplete="off">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Login
						</button ><br><br><br>
						
						<h6>FEDO-LAB Production</h6>
					</div>

					<div class="container-login100-form-btn">
						
					
					</div>

	
				</form>
			</div>
		</div>
	</div>
	

	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		});
	</script>
<!--===============================================================================================-->
	<script src="js/login.js">
	</script>
	<!-- Compiled and minified JavaScript -->
</body>
</html>
