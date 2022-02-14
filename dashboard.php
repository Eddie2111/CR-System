<?php
	session_start();
	require_once('dbconnect.php');
	$user = null;
	$type = null;
	if (isset($_SESSION['user'])) {
		$user=$_SESSION['user'];
		$type=$_SESSION['type'];
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>

  <!-- SITE TITTLE -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Car Rental Service</title>
  
  <!-- FAVICON -->
  <link href="img/favicon.png" rel="shortcut icon">
  <!-- PLUGINS CSS STYLE -->
  <!-- <link href="plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet"> -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap-slider.css">
  <!-- Font Awesome -->
  <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- Owl Carousel -->
  <link href="plugins/slick-carousel/slick/slick.css" rel="stylesheet">
  <link href="plugins/slick-carousel/slick/slick-theme.css" rel="stylesheet">
  <!-- Fancy Box -->
  <link href="plugins/fancybox/jquery.fancybox.pack.css" rel="stylesheet">
  <link href="plugins/jquery-nice-select/css/nice-select.css" rel="stylesheet">
  <!-- CUSTOM CSS -->
  <link href="css/style.css" rel="stylesheet">


  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>

<body class="body-wrapper">

<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-expand-lg navbar-light navigation">
					<a class="navbar-brand" href="index.php">
						<img src="images/logo.png" alt="">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ml-auto main-nav ">
							<li class="nav-item active">
								<a class="nav-link" href="index.php">Home</a>
							</li>
							<?php
								if($type=="customer") {
							?>
									<li class="nav-item active">
										<a class="nav-link" href="dashboard.php">Dashboard</a>
									</li>
							<?php
								}
								elseif($type=="admin") {
							?>
									<li class="nav-item active">
										<a class="nav-link" href="dashboard_admin.php">Dashboard</a>
									</li>
									<!-- <li class="nav-item dropdown dropdown-slide">
										<a class="nav-link dropdown-toggle" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											Listing <span><i class="fa fa-angle-down"></i></span>
										</a>
										<div class="dropdown-menu">
											<a class="dropdown-item" href="category.html">Ad-Gird View</a>
											<a class="dropdown-item" href="ad-listing-list.html">Ad-List View</a>
										</div>
									</li> -->
							<?php      
								}
							?>
						</ul>
						<ul class="navbar-nav ml-auto mt-10">
						<?php
							if($type=="customer") {
						?>
								<li class="nav-item">
									<a class="nav-link text-white add-button" href="rent_car.php">Rent a Car</a>
								</li>
						<?php
							}
							elseif($type=="admin") {
						?>
								<li class="nav-item">
									<a class="nav-link text-white add-button" href="add_car.php">Add a Vehicle</a>
								</li>
								<!-- <li class="nav-item">
									<a class="nav-link text-white add-button" href="manage_vehicles.html">Manage Vehicles</a>
								</li> -->
						<?php      
							}
							if($user != "" || $user != null) {
						?>
								<li class="nav-item">
									<a class="nav-link login-button" href="logout.php">Logout</a>
								</li>
						<?php
							}
							else {
						?>
								<li class="nav-item">
									<a class="nav-link login-button" href="login.php">Login</a>
								</li>
								<li class="nav-item">
									<a class="nav-link login-button" href="registration.php">Sign Up</a>
								</li>
						<?php
							}
						?>
						</ul>
					</div>
				</nav>
			</div>
		</div>
	</div>
</section>
<!--==================================
=            User Profile            =
===================================-->
<section class="dashboard section">
  <!-- Container Start -->
  <div class="container">
    <!-- Row Start -->
    <div class="row">
      <div class="col-md-10 offset-md-1 col-lg-4 offset-lg-0">
        <div class="sidebar">
          <!-- User Widget -->
          <div class="widget user-dashboard-profile">
            <!-- User Image -->
            <div class="profile-thumb">
              <!-- <img src="images/user/user-thumb.jpg" alt="" class="rounded-circle"> -->
            </div>
            <?php

              $nid = $_SESSION['nid'];
              $sql = "SELECT * FROM customer WHERE nid = '$nid'";
              $result = mysqli_query($conn, $sql);
              $row = mysqli_fetch_assoc($result);

            ?>
            <!-- User Name -->
            <h5 class="text-center"><?php echo $row['name'];?></h5>
          </div>
          <!-- Dashboard Links -->
          <div class="widget user-dashboard-menu">
            <ul>
              <li class="active"><h6 class="text-center"><?php echo $row['gender'];?></h6></li>
              <li class="active"><h6 class="text-center"><?php echo $row['phone'];?></h6></li>
              <li class="active"><h6 class="text-center"><?php echo $row['email'];?></h6></li>
              <li class="active"><h6 class="text-center"><?php echo $row['nid'];?></h6></li>
              <li class="active"><h6 class="text-center"><?php echo $row['license_number'];?></h6></li>
              <li class="active"><h6 class="text-center"><?php echo $row['billing_address'];?></h6></li>
            </ul>
          </div>

        </div>
      </div>
      <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
        <!-- Recently Favorited -->
        <div class="widget dashboard-container my-adslist">
          <h3 class="widget-header">My Reservations</h3>
          <table class="table table-responsive product-dashboard-table">
            <thead>
              <tr>
                <th class="text-center">Image</th>
                <th class="text-center">Product Details</th>
                <!-- <th class="text-center">Category</th>
                <th class="text-center">Action</th> -->
              </tr>
            </thead>
            <tbody>

            <?php
                require_once("dbconnect.php");

                $sql="SELECT * FROM reservation WHERE nid = '$nid'";
                $result= mysqli_query($conn, $sql);
                
                if ( mysqli_num_rows($result) > 0 ) {

                  while ( $row = mysqli_fetch_array($result) ) {
                    
                    $reg_no = $row['reg_no'];
                    $sql2 = "SELECT * FROM vehicle WHERE reg_no = '$reg_no'";
                    $result2 = mysqli_query($conn, $sql2);
                    $row2 = mysqli_fetch_array($result2)
                    
              ?>
                <tr>
                  <td class="product-thumb">
                    <img width="80px" height="auto" src="<?php echo $row2['image'] ?>" alt="image description">
                  </td>
                  <td class="product-details">
                    <h3 class="title"><?php echo $row2['year'] ?> - <?php echo $row2['model'] ?></h3>
                    <span class="add-id"><strong>Reservation ID: </strong><?php echo $row['res_id'] ?></span>
                    <span><strong>Start Date: </strong><time><?php echo $row['start_date'] ?></time> </span>
                    <span class="location"><strong>Rented For: </strong><?php echo $row['timeframe'] ?> day(s)</span>
                  </td>
                  <!-- <td class="product-category"><span class="categories">Laptops</span>
                  </td>
                  <td class="action" data-title="Action">
                    <div class="">
                      <ul class="list-inline justify-content-center">
                        <li class="list-inline-item">
                          <a data-toggle="tooltip" data-placement="top" title="View" class="view" href="category.html">
                            <i class="fa fa-eye"></i>
                          </a>
                        </li>
                        <li class="list-inline-item">
                          <a class="edit" data-toggle="tooltip" data-placement="top" title="Edit" href="">
                            <i class="fa fa-pencil"></i>
                          </a>
                        </li>
                        <li class="list-inline-item">
                          <a class="delete" data-toggle="tooltip" data-placement="top" title="Delete" href="">
                            <i class="fa fa-trash"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </td> -->
                </tr>
              <?php
                  }
                } else {
                  echo '<h5 class="text-center">No Reservations Yet!</h5>';
                }
              ?>

            </tbody>
          </table>

        </div>

      </div>
    </div>
    <!-- Row End -->
  </div>
  <!-- Container End -->
</section>
<!--============================
=            Footer            =
=============================-->

<footer class="footer section section-sm">
  <!-- Container Start -->
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-7 offset-md-1 offset-lg-0">
        <!-- About -->
        <div class="block about">
          <!-- footer logo -->
          <img src="images/logo-footer.png" alt="">
          <!-- description -->
          <p class="alt-color">Site Description</p>
        </div>
      </div>
      <!-- Link list -->
      <div class="col-lg-2 offset-lg-1 col-md-3">
        <div class="block">
          <h4>Site Pages</h4>
          <ul>
            <li><a href="#">Articls & Tips</a></li>
            <li><a href="terms-condition.html">Terms & Conditions</a></li>
          </ul>
        </div>
      </div>
      <!-- Link list -->
      <div class="col-lg-2 col-md-3 offset-md-1 offset-lg-0">
        <div class="block">
          <h4>Admin Pages</h4>
          <ul>
            <li><a href="category.html">Category</a></li>
            <li><a href="single.html">Single Page</a></li>
          </ul>
        </div>
      </div>
      <!-- Promotion -->
      <div class="col-lg-4 col-md-7">
        <!-- App promotion -->
        <div class="block-2 app-promotion">
          <div class="mobile d-flex">
            <a href="">
              <!-- Icon -->
              <img src="images/footer/phone-icon.png" alt="mobile-icon">
            </a>
            <p>Get the Car Rental Service's Mobile App and Save more</p>
          </div>
          <div class="download-btn d-flex my-3">
            <a href="#"><img src="images/apps/google-play-store.png" class="img-fluid" alt=""></a>
            <a href="#" class=" ml-3"><img src="images/apps/apple-app-store.png" class="img-fluid" alt=""></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Container End -->
</footer>
<!-- Footer Bottom -->
<footer class="footer-bottom">
  <!-- Container Start -->
  <div class="container">
    <div class="row">

    </div>
  </div>
  <!-- Container End -->
  <!-- To Top -->
  <div class="top-to">
    <a id="top" class="" href="#"><i class="fa fa-angle-up"></i></a>
  </div>
</footer>

<!-- JAVASCRIPTS -->
<script src="plugins/jQuery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/popper.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap-slider.js"></script>
  <!-- tether js -->
<script src="plugins/tether/js/tether.min.js"></script>
<script src="plugins/raty/jquery.raty-fa.js"></script>
<script src="plugins/slick-carousel/slick/slick.min.js"></script>
<script src="plugins/jquery-nice-select/js/jquery.nice-select.min.js"></script>
<script src="plugins/fancybox/jquery.fancybox.pack.js"></script>
<script src="plugins/smoothscroll/SmoothScroll.min.js"></script>
<!-- google map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
<script src="plugins/google-map/gmap.js"></script>
<script src="js/script.js"></script>

</body>

</html>