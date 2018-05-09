<?php
	$servername = "localhost";
	$username = "booking";
	$password = "DcboXEAh93dCQZfD";
	$dbname = "booking";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Find the perfect hotel</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css">
		<link href="filter_page.css" rel="stylesheet">
		<script src="./JavaScripts/exclude.js"></script>
		<script src="./JavaScripts/date-button.js"></script>
		<script src="./JavaScripts/slider.js"></script>
	</head>
	<body>
	<!--- NAVIGATION BAR -->
		<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
			<div class="container-fluid">
				<a class="navbar-brand"><img src="./images/logo.png" width="100%"></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarResponsive">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<a class="nav-link" href="landing_page.php">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="profile_page.php">Profile</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!--- MAIN PAGE -->
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-1 col-sm-1 col-xs-12"></div>
				<div class="col-md-3 col-sm-3 col-xs-12">
					<div class="container-fluid filter-title">Find the best hotel</div>
					<form action=<?php echo "results.php";?> class="filters" method="POST">
						<div class="form-group">
							<select class="form-control" value="" name="guests">
									<?php
										$sql = "SELECT DISTINCT(count_of_guests) FROM room";
										$result = mysqli_query($conn, $sql);
										if (mysqli_query($conn, $sql)) {
											//echo '<div class="alert alert-success" role="alert">New record created successfully</div>';
										} else {
											echo '<div class="alert alert-success" role="alert">Error: ' . $sql . "<br>" . mysqli_error($conn).'</div>';
										}
										if (mysqli_num_rows($result) > 0) {
											while ($row = mysqli_fetch_assoc($result))
											{
												echo "<option value='".$row['count_of_guests']."'>".$row['count_of_guests']."</option>";
											}
										}
									?>
								</select>
						</div>
						
						<div class="form-group">
							<select class="form-control" value="" name="room-type">
									<?php
										$sql = "SELECT room_type FROM room_type";
										$result = mysqli_query($conn, $sql);
										if (mysqli_query($conn, $sql)) {
											//echo '<div class="alert alert-success" role="alert">New record created successfully</div>';
										} else {
											echo '<div class="alert alert-success" role="alert">Error: ' . $sql . "<br>" . mysqli_error($conn).'</div>';
										}
										if (mysqli_num_rows($result) > 0) {
											while ($row = mysqli_fetch_assoc($result))
											{
												echo "<option value='".$row['room_type']."'>".$row['room_type']."</option>";
											}
										}
									?>
								</select>
						</div>
						
						<div class="form-group">
							<select class="form-control" value="" name="city">
									<?php
										$sql = "SELECT DISTINCT(city) FROM room";
										$result = mysqli_query($conn, $sql);
										if (mysqli_query($conn, $sql)) {
											//echo '<div class="alert alert-success" role="alert">New record created successfully</div>';
										} else {
											echo '<div class="alert alert-success" role="alert">Error: ' . $sql . "<br>" . mysqli_error($conn).'</div>';
										}
										if (mysqli_num_rows($result) > 0) {
											while ($row = mysqli_fetch_assoc($result))
											{
												echo "<option value='".$row['city']."'>".$row['city']."</option>";
											}
										}
									?>
							</select>
						</div>
						
						<div class="form-group">
							<input type="text" id="Check-In" value="Check-In" name="dateIn">
							<input type="text" id="Check-Out" value="Check-Out" name="dateOut">
						</div>
						
						<p>
							<label for="amount">Price range:</label>
							<input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
						</p>
						<div id="slider-range"></div>
						
						<button type="submit" class="btn btn-success btn-block">Submit</button>
					</form>
				</div>
				<div class="col-md-7 col-sm-7 col-xs-12">
					<div class="container-fluid result-box">Search Results</div>
					<div class="container-fluid room-tab">
						<div class="row">
							<div class="col-4">
								<img class="room-image" src="images/rooms/room-1.jpg"><img>
							</div>
							<div class="col-8">
								<h4 class="room-name">Hotel Name</h4>
								<h6 class="room-area">Nomos, Poli</h6>
								<p class="room-info">To info tou domatiou tha benei edw!To info tou domatiou tha benei edw!To info tou domatiou tha benei edw!</p>
								<form action="room-page.html" method="post">
									<button type="submit" class="button go-to-room">Go to Room Page</button>
								</form>
							</div>
						</div>
						<div class="row">
							<div class="col-4 bar">
								<div class="room-price">Per Night: </div>
							</div>
							<div class="col-8 bar">
								<div class="room-guests">Count of Guests: </div>
								<div class="room-type">Type of Room: </div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-1 col-sm-1 col-xs-12"></div>
			</div>
		</div>

		<footer class="foot">
			<div class="copyright">
				<span class="text-muted">&copy Colleglink 2018</span>
			</div>
		</footer>
	</body>
</html>