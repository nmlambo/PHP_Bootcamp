<html>
	<head>
		<?php
			include_once "../header.php";
			readfile("../snippets/head.php");
		?>
		<link rel="stylesheet" type="text/css" href="/css/forms.css">
		<title>Rush00</title>
	</head>
	<body>
		<?php include_once "../snippets/storeheader.php"; ?>
		<?php
			$error_msg = array(
								"fn_invalid"=>"Invalid Firstname, chars allowed [a-z] and '-'",
								"ln_invalid"=>"Invalid Lastname, chars allowed [a-z] and ' '",
								"un_invalid"=>"Invalid Username, chars allowed [a-z], [0-9] and '.-_'",
								"un_404"=>"Username not found",
								"em_invalid"=>"Invalid email address",
								"pwd_wrong"=>"Wrong password",
								"pwd_confirm"=>"Passwords don't match ",
								"pwd_pwdname"=>"Avoid using your name(s) in your password",
								"un_taken"=>"Sorry, Username already taken",
								"em_taken"=>"Someone already registered with this email address"
							);
			if (isset($_GET['error']))
			{
				$error_type = $_GET['error'];
				echo "<h3 id=\"error-msg\">", $error_msg[$error_type], "</h3>\n<br>\n";
				$firstname = isset($_SESSION['firstname']) ? $_SESSION['firstname'] : "";
				$lastname = isset($_SESSION['lastname']) ? $_SESSION['lastname'] : "";
				$email = isset($_SESSION['email']) ? $_SESSION['email'] : "";
				$username = isset($_SESSION['username']) ? $_SESSION['username'] : "";
			}
		?>
		<form action="signup.php" method="POST">
			<div class="input-container">
				<label for="firstname" class="input-label">First Name:</label>
				<input type="text" class="input-box" id="firstname" name="firstname" placeholder="John" value="<?php echo $firstname; ?>" required>
			</div>
			<br>
			<div class="input-container">
				<label for="lastname" class="input-label">Last Name:</label>
				<input type="text" class="input-box" id="lastname" name="lastname" placeholder="Doe" value="<?php echo $lastname; ?>" required>
			</div>
			<br>
			<div class="input-container">
				<label for="email" class="input-label">Email Address:</label>
				<input type="text" class="input-box" id="email" name="email" placeholder="john_doe@rush.com" value="<?php echo $email; ?>" required>
			</div>
			<br>
			<div class="input-container">
				<label for="username" class="input-label">Username:</label>
				<input type="text" class="input-box" id="username" name="username" placeholder="johnnyboy" value="<?php echo $username; ?>" required>
			</div>
			<br>
			<div class="input-container">
				<label for="password1" class="input-label">Password:</label>
				<input type="password" class="input-box" id="password1" name="password1" placeholder="password" required>
			</div>
			<br>
			<div class="input-container">
				<label for="password2" class="input-label">Confirm Password:</label>
				<input type="password" class="input-box" id="password2" name="password2" placeholder="password" required>
			</div>
			<br>
			<input name="submit" class="button button-med" id="button-submit" type="submit" value="Sign Up"/>
		</form>
		<?php
			if (isset($_GET['error']))
			{
				$focus = $_GET['error'];
						if (preg_match("/^fn.*/", $focus))
								$focus = "firstname";
						else if (preg_match("/^ln.*/", $focus))
								$focus = "lastname";
						else if (preg_match("/^em.*/", $focus))
								$focus = "email";
						else if (preg_match("/^un.*/", $focus))
								$focus = "username";
						else if (preg_match("/^pwd.*/", $focus))
								$focus = "password1";
						echo "<script> document.getElementById(\"$focus\").focus(); </script>\n";
			}
		?>
	</body>
</html>