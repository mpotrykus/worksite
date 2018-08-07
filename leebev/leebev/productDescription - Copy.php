<?php
	
	session_start();

	$page_title = 'PRODUCTS';
	$js = 'genJavascript.js';
	$meta_key = 'Product';
	include('includes/header.html.php');
	include('includes/nav.html.php');
	require_once('includes/connect.db.php');
	include_once('includes/functions.php');

	if ($_SESSION["ageVerify"] !== 'yes') {
		header( "Location: ageVerify.php" );
	}

	$product = isset($_GET['product']) ? $_GET['product'] : 'all';
	$productSort = isset($_GET['productSort']) ? $_GET['productSort'] : 'Beer';
	
?>

<?php

	$sql = 	  "SELECT * \n"
			. "FROM products \n"
			. "JOIN brands ON products.brandID=brands.brandID\n"
			. "JOIN producttype ON products.productTypeID=producttype.productTypeID\n"
			. "JOIN brandFamily ON products.brandFamilyID=brandFamily.brandFamilyID\n"
			. "WHERE productID LIKE '" . $product . "'\n"
			. "ORDER BY brand ASC, product ASC\n"
			. "LIMIT 1";
			
	$result = mysqli_query($db, $sql) or die ('Error in query: ' . mysqli_error($db));
					
	if($result->num_rows === 0) {
		echo 'Product Error';
	}
	else {
		while($row = mysqli_fetch_array($result)){
			
			echo '<div id="navPlacement">
				<h1 class="navTitleA"><a href="products.php">Products</a> > <a href="productsListings.php?productSort=' . $productSort . '">' . $productSort . '</a> >' . $row['product'] . ' </h1>
			</div>';
			
		}
	}		
?>

	<div id="wwdSpacer"></div>
	
	<div id="eventsPage" style="display: inline-block; height:auto;">
	
		<div id="productListContainer" style="background-color: #eee;">
			<div id="productList1">
				<div id="productDescriptionHolder">
				
			<?php
				
				
				$sql = 	  "SELECT * \n"
						. "FROM products \n"
						. "JOIN brands ON products.brandID=brands.brandID\n"
						. "JOIN producttype ON products.productTypeID=producttype.productTypeID\n"
						. "JOIN brandFamily ON products.brandFamilyID=brandFamily.brandFamilyID\n"
						. "WHERE productID LIKE '" . $product . "'\n"
						. "ORDER BY brand ASC, product ASC\n"
						. "LIMIT 1";
			
				$result = mysqli_query($db, $sql) or die ('Error in query: ' . mysqli_error($db));
					
				if($result->num_rows === 0) {
						echo 'Product Error';
					}
				else {	
					while($row = mysqli_fetch_array($result)){
							
							echo 	"<div id='productDescriptionImg'>
										<img src='images/products/";
						
							if ((file_exists("images/products/" . $row['imgPath'] . ".png")) == 1) {
								echo $row['imgPath'];
							}
							else {
								echo "defaultBottle";
							}
											
							echo		".png'>" .
										/*<div class='productImgRefHold1'>
											<img class='productImgRef1' src='images/products/";
							
											if ((file_exists("images/products/" . $row['imgPath'] . ".png")) == 1) {
												echo $row['imgPath'];
											}
											else {
												echo "defaultBottle";
											}
															
											echo		".png'>
											
										</div>
										<div class='productShdw1'></div>*/
									"</div>
							
									<div id='productDescriptionHr'>&nbsp;</div>
							
									<div id='productDescription'><br>
										<div id='productDescriptionC1'>
											<span class='spanEvent2'>" . $row['product'] . "</span><br>
											<span class='productTag'>" . $row['brand'] . " &#8226; " . $row['brandFamily'] . " &#8226; ABV: " . $row['alcVol'] . "</span><br>
											<p>" . $row['description'] . "</p><br>
											<a href='productsListings.php?productSort=" . $productSort . "'>Back to " . $productSort . "</a>
										</div>
									</div>";

						}
					
					}

			?>		
		
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
