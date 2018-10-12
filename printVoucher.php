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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>

  <!-- Theme Style -->
  <link rel="stylesheet" href="css/style.css">
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

  <div class="jumbotron">
    <h1 class="display-4 text-warning shadow-lg">Print Voucher</h1>
  </div>

  <div class="container p-5">
    <table class="table p-5 mt-5 table-striped" id="table-printVoucher" >
      <thead>
        <tr>
          <th>ID</th>
          <th>Vchr No</th>
          <th>Voucher Date</th> 
          <th>Hotel Name</th>
          <th>Status</th>
          <th>Guest Name</th>
        </tr>    
      </thead>

      <tbody>
        <?php 
            require_once 'core/init.php';

            $query="SELECT `ID_H`, `voucherNo`, `voucherDate`, `hotelName`, `status`, `guestName` FROM `voucherh` where status='pending' ";
            $dataSet = mysqli_query($connection,$query);
            while ($row=mysqli_fetch_array($dataSet)):
         ?>
        <tr>
          <td ><button class="btn btn-sm btn-info mr-3">Print</button><?php echo$row['ID_H'] ?></td>
          <td><?php echo$row['voucherNo'] ?></td>
          <td><?php echo$row['voucherDate'] ?></td>
          <td><?php echo$row['hotelName'] ?></td>
          <td> <span class="badge badge-success p-2"><?php echo$row['status'] ?></span></td>
          <td><?php echo$row['guestName'] ?></td>
        </tr>
      <?php endwhile; ?>
      </tbody>

    </table>
  </div>
  
  <!-- END section -->


  
  <footer class="site-footer" style="padding-top: 100px;margin-top: 290px;">
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
      <!--  -->
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
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

  <script>
    
    $('#arrival_date, #departure_date').datepicker({});

  </script>

  <script type="text/javascript">


    //data table init
  $(document).ready( function () {
    $('#table-printVoucher').DataTable();
});


  //row deletion
  $(document).ready(function() {

    var table = $('#table-printVoucher').DataTable();
 
    table.on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }

    });

    //print btn
    var id_h;
    $('#table-printVoucher tbody').on('click','td',function(){

        id_h=table.cell(this).data().replace('<button class="btn btn-sm btn-info mr-3">Print</button>','');

          window.open("core/printer.php?id="+id_h,"_blank");
          id_h=0;
    });

  });

</script>
  <script src="js/main.js"></script>
</body>
</html>