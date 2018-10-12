<?php 
require_once 'core/init.php';

if(!isAdmin() && !isUser()){
  header("Location: index.php");

}
?>
<!doctype html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900|Rubik:300,400,700" rel="stylesheet">

  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">

  <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css">

  <!-- Theme Style -->
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

  <header role="banner">

      <nav class="navbar navbar-expand-md navbar-light text-dark bg-warning">
    <div class="container">


      <div class="collapse navbar-collapse navbar-light" id="navbarsExample05">
        <ul class="navbar-nav ml-auto pl-lg-5 pl-0">
          <li class="nav-item">
            <a class="nav-link " href="Voucher.php">New Voucher</a>
          </li>

          <li class="nav-item">
            <a class="nav-link " href="Amends.php">Amends</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="search.php">Report</a>
          </li>
          <!--<li class="nav-item">-->
          <!--  <a class="nav-link " href="Report.php">Report</a>-->
          <!--</li>-->
          <!--<li class="nav-item">-->
          <!--  <a class="nav-link " href="searchOneByOne.php">Individual Search</a>-->
          <!--</li>-->
          <li class="nav-item">
            <a class="nav-link " href="done.php">Finish</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="printVoucher.php">Print Voucher</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="rePrintCancelled.php">Print  Cancelled Voucher</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="rePrintAmend.php">Print  Amended Voucher</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="Cancel.php">Cancel</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="Conformation.php">Confirmation</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="admin/index.php">Add</a>
          </li>
          <!--<li class="nav-item dropdown">-->
          <!--  <a class="nav-link dropdown-toggle" href="rooms.php" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Report</a>-->
          <!--  <div class="dropdown-menu" aria-labelledby="dropdown04">-->
           <!--   <a class="dropdown-item" href="rooms.php">Room Videos</a>
          <!--    <a class="dropdown-item" href="rooms.php">Presidential Room</a>-->
          <!--    <a class="dropdown-item" href="rooms.php">Luxury Room</a>-->
          <!--    <a class="dropdown-item" href="rooms.php">Deluxe Room</a>-->
          <!--  </div>-->
          <!--</li>-->
          <li class="nav-item">
            <a href="admin/logout.php" class=" btn btn-danger btn-sm rounded"  role="button">Logout</a>
          </li>
        </ul>

      </div>
    </div>
  </nav>
  </header>

  <section class="">
    <div class="container-fluid pt-5 mt-5 p-5">
      <div class="row">
        <div >
          <h3 class="mb-5 text-warning display-4">Search </h3>
          <form class="col-mb-12" action="#" method="post">

            <div class="row">

             <div class="col-md-3 form-group">
              <label for="hotelName">Hotel Name</label>
              <select name="hotelName" id="hotelName" class="form-control" required >
                <option value="">Select</option>
                <option value="">All</option>
                <?php 

                $query="select hotelName from hotel";
                $dataSet=mysqli_query($connection,$query);
                while($row=mysqli_fetch_array($dataSet)):

                  ?>
                  <option value="<?php echo''.$row["hotelName"].'';?>"><?php echo"".$row['hotelName'].""; ?>

                </option>
              <?php  endwhile; ?>
            </select>
          </div>



          <div class="col-md-3 form-group">
            <label for="receivedFrom">Received From</label>
            <select name="receivedFrom" id="receivedFrom" class="form-control" required>
              <option value="">Select</option>
              <option value="">All</option>
              <?php 

              $query="select name from receivedfrom";
              $dataSet=mysqli_query($connection,$query);
              while($row=mysqli_fetch_array($dataSet)):

                ?>
                <option value="<?php echo $row['name'] ?>"><?php echo "".$row['name'].""; ?></option>
              <?php  endwhile; ?>                       
            </select>

          </div>

          <div class="col-sm-3 form-group">
           <label for="">From</label>
           <div style="position: relative;">
            <span class="fa fa-calendar icon" style="position: absolute; right: 10px; top: 10px;"></span>
            <input type='text' class="form-control" id='arrival_date' name="arrive" />
          </div>
        </div>

        <div class="col-sm-3 form-group">
         <label for="">To</label>
         <div style="position: relative;">
          <span class="fa fa-calendar icon" style="position: absolute; right: 10px; top: 10px;"></span>
          <input type='text' class="form-control" id='departure_date' name="dep" />
        </div>
      </div>

      <div class="col-md-3 form-group">
        <label for="nationality">Nationalty</label>
        <select name="nationality" id="nationality" class="form-control" required>
          <option value="">Select</option>
          <option value="">All</option>
          <option value="Single">Sri lankan</option>
          <option value="Double">Foreigner</option>
          <option value="Triple">Triple</option>
          <option value="Family">Family</option>
        </select>
      </div>



    </div> 

    <div class="row mt-4 mb-4">
     <div class="col-md-6 form-group">
      <button class="btn btn-warning" type="submit">Search</button>
    </div>
  </div>


  <table id="table" class="table">
   <tr>
    <th>ID</th>
    <th>Voucher No</th>
    <th>Voucher Date</th> 
    <th>Hotel Name</th>
    <th>AmendCount</th>
    <th>Received From</th>
    <th>guestName</th>
    <th>Nation</th>
    <th>roomCat</th>
    <th>meal</th>
    <th>arrive</th>
    <th>dep</th>
    <th>rooms</th>
    <th>night</th>
    <th>single</th>
    <th>double</th>
    <th>triple</th>
    <th>user</th>
    <th>rate</th>

  </tr>
  <?php 
  if(isset($_POST['hotelName'])):

    require_once 'core/init.php';

    $hotelName=$_POST['hotelName'];
    $receivedFrom = $_POST['receivedFrom'];
    $arrive = $_POST['arrive'];
    $dep = $_POST['dep'];
    $nationality = $_POST['nationality'];
    $arrive=date("Y-m-d",strtotime($arrive));
    $dep=date("Y-m-d",strtotime($dep));

    $query="SELECT `ID_H`, `voucherNo`, `voucherDate`, `hotelName`, `AmendCount`, `receivedFrom`, `guestName`, `nationality`, `roomCategory`, `mealPlan`, `arrivalDate`, `departureDate`, `roomsCount`, `nightCount`, `single`, `double`, `triple`, `user`, `rate` FROM `voucherh` WHERE 
    hotelName like '%$hotelName' 
    and receivedfrom like '%$receivedFrom' 
    and nationality like '%$nationality' 
    and voucherDate between '$arrive' 
    and '$dep'
    and status ='done' ";

    $dataSet=mysqli_query($connection,$query);

    while ($row=mysqli_fetch_array($dataSet)):  

     ?>

     <tr>
      <td><?php echo $row[0] ?></td>
      <td><?php echo $row[1] ?></td>
      <td><?php echo $row[2] ?></td>
      <td><?php echo $row[3] ?></td>
      <td><?php echo $row[4] ?></td>
      <td><?php echo $row[5] ?></td>
      <td><?php echo $row[6] ?></td>
      <td><?php echo $row[7] ?></td>
      <td><?php echo $row[8] ?></td>
      <td><?php echo $row[9] ?></td>
      <td><?php echo $row[10] ?></td>
      <td><?php echo $row[11] ?></td>
      <td><?php echo $row[12] ?></td>
      <td><?php echo $row[13] ?></td>
      <td><?php echo $row[14] ?></td>
      <td><?php echo $row[15] ?></td>
      <td><?php echo $row[16] ?></td>
      <td><?php echo $row[17] ?></td>
      <td><?php echo $row[18] ?></td>
    </tr>
  <?php endwhile; ?>
