<?php

	session_start();

	$page_title = 'OLD ENOUGH?';
	$js = 'indexJavascript.js';
	$meta_key = 'Age Verify';
	include('includes/header.html.php');
	include_once('includes/functions.php');

	$ageVerify = formVal('submit');

	$_SESSION["ageVerify"] = $ageVerify;
	
	echo 	'<img id="ageVerifyImg" src="images/logoWhiteLarge.png">';
	
	echo	'<div id="ageVerify">';

	if ($_SESSION["ageVerify"] === "yes") {
		
		echo		'Are you 21+ years old?<br>

					<form method="POST">
						<button class="ageYN" type="submit" name="submit" value="yes"><i class="fa fa-check" aria-hidden="true"></i></button>
						<button class="ageYN" type="submit" name="submit" value="no"><i class="fa fa-times" aria-hidden="true"></i></button>
					</form>

					<p>don\'t lie...</p>';
		
		echo    "<script>
					localStorage.introCheck = 0;
					if (($(window).width()) > 1234)  {
						setTimeout(function () {
								$('#PIbkgd').css({
										'display' : 'block'
									});

							}, 10);

						setTimeout(function () {
									$('#PIbkgd2, #PIbkgd2-1').css({
										'background-size' : '100% 100%'
									});

							}, 50);

						setTimeout(function () {
									$('#PIbkgd1, #PIbkgd1-1').css({
										'background-size' : '100% 100%'
									});

							}, 250);

						setTimeout(function () {
									$('#PIbkgd3, #PIbkgd3-1').css({
										'background-size' : '100% 100%'
									});

							}, 400);

						setTimeout(function () {

							window.location.href = 'index.php';

							}, 1400);
					}
					else {
						window.location.href = 'index.php';
					}

				</script>";
		
	}
	else if ($_SESSION["ageVerify"] === "no") {
		
		echo "Sorry kid, adults only..."; 
		
	}
	else {
		
		echo		'Are you 21+ years old?<br>

					<form method="POST">
						<button class="ageYN" type="submit" name="submit" value="yes"><i class="fa fa-check" aria-hidden="true"></i></button>
						<button class="ageYN" type="submit" name="submit" value="no"><i class="fa fa-times" aria-hidden="true"></i></button>
					</form>

					<p>don\'t lie...</p>';
		
	}
	echo	'</div>';

?>
		<div id="PIbkgd" style="display: none;">
			<div id="PIbkgd1" style="background-size: 0px 100%;"></div>
			<div id="PIbkgd1-1" style="background-size: 0px 100%;"></div>
			<div id="PIbkgd2" style="background-size: 0px 100%;"></div>
			<div id="PIbkgd2-1" style="background-size: 0px 100%;"></div>
			<div id="PIbkgd3" style="background-size: 0px 100%;"></div>
			<div id="PIbkgd3-1" style="background-size: 0px 100%;"></div>
		</div>
		
</body>

</html>