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

	include('includes/PHPMailer/Exception.php');
	include('includes/PHPMailer/OAuth.php');
	include('includes/PHPMailer/PHPMailer.php');
	include('includes/PHPMailer/POP3.php');
	include('includes/PHPMailer/SMTP.php');

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	
	$careerID = '1';

	$isValid = true;

	//$locationSort = formVal('locationSort', 'allLocations');
	$locationSort = isset($_GET['locationSort']) ? $_GET['locationSort'] : 'allLocations';
	$position = isset($_GET['position']) ? $_GET['position'] : '';

	$department = "";
	$departmentErr = "";

	$firstName = "";
	$firstErr = "";
	
	$lastName = "";
	$lastErr = "";

	$email = "";
	$emailErr = "";

	$phoneArea = "";
	$phoneAreaErr = "";

	$phone1 = "";
	$phone1Err = "";

	$phone2 = "";
	$phone2Err = "";

	$prefContact = "";
	$prefContactErr = "";

	$comments = "";
	$commentsErr = "";

	
	if(isset($_POST['submit'])){
		
		$department = formVal('department');
		$department = strip_tags($department);
		$department = preg_replace('/[^a-zA-Z0-9]/', '', $department);
		$department = mysqli_real_escape_string($db, $department);
			
		$firstName = formVal('firstName');
		$firstName = strip_tags($firstName);
		$firstName = preg_replace('/[^a-zA-Z0-9]/', '', $firstName);
		$firstName = mysqli_real_escape_string($db, $firstName);
				
		$lastName = formVal('lastName');
		$lastName = strip_tags($lastName);
		$lastName = preg_replace('/[^a-zA-Z0-9]/', '', $lastName);
		$lastName = mysqli_real_escape_string($db, $lastName);

		$email = formVal('email');
		$email = strip_tags($email);
		$email = mysqli_real_escape_string($db, $email);
		
		$phoneArea = formVal('areaCode');
		$phoneArea = strip_tags($phoneArea);
		$phoneArea = filter_var($phoneArea, FILTER_SANITIZE_NUMBER_INT);
		$phoneArea = preg_replace('/[^a-zA-Z0-9]/', '', $phoneArea);
		$phoneArea = mysqli_real_escape_string($db, $phoneArea);
		
		$phone1 = formVal('phoneNumber1');
		$phone1 = strip_tags($phone1);
		$phone1 = filter_var($phone1, FILTER_SANITIZE_NUMBER_INT);
		$phone1 = preg_replace('/[^a-zA-Z0-9]/', '', $phone1);
		$phone1 = mysqli_real_escape_string($db, $phone1);
		
		$phone2 = formVal('phoneNumber2');
		$phone2 = strip_tags($phone2);
		$phone2 = filter_var($phone2, FILTER_SANITIZE_NUMBER_INT);
		$phone2 = preg_replace('/[^a-zA-Z0-9]/', '', $phone2);
		$phone2 = mysqli_real_escape_string($db, $phone2);
		
		$comments = formVal('comments');
		$comments = strip_tags($comments);
		$comments = preg_replace('/[^a-zA-Z0-9]/', '', $comments);
		$comments = mysqli_real_escape_string($db, $comments);
		
		$prefContact = formVal('contactMethod');
		
		
		if(empty($department)){
			$departmentErr = "Please choose the department you would like to reach<br>";
			$isValid = false;
		}
			
		if(empty($firstName)){
			$firstErr = "Please enter your first name<br>";
			$isValid = false;
		}
		
		if(empty($lastName)){
			$lastErr = "Please enter your last name<br>";
			$isValid = false;
		}
		
		if(empty($email) || (filter_var($email, FILTER_VALIDATE_EMAIL)) == false){
			$emailErr = "Please enter a valid email address<br>";
			$isValid = false;
		}
		
		if(empty($phoneArea) || (is_numeric($phoneArea)) == false || strlen($phoneArea) != 3 || empty($phone1) || (is_numeric($phone1)) == false || strlen($phone1) != 3 || empty($phone2) || (is_numeric($phone2)) == false || strlen($phone2) != 4 ){
			$phoneAreaErr = "Please enter a valid phone number<br>";
			$isValid = false;
		}
		
		if(empty($prefContact)){
			$prefContactErr = "Please choose your preferred contact method<br>";
			$isValid = false;
		}
		
		if(empty($comments)){
			$commentsErr = "Please let us know how we can help<br>";
			$isValid = false;
		}
		
		if($isValid){

					$phoneAll = $phoneArea . $phone1 . $phone2;

					/*
					$mail = new PHPMailer(true);
					try {
						//Server settings
						$mail->IsSMTP();
						$mail->Host       = "relay-hosting.secureserver.net";
						$mail->Port       = 25;                   
						$mail->SMTPDebug  = 0;
						$mail->SMTPSecure = "none";                 
						$mail->SMTPAuth   = false;
						$mail->Username   = "";
						$mail->Password   = "";

						//Recipients
						$mail->setFrom('mpotrykus@leebeverage.com', 'Mailer');
						$mail->addAddress('mpotrykus@leebeverage.com', 'Joe User');     // Add a recipient
						//$mail->addAddress('ellen@example.com');               // Name is optional
						//$mail->addReplyTo('info@example.com', 'Information');

						//Attachments
						//$mail->addAttachment($_POST['resume']);         // Add attachments
						//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

						//Content
						$mail->isHTML(true);                                  // Set email format to HTML
						$mail->Subject = $locationSort . " " . $position . "Application (" . date("m/d/Y") . ")";
						$mail->Body    = "Name = " . $firstName . ' ' . $lastName . "<br>
										Address = " . $streetA1 . $streetA2 . ", " . $city . ", " . $state . " " . $zip . "<br>
										Email = " . $email . "<br>
										Phone Number = (" . $phoneArea . ") " . $phone1 . " - " . $phone2 . "<br>
										Date Available = " . $date . "<br>
										Resume = " . $resumeFile . " (Attached)";

						$mail->send();
						echo 'Message has been sent';
					} catch (Exception $e) {
						echo 'Message could not be sent.';
						echo 'Mailer Error: ' . $mail->ErrorInfo;
					}
				
					*/
			
					$sql = "INSERT INTO `contact`(`contactID`, `department`, `firstName`, `lastName`, `email`, `phoneNumber`, `prefContact`, `comments`, `date`)
						VALUES ('','$department','$firstName','$lastName','$email','$phoneAll','$prefContact','$comments',NOW())";

					$stmt = mysqli_stmt_init($db);		
					mysqli_stmt_prepare($stmt, $sql) or die("Error in update query");
					mysqli_stmt_bind_param($stmt, "ssssiss", $department, $firstName, $lastName, $email, $phoneAll, $prefContact, $comments);
					$result = mysqli_stmt_execute($stmt) or die("Error inserting record");
			
					header("Location: contactSent.php");
			
				}	
				
			}

