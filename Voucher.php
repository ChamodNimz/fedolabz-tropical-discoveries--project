<?php 
require_once 'core/init.php';

if(!isAdmin() && !isUser()){
  header("Location: index.php");

}
?>

<!doctype html>
<html lang="en">
<head>
  <title>LuxuryHotel a Hotel Template</title>
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

 <?php 

  if($_POST){

    require_once 'core/init.php';

    //id_h gen
    function idIncrement($con){

      $query="select max(id_h) from voucherh";
      $dataSet=mysqli_query($con,$query);
      $row=mysqli_fetch_array($dataSet);
      $a=(int)$row[0]+1;

      return $a;
    }
    $id_h=idIncrement($connection);


  //username get

    $user = $_SESSION['userID'];
    $query="select username from user where id ='$user'";
    $data = mysqli_query($connection,$query);
    $username = mysqli_fetch_array($data);

  //variables
    $hotelName=$_POST['hotelName'];
    $voucherNo=$_POST['voucherNo'];
    $voucherDate=$_POST['voucherDate'];
    $receivedFrom=$_POST['receivedFrom'];
    $nationality= $_POST['nationality'];
    $guestName= $_POST['guestName'];
    $typeName  = $_POST['guestTitle'];
    $roomCat= $_POST['roomCat'];
    $mealPlan= $_POST['mealPlan'];
    $arriveDate= $_POST['arriveDate'];
    $depDate= $_POST['depDate'];
    $roomCount= $_POST['roomCount'];
    $night= $_POST['night'];
    $receivedCode =$_POST['receivedCode'];
    // $single= $_POST['single'];
    // $double= $_POST['double'];
    //$triple= $_POST['triple'];
    $rate= $_POST['rate'];
    $extra= $_POST['extra'];
    $message= $_POST['message'];

    // table array to make voucherd table
    $row=$_POST['row'];
    $array=array_chunk($row,8,false);

    date_default_timezone_set("Asia/Dili");

    //get count value to update the table hotel
    $count = explode("-",$voucherNo);

//voucher header injection
  $query="INSERT INTO `voucherh`(`ID_H`, `voucherNo`, `voucherDate`, `hotelName`, `typeName`, `status`, `AmendCount`, `conformationCode`, `receivedFrom`, `receivedCode`, `nationalty`, `extra`, `specialRequests`, `guestName`,`user`) VALUES (
  '$id_h',
  '$voucherNo',
  '$voucherDate',
  '$hotelName',
  '$typeName',
  'pending',
  '0',
  '',
  '$receivedFrom',
  '$receivedCode',
  '$nationality',
  '$extra',
  '$message',
  '$guestName',
  '$username[0]')";

  $result=mysqli_query($connection,$query);
  if($result==1){

    //update count of hotel table

      $query="update hotel set cnt= '$count[2]'  where hotelName='$hotelName' ";
      $result = mysqli_query($connection,$query);
      if($result==1){

       //voucher details injection
    $count=0;
    for ($i=0; $i < sizeof($array) ; $i++) { 
      
          $row=$array[$i];
      
    
          $query="INSERT INTO `voucherd`(`ID_H`, `voucherNo`, `roomType`, `roomCatagory`, `mealPlan`, `checkIn`, `checkOut`, `roomCount`, `rate`, `night`) VALUES (
        '$id_h',
        '$voucherNo',
        '$row[2]',
        '$row[0]',
        '$row[1]',
        '$row[3]',
        '$row[4]',
        '$row[6]',
        '$row[7]',
        '$row[5]')";
        $result=mysqli_query($connection,$query); 
        if($result==1){
          $count+=1;
        }
        else{
          echo"Error";
        }


    }

    // log
    if(!log_data($connection,"voucher",$voucherNo,$username,$id_h)){
      echo "error when loggin data";
    }

    
    echo '<script type="text/javascript" >M.toast({html: "voucher created"});</script>';
    echo '<script type="text/javascript">window.open("core/printer.php?id='.$id_h.' ","_blank");</script>';
      }
      else{

        echo '<script type="text/javascript" >M.toast({html: "Error adding this voucher"});</script>';
      }
  }
  else{
    echo"error";
  }

  
}


  ?>

  <form action="Voucher.php" method="post" id="newVoucherForm">
    <section class="site-section" style="padding-top: 50px;">
      <div class="container">
        <div class="row">
          <div >
            <h3 class="mb-5 text-warning display-4">Create New Voucher</h3>


            <div class="row">

              <div class="col-md-3 form-group">
                <label for="hotelName">Hotel Name</label>
                <select name="hotelName" id="hotelName" class="form-control" required >
                  <option value="">Select</option>
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
                <?php 

                $query="select name from receivedfrom";
                $dataSet=mysqli_query($connection,$query);
                while($row=mysqli_fetch_array($dataSet)):

                  ?>
                  <option value="<?php echo $row['name'] ?>"><?php echo "".$row['name'].""; ?></option>
                <?php  endwhile; ?>                       
              </select>
            </div>

            <div class="col-md-3 form-group">
              <label >Voucher No</label><br>
              <label for="VoucherNo" id="voucherNoLabel" hidden><b><span id="hotelCode"></span>-<span id="month"><?= date("F") ?></span>-<span id="voucherCount"></span></b></label>
              <input type="text" name="voucherNo" value="" readonly id="voucherNo" required class="form-control">
            </div>

            <div class="col-md-3 form-group">
              <label >Voucher Date</label>
              <label for="voucherDate"><b></b></label>
              <input type="text" name="voucherDate" value="<?php echo"".date("Y-m-d").""; ?>" readonly required class="form-control">
            </div>



          </div> 




        <div class="row">

              <div class="col-md-2 form-group">
              <label for="receivedFrom">Received Code</label>
              <input type="text" id="receivedCode"  class="form-control" name="receivedCode" autocomplete="off" required>
              </div>

              <div class="col-md-2 form-group">
              <label for="title">Guest title</label>
              <select name="guestTitle" id="title" class="form-control" required>
                <option value="">Select</option>
                <option value="Mr">Mr.</option>
                <option value="Mrs">Mrs.</option>
                <option value="Ms">Ms</option>
                <option value="Miss">Miss</option>
                <option value="Dr">Dr</option>
              </select>
              </div>

              <div class="col-md-6 form-group">
              <label for="gusetName">Guest Name</label>
              <input type="gusetName" id="gusetName"  class="form-control" name="guestName" autocomplete="off" required>
              </div>

              <div class="col-md-2 form-group">
              <label for="nationality">Nationalty</label>
              <select name="nationality" id="nationality" class="form-control" required>
                <option value="">Select</option>
                <?php 

                $query="select name from nationalty";
                $dataSet=mysqli_query($connection,$query);
                while($row=mysqli_fetch_array($dataSet)):
                  ?>
                <option value="<?=$row['name']; ?>"><?=$row['name']; ?></option>
              <?php endwhile; ?>
              </select>
              </div>
        </div> 

        <div class="row">
          <div class="col-md-12 form-group">
            <label for="Extra">Extra</label>
            <input type="text" id="Extra" class=" form-control " name="extra">
          </div>
        </div>

        <div class="row">
          <div class="col-md-12 form-group">
            <label for="message">special requests</label>
            <textarea name="message" id="message" class="form-control " cols="30" rows="3"></textarea>
          </div>
        </div>

         <div class="row">


            <div class="col-md-3 form-group">
              <label for="roomCatogary">Room Category</label>
              <select name="roomCat" id="roomCatogary" class="form-control" >
                <option value="">Select</option>

                <?php 

                $queryCat="select catagory from roomcatagory";
                $dataSetCat=mysqli_query($connection,$queryCat);
                while($rowCat=mysqli_fetch_array($dataSetCat)):
                  ?>
                  <option value="<?= $rowCat['catagory']; ?>" ><?= $rowCat['catagory']; ?></option>
                <?php endwhile; ?>                       
              </select>
            </div>

            <div class="col-md-3 form-group">
              <label for="roomCatogary">meal plan</label>
              <select name="mealPlan" id="mealPlan" class="form-control" >
                <option value="">Select</option>
                <?php 

                $query="select plan from mealplan";
                $dataSet=mysqli_query($connection,$query);
                while($row=mysqli_fetch_array($dataSet)):

                  ?>
                  <option value="<?= $row['plan']; ?>"><?= $row['plan']; ?></option>
                <?php endwhile; ?>
              </select>
            </div>



            <div class="col-sm-3 form-group">
              <label for="">Arrival Date</label>
              <div style="position: relative;">
                <span class="fa fa-calendar icon" style="position: absolute; right: 10px; top: 10px;"></span>
                <input type='text' class="form-control" id='arrival_date' name="arriveDate"   />
              </div>
            </div>

            <div class="col-sm-3 form-group">
              <label for="">Departure Date</label>
              <div style="position: relative;">
               <span class="fa fa-calendar icon" style="position: absolute; right: 10px; top: 10px;"></span>
               <input type='text'  class="form-control" id='departure_date' name="depDate" />
             </div>
           </div>
           
           </div>
           <div class="row">

            <div class="col-md-3 form-group">
             <label for="room">Night</label>
             <input class="form-control" value=""  readonly="" id="nightDays" name="night">
              <!-- <select name="night" id="night" class="form-control" >
                <option value="">Select</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select -->
           </div>
            

          <div class="col-md-3 form-group">
             <label for="roomType">Room Type</label>
              <select name="roomType" id="roomType" class="form-control"  >
               <option value="">Select</option>
               <option value="1">1 </option>
               <option value="2">2 </option>
               <option value="3">3 </option>
               <option value="4">4 </option>
              
              </select>
           </div>

          <div class="col-md-3 form-group">
             <label for="rooms">Rooms</label>
              <select name="roomCount" id="rooms" class="form-control"  >
               <option value="">Select</option>
               <option value="1">1 </option>
               <option value="2">2 </option>
               <option value="3">3 </option>
               <option value="4">4 </option>
               <option value="5">5 </option>
               <option value="6">6 </option>
               <option value="7">7 </option>
              </select>
           </div>

          <div class="col-md-3 form-group">
            <label for="room">Rate</label>
            <input type="text" id="rate" class=" form-control " name="rate" >
           </div>
  

        </div>
        
     <div class="row">
        <div class="col-md-2 form-group">
          <button class="btn btn-warning" id="add" type="button">Add</button>
        </div>

        <div class="col-md-2 form-group">
          <button class="btn btn-danger" id="btnRemove" type="button">Remove</button>
        </div>
      </div> 
        


        <!-- </form> -->
      </div>
      <div class="col-md-12">

      </div>

    </div>
  </div>
