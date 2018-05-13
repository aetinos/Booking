<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>My Profile</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="./css/filter_page.css" rel="stylesheet">
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
							<a class="nav-link Home" href="landing_page.php"><i class="fa fa-home"></i>Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link Profile selected" href="profile_page.php"><i class="fa fa-user"></i>Profile</a>
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
					<div class="container">
						<div class="container-fluid favorites-title">Favorites</div>
						<div class="list-group">
							<ol>
								<li>Megali Vretania hotel</li>
								<li>Megali Vretania hotel</li>
							</ol>
						</div>
					</div>
					<div class="container">
						<div class="container-fluid favorites-title">Reviews</div>
						<div class="list-group">
							<ol>
								<li>Hilton hotel</li>
								<li>Megali Vretania hotel</li>
							</ol>
						</div>
					</div>
				</div>
				<div class="col-md-7 col-sm-7 col-xs-12">
					<div class="container-fluid result-box">My bookings</div>
					<div class="container-fluid room-tab">
						<div class="row">
							<div class="col-4">
								<img class="room-image" src="images/rooms/room-1.jpg"><img>
							</div>
							<div class="col-8">
								<h4 class="room-name">Hotel Name</h4>
								<h6 class="room-area">Nomos, Poli</h6>
								<p class="room-info">To info tou domatiou tha benei edw!To info tou domatiou tha benei edw!To info tou domatiou tha benei edw!</p>
								<form action="room_page.php" method="post">
									<button type="submit" class="button go-to-room">Go to Room Page</button>
								</form>
							</div>
						</div>
						<div class="row">
							<div class="col-4 bar">
								<div class="room-price">Total Cost: </div>
							</div>
							<div class="col-8 bar">
								<div class="room-date">Check-in Date: </div>
								<div class="room-date">Check-Out Date: </div>
								<div class="room-type2">Type of Room: </div>
							</div>
						</div>
					</div>
					<div class="container-fluid room-tab">
						<div class="row">
							<div class="col-4">
								<img class="room-image" src="images/rooms/room-1.jpg"><img>
							</div>
							<div class="col-8">
								<h4 class="room-name">Hotel Name</h4>
								<h6 class="room-area">Nomos, Poli</h6>
								<p class="room-info">To info tou domatiou tha benei edw!To info tou domatiou tha benei edw!To info tou domatiou tha benei edw!</p>
								<form action="room_page.php" method="post">
									<button type="submit" class="button go-to-room">Go to Room Page</button>
								</form>
							</div>
						</div>
						<div class="row">
							<div class="col-4 bar">
								<div class="room-price">Per Night: </div>
							</div>
							<div class="col-8 bar">
								<div class="room-date">Check-in Date: </div>
								<div class="room-date">Check-Out Date: </div>
								<div class="room-type2">Type of Room: </div>
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