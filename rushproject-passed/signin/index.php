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
							"un_none"=>"Username not found",
							"pwd_wrong"=>"Incorrect password."
						);
		if (isset($_GET['error']))
		{
			$error_type = $_GET['error'];
			echo "<h3 id=\"error-msg\">", $error_msg[$error_type], "</h3>\n<br>\n";
			$username = isset($_SESSION['username']) ? $_SESSION['username'] : "";
		}
	?>
	<form action="signin.php" method="POST">
		<div class="input-container">
			<label for="username" class="input-label">Username:</label>
			<input type="text" class="input-box" id="username" name="username" placeholder="johnnyboy" value="<?php echo $_SESSION['username']; ?>" required>
		</div>
		<br>
		<div class="input-container">
			<label for="password" class="input-label">Password:</label>
			<input type="password" class="input-box" id="password" name="password" placeholder="password" required>
		</div>
		<br>
		<input name="submit" class="button button-med" id="button-submit" type="submit" value="Sign In"/>
	</form>
	<?php
			if (isset($_GET['error']))
			{
				$focus = $_GET['error'];
						if (preg_match("/^un.*/", $focus))
								$focus = "username";
						else if (preg_match("/^pwd.*/", $focus))
								$focus = "password";
						echo "<script> document.getElementById(\"$focus\").focus(); </script>\n";
			}
			else if (isset($_SESSION['username']))
				echo "<script> document.getElementById(\"password\").focus(); </script>\n";
		?>
</body>
</html>