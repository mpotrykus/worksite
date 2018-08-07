<?php
	
	session_start();

	$page_title = 'ABOUT US';
	$js = 'genJavascript.js';
	$meta_key = 'About Us, Description, Featured Beers, History, Territory';
	include('includes/header.html.php');
	include('includes/nav.html.php');
	require_once('includes/connect.db.php');
	include_once('includes/functions.php');

	if ($_SESSION["ageVerify"] !== 'yes') {
		header( "Location: ageVerify.php" );
	}
	
?>
	
	<div id="navPlacement">
		<h1 class="navTitleA">About Us</h1>
	</div>
	
	<div id="wwdSpacer"></div>
	<div id="eventsPage" style="height:auto;display:block;">
	<div id="whatWeDo">
	
		<div id="whatWeDoLeft">
			<div id="whatWeDoLeftImg">
			</div>
		</div>
		
		<div id="whatWeDoRight">
			
			<div id="whatWeDoRightCopy1">
			
				<div id="whatWeDoHr"><img src="images/whatWeDoHr.png"></div>
				<br><br><br><br><br><br>
				<span id="spanHead3wwd" class="spanHead3">What</span><br>
				<span id="spanHead4wwd" class="spanHead4">We do</span><br><br>
				
				<p>
				
					Lee Beverage is a family owned company, rich
					in midwestern values, that prides itself on selling
					quality products and providing industry leading
					service. Starting off as a small two truck operation
					that covered two counties, we have grown into
					one of the largest Coors - All other distributors in
					the state.
					
					<br><br>
					
					<a href="history.php">Our History &nbsp <i class="fa fa-angle-double-right" aria-hidden="true"></i> </a><br>
					<a href="territory.php">Our Territory &nbsp <i class="fa fa-angle-double-right" aria-hidden="true"></i> </a>
					
				</p>
					
			</div>
			
			<div id="whatWeDoHops">
			</div>
		
		</div>
		
	</div>
</div>
	<div id="footAdContainer">
		
		<?php include('includes/footAd1.php'); ?>
		<?php include('includes/footAd2.php'); ?>
		
	</div>

<?php

	include('includes/footer.html.php');

?>
