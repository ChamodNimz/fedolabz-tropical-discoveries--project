<?php require_once 'core/init.php';
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

  <form class="col-mb-12" action="#" method="post">
    <section style="margin-left: 400px;padding-top: 150px;">
      <div class="container-fluid">
        <div class="row">
          <div >
            <h3 class="mb-5 text-warning display-4" >Confirm Voucher</h3>
            

            <div class="row mb-5">

              <div clss="col-md-3 form-group">
                <label for="VoucherNo">Voucher No</label>
                <select name="" id="voucherNoCancel" class="form-control">
                  <option>Select no</option>
                  <?php 
                  $query="select voucherNo from voucherh where status='pending' ";
                  $dataSet=mysqli_query($connection,$query);
                  while($row=mysqli_fetch_array($dataSet)):
                   ?>
                   <option value="<?php echo $row['voucherNo'] ?>"><?php echo $row['voucherNo'] ?></option>
                   

                   <?php endwhile; ?>                      </select>
                 </div>



                 <div class="col-md-3 form-group">
                  <label for="receivedFrom">Received From</label>
                  <input type="text" name="receivedFrom" readonly id="receivedFrom" class="form-control">
                </div>

                <div class="col-md-3 form-group">
                  <label >Hotel Name</label><br>
                  <input type="text" readonly name="hotelName" class="form-control" id="hotelName" value="">
                </div>

                <div class="col-md-3 form-group">
                  <label >Voucher Date</label>
                  <input type="text" name="voucherDate"  id="voucherDate" value="<?php echo"".date("Y-m-d").""; ?>" readonly required class="form-control">
                </div>



              </div> 

              <div class="row">
                <div class="col-md-7 form-group">
                  <label for="conformationCode">Conformation code</label>
                  <input type="conformationCode" id="confCode" class="form-control ">
                </div> 
                <div class="col-md-6 form-group">
                  <input type="button" value="Confirm Voucher"  id="btnConfirm" class="btn btn-warning">
                </div>
              </div>


            </div>


          </div>
        </div>
      </section>
    </form>

    <div class="container-fluid p-5">
      <table class="table p-5 mt-5" id="table-cancel" >
        <thead>
          <tr>
          <th>ID</th>
          <th>Vchr No</th>
          <th>Voucher Date</th> 
          <th>Hotel Name</th>
          <th>Status</th>
          <th>AmendCount</th>
          <th>ConfCode</th>
          <th>RecivdFrom</th>
          <th>RevideCode</th>
          <th>Nationalty</th>
          <th>GuestName</th>
          </tr>    
        </thead>

        <tbody id="table-cancel-data">

        </tbody>

      </table>
    </div>


    <footer class="site-footer">
      <div class="container">

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

    </script>

    

    <script src="js/main.js"></script>
  </body>
  </html>