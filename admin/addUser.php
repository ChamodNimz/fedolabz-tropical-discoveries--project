<?php require_once '../core/init.php';
if(!isAdmin()){
  header("Location: ../index.php");

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add User</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900|Rubik:300,400,700" rel="stylesheet">

	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/animate.css">
	<link rel="stylesheet" href="../css/owl.carousel.min.css">

	<link rel="stylesheet" href="../fonts/ionicons/css/ionicons.min.css">
	<link rel="stylesheet" href="../fonts/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/magnific-popup.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css">

	<!-- Theme Style -->
	<link rel="stylesheet" href="../css/style.css">
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
    background-color: #323232;
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
    color: black;
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
	<?php include 'navigation.php'; ?>
	<div class="container shadow-lg p-5">
		<h1 class="text-warning display-4">Add User</h1>
		<hr>
		<center>

      <?php 
      require_once '../security/filters.php';


      if(isset($_POST['username'])){

       $username=sanitize($_POST['username']);
       $password=$_POST['password'];

       $hashPass=password_hash($password,PASSWORD_BCRYPT);


       $query="INSERT INTO `user`( `username`,`password`,`type`) VALUES ('$username','$hashPass','user')";
       $result=mysqli_query($connection,$query);

       if($result==1){
         echo '<script type="text/javascript" >M.toast({html: "User Successfully added"});</script>';
       }
       else{

         echo '<script type="text/javascript" >M.toast({html: "Error adding this User"});</script>';
       }

     }

     ?>

     <img src="../images/user.png" width="180" height="180" class="m-5">
     <form action="#" method="post">
      <div class="p-5">
       <label class="text-dark lead float-left">Username <span class="text-danger">*</span></label>
       <input type="text" class="form-control" name="username" required="" autocomplete="off"></input>
     </div>
     <div class="row">
      <div class="col-md-6">
        <div class="p-5">
          <label class="text-dark lead float-left">Password <span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="password" required="" autocomplete="off"></input>
        </div>
      </div>
      <div class="col-md-6">
        <div class="p-5">
          <label class="text-dark lead float-left">Re-type Password <span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="rePass" required="" autocomplete="off"></input>
        </div>
      </div>
    </div>


    <button class="btn btn-warning" type="submit">Add user</button>

  </form>

  <table class="table mt-5 p-5">
    <thead>
      <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Password</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      $query="select * from user";
      $data=mysqli_query($connection,$query);
      while($row=mysqli_fetch_array($data)):
       ?>
       <tr>
        <td><?php echo $row['id'] ?></td>
        <td><?php echo $row['username'] ?></td>
        <td>xxxxxxxxxxxxxxx</td>
      </tr>
    <?php endwhile; ?>
  </tbody>
</table>

</center>
</div>
<script src="js/jquery- type="text"3.2.1.min.js"></script>
</body>
</html>
