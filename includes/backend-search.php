<?php

require_once('connect.db.php');

// Check connection
if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
if(isset($_REQUEST['term'])){
    // Prepare a select statement
    $sql = 	  "SELECT MAX(productID) AS productID, product, description, alcVol, MAX(imgPath) AS imgPath, MAX(productType) AS productType, brand, brandFamily\n"
			. "FROM products\n"
			. "JOIN brands ON products.brandID=brands.brandID\n"
			. "JOIN producttype ON products.productTypeID=producttype.productTypeID\n"
			. "JOIN brandFamily ON products.brandFamilyID=brandFamily.brandFamilyID\n"
			. "WHERE UPPER(product) LIKE UPPER('%" . $_REQUEST['term'] . "%') OR UPPER(brand) LIKE UPPER('%" . $_REQUEST['term'] . "%')\n"
			. "GROUP BY product\n"
			. "ORDER BY brand ASC, product ASC";
    

    if($stmt = mysqli_prepare($db, $sql)){
        // Bind variables to the prepared statement as parameters
       // mysqli_stmt_bind_param($stmt, "s", $param_term);

        // Set parameters
        //$param_term = strtoupper($_REQUEST['term']) . '%';
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            
            // Check number of rows in the result set
            if(mysqli_num_rows($result) > 0){
                
				/*
				// Fetch result rows as an associative array
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    echo "<a href='productDescription.php?productSort=Beer&product=" . $row["product"] . "'><p>". strtoupper($row["brand"]) . " " . $row["product"] . "</p></a>";
				*/	
					
					
				$product = array();
				$productID = array();
				$brand = array();
				$imgPath = array();
				$inventory = array();
				$lBrand = '';	
					
				if($result->num_rows === 0) {
						echo 'No beers';
					}
				else {	
					while($row = mysqli_fetch_array($result)){
							$rBrand = $row['brand'];
							$rProduct = $row['product'];
							$rProductID = $row['productID'];
							$rImgPath = $row['imgPath'];
						
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
									<a href="productsListings.php?start=0&&brand=' . $a['brand'].'"><span class="productsBrandName">' . $a['brand'] . '</span></a>
									<hr>
									<div>';
									
									foreach($a['product'] as $b => $c){
										
										echo	'<a href="productDescription.php?product=' . $a['productID'][$b] . '"><p>' . $c . '</p></a>';	
									}
						echo 		'</div>
								</div>';

					}
					
					echo "<style> 
					
						</style>";
                
            } else{
                echo "<p>No matches found</p>";
            }
        } else{
            echo "ERROR: Could not execute $sql. " . mysqli_error($db);
        }
    }
	else { 
		echo "whoops";
		
	}

}
// close connection
mysqli_close($db);
?>