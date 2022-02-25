<?php
	session_start();
  require_once('dbconnect.php');

	$user = null;
	$type = null;

	if (isset($_SESSION['user'])) {
		$user=$_SESSION['user'];
		$type=$_SESSION['type'];
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

<section class="popular-deals section bg-gray">
	<div class="container">
		<div class="row justify-content-md-center text-center">
			<div class="col-md-8">
				<div class="content-holder">
					<ul class="list-inline mt-30">
						<li class="list-inline-item"><a class="btn btn-main" href="users.php">Users</a></li>
						<li class="list-inline-item"><a class="btn btn-secondary" href="reservations.php">Reservations</a></li>
						<li class="list-inline-item"><a class="btn btn-secondary" href="cars.php">Cars</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="section-sm">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<!-- <div class="category-sidebar">
					<div class="widget category-list">
					<h4 class="widget-header">Categories</h4>
					<ul class="category-list">
						<li><a href="category.html">Laptops <span>93</span></a></li>
						<li><a href="category.html">Iphone <span>233</span></a></li>
						<li><a href="category.html">Microsoft  <span>183</span></a></li>
						<li><a href="category.html">Monitors <span>343</span></a></li>
					</ul>
					</div>

					<div class="widget price-range w-100">
						<h4 class="widget-header">Price Range</h4>
						<div class="block">
							<input class="range-track w-100" type="text" data-slider-min="0" data-slider-max="5000" data-slider-step="5"
							data-slider-value="[0,5000]">
							<div class="d-flex justify-content-between mt-2">
									<span class="value">$10 - $5000</span>
							</div>
						</div>
					</div>

				</div> -->
			</div>
			<div class="col-md-12">

				<div class="product-grid-list">
					<div class="row mt-30">


					<?php
						require_once("dbconnect.php");

						$sql = "";
						$result = "";

						if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['drop'])) {

							$search = mysqli_real_escape_string($conn, $_POST['search']);
							$drop = mysqli_real_escape_string($conn, $_POST['drop']);
							$sql="SELECT * FROM customer WHERE $drop='$search'";
							$result= mysqli_query($conn, $sql);

						} else {

							$sql="SELECT * FROM customer";
							$result= mysqli_query($conn, $sql);

						}
						
						if ( mysqli_num_rows($result) > 0 ) {

							while ( $row = mysqli_fetch_array($result) ) {		
								
					?>
						<div class="col-sm-12 col-lg-4 col-md-6">
							<!-- product card -->
							<div class="product-item bg-light">
								<div class="card">
									<div class="card-body">
										<h4 class="card-title"><a href="#"><?php echo $row['name'] ?></a></h4>
                                        <br>
										<ul class="list-inline product-meta">
											<li class="list-inline-item">
												<a href="#"><i class="fa fa-folder-open-o"></i><?php echo $row['phone'] ?></a>
											</li>
											<li class="list-inline-item">
												<a href="#"><i class="fa fa-calendar"></i><?php echo $row['gender'] ?></a>
											</li>
										</ul>
										<ul class="list-inline product-meta">
											<li class="list-inline-item">
												<a href="#"><i class="fa fa-folder-open-o"></i><?php echo $row['license_number'] ?></a>
											</li>
											<li class="list-inline-item">
												<a href="#"><i class="fa fa-calendar"></i><?php echo $row['email'] ?></a>
											</li>
										</ul>
										<h4 class="card-title"><a href="#"><?php echo $row['billing_address'] ?></a></h4>
										<br>
										<!-- <div class="product-ratings">
											<ul class="list-inline">
												<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
												<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
												<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
												<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
												<li class="list-inline-item"><i class="fa fa-star"></i></li>
											</ul>
										</div> -->

                                        <form action="users_controller.php?reg_no=<?php echo $row['reg_no'] ?>" method="post" enctype="form-data">
                                            <button type="submit" name="upload" value="Submit" class="nav-link text-white add-button">Delete!</button>
                                        </form>
										
									</div>
								</div>
							</div>
						</div>

					<?php
							}
						} else {
							?>
								<div class="container">
									<div class="row">
										<div class="col-md-6 text-center mx-auto">
											<div class="404-content">
												<h1 class="display-1 pt-1 pb-2">No Users Yet</h1>
												<a href="index.php" class="btn btn-info">GO HOME</a>
											</div>
										</div>
									</div>
								</div>
							<?php
						}
					?>



					</div>
				</div>

			</div>
		</div>
	</div>
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