</section>

<div class="container-fluid p-5">
  <table class="table" id="cart-table" >
    <thead>
      <tr>
        <th>Room Category</th>
        <th>meal plan</th>
        <th>Room Type</th> 
        <th>Arrival Date</th>
        <th>Departure Date</th>
        <th>Night</th> 
        <th>Rooms</th> 
        <th>Rate</th>  
       
      </tr>
    </thead>

    <tbody>

    </tbody>

  </table>
  <div class="row">
      <div class="col-md-6">
          <input type="submit" value="Save & Create Voucher" class="btn btn-warning">
      </div>
  </div>
</div>



</form>
<!-- END section -->

<footer class="site-footer">
  <div class="container">

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
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script type="text/javascript">
    //data table init
  $(document).ready( function () {
    $('#cart-table').DataTable();
});

  $('#cart-table').DataTable( {
    paging: false,
    searching:false,
    ordering:false
} );

  //row deletion
  $(document).ready(function() {

    var table = $('#cart-table').DataTable();
 
    $('#cart-table tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );
 
    $('#btnRemove').click( function () {
        table.row('.selected').remove().draw( false );
    } );
} );

  $(document).ready(function() {
    var t = $('#cart-table').DataTable();
    
 
    $('#add').on( 'click', function () {
        t.row.add( [
            '<input class="form-control" required readonly name="row[]" id="" value="'+$("#roomCatogary").find(":selected").val()+'">',
            '<input class="form-control" required readonly name="row[]" id="" value="'+$("#mealPlan").find(":selected").val()+'">',
            '<input class="form-control" required readonly name="row[]" id="" value="'+$("#roomType").find(":selected").val()+'">',
            '<input class="form-control" required readonly name="row[]" id="" value="'+$('#arrival_date').val()+'">',
            '<input class="form-control" required readonly name="row[]" id="" value="'+$("#departure_date").val()+'">',
            '<input class="form-control" required readonly name="row[]" id="" value="'+$("#nightDays").val()+'">',
            '<input class="form-control" required readonly name="row[]" id="" value="'+$("#rooms").find(":selected").val()+'">',
            '<input class="form-control" required readonly name="row[]" id="" value="'+$("#rate").val()+'">'
        ] ).draw( false );
 
        clearFields();
    } );

} );

  function clearFields(){

    //fields clear
    $('#arrival_date').val("");//date clear
    $('#departure_date').val("");//depart date
    $('#roomType').val("");
    $('#roomCatogary').val("");
    $('#nightDays').val("");
    $('#rate').val("");
    $('#rooms').val("");
    $('#mealPlan').val("");

  }

</script>
</body>
</html>