<?php
	
	session_start();

	$page_title = 'PRODUCTS';
	$js = 'genJavascript.js';
	include('includes/header.html.php');
	include('includes/nav.html.php');
	require_once('includes/connect.db.php');
	include_once('includes/functions.php');

	if ($_SESSION["ageVerify"] !== 'yes') {
		header( "Location: ageVerify.php" );
	}
	
?>
	
	<div id="navPlacement">
		<h1 class="navTitleA">Products</h1>
	</div>
	
	<div id="productsHome">
	
		<div class="productsHomeHolder" id="careersHomeHolder1&start=0">
			<a href="productsListings.php?productSort=Beer&brand=&start=0"><div class="productsHomeLink" id="productsBeer">
				<p>Beer</p>
				<div></div>
			</div></a>
			<a href="productsListings.php?productSort=Draft&brand=&start=0"><div class="productsHomeLink" id="productsLiquor">
				<p>Draft</p>
				<div></div>
			</div></a>
			<a href="productsListings.php?productSort=NA%20Beer&brand=&start=0"><div class="productsHomeLink" id="productsEnergyDrink">
				<p>NA Beer</p>
				<div></div>
			</div></a>
		</div>
	
		<div class="productsHomeHolder" id="productsHomeHolder2">
			<a href="productsListings.php?productSort=LiquorWine&brand=&start=0"><div class="productsHomeLink" id="productsAdultBeverage">
				<p>Liquor/Wine</p>
				<div></div>
			</div></a>
			<a href="productsListings.php?productSort=Dry%20Goods&brand=&start=0"><div class="productsHomeLink" id="productsSoda">
				<p>Dry Goods</p>
				<div></div>
			</div></a>
			<a href="productsListings.php?productSort=NonAlcoholic&brand=&start=0"><div class="productsHomeLink" id="productsWater">
				<p>Non-Alcoholic Beverages</p>
				<div></div>
			</div></a>
		</div>
		
	</div>

<?php

	include('includes/footer.html.php');

?>
