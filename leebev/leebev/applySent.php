<?php

	session_start();
	
	$page_title = 'CAREERS';
	$js = 'genJavascript.js';
	include('includes/header.html.php');
	include('includes/nav.html.php');
	require_once('includes/connect.db.php');
	include_once('includes/functions.php');
	
	if ($_SESSION["ageVerify"] !== 'yes') {
		header( "Location: ageVerify.php" );
	}

	$careerID = '1';


	//$locationSort = formVal('locationSort', 'allLocations');
	$locationSort = isset($_GET['locationSort']) ? $_GET['locationSort'] : 'allLocations';
	$position = isset($_GET['position']) ? $_GET['position'] : '';

?>
	
	<div id="navPlacement">
		<h1 class="navTitleA">Careers > <?php echo $locationSort ?> > <?php echo $position ?></h1>
	</div>
	
	<div id="eventsPage">
		
		<div id="applyContainer">
		
			<span class="spanEvent2">Thank you!<br> Your application has been sent.</span>
			<br>
			<a href="careerListings.php">Back to Careers</a>
		
			
		</div>
		
		
	</div>


	
<?php

	include('includes/footer.html.php');

?>