?>
	
	<div id="navPlacement">
		<h1 class="navTitleA">Contact Us</h1>
	</div>
	
	<div id="eventsPage">
		
		<div id="contactLocations">
			<div id="contactLocationsPHold">
				<p class="contactP">
					<span class="locationSpan">Oshkosh - Headquarters</span><br>
					Lee Beverage of WI, LLC<br>
					2850 S. Oakwood Rd.<br>
					Oshkosh, WI 54904<br>
					phone: (920) 235-1140
				</p>
				<p class="contactP">
					<span class="locationSpan">Rothschild</span><br>
					300 Creske Ave<br>
					Rothschild, WI 54474<br>
					phone: (715) 359-8252
				</p>
				<p class="contactP">
					<span class="locationSpan">Eau Claire</span><br>
					2714 Melby St.<br>
					Eau Claire, WI 54703<br>
					phone: (715) 832-2959
				</p>
			</div>
		</div>
		
		<div id="contactContainer">
			<div id="contactHold">
				<h1><span class="spanEvent2">Contact Us<?php echo $position ?></span></h1>
			
			
			<form method="POST" name="applyCareer">
				
				<table id="applyCareerTable">
					<tbody>
					<col width=80><col width=100>
					<tr>
						<td class="tableName">Department</td>
						<td>
							<select name="department">
								<option>(Select Department)</option>
								<option <?php if($department=="Sales") echo 'selected="selected"'; ?> value="Sales">Sales</option>
								<option <?php if($department=="Event") echo 'selected="selected"'; ?> value="Event">Event</option>
								<option <?php if($department=="SignShop") echo 'selected="selected"'; ?> value="SignShop">Sign Shop</option>
								<option <?php if($department=="HumanResources") echo 'selected="selected"'; ?> value="HumanResources">Human Resources</option>
								<option <?php if($department=="Miscellaneous") echo 'selected="selected"'; ?> value="Miscellaneous">Miscellaneous</option>
							</select>
						</td>
					</tr>
					<tr>
						<td class="tableName">Name</td>
						<td>
							<input class="inputResponsive" size=49 type="text" maxlength=30 value="<?php echo $firstName ?>" placeholder="First Name" name="firstName">
							<input class="inputResponsive" size=48 type="text" maxlength=30 value="<?php echo $lastName ?>" placeholder="Last Name" name="lastName">
						</td>
					</tr>
					<tr>
						<td class="tableName">Email Address</td>
						<td>
							<input class="inputResponsive" size=102 type="text" maxlength=80 value="<?php echo $email ?>" placeholder="Email Address" name="email">
						</td>
					</tr>
					<tr>
						<td class="tableName">Phone Number</td>
						<td>
							( <input size=10 maxlength=3 type="text" value="<?php echo $phoneArea ?>" placeholder="Area Code" name="areaCode" id="phoneArea"> ) 
							<input size=10 maxlength=3 type="text" value="<?php echo $phone1 ?>" placeholder="Phone" name="phoneNumber1" id="phone1"> - 
							<input size=15 maxlength=4 type="text" value="<?php echo $phone2 ?>" placeholder="Number" name="phoneNumber2" id="phone2">
						</td>
					</tr>
					<tr>
						<td class="tableName">Preferred Contact</td>
						<td>
							Phone <input <?php if($prefContact=="phone") echo 'checked="checked"'; ?> name="contactMethod" type="radio" value="phone">
							Email <input <?php if($prefContact=="email") echo 'checked="checked"'; ?> name="contactMethod" type="radio" value="email">
						</td>
					</tr>
					<tr>
						<td class="tableName">How Can We Help?</td>
						<td>
							<textarea name="comments" id="contactComments"><?php echo $comments ?></textarea>
						</td>
					</tr>
					<tr></tr>
					<tr>
						<td></td>
						<td>
							<input id="submitResume" value="submit" type="submit" name="submit">
						</td>
					</tr>
					<tr></tr>
					<tr>
						<td></td>
						<td>
							<p style="color:red;">
								<?php 
									echo $departmentErr;
									echo $firstErr;
									echo $lastErr;
									echo $emailErr;
									echo $phoneAreaErr;
									echo $prefContactErr;
									echo $commentsErr;
								?>
							</p>
						</td>
					</tr>
					</tbody>
				</table>
			</form>
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
