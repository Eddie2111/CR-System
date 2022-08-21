<?php
	session_start();

  require_once('dbconnect.php');
	//$user = null;
	//$type = null;
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



    <div class="container">
        <form action="add_car_controller.php" method="post" enctype="multipart/form-data">
            <!-- Post Your ad start -->
            <fieldset class="border border-gary p-4 mb-5">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3>Post Your ad</h3>
                        </div>

                          <div class="col-lg-6">
                                <h6 class="font-weight-bold pt-4 pb-1">Registration Number:</h6>
                                <input type="text" class="border w-100 p-2 bg-white text-capitalize" placeholder="" name="reg_no" required>
                                <h6 class="font-weight-bold pt-4 pb-1">Vehicle ID:</h6>
                                <input type="text" class="border w-100 p-2 bg-white text-capitalize" placeholder="" name="vehicle_id" required>
                                <h6 class="font-weight-bold pt-4 pb-1">Mileage:</h6>
                                <input type="text" class="border w-100 p-2 bg-white text-capitalize" placeholder="" name="mileage" required>
                                <h6 class="font-weight-bold pt-4 pb-1">Insurance:</h6>
                                <input type="text" class="border w-100 p-2 bg-white text-capitalize" placeholder="" name="insurance" required>
                                <h6 class="font-weight-bold pt-4 pb-1">Rent (Daily):</h6>
                                <input type="text" class="border w-100 p-2 bg-white text-capitalize" placeholder="" name="rent" required>
                                <h6 class="font-weight-bold pt-4 pb-1">Description:</h6>
                                <!-- <input type="text" class="border w-100 p-2 bg-white text-capitalize" placeholder="" name="description"> -->
                                <textarea name="description" id="" class="border p-3 w-100" rows="7" placeholder="Write details about your product" required></textarea>
                            </div>
                            <div class="col-lg-6">
                                <h6 class="font-weight-bold pt-4 pb-1">Fuel Type:</h6>
                                <input type="text" class="border w-100 p-2 bg-white text-capitalize" placeholder="" name="fuel_type" required>
                                <h6 class="font-weight-bold pt-4 pb-1">State:</h6>
                                <input type="text" class="border w-100 p-2 bg-white text-capitalize" placeholder="" name="state" required>
                                <h6 class="font-weight-bold pt-4 pb-1">Model:</h6>
                                <input type="text" class="border w-100 p-2 bg-white text-capitalize" placeholder="" name="model" required>
                                <h6 class="font-weight-bold pt-4 pb-1">Year:</h6>
                                <input type="text" class="border w-100 p-2 bg-white text-capitalize" placeholder="" name="year" required>
                                <h6 class="font-weight-bold pt-4 pb-1">Colour:</h6>
                                <input type="text" class="border w-100 p-2 bg-white text-capitalize" placeholder="" name="colour" required>
                                <h6 class="font-weight-bold pt-4 pb-1">Photos:</h6>
                                <div class="choose-file text-center my-4 py-4 rounded">
                                    <label for="file-upload">
                                        <input class="d-block btn bg-primary text-white my-3 select-files" type="file" name="image" required>
                                        <span class="d-block">Maximum upload file size: 500 KB</span>
                                    </label>
                                </div>
                            </div>

                    </div>
            </fieldset>
            <!-- Post Your ad end -->

            <!-- submit button -->
            <div class="checkbox d-inline-flex">
                <input type="checkbox" id="terms-&-condition" class="mt-1">
                <label for="terms-&-condition" class="ml-2">By click you must agree with our
                    <span> <a class="text-success" href="terms-condition.html">Terms & Condition and Posting Rules.</a></span>
                </label>
            </div>
            <button type="submit" name="upload" value="Submit" class="btn btn-primary d-block mt-2">Post Your Ad</button>
        </form>
    </div>


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

<script src="js/script.js"></script>

</body>

</html>
