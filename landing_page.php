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
		<title>Welcome to BtB</title>
		<link rel="stylesheet" href="./css/landing_page.css">
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="./JavaScripts/exclude.js"></script>
		<script src="./JavaScripts/date-button.js"></script>
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
							<a class="nav-link Home selected" href="landing_page.php"><i class="fa fa-home"></i>Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link Profile disabled"><i class="fa fa-user"></i>Profile</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4 col-sm-4 col-xs-12"></div>
				<div class="col-md-4 col-sm-4 col-xs-12">
					 <form action=<?php echo"filter_page.php";?> class="form-container" method="POST">
						<div class="form-group">
							<select class="form-control" value="" name="city">
								<h6 class="dropdown-header">City</h6>
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
							<select class="form-control" value="" name="room-type">
								<h6 class="dropdown-header">Dropdown header</h6>
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
							<input type="text" id="Check-In" value="check-in" name="dateIn">
							<input type="text" id="Check-Out" value="check-out" name="dateOut">
						</div>
						<button type="submit" class="btn btn-success btn-block">Submit</button>
					</form> 
				</div>
			</div>
		</div>
		
		<footer class="foot">
			<div class="copyright">
				<span class="text-muted">&copy Colleglink 2018</span>
			</div>
		</footer>
	</body>
</html>