<?php

	session_start();
	
	$page_title = 'CAREERS';
	$js = 'genJavascript.js';
	$meta_key = 'Career, Salesman, Distributor, Sign Shop, Driver, Apply, Job, Merchandiser, Stocking';
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

	$firstName = "";
	$firstErr = "";
	
	$lastName = "";
	$lastErr = "";

	$streetA1 = "";
	$streetA1Err = "";

	$streetA2 = "";
	$streetA2Err = "";

	$city = "";
	$cityErr = "";

	$state = "";
	$stateErr = "";

	$zip = "";
	$zipErr = "";

	$email = "";
	$emailErr = "";

	$phoneArea = "";
	$phoneAreaErr = "";

	$phone1 = "";
	$phone1Err = "";

	$phone2 = "";
	$phone2Err = "";

	$date = "";
	$dateErr = "";

	$resumeFile = "";
	$resumeFileErr = "";
	$resumeFileErr1 = "";

	
	if(isset($_POST['submit'])){
			
		$firstName = formVal('firstName');
		$firstName = strip_tags($firstName);
		$firstName = preg_replace('/[^a-zA-Z0-9]/', '', $firstName);
		$firstName = mysqli_real_escape_string($db, $firstName);
				
		$lastName = formVal('lastName');
		$lastName = strip_tags($lastName);
		$lastName = preg_replace('/[^a-zA-Z0-9]/', '', $lastName);
		$lastName = mysqli_real_escape_string($db, $lastName);
				
		$streetA1 = formVal('streetAddress1');
		$streetA1 = strip_tags($streetA1);
		$streetA1 = preg_replace('/[^a-zA-Z0-9]/', '', $streetA1);
		$streetA1 = mysqli_real_escape_string($db, $streetA1);
		
		$streetA2 = formVal('streetAddress2');
		$streetA2 = strip_tags($streetA2);
		$streetA2 = preg_replace('/[^a-zA-Z0-9]/', '', $streetA2);
		$streetA2 = mysqli_real_escape_string($db, $streetA2);
		
		$city = formVal('city');
		$city = strip_tags($city);
		$city = preg_replace('/[^a-zA-Z0-9]/', '', $city);
		$city = mysqli_real_escape_string($db, $city);
		
		$state = formVal('state');
		$state = strip_tags($state);
		$state = preg_replace('/[^a-zA-Z0-9]/', '', $state);
		$state = mysqli_real_escape_string($db, $state);
		
		$zip = formVal('zip');
		$zip = strip_tags($zip);
		$zip = filter_var($zip, FILTER_SANITIZE_NUMBER_INT);
		$zip = mysqli_real_escape_string($db, $zip);
		
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
		
		$date = formVal('dateAvailable');
		$date = strip_tags($date);
		$date = mysqli_real_escape_string($db, $date);
		
		$resumeFile = formVal('resume');
		$resumeFile = strip_tags($resumeFile);
		$resumeFile = mysqli_real_escape_string($db, $resumeFile);
		
		/*VALIDATE FILE TYPE*/

		$info = pathinfo($resumeFile);
		$fileType = $info['extension'];
		$fileType = (string)$fileType;
		
			
		if(empty($firstName)){
			$firstErr = "Please enter your first name<br>";
			$isValid = false;
		}
		
		if(empty($lastName)){
			$lastErr = "Please enter your last name<br>";
			$isValid = false;
		}
		
		if(empty($streetA1)){
			$streetA1Err = "Please enter your street address<br>";
			$isValid = false;
		}
		
		if(empty($city)){
			$cityErr = "Please enter your city<br>";
			$isValid = false;
		}
		
		if($state == ' ' || strlen($state) > 2 ){
			$stateErr = "Please enter your state<br>";
			$isValid = false;
		}
		
		if(empty($zip) || (is_numeric($zip)) == false || strlen($zip) != 5){
			$zipErr = "Please add a valid zip code<br>";
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
		
		if(empty($date)){
			$dateErr = "Please enter date available<br>";
			$isValid = false;
		}
		
		if(empty($resumeFile)){
			$resumeFileErr = "Please add a resume<br>";
			$isValid = false;
		}
		
		if (($fileType != "jpg") && ($fileType != "doc") && ($fileType != "pdf")) {
			$resumeFileErr1 = "Please add a .pdf, .doc, or .jpg file resume";
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
			
			
					$sql = "INSERT INTO `applications`(`applicationID`, `firstName`, `lastName`, `streetAddress1`, `streetAddress2`, `city`, `state`, `zip`, `email`, `phoneNumber`, `dateAvailable`, `resumeFile`)
						VALUES ('','$firstName','$lastName','$streetA1','$streetA2','$city','$state','$zip','$email','$phoneAll','$date','$resumeFile')";

					$stmt = mysqli_stmt_init($db);		
					mysqli_stmt_prepare($stmt, $sql) or die("Error in update query");
					mysqli_stmt_bind_param($stmt, "ssssssisiss", $firstName, $lastName, $streetA1, $streetA2, $city, $state, $zip, $email, $phoneAll, $date, $resumeFile);
					$result = mysqli_stmt_execute($stmt) or die("Error inserting record");
			
					header("Location: applySent.php?locationSort=" . $locationSort . "&position=" . $position);
			
				}	
			}

?>
	
	<div id="navPlacement">
		<h1 class="navTitleA"><a href="careers.php">Careers ></h1> <a href="careerListings.php?locationSort=<?php echo $locationSort?>"><?php echo $locationSort ?> ></a> <?php echo $position ?></p>
	</div>
	
	<div id="eventsPage">
		
		<div id="applyContainer">
		
			<span class="spanEvent2">Apply for <?php echo $position ?></span>
			<p class="eventLocationTime">Location: <?php echo $locationSort ?></p>
			
			<a href="careerListings.php?locationSort=<?php echo $locationSort ?>&position=<?php echo $position ?>">Back</a>
			
			<form method="POST" name="applyCareer">
				
				<table id="applyCareerTable">
					<tbody>
					<col width=80><col width=100>
					<tr>
						<td class="tableName">Name</td>
						<td>
							<input class="inputResponsive" size=49 type="text" maxlength=30 value="<?php echo $firstName ?>" placeholder="First Name" name="firstName">
							<input class="inputResponsive" size=48 type="text" maxlength=30 value="<?php echo $lastName ?>" placeholder="Last Name" name="lastName">
						</td>
					</tr>
					<tr>
						<td class="tableName">Address</td>
						<td>
							<input class="inputResponsive" size=101 type="text" maxlength=80 value="<?php echo $streetA1 ?>" placeholder="Street Address 1" name="streetAddress1">
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<input class="inputResponsive" size=101 type="text" maxlength=80 value="<?php echo $streetA2 ?>" placeholder="Street Address 2" name="streetAddress2">
						</td>
					</tr>	
					<tr>
						<td></td>
						<td>
							<input class="inputResponsive" size=55 type="text" maxlength=50 value="<?php echo $city ?>" placeholder="City" name="city">
							<select name="state">
								<option <?php if($state==" ") echo 'selected="selected"'; ?> value=" "> </option>
								<option <?php if($state=="AL") echo 'selected="selected"'; ?> value="AL">AL</option>
								<option <?php if($state=="AK") echo 'selected="selected"'; ?> value="AK">AK</option>
								<option <?php if($state=="AR") echo 'selected="selected"'; ?> value="AR">AR</option>	
								<option <?php if($state=="AZ") echo 'selected="selected"'; ?> value="AZ">AZ</option>
								<option <?php if($state=="CA") echo 'selected="selected"'; ?> value="CA">CA</option>
								<option <?php if($state=="CO") echo 'selected="selected"'; ?> value="CO">CO</option>
								<option <?php if($state=="CT") echo 'selected="selected"'; ?> value="CT">CT</option>
								<option <?php if($state=="DC") echo 'selected="selected"'; ?> value="DC">DC</option>
								<option <?php if($state=="DE") echo 'selected="selected"'; ?> value="DE">DE</option>
								<option <?php if($state=="FL") echo 'selected="selected"'; ?> value="FL">FL</option>
								<option <?php if($state=="GA") echo 'selected="selected"'; ?> value="GA">GA</option>
								<option <?php if($state=="HI") echo 'selected="selected"'; ?> value="HI">HI</option>
								<option <?php if($state=="IA") echo 'selected="selected"'; ?> value="IA">IA</option>	
								<option <?php if($state=="ID") echo 'selected="selected"'; ?> value="ID">ID</option>
								<option <?php if($state=="IL") echo 'selected="selected"'; ?> value="IL">IL</option>
								<option <?php if($state=="IN") echo 'selected="selected"'; ?> value="IN">IN</option>
								<option <?php if($state=="KS") echo 'selected="selected"'; ?> value="KS">KS</option>
								<option <?php if($state=="KY") echo 'selected="selected"'; ?> value="KY">KY</option>
								<option <?php if($state=="LA") echo 'selected="selected"'; ?> value="LA">LA</option>
								<option <?php if($state=="MA") echo 'selected="selected"'; ?> value="MA">MA</option>
								<option <?php if($state=="MD") echo 'selected="selected"'; ?> value="MD">MD</option>
								<option <?php if($state=="ME") echo 'selected="selected"'; ?> value="ME">ME</option>
								<option <?php if($state=="MI") echo 'selected="selected"'; ?> value="MI">MI</option>
								<option <?php if($state=="MN") echo 'selected="selected"'; ?> value="MN">MN</option>
								<option <?php if($state=="MO") echo 'selected="selected"'; ?> value="MO">MO</option>	
								<option <?php if($state=="MS") echo 'selected="selected"'; ?> value="MS">MS</option>
								<option <?php if($state=="MT") echo 'selected="selected"'; ?> value="MT">MT</option>
								<option <?php if($state=="NC") echo 'selected="selected"'; ?> value="NC">NC</option>	
								<option <?php if($state=="NE") echo 'selected="selected"'; ?> value="NE">NE</option>
								<option <?php if($state=="NH") echo 'selected="selected"'; ?> value="NH">NH</option>
								<option <?php if($state=="NJ") echo 'selected="selected"'; ?> value="NJ">NJ</option>
								<option <?php if($state=="NM") echo 'selected="selected"'; ?> value="NM">NM</option>			
								<option <?php if($state=="NV") echo 'selected="selected"'; ?> value="NV">NV</option>
								<option <?php if($state=="NY") echo 'selected="selected"'; ?> value="NY">NY</option>
								<option <?php if($state=="ND") echo 'selected="selected"'; ?> value="ND">ND</option>
								<option <?php if($state=="OH") echo 'selected="selected"'; ?> value="OH">OH</option>
								<option <?php if($state=="OK") echo 'selected="selected"'; ?> value="OK">OK</option>
								<option <?php if($state=="OR") echo 'selected="selected"'; ?> value="OR">OR</option>
								<option <?php if($state=="PA") echo 'selected="selected"'; ?> value="PA">PA</option>
								<option <?php if($state=="RI") echo 'selected="selected"'; ?> value="RI">RI</option>
								<option <?php if($state=="SC") echo 'selected="selected"'; ?> value="SC">SC</option>
								<option <?php if($state=="SD") echo 'selected="selected"'; ?> value="SD">SD</option>
								<option <?php if($state=="TN") echo 'selected="selected"'; ?> value="TN">TN</option>
								<option <?php if($state=="TX") echo 'selected="selected"'; ?> value="TX">TX</option>
								<option <?php if($state=="UT") echo 'selected="selected"'; ?> value="UT">UT</option>
								<option <?php if($state=="VT") echo 'selected="selected"'; ?> value="VT">VT</option>
								<option <?php if($state=="VA") echo 'selected="selected"'; ?> value="VA">VA</option>
								<option <?php if($state=="WA") echo 'selected="selected"'; ?> value="WA">WA</option>
								<option <?php if($state=="WI") echo 'selected="selected"'; ?> value="WI">WI</option>	
								<option <?php if($state=="WV") echo 'selected="selected"'; ?> value="WV">WV</option>
								<option <?php if($state=="WY") echo 'selected="selected"'; ?> value="WY">WY</option>
							</select>&nbsp;
							<input size=20 type="text" maxlength=5 value="<?php echo $zip ?>" placeholder="Zip" name="zip">
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
						<td class="tableName">Date Available</td>
						<td>
							<input type="date" name="dateAvailable">
						</td>
					</tr>
					<tr>
						<td class="tableName">Upload Resume</td>
						<td>
							<input size=50 type="file" accept=".pdf, .doc, .jpg" placeholder="Upload Resume" name="resume">&nbsp;(.pdf, .doc, .jpg)
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
									echo $lastErr;
									echo $firstErr;
									echo $lastErr;
									echo $streetA1Err;
									echo $cityErr;
									echo $stateErr;
									echo $zipErr;
									echo $emailErr;
									echo $phoneAreaErr;
									echo $dateErr;
									echo $resumeFileErr;
									echo $resumeFileErr1;
								?>
							</p>
						</td>
					</tr>
					</tbody>
				</table>
			</form>
		</div>
	</div>

<?php

	include('includes/footer.html.php');

?>
