<?php

	session_start();
	
	$page_title = 'EVENTS';
	$js = 'genJavascript.js';
	$meta_key = 'Event, Fair, Tasting, Concert, Show, Weekend, Celebrate, Party, Bar, Occasion';
	include('includes/header.html.php');
	include('includes/nav.html.php');
	require_once('includes/connect.db.php');
	include_once('includes/functions.php');

	if ($_SESSION["ageVerify"] !== 'yes') {
		header( "Location: ageVerify.php" );
	}
	
	$eventID = '1';

?>
	
	<div id="navPlacement">
		<h1 class="navTitleA">Events</h1>
	</div>
	
	<div id="eventsPage">
		
		<div id="contactLocations">
			<div id="contactLocationsPHold">
				<div id="eventsSlider">

					<?php

						$sql = 	"SELECT *
								FROM events";

						$result = mysqli_query($db, $sql) or die ('Error in query: ' . mysqli_error($db));
										while($row = mysqli_fetch_array($result)){

							echo '<a href="?eventID='.$row['eventID'].'">
									<div class="eventSliderHolder">
										<p class="eventSliderTitle">'
											.$row['title'].
										'</p>
										<p class="eventSliderLocationTime">'
											.$row['dateTime'].
										'</p>
									</div>
								</a>';

						}

					?>
				</div>
			</div>
		</div>
		<div id="contactContainer">
			<div id="eventHold">
			
				<?php
				
					$eventID = formVal('eventID', 1);
				
					$sql = 	"SELECT *
							FROM events
							WHERE eventID='$eventID'";

					$result = mysqli_query($db, $sql) or die ('Error in query: ' . mysqli_error($db));


					while($row = mysqli_fetch_array($result)){

						echo '<span class="spanEvent2">'.$row['title'].'</span>
								<hr>
								<div class="eventLocationTime">
									<p class="eventLocation"><nobr>'.$row['location'].'</nobr>&nbsp &#8226; &nbsp</p>
									<p class="eventTime"><nobr>'.$row['dateTime'].'</nobr></p>
								</div>
								<p class="eventCopy">'
									.$row{'details'}.
								'</p>
								<div class="eventLocationTime"><br>
									<p class="eventLocation">Our featured beers: '.$row['featuredBeers'].'</p>
								</div>';

					}
				
				?>
				
			</div>
		</div>
	</div>
		
		<div id="footAdContainer">
		
			<?php include('includes/footAd3.php'); ?>
			<?php include('includes/footAd4.php'); ?>
			
		</div>
	
<?php

	include('includes/footer.html.php');

?>
