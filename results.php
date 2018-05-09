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
	if (isset($_POST['city']) &&
		isset($_POST['dateIn']) &&
		isset($_POST['dateOut']) &&
		isset($_POST['guests']) &&
		isset($_POST['room-type'])
	) {
		$city = $_POST['city'];
		$dateIn = $_POST['dateIn'];
		$dateOut = $_POST['dateOut'];
		$guests = $_POST['guests'];
		$roomType= $_POST['room-type'];
	
		$sql = "SELECT name, city, area, photo, short_description, price, count_of_guests
				FROM room JOIN room_type ON room.room_type=room_type.id
				WHERE city='$city' AND room_type.room_type='$roomType' AND count_of_guests='$guests'
		";

		$result = mysqli_query($conn, $sql);
		if (mysqli_query($conn, $sql)) {
			//echo '<div class="alert alert-success" role="alert">New record created successfully</div>';
		} else {
			echo '<div class="alert alert-success" role="alert">Error: ' . $sql . "<br>" . mysqli_error($conn).'</div>';
		}
		if (mysqli_num_rows($result) > 0) {
			// output data of each row
			while ($row = mysqli_fetch_assoc($result)) { ?>
				<div class="container-fluid room-tab">
					<div class="row">
						<div class="col-4">
							<img class="room-image" src="images/rooms/<?php echo $row['photo'];?>"><img>
						</div>
						<div class="col-8">
							<h4 class="room-name"><?php echo $row['name'];?></h4>
							<h6 class="room-area"><?php echo $row['area'];?>, <?php echo $row['city'];?></h6>
							<p class="room-info"><?php echo $row['short_description'];?></p>
							<form action="room-page.php" method="post">
								<button type="submit" class="button go-to-room">Go to Room Page</button>
								</form>
						</div>
					</div>
					<div class="row">
						<div class="col-4 bar">
							<div class="room-price">Per Night: <?php echo $row['price'];?></div>
						</div>
						<div class="col-8 bar">
							<div class="room-guests">Count of Guests: <?php echo $row['count_of_guests'];?></div>
							<div class="room-type">Type of Room: <?php echo $room_type;?></div>
						</div>
					</div>
				</div>
			<?php
			}
		} else {
			echo "Sorry, there are no rooms with that creteria.";
		}
	} else {
		echo "Oups, something went wrong. Try later.";
	}
?>
