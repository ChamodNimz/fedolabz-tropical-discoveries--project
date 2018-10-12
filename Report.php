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

    <!-- Theme Style -->
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    
    <header role="banner">
     
      <nav class="navbar navbar-expand-md navbar-dark bg-light">
        <div class="container">
   

          <div class="collapse navbar-collapse navbar-light" id="navbarsExample05">
            <ul class="navbar-nav ml-auto pl-lg-5 pl-0">
              <li class="nav-item">
                <a class="nav-link active" href="Voucher.php">New Voucher</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="Amends.php">Amends</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="Cancel.php">Cancel</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="Conformation.php">Conformation</a>
              </li>
                             <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="rooms.php" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Report</a>
                <div class="dropdown-menu" aria-labelledby="dropdown04">
                  <a class="dropdown-item" href="rooms.php">Room Videos</a>
                  <a class="dropdown-item" href="rooms.php">Presidential Room</a>
                  <a class="dropdown-item" href="rooms.php">Luxury Room</a>
                  <a class="dropdown-item" href="rooms.php">Deluxe Room</a>
                </div>
             </li>
         
            </ul>
            
          </div>
        </div>
      </nav>
    </header>


    <section class="site-section">
      <div class="container">
        <div class="row">
          <div >
            <h3 class="mb-5">Create New Voucher</h3>
                <form class="col-mb-12" action="#" method="post">

                  <div class="row">

                      <div class="col-md-3 form-group">
                      <label for="hotelName">Hotel Name</label>
                      <select name="" id="hotelName" class="form-control">
                        <option value="">1 hotel</option>
                        <option value="">2 hotel</option>
                        <option value="">3 hotel</option>
                        <option value="">4 hotel</option>
                        <option value="">5 hotel</option>
                      </select>
                      </div>



                      <div class="col-md-3 form-group">
                      <label for="receivedFrom">Received From</label>
                      <select name="" id="receivedFrom" class="form-control">
                        <option value="">1 Received </option>
                        <option value="">2 Received </option>
                        <option value="">3 Received </option>
                        <option value="">4 Received </option>
                        <option value="">5 Received </option>
                      </select>
                      </div>

                    <div class="col-md-3 form-group">
                      <label >Voucher No</label><br>
                      <label for="VoucherNo"><b>*hotel-month-count*</b></label>
                    </div>

                    <div class="col-md-3 form-group">
                      <label >Voucher Date</label>
                      <label for="voucherDate"><b>*today date*</b></label>
                   </div>



                </div> 


                  <div class="row">
                    
                      <div class="col-md-2 form-group">
                      <label for="title">Guset title</label>
                      <select name="" id="title" class="form-control">
                        <option value="">Mr.</option>
                        <option value="">Miss</option>
                        <option value="">Dr</option>
                        <option value="">Mrf</option>
                        <option value="">mer</option>
                      </select>
                      </div>

                    <div class="col-md-7 form-group">
                      <label for="gusetName">Guset Name</label>
                      <input type="gusetName" id="gusetName" class="form-control ">
                    </div>

                      <div class="col-md-3 form-group">
                      <label for="roomType">Room Type</label>
                      <select name="" id="roomType" class="form-control">
                        <option value="">1 Room Type</option>
                        <option value="">2 Rooms Type</option>
                        <option value="">3 Rooms Type</option>
                        <option value="">4 Rooms Type</option>
                        <option value="">5 Rooms Type</option>
                      </select>
                      </div>


                </div> 

                  <div class="row">


                     <div class="col-md-3 form-group">
                      <label for="roomCatogary">Room Catogary</label>
                      <select name="" id="roomCatogary" class="form-control">
                        <option value="">1 Room Catogary</option>
                        <option value="">2 Rooms Catogary</option>
                        <option value="">3 Rooms Catogary</option>
                        <option value="">4 Rooms Catogary</option>
                        <option value="">5 Rooms Catogary</option>
                      </select>
                     </div>

                    <div class="col-md-3 form-group">
                      <label for="roomCatogary">meal plan</label>
                      <select name="" id="roomCatogary" class="form-control">
                        <option value="">1 Room Catogary</option>
                        <option value="">2 Rooms Catogary</option>
                        <option value="">3 Rooms Catogary</option>
                        <option value="">4 Rooms Catogary</option>
                        <option value="">5 Rooms Catogary</option>
                      </select>
                     </div>

                      <div class="col-sm-3 form-group">
                       <label for="">Arrival Date</label>
                          <div style="position: relative;">
                            <span class="fa fa-calendar icon" style="position: absolute; right: 10px; top: 10px;"></span>
                            <input type='text' class="form-control" id='arrival_date' />
                          </div>
                      </div>

                      <div class="col-sm-3 form-group">
                       <label for="">Departure Date</label>
                          <div style="position: relative;">
                            <span class="fa fa-calendar icon" style="position: absolute; right: 10px; top: 10px;"></span>
                            <input type='text' class="form-control" id='departure_date' />
                          </div>
                      </div>




                </div> 

               <div class="row">

                    <div class="col-md-2 form-group">
                      <label for="room">ADL</label>
                      <select name="" id="room" class="form-control">
                        <option value="">1</option>
                        <option value="">2</option>
                        <option value="">3</option>
                        <option value="">4</option>
                        <option value="">5</option>
                      </select>
                    </div>

                    <div class="col-md-2 form-group">
                      <label for="room">CHD</label>
                      <select name="" id="room" class="form-control">
                        <option value="">1</option>
                        <option value="">2</option>
                        <option value="">3</option>
                        <option value="">4</option>
                        <option value="">5</option>
                      </select>
                    </div>

                  <div class="col-md-2 form-group">
                      <label for="rooms">Rooms</label>
                      <select name="" id="rooms" class="form-control">
                        <option value="">1 </option>
                        <option value="">2 </option>
                        <option value="">3 </option>
                        <option value="">4 </option>
                        <option value="">5 </option>
                        <option value="">6 </option>
                        <option value="">7 </option>
                    
                      </select>
                      </div>

                    <div class="col-md-6 form-group">
                      <label for="Extra">Extra</label>
                      <input type="Extra" id="Extra" class="form-control ">
                    </div>

              </div>


              <div class="row">
                    <div class="col-md-12 form-group">
                      <label for="message">specil request</label>
                      <textarea name="message" id="message" class="form-control " cols="30" rows="3"></textarea>
                    </div>


             </div>

             <div class="row">
                                   <div class="col-md-2 form-group">
                      <button>Add</button>
                    </div>
                   <div class="col-md-2 form-group">
                      <button>Remove</button>
                    </div>
             </div>

             <div class="row">
               <table style="width:100%" border="1">
  <tr>
    <th>Guset Name</th>
    <th>Room Type</th> 
    <th>Room Catogary</th>
    <th>meal plan</th>
    <th>Arrival Date</th> 
    <th>Departure Date</th> 
    <th>ADL</th>
    <th>CHD</th>
    <th>Rooms</th>
    <th>Extra</th> 
    <th>specil request</th>
  </tr>
  <tr>
    <td>Mr.malith</td>
    <td>single</td> 
    <td>ssasas</td>
    <td>dfdgdfg</td>
    <td>08-08-2019</td> 
    <td>08-09-2019</td>
    <td>2</td>
    <td>3</td> 
    <td>2</td>
    <td>dswefdgf</td>
    <td>vgfgfdgdfgdffdhfhdh</td>
  </tr>
  <tr>
    <td>Mr.malith</td>
    <td>single</td> 
    <td>ssasas</td>
    <td>dfdgdfg</td>
    <td>08-08-2019</td> 
    <td>08-09-2019</td>
    <td>2</td>
    <td>3</td> 
    <td>2</td>
    <td>dswefdgf</td>
    <td>vgfgfdgdfgdffdhfhdh</td>
  </tr>
</table>
             </div>

           <div class="row">

                   <div class="col-md-6 form-group">
                      <input type="submit" value="Save & Create Voucher" class="btn btn-primary">
                  </div>
          </div>
                </form>
              </div>
              <div class="col-md-12">
                <table>
                  
                </table>
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

    </script>

    

    <script src="js/main.js"></script>
  </body>
</html>