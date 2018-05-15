<?php
	require('db.php');
	$roomId = $_POST['roomId'];
	$userId = 1;
?><!DOCKTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>ROOM PAGE</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="./css/filter_page.css" rel="stylesheet">
	</head>
	<body>
		<!--NAVIGATION BAR -->
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
							<a class="nav-link Profile" href="profile_page.php"><i class="fa fa-user"></i>Profile</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>

		<div class="main">
			<!-- MAIN SECTION -->
			<div class="container-fluid">
				<!-- ROOM HEADER -->
				<div class="row">
					<div id="empty-col" class="col-xl-3 col-md-2 col-sm-2 col-xs-12"></div>
					<div class="col-xl-6 col-md-8 col-sm-8 col-xs-12">
						<div class="heading">
							<?php
								$sql = "SELECT name, city, area FROM room WHERE room_id= '$roomId'";
								$result = $db->query($sql);
								if($result->num_rows > 0) {
									$row = $result->fetch_assoc();
								}
							?>
							<div class="name-location"><?php echo $row['name'] . " - " . $row['city'] . ", " . $row['area'];?> </div>
							<div class="reviews"> Reviews:  
									<div class="stars-outer">
										<div class="stars-inner"></div>
									</div>
									<script>
										<?php
											$sql = "SELECT sum(rate) AS sum, count(review_id) AS count FROM reviews";
											$result = $db->query($sql);
											if($result->num_rows > 0) {
												$row = $result->fetch_assoc();
											
										?>
										// 2
										const starPercentage = ( ($row['sum']/$row['count']) / 5) * 100;
										// 3
										document.querySelector(".stars-inner").style.width = starPercentage+"%";
										<?php } ?>
									</script>
							</div>
							<?php
								$sql = "SELECT status FROM favorites WHERE room_id='$roomId'";
								$result = $db->query($sql);
								if($result->num_rows > 0) {
									$row = $result->fetch_assoc();
								}
							?>
							<div class="favorite-button <?php 
								if($row['status'] == 1) {
									echo 'selected';
								}
							?>" id="favorite-button">&#9829;</div>
							<div class="price-value">Per Night: <?php 
								$sql = "SELECT *, rt.room_type
								FROM room r 
								JOIN room_type rt ON r.room_type = rt.id
								WHERE r.room_id = '$roomId'";
								$result = $db->query($sql);
								if($result->num_rows > 0) {
									$row = $result->fetch_assoc();
								}
							echo $row['price'];?>&euro;</div>
						</div>
					</div>
					<div id="empty-col" class="col-xl-3 col-md-2 col-sm-2 col-xs-12"></div>
				</div>
				<!-- ROOM IMAGES -->
				<div class="row">
					<div id="empty-col" class="col-xl-3 col-md-2 col-sm-2 col-xs-12"></div>
					<div class="col-xl-6 col-md-8 col-sm-8 col-xs-12">
						<img class="room-image2" src="images/rooms/<?php echo $row['photo']?>"><img>
					</div>
					<div id="empty-col" class="col-xl-3 col-md-2 col-sm-2 col-xs-12"></div>
				</div>
			
				<!-- ROOM FOOTER -->
				<div class="row">
					<div id="empty-col" class="col-xl-3 col-md-2 col-sm-2 col-xs-12"></div>
					<div class="col-xl-6 col-md-8 col-sm-8 col-xs-12">
						<div class="heading">
							<div class="item with-border">
								<ul>
									<li><i class="fa fa-user"></i><?php echo $row['count_of_guests']?></li>
									<li>Count of Guests</li>
								</ul>
							</div>
							<div class="item with-border">
								<ul>
									<li><i class="fa fa-bed"></i><?php echo $row['room_type']?></li>
									<li>Type of Room</li>
								</ul>
							</div>
							<div class="item with-border">
								<ul>
									<li><i class="fa fa-car"></i><?php 
										if($row['parking'] > 0) {
											echo 'yes';
										}else {
											echo 'no';
										}
									?></li>
									<li>Parking</li>
								</ul>
							</div>
							<div class="item with-border">
								<ul>
									<li><i class="fa fa-wifi"></i><?php 
										if($row['wifi'] > 0) {
											echo 'yes';
										}else {
											echo 'no';
										}
									?></li>
									<li>Wifi</li>
								</ul>
							</div>
							<div class="item">
								<ul>
									<li><i class="fa fa-user"></i><?php 
										if($row['pet_friendly'] > 0) {
											echo 'yes';
										}else {
											echo 'no';
										}
									?></li>
									<li>Pet Friendly</li>
								</ul>
							</div>
						</div>
					</div>
					<div id="empty-col" class="col-xl-3 col-md-2 col-sm-2 col-xs-12"></div>
				</div>
				
				<!-- ROOM DESCR -->
				<div class="row">
					<div id="empty-col" class="col-xl-3 col-md-2 col-sm-2 col-xs-12"></div>
					<div class="col-xl-6 col-md-8 col-sm-8 col-xs-12">
						<div class="container-fluid desc-box">
							<h6>Room Description</h6>
							<span><?php echo $row['short_description'];?></span>
						</div>
						<?php
							$sql = "SELECT 'Already Booked' AS answer FROM room
							WHERE room_id IN (SELECT room_id FROM bookings WHERE room_id = '$roomId')
							UNION
							SELECT 'Book Now'
							LIMIT 1;
							";
							$result = $db->query($sql);
							if($result->num_rows > 0) {
								$row = $result->fetch_assoc();
							}
						?>
						<div class="btn button <?php 
							if($row['answer'] === "Book Now") {
								echo "book-now";
							}else {
								echo "booked disabled";
							}
						?>" onclick="book(this)">
							<?php 
								echo $row['answer'];
							?>
						</div>
					</div>
					<div id="empty-col" class="col-xl-3 col-md-2 col-sm-2 col-xs-12"></div>
				</div>
				
				<!-- GOOGLE MAP -->
				<div class="row">
					<div id="empty-col" class="col-xl-3 col-md-2 col-sm-2 col-xs-12"></div>
					<div class="col-xl-6 col-md-8 col-sm-8 col-xs-12">
						<div class="map-box">
						<div id="map"></div>
							<script>
							  function initMap() {
								<?php 
									$sql = "SELECT lat_location, lng_location FROM room
									WHERE room_id = '$roomId';
									";
									$result = $db->query($sql);
									if($result->num_rows > 0) {
										$row = $result->fetch_assoc();
									}
								?>
								var pos = {lat: <?php echo $row['lat_location'];?>, lng: <?php echo $row['lng_location'];?>};
								var map = new google.maps.Map(document.getElementById('map'), {
								  zoom: 15,
								  center: pos
								});
								var marker = new google.maps.Marker({
								  position: pos,
								  map: map
								});
							  }
							</script>
							<script async defer
							src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAXCqiJTz6sQqlNorZRkB703XZ1wBL8qjY&callback=initMap">
							</script>
					</div></div>
					<div id="empty-col" class="col-xl-3 col-md-2 col-sm-2 col-xs-12"></div>
				</div>
				
				<!-- REVIEWS -->
				<div class="row">
					<div id="empty-col" class="col-xl-3 col-md-2 col-sm-2 col-xs-12"></div>
					<div class="col-xl-6 col-md-8 col-sm-8 col-xs-12">
						<h5>Reviews</h5>
						<div class="container-fluid desc-box">
							<h5>username</h5>
							<span>datetime</span>
							<span>review</span>
						</div>
					</div>
					<div id="empty-col" class="col-xl-3 col-md-2 col-sm-2 col-xs-12"></div>
				</div>
				
				<!-- REVIEW FORM -->
				<div class="row">
					<div id="empty-col" class="col-xl-3 col-md-2 col-sm-2 col-xs-12"></div>
					<div class="col-xl-6 col-md-8 col-sm-8 col-xs-12">
						<h5>Add Review</h5>
						<div class="container-fluid desc-box">
							<form method="post" action="">
								<input id="rating" type="hidden" name="rating" value="0">
								<fieldset class="form-group">
									<i class="fa fa-star" id="s1" onmouseover="shine(this)"
									onmouseout="reset(this)" onclick="select(this)"></i>
									<i class="fa fa-star" id="s2" onmouseover="shine(this)"
									onmouseout="reset(this)" onclick="select(this)"></i>
									<i class="fa fa-star" id="s3" onmouseover="shine(this)"
									onmouseout="reset(this)" onclick="select(this)"></i>
									<i class="fa fa-star" id="s4" onmouseover="shine(this)"
									onmouseout="reset(this)" onclick="select(this)"></i>
									<i class="fa fa-star" id="s5" onmouseover="shine(this)"
									onmouseout="reset(this)" onclick="select(this)"></i>
								</fieldset>
								<textarea id="comment" rows="1" name="comment" value=""></textarea><br>
								<button type="submit" class="btn btn-primary">Submit</button>								
							</form>
						</div>
					</div>
					<div id="empty-col" class="col-xl-3 col-md-2 col-sm-2 col-xs-12"></div>
				</div>
			</div>

			<!-- FOOTER -->
			<footer class="foot">
				<div class="copyright">
					<span class="text-muted">&copy Colleglink 2018</span>
				</div>
			</footer>
			<script>
				(function($) {
					$.fn.hasScrollBar = function() {
						return this.get(0).scrollHeight > this.height();
					}
				})(jQuery);
				if ($('body').hasScrollBar()) {
					$('.foot').css({ position: "relative"});
				}
			</script>
		</div>
		
		<!-- Script for review stars -->
		<script>
			prev = 0;
			numOfStars = 5; //set this as the number of stars in your form
			re = numOfStars;
			function shine(star) {
				//get the id of the star
				var id = star.id;
				var i = 1;
				//change the color of every previous star
				while ( i <= id[1]) {
					document.getElementById('s'+i).style.color = "yellow";
					++i;
				}
			}
			
			function reset(star) {
				//reset the stars
				for( var i=numOfStars; i>(numOfStars-re); i--) {
					document.getElementById('s'+i).style.color = "black";
				}
			}
			
			function select(star) {
				//change the value of the rating input for the form
				var id = star.id;
				var num = id[1];
				if(num !== prev) {
					$("#rating").val(num);
					//set the stars to be reseted
					re = numOfStars - num;
					prev = num; //This hold the number of the last star selected
				} else {
					//clicked the same star two consecutive times
					//reset the value and the stars
					$("#rating").val(0);
					re = numOfStars;
					prev = 0;
				}
			}
			/*
			document.getElementById('favorite-button').addEventListener('click', function favorite(evt) {
				var hart = evt.target;
				if(hart.className === "favorite-button selected") {
					<?php
						$sql = "SELECT room_id FROM favorites WHERE room_id = '$roomId';";
						$result = $db->query($sql);
						if($result->num_rows > 0) {
							//Make status 0
							$stmt = $db->prepare("UPDATE favorites
									SET status = ?
									WHERE room_id = ?;
									");
							$stat = 0;
							$stmt->bind_param('ii', $stat, $roomId);
							$stmt->execute();
							$stmt->close();
						}
					?>
					hart.className = "favorite-button";
				}else {
					<?php
						$sql = "SELECT room_id FROM favorites WHERE room_id = '$roomId';";
						$result = $db->query($sql);
						if($result->num_rows > 0) {
							//Make status 1
							$stmt = $db->prepare("UPDATE favorites
									SET status = ?
									WHERE room_id = ?;
									");
							$stat = 1;
							$stmt->bind_param('ii', $stat, $roomId);
							$stmt->execute();
							$stmt->close();
						}else {
							$stmt = $db->prepare("INSERT INTO favorites(status, user_id, room_id)
												VALUES(?, ?, ?);
									");
							$stat = 1;
							$stmt->bind_param('iii', $stat, $userId, $roomId);
							$stmt->execute();
							$stmt->close();
						}
					?>
					hart.className = "favorite-button selected";
				}
			}, false);*/
			
			function book(room){
				<?php
					$stmt = $db->prepare("INSERT INTO bookings (check_in_date, check_out_date, user_id, room_id) VALUES(?, ?, ?, ?)");
					$stmt->bind_param("ssii", $dateIn, $dateOut, $userId, $roomId);
					$stmt->execute();
					$stmt->close();
				?>
				room.className = "btn button booked disabled";
			}
		</script>
		
	</body>
</html>