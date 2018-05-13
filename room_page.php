<!DOCKTYPE html>
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
							<div class="name-location">Hotel Name - Location </div>
							<div class="reviews"> Reviews:  
									<div class="stars-outer">
										<div class="stars-inner"></div>
									</div>
									<!--
										// 2
										const starPercentage = (ratings[rating] / starTotal) * 100;
										// 3
										const starPercentageRounded = `${(Math.round(starPercentage / 10) * 10)}%`;
										// 4
										document.querySelector(`.${rating} .stars-inner`).style.width = starPercentageRounded; 
									-->
							</div>
							<div class="favorite-button">&#9829;</div>
							<div class="price-value">Per Night: </div>
						</div>
					</div>
					<div id="empty-col" class="col-xl-3 col-md-2 col-sm-2 col-xs-12"></div>
				</div>
				<!-- ROOM IMAGES -->
				<div class="row">
					<div id="empty-col" class="col-xl-3 col-md-2 col-sm-2 col-xs-12"></div>
					<div class="col-xl-6 col-md-8 col-sm-8 col-xs-12">
						<img class="room-image2" src="images/rooms/room-1.jpg"><img>
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
									<li><i class="fa fa-user"></i>2</li>
									<li>Count of Guests</li>
								</ul>
							</div>
							<div class="item with-border">
								<ul>
									<li><i class="fa fa-bed"></i>2</li>
									<li>Type of Room</li>
								</ul>
							</div>
							<div class="item with-border">
								<ul>
									<li><i class="fa fa-car"></i>1</li>
									<li>Parking</li>
								</ul>
							</div>
							<div class="item with-border">
								<ul>
									<li><i class="fa fa-wifi"></i>Yes</li>
									<li>Wifi</li>
								</ul>
							</div>
							<div class="item">
								<ul>
									<li><i class="fa fa-user"></i>Yes</li>
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
							<span>Desc goes here</span>
						</div>
						<button href="#" class="button">Book Now</button>
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
								var pos = {lat: 37.976703, lng: 23.750417};
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
		</script>
		
	</body>
</html>
