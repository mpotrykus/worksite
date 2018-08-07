<?php
			//Connect SQL
				$name = '';
				$remove = '';
				$Error = '';
				
				$isValid = true;
				
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "leebev";
			// Create connection
				$db = new mysqli($servername, $username, $password, $dbname);
			//Set connection to UTF-8
				$db->set_charset("utf8");
			// Check connection
				if ($db->connect_error) {
					die("Connection failed: " . $db->connect_error);
				}