<?php endif; ?>

</table>
<div class="row mt-4 mb-4">
 <div class="col-md-6 form-group">
  <button class="btn btn-warning" type="button" onclick="printDoc()">Print</button>
</div>
</div>

</form>

</div>


</div>
</div>
</section>
<!-- END section -->



<footer class="site-footer">
  <div class="container">
      <!-- 
         <div class="row mb-5">
          <div class="col-md-4">
            <h3>Phone Support</h3>
            <p>24/7 Call us now.</p>
            <p class="lead"><a href="tel://">+ 1 332 3093 323</a></p>
          </div>
          <div class="col-md-4">
            <h3>Connect With Us</h3>
            <p>We are socialized. Follow us</p>
            <p>
              <a href="#" class="pl-0 p-3"><span class="fa fa-facebook"></span></a>
              <a href="#" class="p-3"><span class="fa fa-twitter"></span></a>
              <a href="#" class="p-3"><span class="fa fa-instagram"></span></a>
              <a href="#" class="p-3"><span class="fa fa-vimeo"></span></a>
              <a href="#" class="p-3"><span class="fa fa-youtube-play"></span></a>
            </p>
          </div>
          <div class="col-md-4">
            <h3>Connect With Us</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime, odio.</p>
            <form action="#" class="subscribe">
              <div class="form-group">
                <button type="submit"><span class="ion-ios-arrow-thin-right"></span></button>
                <input type="email" class="form-control" placeholder="Enter email">
              </div>
              
            </form>
          </div>
        </div>
      -->
      <div class="row justify-content-center">
        <div class="col-md-7 text-center">
          &copy; <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved  <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">FEDO-LAB</a>
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        </div>
      </div>
    </div>
  </footer>
  <!-- END footer -->

  <!-- loader -->
  <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214"/></svg></div>

  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.0.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>

  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/magnific-popup-options.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>

  <script>

    $('#arrival_date, #departure_date').datepicker({});

    function printDoc(){
      this.print();
    }

  </script>

  <script src="js/main.js"></script>
</body>
</html>