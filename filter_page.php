<?php
	require('db.php');
	//assign values for the query
	if(isset($_POST['city'])) {
		$city = $_POST['city'];
	}else {
		$city = null;
	}
	if(isset($_POST['room-type'])) {
		$room_type = $_POST['room-type'];
	}else {
		$room_type = null;
	}

	if(isset($_POST['dateIn']) && isset($_POST['dateOut'])) {
		if($_POST['dateIn'] === "check-in") {
			//no date selected
			$dateIn = null;
		}else {
			$dateIn = $_POST['dateIn'];
		}
		
		if($_POST['dateOut'] === "" || $_POST['dateOut'] === "check-out") {
			$dateOut = null;
		}else {
			$dateOut = $_POST['dateOut'];
		}
	}
	if(isset($_POST['guests'])) {
		$guests = $_POST['guests'];
	}else {
		$guests = null;
	}
	if(isset($_POST['min_price'])) {
		$minp = $_POST['min_price'];
	}else {
		$minp = 0;
	}
	if(isset($_POST['max_price'])) {
		$maxp = $_POST['max_price'];
	}else {
		$maxp = 5000;
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
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="./css/filter_page.css" rel="stylesheet">
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
							<a class="nav-link" href="landing_page.php"><i class="fa fa-home"></i>Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="profile_page.php"><i class="fa fa-user"></i>Profile</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!--- MAIN PAGE -->
		<div class="container-fluid main">
			<div class="row">
				<div class="col-md-1 col-sm-1 col-xs-12"></div>
				<div class="col-md-3 col-sm-3 col-xs-12">
					<div class="container-fluid filter-title">Find the best hotel</div>
					<form action=<?php echo $_SERVER['PHP_SELF'];?> class="filters" method="POST">
						<div class="form-group">
							<select class="form-control" value="" name="guests">
								<option value="0" <?php
									if($guests === null) {
										echo 'selected="selected"';
									}
									?>
								disabled >Count of Guests</option>
								<?php
									$sql = "SELECT DISTINCT(count_of_guests) FROM room";
									$result = $db->query($sql);
									if ($result->num_rows > 0) {
										while ($row = $result->fetch_assoc()) { ?>
											<option value="<?php echo $row['count_of_guests']?>" <?php 
												if($row['count_of_guests'] === $guests) {
													echo 'selected="selected"';
												}
											?>>
												<?php echo $row['count_of_guests'];?>
											</option>;
										<?php 
										}
									}
								?>
							</select>
						</div>
						
						<div class="form-group">
							<select class="form-control" value="" name="room-type">
								<option value="0" <?php
									if($room_type === null) {
										echo 'selected="selected"';
									}
									?>
								disabled> Room Type</option>
								<?php
									$sql = "SELECT id, room_type FROM room_type";
									$result =$db->query($sql);
									if ($result->num_rows > 0) {
										while ($row = $result->fetch_assoc()) { ?>
											<option value="<?php echo $row['id']?>" <?php 
												if($row['id'] === $room_type) {
													echo 'selected="selected"';
												}
											?>>
												<?php echo $row['room_type'];?>
											</option>;
										<?php 
										}
									}
								?>
							</select>
						</div>
						
						<div class="form-group">
							<select class="form-control" value="" name="city">
								<option value="0" selected="selected" disabled>City</option>
								<?php
									$sql = "SELECT DISTINCT(city) FROM room";
									$result = $db->query($sql);
									if ($result->num_rows > 0) {
										while ($row = $result->fetch_assoc()) { ?>
											<option value="<?php echo $row['city']?>" <?php 
												if($row['city'] === $city) {
													echo 'selected="selected"';
												}
											?>>
												<?php echo $row['city'];?>
											</option>;
										<?php 
										}
									}
								?>
							</select>
						</div>
						
						<div class="form-group">
							<input type="text" id="Check-In" value="<?php
								if($dateIn === null) {
									echo "check-in";
								}else {
									echo $dateIn;
								}
							?>" name="dateIn">
							<input type="text" id="Check-Out" value="<?php
								if($dateOut === null) {
									echo "check-out";
								}else {
									echo $dateOut;
								}
							?>" name="dateOut">
						</div>
						
						<p>
							<label for="amount">Price range:</label>
							<input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
							<input name="min_price" type="hidden" id="minp">
							<input name="max_price" type="hidden" id="maxp">
						</p>
						<div id="slider-range"></div>
						
						<button type="submit" class="btn btn-success">Submit</button>
					</form>
				</div>
				<div class="col-md-7 col-sm-7 col-xs-12">
					<div class="container-fluid result-box">Search Results</div>
					<?php
						$flag = 0;
						//Depending on user-input, create the corresponding sql query
						$sql = "
							SELECT DISTINCT r.room_id, r.name, r.city, r.area, r.photo, r.count_of_guests, r.price, rt.room_type, r.short_description
							FROM room r 
							JOIN room_type rt ON r.room_type = rt.id
						";
						if($city !== null) {
							$flag = 1;
							$sql = $sql . "WHERE r.city = '$city'";
						}
						if($room_type !== null) {
							if($flag === 1) {
								$sql = $sql . " AND rt.id = '$room_type'";
							}else {
								$sql = $sql . "WHERE rt.id = '$room_type'";
								$flag == 1;
							}
						}
						
						if($guests !== null) {
							if($flag === 1) {
								$sql = $sql . " AND r.count_of_guests = '$guests'";
							}else {
								$sql = $sql . "WHERE r.count_of_guests = '$guests'";
								$flag = 1;
							}
						}
						
						if($flag === 1) {
							$sql = $sql . " AND ";
						}else {
							$sql = $sql . " WHERE";
						}
						$sql = $sql . " r.price BETWEEN '$minp' AND '$maxp';";
						//var_dump($sql);
						$result = $db->query($sql);
						if ($result->num_rows > 0) {
							// output data of each row
							while ($row = $result->fetch_assoc()) {
					?>
								<div class="container-fluid room-tab">
									<div class="row">
										<div class="col-4">
											<img class="room-image" src="images/rooms/<?php echo $row['photo'];?>"><img>
										</div>
										<div class="col-8">
											<h4 class="room-name"><?php echo $row['name'];?></h4>
											<h6 class="room-area"><?php echo $row['area'];?>, <?php echo $row['city'];?></h6>
											<p class="room-info"><?php echo $row['short_description'];?></p>
											<form action="room_page.php" method="post">
												<input type="hidden" name="roomId"
													value="<?php echo $row['room_id'];?>">
												<input type="hidden" name="dateIn"
													value="<?php echo $dateIn;?>">
												<input type="hidden" name="dateOut"
													value="<?php echo $dateOut;?>">
												<button class="button go-to-room" type="Submit">Go to Room Page</button>
											</form>
										</div>
									</div>
									<div class="row">
										<div class="col-4 bar">
											<div class="room-price">Per Night: <?php echo $row['price'];?></div>
										</div>
										<div class="col-8 bar">
											<div class="room-guests">Count of Guests: <?php echo $row['count_of_guests'];?></div>
											<div class="room-type">Type of Room: <?php echo $row['room_type'];?></div>
										</div>
									</div>
								</div>
					<?php
							}
						} else {
							echo "Sorry, there are no rooms with that criteria.";
						}
					?>
				</div>
				<div class="col-md-1 col-sm-1 col-xs-12"></div>
			</div>
		</div>

		<footer class="foot">
			<div class="copyright">
				<span class="text-muted">&copy Colleglink 2018</span>
			</div>
			<script>
				(function($) {
					$.fn.hasScrollBar = function() {
						return this.get(0).scrollHeight > this.height();
					}
				})(jQuery);
				if ($('.foot').hasScrollBar()) {
					$('.foot').css({ position: "relative"});
				}
			</script>
		</footer>
	</body>
</html>