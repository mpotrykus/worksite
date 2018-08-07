<?php
	
	session_start();
	
	$page_title = 'HOME';
	$js = 'indexJavascript.js';
	$meta_key = 'Whats News, What We Do, Featured Beers';
	include('includes/header.html.php');
	
	if ($_SESSION["ageVerify"] !== "yes") {
		header( "Location: ageVerify.php" );
	}
	$introCheck = (isset($_SESSION['introCheck']))?$_SESSION['introCheck']:'0';
	echo '<style> var introCheck = ' . $introCheck . '; </style>';
	if ($introCheck == 0) {
		$_SESSION['introCheck'] = 1;
		$introCheck = $_SESSION['introCheck'];
	}

?>
	

	<div id="pageIntro">
		<div id="PIulContainer">
			
			<ul>
				<div id="PILogoHolder"></div>
				<div id="PIhrContainer"><br><br><br><br><br></div>
				<div class="PIWord">
					<div class="PILetterHold"><li class="pageIntroHide2 PILetter">W</li></div>
					<div class="PILetterHold PILEE"><li class="PILetter" id="pageIntroE1">E</li></div>
				</div>
				<div class="PIWord PISpace">&nbsp;</div>
				<div class="PIWord">
					<div class="PILetterHold"><li class="pageIntroHide2 PILetter">S</li></div>
					<div class="PILetterHold"><li class="pageIntroHide1 PILetter">P</li></div>
					<div class="PILetterHold"><li class="pageIntroHide1 PILetter">E</li></div>
					<div class="PILetterHold"><li class="pageIntroHide2 PILetter">A</li></div>
					<div class="PILetterHold"><li class="pageIntroHide1 PILetter">K</li></div>
				</div>
				<div class="PIWord PISpace">&nbsp;</div>
				<div class="PIWord">
					<div class="PILetterHold"><li class="pageIntroHide1 PILetter">O</li></div>
					<div class="PILetterHold"><li class="pageIntroHide1 PILetter">F</li></div>
				</div>
				<div class="PIWord PISpace" id="PISpace3">&nbsp;</div>
				<div class="PIWord">
					<div class="PILetterHold"><li class="pageIntroHide1 PILetter">S</li></div>
					<div class="PILetterHold"><li class="pageIntroHide1 PILetter">E</li></div>
					<div class="PILetterHold"><li class="pageIntroHide1 PILetter">R</li></div>
					<div class="PILetterHold"><li class="pageIntroHide2 PILetter">V</li></div>
					<div class="PILetterHold"><li class="pageIntroHide1 PILetter">I</li></div>
					<div class="PILetterHold"><li class="pageIntroHide1 PILetter">C</li></div>
					<div class="PILetterHold"><li class="pageIntroHide1 PILetter">E</li></div>
					<div class="PILetterHold"><li class="pageIntroHide1 PILetter">.</li></div>
					<div class="PILetterHold"><li class="pageIntroHide2 PILetter">.</li></div>
					<div class="PILetterHold"><li class="pageIntroHide1 PILetter">.</li></div>
				</div>
			<br>
				<div class="PIWord">
					<div class="PILetterHold"><li class="pageIntroHide1 PILetter">O</li></div>
					<div class="PILetterHold"><li class="pageIntroHide1 PILetter">U</li></div>
					<div class="PILetterHold"><li class="pageIntroHide2 PILetter">R</li></div>
				</div>
				<div class="PIWord PISpace">&nbsp;</div>
				<div class="PIWord">
					<div class="PILetterHold"><li class="pageIntroHide1 PILetter">P</li></div>
					<div class="PILetterHold"><li class="pageIntroHide1 PILetter">R</li></div>
					<div class="PILetterHold"><li class="pageIntroHide2 PILetter">O</li></div>
					<div class="PILetterHold"><li class="pageIntroHide2 PILetter">D</li></div>
					<div class="PILetterHold"><li class="pageIntroHide1 PILetter">U</li></div>
					<div class="PILetterHold"><li class="pageIntroHide1 PILetter">C</li></div>
					<div class="PILetterHold"><li class="pageIntroHide1 PILetter">T</li></div>
					<div class="PILetterHold"><li class="pageIntroHide2 PILetter">S</li></div>
				</div>
				<div class="PIWord PISpace">&nbsp;</div>
				<div class="PIWord">
					<div class="PILetterHold"><li class="pageIntroHide1 PILetter">S</li></div>
					<div class="PILetterHold"><li class="pageIntroHide1 PILetter">P</li></div>
					<div class="PILetterHold PILEE"><li class="PILetter" id="pageIntroE2">E</li></div>
					<div class="PILetterHold"><li class="pageIntroHide1 PILetter">A</li></div>
					<div class="PILetterHold"><li class="pageIntroHide2 PILetter">K</li></div>
				</div>
				<div class="PIWord PISpace" id="PISpace2">&nbsp;</div>
				<div class="PIWord">
					<div class="PILetterHold"><li class="pageIntroHide1 PILetter">F</li></div>
					<div class="PILetterHold"><li class="pageIntroHide1 PILetter">O</li></div>
					<div class="PILetterHold"><li class="pageIntroHide1 PILetter">R</li></div>
				</div>
				<div class="PIWord PISpace" id="PISpace1">&nbsp;</div>
				<div class="PIWord">
					<div class="PILetterHold"><li class="pageIntroHide1 PILetter">T</li></div>
					<div class="PILetterHold"><li class="pageIntroHide1 PILetter">H</li></div>
					<div class="PILetterHold"><li class="pageIntroHide1 PILetter">E</li></div>
					<div class="PILetterHold"><li class="pageIntroHide1 PILetter">M</li></div>
					<div class="PILetterHold"><li class="pageIntroHide2 PILetter">S</li></div>
					<div class="PILetterHold"><li class="pageIntroHide2 PILetter">E</li></div>
					<div class="PILetterHold PILEE"><li class="PILetter" id="pageIntroL">L</li></div>
					<div class="PILetterHold"><li class="pageIntroHide1 PILetter">V</li></div>
					<div class="PILetterHold"><li class="pageIntroHide1 PILetter">E</li></div>
					<div class="PILetterHold"><li class="pageIntroHide2 PILetter">S</li></div>
				</div>
			</ul>
		</div>
		<div id="PIlogo"><img src="images/logoWhiteLarge.png"></div>
		<div id="PIbkgd">
			<div id="PIbkgd1"></div>
			<div id="PIbkgd1-1"></div>
			<div id="PIbkgd2"></div>
			<div id="PIbkgd2-1"></div>
			<div id="PIbkgd3"></div>
			<div id="PIbkgd3-1"></div>
		</div>
	</div>

	<div id="header">
	
		<div id="headerCallContainer">
			<div id="headerCallContainer1">
				<div id="headerCall">
					<img src="images/logoWhite.png"><br><br>
					<span id="spanHead1">Lee Beverage of Wisconsin, LLC</span>
					<br><br><hr><br>
					<span id="spanHead2">We Speak of Service...<br>
					Our Products Speak for Themselves</span>
				</div>
			</div>
			
		</div>
		
		<div id="headerScroll">
			<a id="homeScrollBtn" href="#navContainer1"><i class="fa fa-angle-double-down" style="font-size:3.25vh;" aria-hidden="true"></i></a><br>
			<span>Scroll to Learn More</span>
		</div>	

	</div>
	
