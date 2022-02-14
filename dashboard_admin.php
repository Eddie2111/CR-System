<?php
	session_start();
    require_once('dbconnect.php');
	$user = null;
	$type = null;
	if (isset($_SESSION['user'])) {
		$user=$_SESSION['user'];
		$type=$_SESSION['type'];
        if ($type != "admin") {
        header("location:index.php");
        }
	} else {
		header("location:login.php");
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

<section class="popular-deals section bg-gray">
	<div class="container">
		<div class="row justify-content-md-center text-center">
			<div class="col-md-8">
				<div class="content-holder">
					<ul class="list-inline mt-30">
						<li class="list-inline-item"><a class="btn btn-secondary" href="users.php">Users</a></li>
						<li class="list-inline-item"><a class="btn btn-secondary" href="reservations.php">Reservations</a></li>
						<li class="list-inline-item"><a class="btn btn-secondary" href="cars.php">Cars</a></li>
						<li class="list-inline-item"><a class="btn btn-secondary" href="complains_admin.php">Complains</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>

<!--============================
=            Footer            =
=============================-->

<footer class="footer section section-sm">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-7 offset-md-1 offset-lg-0">
        <div class="block about">
          <img src="images/logo-footer.png" alt="">
          <p class="alt-color">Site Description</p>
        </div>
      </div>
      <div class="col-lg-2 offset-lg-1 col-md-3">
        <div class="block">
          <h4>Site Pages</h4>
          <ul>
            <li><a href="#">Articls & Tips</a></li>
            <li><a href="terms-condition.html">Terms & Conditions</a></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-2 col-md-3 offset-md-1 offset-lg-0">
        <div class="block">
          <h4>Admin Pages</h4>
          <ul>
            <li><a href="category.html">Category</a></li>
            <li><a href="single.html">Single Page</a></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-4 col-md-7">
        
        <div class="block-2 app-promotion">
          <div class="mobile d-flex">
            <a href="">
              
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

</footer>

<footer class="footer-bottom">
  
  <div class="container">
    <div class="row">

    </div>
  </div>
  <div class="top-to">
    <a id="top" class="" href="#"><i class="fa fa-angle-up"></i></a>
  </div>
</footer>

<script src="plugins/jQuery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/popper.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap-slider.js"></script>
<script src="plugins/tether/js/tether.min.js"></script>
<script src="plugins/raty/jquery.raty-fa.js"></script>
<script src="plugins/slick-carousel/slick/slick.min.js"></script>
<script src="plugins/jquery-nice-select/js/jquery.nice-select.min.js"></script>
<script src="plugins/fancybox/jquery.fancybox.pack.js"></script>
<script src="plugins/smoothscroll/SmoothScroll.min.js"></script>
<script src="js/script.js"></script>

</body>

</html>