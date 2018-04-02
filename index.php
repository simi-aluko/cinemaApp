<?php
ob_start();
session_start();
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
                    <span>Tdb Cinemas <i class="fa fa-television" style="font-size:50px;color:white;"></i>...</span>
                </div>
      </header>

      <main id="main">
        <div class="container">
          <div class="row" id="container">
            <div class="col-md-3">
                <div id="menu">
                    <div class="row account">
                        <button class="btn btn-default btn-block" data-backdrop="static" data-keyboard="false" data-toggle="modal" href="#signInModal" id="signIn">Sign In</button>
                        <button data-toggle="modal" href="#signUpModal" data-backdrop="static" data-keyboard="false" class="btn btn-default btn-block" id="signUp">Sign Up</button>
                        
                        
                        <!--sign in modal -->
                      <div class="modal fade" role="dialog" id="signInModal">
                          <div class="modal-dialog">
                              <div class="modal-content" id="signInModal">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">x</button>
                                    <h3 class="modal-title" style="position:absolute;left:40%">Sign In here</h3>
                                 </div>
                                  <div class="modal-body">
                                    <form method="post" action="index.php" name="login_form">
                                      <div class="form-group" id="signIn">
                                          <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                                          <input type="password" pattern=".{5,20}" class="form-control" name="password" title="minimum length is 5 and maximum length is 20" placeholder="Password" required>
                                          <button type="submit" name="signin" class="btn btn-primary btn-block">Sign in</button>
                                      </div>
                                    
                                    </form>
                                  </div>
                                </div>
    
                          </div>
                      </div>                 

                      
                      <!-- sign up modal -->

                      <div class="modal" role="dialog" id="signUpModal">
                        <div class="modal-dialog">
                          <div class="modal-content">

                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">x</button>                              
                             <h3 id="registerheader">Register</h3>
                            </div>

                            <form method="post" action="index.php">
                            
                            <div class="modal-body">
                                <div class="form-group" id="registerbody">
                                    <input type="text" class="form-control" name="fullname" placeholder="Full Name" required>
                                    <input type="tel" class="form-control" name="telNo" placeholder="Telephone Number" required>
                                    <textarea type="text" class="form-control" pattern = ".{0,250}" title = "minimum length is 0 and maximum length is 250" maxlength="200" name="address" placeholder="Address" required></textarea>
                                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                                    <input type="password" class="form-control" pattern=".{5,20}" name="password" title="minimum length is 5 and maximum is 20" placeholder="Password" required>
                                    <input type="password" class="form-control" pattern=".{5,20}" maxlength="30" name="cpassword" title="minimum length is 5 and maximum is 20" placeholder="Confirm Password" required>
                                    <input class="form-control" pattern=".{3,3}" required name="cvv" title="must be 3 numbers long" placeholder="CVV" >
                                    <input class="form-control" pattern=".{16,16}" required name="cardNumber" title="must be 16 numbers long" placeholder="Card Number" >                                    
                                    <input class="form-control" pattern=".{4,15}"required name="pin" title="minimum length is 4 numbesr while maximum is 15" placeholder="Pin" >                                    
                                </div>
                            </div>
                            <div class="modal-footer">
                              <button type="submit" name="signup" class="btn btn-lg btn-block btn-success">Register</button>
                            </div>
                          </form>
                            
                          </div>
                        </div>
                      </div>
                    
                      </div>
                    <div id="movieItems">
                        <div class="row movieOptions" id="Home">
                            <p class="item">Home</p>
                         </div>
                        <div class="row movieOptions" id="popular">
                            <p class="item">Popular</p>
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
                    <hr>
                    <center><button class="btn btn-primary btn-lg" id="moreMovies">More Movies</button></center>
                    
                     <!--Movie Details Modal -->
                <div id="myModal" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">
                
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close closemodal" data-dismiss="modal">&times;</button>
                        <!-- <h4 class="modal-title">Modal Header</h4> -->
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
      <footer style="margin-top:60px;">
        <div>
          <p>Copyright 2018, Tdb Cinemas.</p>
        </div>
      </footer>

      <!--- started writing php here -->
      <!-- sign up control php script -->
      <?php
                       require 'php/connect.php';

                      if(isset($_POST['signup'])){

                        $fullname = htmlspecialchars($_POST['fullname']);
                        $telNo = htmlspecialchars($_POST['telNo']);
                        $address = htmlspecialchars($_POST['address']);
                        $email = htmlspecialchars($_POST['email']);
                        $password = htmlspecialchars($_POST['password']);
                        $cpassword = htmlspecialchars($_POST['cpassword']);
                        $cvv = htmlspecialchars($_POST['cvv']);
                        $cardNo = htmlspecialchars($_POST['cardNumber']);
                        $pin = htmlspecialchars($_POST['pin']);
                    
                        $cvvtype = gettype($cvv);
                        $cardNo = gettype($cardNo);
                        if($password !== $cpassword){
                            echo '<script type="text/javascript">alert("Your Passwords don\'t match")</script>';
                        }else{
                            $sqlCheckIfUserExist = "SELECT `phone`,`email` FROM users WHERE `phone`='$telNo' OR `email`='$email' ";
                        
                            $usercount = mysqli_num_rows($conn->query($sqlCheckIfUserExist));
                            
                            if($usercount >= 1){ 
                              echo '<script type="text/javascript">alert("This user already exists")</script>';
                            }else{
                              $sqlRegisterUser = "INSERT INTO users (`fullname`,`phone`,`address`,`email`,`password`,`cardNo`,`cvv`,`pin`) VALUES ('$fullname','$telNo','$address','$email','$password','$cardNo','$cvv','$pin')";

                              $resultOfRegistration = $conn->query($sqlRegisterUser);

                              if($resultOfRegistration === TRUE){
                                echo '<script type="text/javascript">alert("You have successfully been registered. You now have an account!")</script>';
                            }
                            }
                        
                            
                        }
                    
                    
                    }
                      ?>

                      <!-- signIn control script -->
                      <?php 
                      require 'php/connect.php';
                        if(isset($_POST['signin'])){
                          $email = htmlspecialchars($_POST['email']);
                          $password = htmlspecialchars($_POST['password']);
                          
                          if(!($email == "tdbAmin@tdbCinema.com" && $password == "tdbCinema.com" )){
                            $sql = "SELECT `email`,`password` FROM users WHERE `email` = '$email' AND `password` = '$password'";
                            $result = mysqli_num_rows($conn->query($sql));
                            
                            if($result > 0){
                              $_SESSION['cinemaUser'] = $email;
                                header('Location:home.php');
                            }else{
                                echo '<script type="text/javascript">alert("Check your Login details, login unsuccessful.")</script>';        
                            }
                          }else{
                            $_SESSION['userAdmin'] = $email;
                            header('location:admin/index.php');
                          }
                       
                      }
                      ?>
     
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    
    <script src="vendors/bootstrap/js/popper.min.js"></script>
    <script src="vendors/bootstrap/js/bootstrap.min.js"></script>

    <!-- axios api -->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <!-- our own javascript file -->
    <script src="js/main.js"></script>
  </body>
</html>