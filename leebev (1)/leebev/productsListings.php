 <?php
	
	session_start();

	$page_title = 'PRODUCTS';
	$js = 'genJavascript.js';
	$meta_key = 'product, brand, pabst, coors, new glarus, sun drop, miller, sam adams, lakefront';
	include('includes/header.html.php');
	include('includes/nav.html.php');
	require_once('includes/connect.db.php');
	include_once('includes/functions.php');

	if ($_SESSION["ageVerify"] !== 'yes') {
		header( "Location: ageVerify.php" );
	}

	$productSort = isset($_GET['productSort']) ? $_GET['productSort'] : 'Beer';

	$start = formVal('start', 0);
	$per_page = formVal('per_page', 50);
	$productSort = formVal('productSort', 'Beer');
	$brandX = formVal('brand', '');
	
?>
	
	<div id="navPlacement">
		<h1 class="navTitleA"><a href="products.php"> Products </a> > <?php echo $productSort ?></h1>
	</div>
	
	<div id="wwdSpacer"></div>
	
	<div id="eventsPage" style="display: inline-block; height:auto;">
		
		<div id="productFrameHolder">
			
			<div id="productFrameClose">&times;</div>
			<iframe id="productFrame" name="productFrame"></iframe>
			<div id="productFramePrevious"> < </div>
			<div id="productFrameShow"></div>
			<div id="productFrameNext"> > </div>
			
		</div>
		<div id="productBack"></div>
		<div id="productListContainer">
			<div id="productList">
				
			
				
			<?php
				
				
				$sqlT = "SELECT productID, product, description, alcVol, MAX(imgPath) AS imgPath, MAX(productType) AS productType, brand, brandFamily \n"
						. "FROM products \n"
						. "JOIN brands ON products.brandID=brands.brandID\n"
						. "JOIN producttype ON products.productTypeID=producttype.productTypeID\n"
						. "JOIN brandFamily ON products.brandFamilyID=brandFamily.brandFamilyID\n";
				$order = "WHERE productType LIKE 'Beer' \n";
				$sqlB = "GROUP BY product, brand\n"
						. "ORDER BY brand ASC, product ASC";
					if (isset($productSort)) {
							if ($productSort == 'Beer')
							{
								$order = "WHERE productType LIKE 'Beer Pkg' OR productType LIKE 'Cider pkg'\n";
							}
							elseif ($productSort == 'Draft')
							{
								$sqlT = "SELECT sub.productID, sub.product, sub.description, sub.alcVol, sub.imgPath, sub.productType, sub.brand, sub.brandFamily \n"
										. "FROM \n"
											. "(SELECT productID, product, description, alcVol, MAX(imgPath) AS imgPath, MIN(productType) AS productType, brand, brandFamily \n"
											. "FROM products \n"
											. "JOIN brands ON products.brandID=brands.brandID \n"
											. "JOIN productType ON products.productTypeID=productType.productTypeID \n"
											. "JOIN brandFamily ON products.brandFamilyID=brandFamily.brandFamilyID \n"
											. "GROUP BY product, brand   \n"
											. "ORDER BY `products`.`product` ASC) sub \n";
								$order = "WHERE productType IN ('Beer BBL', 'Cider BBL', 'Non Alcoholic BBL')";
								$sqlB = "ORDER BY brand ASC, product ASC";
							}
							elseif ($productSort == 'NA Beer')
							{
								$order = "WHERE productType LIKE 'NA Beer'\n";
							}
							elseif ($productSort == "LiquorWine")
							{
								$order = "WHERE productType LIKE 'LIQUOR' OR productType LIKE 'Wine'\n";
							}
							elseif ($productSort == "Dry Goods")
							{
								$order = "WHERE productType LIKE 'Dry Goods'\n";
							}
							elseif ($productSort == "NonAlcoholic")
							{
								$order = "WHERE productType LIKE 'Water' OR productType LIKE 'Non Alcoholic pkg'\n";
							}
							if ($brandX !== '') 
							{
								$order = "WHERE brand = \"". $brandX ."\"\n";
							}
					}
				
				$product = array();
				$productID = array();
				$brand = array();
				$imgPath = array();
				$inventory = array();
				$lBrand = '';
				$resultCount = 0;	
			
				$sql = 	$sqlT
						. $order
						. $sqlB;
			
				$result = mysqli_query($db, $sql) or die ('Error in query: ' . mysqli_error($db));

				if($result->num_rows === 0) {
						echo 'No beers';
					}
				else {	
					while($row = mysqli_fetch_array($result)){

						$resultCount++;
						
						}
					}
			
			///////////////////
			
			
				$recordCount = mysqli_num_rows($result);
					
				$sql .= " LIMIT $start, $per_page";
					
				$result = mysqli_query($db, $sql);

				$prev_start = $start - $per_page;
				$next_start = $start + $per_page;
							
				$pages = $resultCount / $per_page;	
			
				$pages = floor($pages);
			
			?>
								
			<form method="GET">
				<label>Products Per Page 
					<select name="per_page">
						<option <?php if($per_page=="10") echo 'selected==selected'; ?> value="10">10</option>
						<option <?php if($per_page=="20") echo 'selected==selected'; ?> value="20">20</option>
						<option <?php if($per_page=="50") echo 'selected==selected'; ?> value="50">50</option>
						<option <?php if($per_page=="100") echo 'selected==selected'; ?> value="100">100</option>
					</select>
				</label>&nbsp;&nbsp;&nbsp;
				
				<label>
				<nobr>Product Type 
					<select name="productSort">
						<option <?php if($productSort=="Beer") echo 'selected==selected'; ?> value="Beer">Beer</option>
						<option <?php if($productSort=="Draft") echo 'selected==selected'; ?> value="Draft">Draft</option>
						<option <?php if($productSort=="NA Beer") echo 'selected==selected'; ?> value="NA Beer">NA Beer</option>
						<option <?php if($productSort=="LiquorWine") echo 'selected==selected'; ?> value="LiquorWine">LiquorWine</option>
						<option <?php if($productSort=="Dry Goods") echo 'selected==selected'; ?> value="Dry Goods">Dry Goods</option>
						<option <?php if($productSort=="NonAlcoholic") echo 'selected==selected'; ?> value="NonAlcoholic">NonAlcoholic</option>
					</select>
				</nobr>
					<input type="hidden" name="start" value="0">&nbsp;
					<input type="hidden" name="brand" value="">
								
					<input type="submit" value="Submit">
				</label>
				
			</form>
			
			<div class="searchBox">
				<input type="text" autocomplete="off" placeholder="Search products..." />
				<div class="result" tabindex="100"></div>
			</div>
			
			<?php
			
						   
			//////////////////
					
				if($result->num_rows === 0) {
						echo 'No beers';
					}
				else {	
					while($row = mysqli_fetch_array($result)){
							$rBrand = $row['brand'];
							$rProduct = $row['product'];
							$rProductID = $row['productID'];
							$rImgPath = $row['imgPath'];
							$oneProd = 0;
						
							if ($lBrand == $rBrand) {
								
								$product[] = $rProduct;
								$productID[] = $rProductID;
								$imgPath[] = $rImgPath;
								
								$brand['brand'] = $rBrand;
								$brand['product'] = $product;
								$brand['productID'] = $productID;
								$brand['imgPath'] = $imgPath;
								
								$oneProd = 0;
								
							}
							else {
								
								$eBrand = array_filter($brand);
								if (!empty($eBrand)) {
									$inventory[] = $brand;
									$brand = array();
								}
								
								$lBrand = $rBrand;
									
								$product = array();
								$productID = array();
								$imgPath = array();
								$product[] = $rProduct;
								$productID[] = $rProductID;
								$imgPath[] = $rImgPath;
								
								if ($oneProd = 1) {
									$brand['brand'] = $rBrand;
									$brand['product'] = $product;
									$brand['productID'] = $productID;
									$brand['imgPath'] = $imgPath;
								}
								
								$oneProd = 1;
								
							}
						}
					
						$eBrand = array_filter($brand);
								if (!empty($eBrand)) {
									$inventory[] = $brand;
								}
					
					}
				
					foreach($inventory as $a){
						
						echo	'<div class="productsHolder">
									<span class="productsBrandName">' . $a['brand'] . '</span>
									<hr>
									<div class="productBrandHolder">';
									
									foreach($a['product'] as $b => $c){
										
										echo	'<a href="productDescription.php?productSort=' . $productSort . '&product=' . $a['productID'][$b] . '&start=' . $start . '&per_page=' . $per_page . '&brand=' . $brandX . '" target="productFrame"><div class="productContainer">
											<div class="productImgHolder">
												<img class="productImg" src="images/products/';
										
										if ((file_exists("images/products/" . $a['imgPath'][$b] . ".png")) == 1) {
											echo $a['imgPath'][$b];
										}
										else {
											echo "defaultBottleSmall";
										}

											echo 	'.png">
											
											<div class="productShdw"></div>
											
											<div class="productImgRefHold">
												<img class="productImgRef" src="images/products/';
										
											if ((file_exists("images/products/" . $a['imgPath'][$b] . ".png")) == 1) {
												echo $a['imgPath'][$b];
											}
											else {
												echo "defaultBottleSmall";
											}

												echo 	'.png">

													</div>
											
												</div>
												<p class="productName">' . $c . '</p>
											</div></a>';
										
									}
									
						echo		'</div>
								</div>';	

					}
						   	echo '<div id="pageHolder">';
							if($prev_start >= 0){
								echo '<a href="?productSort='.$productSort.'&brand=' . $brandX . '&start='.$prev_start.'&per_page='.$per_page.'">Prev</a>&nbsp;&nbsp;';
							}
							else {
								echo '';
							}
						   	
						   
						   	for ($x = 0; $x <= $pages; $x++) {
								echo '<a href="?productSort='.$productSort.'&brand=' . $brandX . '&start='. $x * $per_page .'&per_page='.$per_page.'" id="pL' . ($x + 1) . '">'.($x + 1) .' </a>';
							}
						   
						   	$currentPage = ($start + $per_page) / $per_page;
						   
						   	echo "<div id='cp' style='display: none'>#pL$currentPage</div>";
							
						   
							if($next_start < $recordCount) {
								echo ' &nbsp;&nbsp;<a href="?productSort='.$productSort.'&brand=' . $brandX . '&start='.$next_start.'&per_page='.$per_page.'">Next</a>';
							}
							else {
								echo '';
							}
							echo '</div>';
			?>
		

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
