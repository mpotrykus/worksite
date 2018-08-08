<?php
	
	session_start();

	$page_title = 'HISTORY';
	$js = 'genJavascript.js';
	$meta_key = 'History, John E. Kuenzl, David L. Lindemann, Jeff Lindemann, G Heilman, Pabst, Miller, Sheboygan Beverage, Winnebago Beverage, Strohs, Schlitz, Lewis Distributing, Butler Distributing, Choice Beer Sales, Mid State Distributing, Norma Kuenzl, Johnson Distributing, Schneider Distributing';
	include('includes/header.html.php');
	include('includes/nav.html.php');
	require_once('includes/connect.db.php');
	include_once('includes/functions.php');

	if ($_SESSION["ageVerify"] !== 'yes') {
		header( "Location: ageVerify.php" );
	}
	
?>

	<div id="navPlacement">
		<h1 class="navTitleA"><a href="aboutUs.php">About Us</a> > History</h1>
	</div>
	
	<div id="eventsPage" style="display:inline-block; height: auto;">
	
		<div id="wwdSpacer"></div>
	
		<div id="historyPage">
			
			<div id="tlNavHold">
		
				<div id="tlNav">
					<svg height="100" width="100">
						<circle cx="9" cy="9" r="8" stroke="#ae9c4a" stroke-width="1" fill="#111" />
					</svg>
					<div class="tlNavLineB"></div>
					<div class="tlNavLineB"></div>
				</div>
				<div id="tlNavDash">
				</div>
			</div>
			
				<div class="timeline" id="tl1">
					<div id="tlT1" class="tlTitle">Our history</div>
					<div class="timeHold">
						<div class="timelineLayer1 decadeStamp">1960</div>
						<img id="t601" class="tlEle timelineLayer1 he" data-speed="0" src="images/history/h3.jpg">
						<div id="t602" class="tlEle">
							<div class="heTlHold">
								<div class="heTl"></div>
							</div>
							<div class="he">
								<p class="he1">1963</p>
								<p class="he2">John E. Kuenzl<br>purchases Lee Beverage</p>
								<p class="he3">(Oshkosh) - Pabst and G. Heilman Brands</p>
							</div>
						</div>
					</div>
					<div class="tlBkgd" id="tlBkgd1"></div>
				</div>
				
				<div class="timeline" id="tl2">
					<div class="timeHold">
						<div class="timelineLayer1 decadeStamp">1970</div>
						<div id="t702" class="tlEle">
							<div class="heTlHold">
								<div class="heTl"></div>
							</div>
							<div class="he">
								<p class="he1">1974</p>
								<p class="he2">John E. Kuenzl<br>purchases<br>Sheboygan Beverage</p>
								<p class="he3">G. Heilman and Miller</p>
							</div>
						</div>
						<div id="t703" class="tlEle">
							<div class="heTlHold">
								<div class="heTl"></div>
							</div>
							<div class="he">
								<p class="he1">1977</p>
								<p class="he2">John E. Kuenzl<br>purchases<br>Lindemann Distributing</p>
								<p class="he3">(Eau Claire) - G. Heilman and Hamms</p>
							</div>
						</div>
						<img id="t701" class="tlEle timelineLayer1 he" data-speed="0" src="images/history/h2.jpg">
					</div>
					<div class="tlBkgd" id="tlBkgd2"></div>
				</div>
				
				<div class="timeline" id="tl3">
					<div class="timeHold">
						<div class="timelineLayer1 decadeStamp">1980</div>
						<img id="t801" class="tlEle timelineLayer1 he" data-speed="0" src="images/history/h5.jpg">
						<div id="t802" class="tlEle">
							<div class="heTlHold">
								<div class="heTl"></div>
							</div>
							<div class="he">
								<p class="he1">1982</p>
								<p class="he2">John E. Kuenzl<br>purchases<br>Winnebago Beverage</p>
								<p class="he3">(Fond du Lac) - Stroh's, Schlitz, and Imports</p>
							</div>
						</div>
						<div id="t803" class="tlEle">
							<div class="heTlHold">
								<div class="heTl"></div>
							</div>
							<div class="he">
								<p class="he1">1985</p>
								<p class="he2">John E. Kuenzl<br>purchases<br>Butler Distributing - Pabst.</p>
								<p class="he3">Oshkosh and Eau Claire locations<br>get appointed Coors Distributing rights.<br><br>"East bound and down!"</p>
							</div>
						</div>
						<div id="t804" class="tlEle">
							<div class="heTlHold">
								<div class="heTl"></div>
							</div>
							<div class="he">
								<p class="he1">1986</p>
								<p class="he2">John E. Kuenzl<br>purchases<br>Lewis Distributing</p>
								<p class="he3">(Sheboygan) - Stroh's, Schlitz, and Imports.</p>
							</div>
						</div>
						<div id="t805" class="tlEle">
							<div class="heTlHold">
								<div class="heTl"></div>
							</div>
							<div class="he">
								<p class="he1">1989</p>
								<p class="he2">John E. Kuenzl<br>purchases<br>Choice Beer Sales</p>
								<p class="he3">(Shawano) - Pabst, G. Heilman, and Stroh's</p>
							</div>
						</div>
					</div>
					<div class="tlBkgd" id="tlBkgd3"></div>
				</div>
				<div class="timeline" id="tl4">
					<div class="timeHold">
						<div class="timelineLayer1 decadeStamp">1990</div>
					</div>
					<div class="tlBkgd" id="tlBkgd4"></div>
				</div>
				<div class="timeline" id="tl5">
					<div class="timeHold">
						<div class="timelineLayer1 decadeStamp">2000</div>
						<div id="t002" class="tlEle">
							<div class="heTlHold">
								<div class="heTl"></div>
							</div>
							<div class="he">
								<p class="he1">2000</p>
								<p class="he2">John E. Kuenzl<br>purchases<br>Mid-State Distributing</p>
								<p class="he3">(Steven's Point) - Coors and Pabst</p>
							</div>
						</div>
						<div id="t003" class="tlEle">
							<div class="heTlHold">
								<div class="heTl"></div>
							</div>
							<div class="he">
								<p class="he1">2001</p>
								<p class="he2">John E. Kuenzl<br>and David Lindemann<br>form a partnership</p>
								<p class="he3">which creates LEE BEVERAGE of Wisconsin LLC</p>
							</div>
						</div>
						<div id="t004" class="tlEle">
							<div class="heTlHold">
								<div class="heTl"></div>
							</div>
							<div class="he">
								<p class="he1">2001</p>
								<p class="he2">Lee Beverage<br>of Wisconsin<br>purchases<br>Zich Distributing</p>
								<p class="he3">(Ladysmith) - Coors and Pabst</p>
							</div>
						</div>
						<div id="t005" class="tlEle">
							<div class="heTlHold">
								<div class="heTl"></div>
							</div>
							<div class="he">
								<p class="he1">2001</p>
								<p class="he2">Home office<br>is moved</p>
								<p class="he3">To new 130,000 sq ft. facility<br>at 2850 S Oakwood Rd in Oshkosh</p>
							</div>
						</div>
						<div id="t006" class="tlEle">
							<div class="heTlHold">
								<div class="heTl"></div>
							</div>
							<div class="he">
								<p class="he1">2004</p>
								<p class="he2">John E. Kuenzl<br>passes away</p>
								<p class="he3"></p>
							</div>
						</div>
						<div id="t007" class="tlEle">
							<div class="heTlHold">
								<div class="heTl"></div>
							</div>
							<div class="he">
								<p class="he1">2005</p>
								<p class="he2">Lee Beverage<br>of Wisconsin<br>purchases<br>Bayside distributing</p>
								<p class="he3">(Peshestigo) - Coors and Pabst</p>
							</div>
						</div>
						<div id="t008" class="tlEle">
							<div class="heTlHold">
								<div class="heTl"></div>
							</div>
							<div class="he">
								<p class="he1">2006</p>
								<p class="he2">David L. Lindemann<br>passes away</p>
								<p class="he3">Succeeded as president by his son Jeff Lindemann</p>
							</div>
						</div>
						<div id="t009" class="tlEle">
							<div class="heTlHold">
								<div class="heTl"></div>
							</div>
							<div class="he">
								<p class="he1">2007</p>
								<p class="he2">Lee Beverage<br>of Wisconsin<br>purchases<br>Beer Central</p>
								<p class="he3">(Rice Lake) - Pabst, Diageo, and Imports</p>
							</div>
						</div>
						<img id="t001" class="timelineLayer1 he" data-speed="0" src="images/history/h7.jpg">
					</div>
					<div class="tlBkgd" id="tlBkgd5"></div>
				</div>
				<div class="timeline" id="tl6">
					<div class="timeHold">
						<div class="timelineLayer1 decadeStamp">2010</div>
						<div id="t102">
							<div class="heTlHold">
								<div class="heTl"></div>
							</div>
							<div class="he">
								<p class="he1">2012</p>
								<p class="he2">Founding member of<br>the Wisconsin<br>Beverage Network</p>
								<p class="he3">Offering complete coverage of Wisconsin's 72 counties</p>
							</div>
						</div>
						<div id="t103" class="tlEle">
							<div class="heTlHold">
								<div class="heTl"></div>
							</div>
							<div class="he">
								<p class="he1">2012</p>
								<p class="he2">Lee Beverage<br>of Wisconsin<br>purchases<br>Preferred Distributing</p>
								<p class="he3">(Rice Lake) - Pabst and NAB</p>
							</div>
						</div>
						<div id="t104" class="tlEle">
							<div class="heTlHold">
								<div class="heTl"></div>
							</div>
							<div class="he">
								<p class="he1">2013</p>
								<p class="he2">Norma Kuenzl<br>passes away</p>
								<p class="he3">Lindemann family purchases 100% of the Company</p>
							</div>
						</div>
						<div id="t105" class="tlEle">
							<div class="heTlHold">
								<div class="heTl"></div>
							</div>
							<div class="he">
								<p class="he1">2013</p>
								<p class="he2">Lee Beverage<br>of Wisconsin<br>Celebrates their<br>50th Anniversary</p>
							</div>
						</div>
						<div id="t106" class="tlEle">
							<div class="heTlHold">
								<div class="heTl"></div>
							</div>
							<div class="he">
								<p class="he1">2016</p>
								<p class="he2">Lee Beverage<br>of Wisconsin<br>purchases<br>Johnson Distribution</p>
								<p class="he3">New Glarus, Sam Adams, and other Craft/Imports</p>
							</div>
						</div>
						<div id="t107" class="tlEle">
							<div class="heTlHold">
								<div class="heTl"></div>
							</div>
							<div class="he">
								<p class="he1">2016</p>
								<p class="he2">Lee Beverage<br>of Wisconsin<br>at the same time purchases Schneider Distribution</p>
								<p class="he3">Pabst Brewing Co.</p>
							</div>
						</div>
						<div id="t108" class="tlEle">
							<div class="heTlHold">
								<div class="heTl"></div>
							</div>
							<div class="he">
								<p class="he1">2016</p>
								<p class="he2">Lee Beverage<br>opens an office<br>in Steven's Point, WI</p>
								<p class="he3">with a goal to better service central Wisconsin</p>
							</div>
						</div>
					</div>
					<div class="tlBkgd" id="tlBkgd6"></div>
				</div>
				
			
			
		</div>
	
	</div>

<?php

	include('includes/footer.html.php');

?>