<?php

	include('includes/nav.html.php');
	
?>
	
	<div id="navFill">
	</div>
	
	<div id="adContainer">
	
		<div id="adHeaderContainer">
			<div id="adHeader">
				<p>
					<span class="spanHead3">what's</span>
					<span class="spanHead4">News?</span>
				</p>
			</div>
			<div id="headerHops">
			</div>
		</div>
	
		<div id="adSection">
			
			<div id="adSlideContainer">
				<div id="adSlide">
					<div id="adSlideLink1" class="slide slideSelect"><a href="#"><img src="images/ads/lakefrontAd.jpg"></a></div>
					<div id="adSlideLink2" class="slide slideSelectNext"><a href="#"><img src="images/ads/nymAd.jpg"></a></div>
					<div id="adSlideLink3" class="slide"><a href="#"><img src="images/ads/pabstAd.jpg"></a></div>
					<div id="adSlideLink4" class="slide"><a href="#"><img src="images/ads/pointAd.jpg"></a></div>
					<div id="adSlideLink5" class="slide"><a href="#"><img src="images/ads/sierraNevadaAd.jpg"></a></div>
				</div>
				<div id="slideNav">
					<div value="1" class="slideNavBtn slideNavSelected"></div>
					<div value="2" class="slideNavBtn"></div>
					<div value="3" class="slideNavBtn"></div>
					<div value="4" class="slideNavBtn"></div>
					<div value="5" class="slideNavBtn"></div>
			</div>
			</div>
			
		</div>
		
	</div>
	
	
	<div id="whatWeDo">
	
		<div id="whatWeDoLeft">
			<div id="whatWeDoLeftImg">
			</div>
		</div>
		
		<div id="whatWeDoRight">
			
			<div id="whatWeDoRightCopy">
			
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

	<div id="ourBeers">
	
		<div id="adHeaderContainer">
			<div id="adHeader">
				<p>
					<span class="spanHead3">our</span>
					<span class="spanHead4">Beers</span>
				</p>
			</div>
			<div id="headerHops">
			</div>
		</div>
		
		<div id="bottleSlideContainer">
			<div id="bottleSlideHolder">
				<div class="bottleSlideImg" id="slideBottleLink1"><a href="productDescription.php?productSort=Beer&product=357"><img id="bottleSlideImg1" src="images/featuredBtls/coorsLightBtlSlide.png"></a></div>
				<div class="bottleSlideImg" id="slideBottleLink2"><a href="productDescription.php?productSort=Beer&product=809"><img id="bottleSlideImg2" src="images/featuredBtls/newGlarusSpottedCowSlide.png"></a></div>
				<div class="bottleSlideImg" id="slideBottleLink3"><a href="productDescription.php?productSort=Beer&product=231"><img id="bottleSlideImg3" src="images/featuredBtls/blueMoonBelgianWhiteSlide.png"></a></div>
				<div class="bottleSlideImg" id="slideBottleLink4"><a href="productDescription.php?productSort=Beer&product=356"><img id="bottleSlideImg4" src="images/featuredBtls/coorsBanquetBtlSlide.png"></a></div>
				<div class="bottleSlideImg" id="slideBottleLink5"><a href="productDescription.php?productSort=Beer&product=696"><img id="bottleSlideImg5" src="images/featuredBtls/lakefrontRiverwestSlide.png"></a></div>
			</div>
			<p id="ourBeersLink">
				<a href="products.php">Check out our full inventory</a>
			</p>
		</div>
		
	</div>

	
		<div id="footAdContainer">
		
			<?php include('includes/footAd1.php'); ?>
			<?php include('includes/footAd2.php'); ?>
			
		</div>
	
<?php

	include('includes/footer.html.php');




?>
