<?php
	
	session_start();

	$page_title = 'CAREERS';
	$js = 'genJavascript.js';
	$meta_key = 'Career, Salesman, Distributor, Sign Shop, Driver, Apply, Job, Merchandiser, Stocking';
	include('includes/header.html.php');
	include('includes/nav.html.php');
	require_once('includes/connect.db.php');
	include_once('includes/functions.php');
	
	$careerID = '1';

	if ($_SESSION["ageVerify"] !== 'yes') {
		header( "Location: ageVerify.php" );
	}

	//$locationSort = formVal('locationSort', 'allLocations');
	$locationSort = isset($_GET['locationSort']) ? $_GET['locationSort'] : 'allLocations';
		

?>
	
	<div id="navPlacement">
		<h1 class="navTitleA"><a href="careers.php">Careers ></a> <?php echo $locationSort ?></h1>
	</div>
	
	<div id="eventsPage">
		

			
		<div id="contactLocations">
			<div id="contactLocationsPHold">
			
			<div id="sortByLocation">
			
				<p>Find by Location: &nbsp;</p><br><br>
			
				<form method="POST" name="locationSort" onclick="this.form.submit()">
					<ul id="sortCareers">
						<a href="?locationSort=All%20Locations"><li <?php if($locationSort=="All Locations") echo 'selected==selected'; ?> value="All Locations">All Locations</li></a>
						<a href="?locationSort=Oshkosh"><li <?php if($locationSort=="Oshkosh") echo 'selected==selected'; ?> value="Oshkosh">Oshkosh</li></a>
						<a href="?locationSort=Rothschild"><li <?php if($locationSort=="Rothschild") echo 'selected==selected'; ?> value="Rice Lake">Rothschild</li></a>
						<a href="?locationSort=Eau%20Claire"><li <?php if($locationSort=="Eau Claire") echo 'selected==selected'; ?> value="Eau Claire">Eau Claire</li></a>
					</ul>
				</form>
				
			</div>
			
				<div id="eventsSlider">

			<?php
					
					$order = " WHERE location LIKE '%' \n";
					if (isset($locationSort)) {
						if ($locationSort == 'All Locations')
							{
								$order = " WHERE location LIKE '%' \n";
							}
							elseif ($locationSort == 'Oshkosh')
							{
								$order = " WHERE location = 'Oshkosh, WI'\n";
							}
							elseif ($locationSort == 'Eau Claire')
							{
								$order = " WHERE location = 'Eau Claire, WI'\n";
							}
							elseif ($locationSort == 'Rothschild')
							{
								$order = " WHERE location = 'Rothschild, WI'\n";
							}
					}
				
				
				$sql = 	"SELECT * \n"
						. "FROM careers \n"
						. $order;
			
				$result = mysqli_query($db, $sql) or die ('Error in query: ' . mysqli_error($db));
					
				if($result->num_rows === 0)
					{
						echo 'No openings at this time';
					}
				else {	
					while($row = mysqli_fetch_array($result)){
				
		
					echo '<a href="?locationSort='.$locationSort.'&careerID='.$row['careerID'].'">
							<div class="eventSliderHolder">
								<p class="eventSliderTitle">'
									.$row['title'].
								'</p>
								<p class="eventSliderLocationTime">'
									.$row['location'].
								'</p>
							</div>
						</a>';
					}

				}

			?>

				</div>
			</div>
		</div>
		<div id="contactContainer">
			<div id="eventHold">
				
				
			
				<?php
				
				
				
					$careerID = formVal('careerID', 1);
				
					$sql = 	"SELECT * \n"
							. "FROM careers \n"
							. $order . "AND careerID = " . $careerID;

					$result = mysqli_query($db, $sql) or die ('Error in query: ' . mysqli_error($db));

					
					if($result->num_rows === 0)
					{
						echo 'No openings at this time';
					}
					else {
						while($row = mysqli_fetch_array($result)){

							echo '<span class="spanEvent2">'.$row['title'].'</span>
									<hr>
									<div class="eventLocationTime">
										<p class="eventLocation">'.$row['location'].'&nbsp &#8226; &nbsp</p>
										<p class="eventTime">'.$row['type'].'</p>
									</div>
									<p class="eventCopy">Qualifications:'.$row['qualifications'].'<br><br>'
										.$row{'description'}.
									'</p>
									<div class="eventLocationTime"><br>
										<p class="eventLocation">Pay: '.$row['pay'].'</p>
									</div><br><br><br><br><br>
									<a id="applyBtn" href="applyCareers.php?locationSort='.$locationSort.'&position='.$row['title'].'">Apply Now</a>';

						}
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
