<?php
  ob_start();
  session_start();
  require '../php/connect.php';
  if(!isset($_SESSION['userAdmin'])){
    header('location:../index.php');
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SB Admin - Start Bootstrap Template</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php">tdbCinema Admin</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Components</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="navbar.php">Navbar</a>
            </li>
          </ul>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <form method="post" action="index.php">
            <button class="btn btn-success" data-toggle="modal" data-target="#exampleModal" name="logout">
            <i class="fa fa-fw fa-sign-out"></i>Logout</button>
          </form>
        </li>
        <?php 
        if(isset($_POST['logout'])){
          session_unset();
          session_destroy();
          header('location:../index.php');
        }
        ?>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">TdbCinema</li>
      </ol>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-comments"></i>
              </div>
              <div class="mr-5">Total Tickets Sold</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left" id="total_tickets">
                <?php 
                  $sql1 = "SELECT * FROM `bookedMovieDetails`";
                  $tts = mysqli_num_rows($conn->query($sql1));
                  if($tts > 0){
                    echo $tts;
                  }else{
                    echo 0;
                  }
                ?>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list"></i>
              </div>
              <div class="mr-5">Total Amount Sold</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">
                <?php
                  $sql2 = "SELECT `price` FROM `bookedMovieDetails`";
                  $result2 = $conn->query($sql2);
                  $sum = 0;
                  if($result2->num_rows > 0){
                    while($row = $result2->fetch_assoc()){
                      $sum+=$row['price'];
                    }
                    echo "&#8358; ".$sum;
                  }else{
                    echo "&#8358; 0.00";
                  }
                ?>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-shopping-cart"></i>
              </div>
              <div class="mr-5">New Orders</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left" id = "new_orders">

              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <!-- left blank intentionally for the style -->
        </div>
      </div>

      <!-- TABLE-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Booked Movies Table    <i class="fa fa-refresh" onclick="location.reload()"></i></div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <?php 
                  $sqlForBookedMovie = "SELECT * FROM `bookedMovieDetails`";
                  $resultForBookedMovie = $conn->query($sqlForBookedMovie);
                ?>
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">USER EMAIL</th>
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
                <tfoot>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">USER EMAIL</th>
                    <th scope="col">MOVIE TITLE</th>
                    <th scope="col">PURCHASE DATE</th>
                    <th scope="col">PRICE</th>
                    <th scope="col">PURCHASE ID</th>
                    <th scope="col">NUMBER OF TICKETS</th>
                    <th scope="col">SEEING DATE</th>
                    <th scope="col">SEEING TIME</th>
                    <th scope="col">Tdb CINEMA</th>
                  </tr>
                </tfoot>
              <tbody>
                  <?php 
                  $i = 0;
                  while($row = $resultForBookedMovie->fetch_array()):;
                  $i++;
                  ?>
                  <tr>
                    <th><?=$i?></th>
                    <td><?=$row[9] ?></td>                    
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
        <div class="card-footer small text-muted" id="updateTime"></div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Tdb Cinemas 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>

    <script>

    // this calcuate new orders. it does this by storing the old and new number of rows in the database in local browser storage, and then substracting them
       let date = new Date()
       localStorage.hour = date.getHours()
       localStorage.minutess = date.getMinutes()
       var oldTotalNumber = ""

      if(typeof(Storage) !== "undefined"){
        if(localStorage.totalNumber == undefined){
          localStorage.totalNumber = $('#total_tickets').text()
          $('#new_orders').text(localStorage.totalNumber)         
        }else{

          oldTotalNumber = localStorage.totalNumber
          localStorage.oldTotalNumber = oldTotalNumber          
          localStorage.totalNumber = $('#total_tickets').text()
          $('#new_orders').text(localStorage.totalNumber - localStorage.oldTotalNumber)    

        }
      }else{
        console.log("Sorry! No Web Storage support");
      }
      
      //check if window.performance works
      if(window.performance){
        console.log("window.performance work's fine on this browser")
      }
      
      //use window.performance to know when user refreshes the page
      if (performance.navigation.type == 1) {
        console.info( "This page is reloaded" )
        let timeReloaded = new Date();
        $('#updateTime').text(`Last Updated ${timeReloaded}`)
      } else {
        console.info( "This page is not reloaded")
      }

    </script>

  </div>
</body>

</html>
