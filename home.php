<?php
  ob_start();
  session_start();
  require 'php/connect.php';
  if(!isset($_SESSION['cinemaUser']))
  {
    header("Location:index.php");
  }
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
    <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    
</head>
  <body>
      <header>
            <div id="title">
                    <span>Tdb Cinemas Home <i class="fa fa-television" style="font-size:50px;color:white;"></i>...</span>
                </div>
      </header>

      <main id="main">
        <div class="container">
          <div class="row" id="container">
            <div class="col-md-3">
                <div id="menu">
                    <div class="row account">
                      <p id="userSession"><?=$_SESSION['cinemaUser']?></p>
                      <button class="btn btn-default btn-block" name="logout" id="signIn">Log out</button>
                 
                    
                      </div>
                    <div id="movieItems">
                        <div class="row movieOptions" id="Home">
                            <p class="item" id="showingInCinemas">Home</p>
                         </div>
                        <div class="row movieOptions" id="popular">
                            <p class="item" id="popular">Popular</p>
                         </div>
                         <div class="row movieOptions" id="toprated">
                             <p class="item" id="topRated">Top Rated</p>
                          </div>
                           <div class="row movieOptions" id="nowplaying">
                              <p class="item" id="nowPlaying">Now Playing</p>
                           </div>
                           <div class="row movieOptions" style="border-top:1px solid black;" id="search">
                              <p class="item" id="search">Search <i class="fa fa-search" style="font-size:25px;color:white;"></i></p>
                           </div>
                    </div>
                    
                  </div>
            </div>
            <div class="col-md-9">
                <div class="container">
           <div class="row">
                      <p class="popMovies" id="sectionTitle">Showing In Cinemas</p>
                      </div>         
                    <div class="row"  id="movies">

                    </div>
                    <hr>
                    <center><button class="btn btn-primary btn-lg" id="moreMovies">More Movies</button></center>

                     <!--Movie Details Modal -->
                <div id="myModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close closemodal" data-dismiss="modal">&times;</button>
                      </div>
                      <div class="modal-body" id="movieDetailsModal">
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
      <section id="purchaseDetails">
        <div class="container">
          <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10" id="bookedMoviesDetailsTable">
              <p id="bookedMoviesTitle">Booked Movies and History</p>
              <table class="table table-bordered table-hover">
                <?php 
                  $userEmail = $_SESSION['cinemaUser'];
                  $sqlForBookedMovie = "SELECT * FROM `bookedMovieDetails` WHERE `userEmail` = '$userEmail' ";
                  $resultForBookedMovie = $conn->query($sqlForBookedMovie);
                ?>
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">MOVIE TITLE</th>
                    <th scope="col">PURCHASE DATE</th>
                    <th scope="col">PRICE</th>
                    <th scope="col">PURCHASE ID</th>
                    <th scope="col">NUMBER OF TICKETS</th>
                    <th scope="col">SEEING DATE</th>
                    <th scope="col">SEEING TIME</th>
                    <th scope="col">Tdb CINEMA</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $i = 0;
                  while($row = $resultForBookedMovie->fetch_array()):;
                  $i++;
                  ?>
                  <tr>
                    <th><?=$i?></th>
                    <td><?=$row[1] ?></td>
                    <td><?=$row[2] ?></td>
                    <td>&#8358;<?=$row[3] ?></td>
                    <td><?=$row[4] ?></td>
                    <td><?=$row[5] ?></td>
                    <td><?=$row[6] ?></td>
                    <td><?=$row[7] ?></td>
                    <td><?=$row[8] ?></td>
                  </tr>
                  <?php endwhile; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </section>
      <section id="purchaseInfo">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="alert alert-info">
                <strong><i class="em em-thinking_face"></i> <i class="em em-smiley"></i> Just to Know:</strong> your Account details are safe with us, and they are used to make purchases for movies that you book online. They were saved when you registered.<br>
                Upon entering any <strong>Tdb Cinema</strong>, Your Purchase Id, will be matched to your <strong>Tdb</strong> Account details. This will be used for Booking Confirmation. Thank you.
              </div>
            </div>
          </div>
        </div>
      </section>

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
              <h3 class="modal-title">Book Movie Here</h3>
            </div>
          <form action="">
            <div class="modal-body" id="bookMovieModal">
                <div class="container">
                  <!--select cinema Location-->
                  <div class="row">
                    <label>Select Cinema Location:</label>
                    <select class="form-control input-lg" id="cinemaLocation">
                      <option>Ikeja</option>
                      <option>VI</option>                  
                    </select>
                  </div>
                  <!-- end cinema location-->

                  <!-- choose day -->
                  <div class="row" id="chooseDay">
                    <label>Choose Day:</label>
                    <select class="form-control input-lg" id="viewingDay">
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

                  <!-- showing time -->
                    <div class="row">
                      <label>Choose Time of Day:</label>
                      <select class="form-control input-lg" id="timeOfDay">
                        <option>4PM</option>
                        <option>6PM</option>
                        <option>8PM</option>
                        <option>10PM</option>
                      </select>
                    </div>
                  <!-- end showing time -->

                  <!-- Show film and price -->
                <div class="row" id="pictureAndPrice">
                    <div class="col-lg-4" id="picture"></div>
                    <div class="col-lg-8" id="price"></div>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="vendors/bootstrap/js/popper.min.js"></script>
    <script src="vendors/bootstrap/js/bootstrap.min.js"></script>

    <!-- axios api -->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <!-- our own javascript file -->
    <script src="js/home.js"></script>

  </body>
</html>