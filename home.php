<?php
  ob_start();
  session_start();
  
  if(!isset($_SESSION['cinemaUser']))
  {
    header("Location:index.php");
  }
  echo $_SESSION['cinemaUser'];
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Tdb Cinemas.</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- font awesome -->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    
</head>
  <body>
      <header>
            <div id="title">
                    <span>Tdb Cinemas Home<i class="fa fa-television" style="font-size:50px;color:white;"></i>...</span>
                </div>
      </header>

      <main id="main">
        <div class="container">
          <div class="row" id="container">
            <div class="col-md-3">
                <div id="menu">
                    <div class="row account">

                      <button class="btn btn-default btn-block" name="logout" data-toggle="modal" id="signIn">Log out</button>
                 
                    
                      </div>
                    <div id="movieItems">
                        <div class="row movieOptions" id="Home">
                            <p class="item">Home</p>
                         </div>
                        <div class="row movieOptions" id="upcoming">
                            <p class="item">Upcoming</p>
                         </div>
                         <div class="row movieOptions" id="toprated">
                             <p class="item">Top Rated</p>
                          </div>
                           <div class="row movieOptions" id="nowplaying">
                              <p class="item">Now Playing</p>
                           </div>
                           <div class="row movieOptions" style="border-top:1px solid black;" id="search">
                              <p class="item">Search <i class="fa fa-search" style="font-size:25px;color:white;"></i></p>
                           </div>
                    </div>
                    
                  </div>
            </div>
            <div class="col-md-9">
                <div class="container">
           <div class="row">
                      <p class="popMovies">Showing In Cinemas</p>
                      </div>         
                    <div class="row"  id="movies">
  
                    </div>


                     <!--Movie Details Modal -->
                <div id="myModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close closemodal" data-dismiss="modal">&times;</button>
                        <!-- <h4 class="modal-title">Modal Header</h4> -->
                      </div>
                      <div class="modal-body">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default closemodal" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                
                  </div>
                </div>
            </div>
                  </div>
            
          </div>

        </div>
              
      </main>
      <footer>
        <div>
          <p>Copyright 2018, Tdb Cinemas.</p>
        </div>
      </footer>

      <!-- Book Movie Modal -->
      <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h3 class="modal-title" id="bookMovieModal">Book Movie Here</h3>
            </div>
          <form action="">
            <div class="modal-body">
                <div class="container">
                  <!--select cinema Location-->
                  <div class="row">
                    <label for="sel1">Select Cinema Location:</label>
                    <select class="form-control input-lg" id="sel1">
                      <option>Ikeja</option>
                      <option>VI</option>                  
                    </select>
                  </div>
                  <!-- end cinema location-->

                  <!-- choose day -->
                  <div class="row" id="chooseDay">
                    <label for="sel2">Choose Day:</label>
                    <select class="form-control input-lg" id="sel2">
                      <option>Sunday: <?php echo date('F jS, Y', strtotime('sunday')); ?> </option>
                      <option>Monday: <?php echo date('F jS, Y', strtotime('monday')); ?> </option>                  
                      <option>Tuesday: <?php echo date('F jS, Y', strtotime('tuesday')); ?></option>                  
                      <option>Wednesday: <?php echo date('F jS, Y', strtotime('wednesday')); ?></option>                  
                      <option>Thursday: <?php echo date('F jS, Y', strtotime('thursday')); ?></option>                  
                      <option>Friday: <?php  echo date('F jS, Y', strtotime('friday')); ?></option>                  
                      <option>Saturday: <?php echo date('F jS, Y', strtotime('saturday')); ?></option>             
                    </select>
                  </div>
                  <!-- end choosing of day-->

                  <!-- Show film and price -->
                <div class="row" id="pictureAndPrice">
                    <div id="picture"></div>
                    <div id="price"></div>
                </div>
                  <!-- end show film and price -->
                    
                </div>
              </div>
          </form>
            
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" id="cancelBooking" data-dismiss="modal">Cancel Booking</button>
            </div>
          </div>
        </div>
      </div>
     
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="vendors/bootstrap/js/popper.min.js"></script>
    <script src="vendors/bootstrap/js/bootstrap.min.js"></script>

    <!-- axios api -->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <!-- our own javascript file -->
    <script src="js/home.js"></script>

  </body>
</html>