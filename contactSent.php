<?php

	session_start();
	
	$page_title = 'CONTACT US';
	$js = 'genJavascript.js';
	$meta_key = 'contact, contact us, email, send, thank you';
	include('includes/header.html.php');
	include('includes/nav.html.php');
	require_once('includes/connect.db.php');
	include_once('includes/functions.php');

	if ($_SESSION["ageVerify"] !== 'yes') {
		header( "Location: ageVerify.php" );
	}

?>
	
	<div id="navPlacement">
		<h1 class="navTitleA">Contact Us</h1>
	</div>
	
	<div id="eventsPage">
		
		<div id="applyContainer">
		
			<span class="spanEvent2">Thank you!<br> Your information has been sent and we will respond to you as soon as possible.</span>
			<br><br>
			<a id="sentReturn" href="index.php">Back to Home</a>
		
			
		</div>
		
		
	</div>


	
<?php

	include('includes/footer.html.php');

?>
