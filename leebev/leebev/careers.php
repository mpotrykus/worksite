<?php
	
	$page_title = 'CAREERS';
	$js = 'genJavascript.js';
	$meta_key = 'Career, Salesman, Distributor, Sign Shop, Driver, Apply, Job, Merchandiser, Stocking';
	include('includes/header.html.php');
	include('includes/nav.html.php');
	require_once('includes/connect.db.php');
	include_once('includes/functions.php');
	
?>
	
	<div id="navPlacement">
		<h1 class="navTitleA">Careers</h1>
	</div>
	
	<div id="careersHome">
	
		<div class="careersHomeHolder" id="careersHomeHolder1">
			<a href="careerListings.php?locationSort=Oshkosh">
				<div class="careersHomeLink crw1" id="careersOshkosh">
					<p>Oshkosh Openings</p>
					<div></div>
				</div>
			</a>
		</div>
	
		<div class="careersHomeHolder" id="careersHomeHolder2">
			<a href="careerListings.php?locationSort=Rothschild">
				<div class="careersHomeLink crw2" id="careersRiceLake">
					<p>Rothschild Openings</p>
					<div></div>
				</div>
			</a>
			<a href="careerListings.php?locationSort=Eau%20Claire">
				<div class="careersHomeLink crw2" id="careersStevensPoint">
					<p>Eau Claire Openings</p>
					<div></div>
				</div>
			</a>
			
		</div>
		
	</div>

<?php

	include('includes/footer.html.php');

?>
