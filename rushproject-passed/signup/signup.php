<?php
	include_once "../header.php";

	$firstname = mysql_escape_string($_POST['firstname']);
	$lastname = mysql_escape_string($_POST['lastname']);
	$email = mysql_escape_string($_POST['email']);
	$username = mysql_escape_string($_POST['username']);
	$password1 = mysql_escape_string($_POST['password1']);
	$password2 = mysql_escape_string($_POST['password2']);

	$_SESSION['firstname'] = $firstname;
	$_SESSION['lastname'] = $lastname;
	$_SESSION['email'] = $email;
	$_SESSION['username'] = $username;
	if (!preg_match("/^[a-zA-Z\-]+$/", $firstname))
	{
		header("Location: /signup?error=fn_invalid");
		exit();
	}
	if (!preg_match("/^[a-zA-Z\- ]+$/", $lastname))
	{
		header("Location: /signup?error=ln_invalid");
		exit();
	}
	if (!preg_match("/^[a-zA-Z0-9\.\-_]+?@[a-zA-Z0-9\-_]+?\.[a-zA-Z\.\-]+?[a-zA-Z]$/", $email))
	{
		header("Location: /signup?error=em_invalid");
		exit();
	}
	if (!preg_match("/^[a-zA-Z0-9\.\-_]+$/", $username))
	{
		header("Location: /signup?error=un_invalid");
		exit();
	}
	if (strcmp($password1, $password2) != 0)
	{
		header("Location: /signup?error=pwd_confirm");
		exit();
	}
	if (preg_match("/$password1/i", $firstname) || preg_match("/$password1/i", $lastname) || preg_match("/$password1/i", $username) ||
		preg_match("/$firstname/i", $password1) || preg_match("/$lastname/i", $password1) || preg_match("/$username/i", $password1))
	{
		header("Location: /signup?error=pwd_pwdname");
		exit();
	}

	$query = "SELECT user_name FROM rush_users WHERE user_email='$email';";
	$result = mysql_query($query);
	if (mysql_num_rows($result) > 0)
	{
		header("Location: /signup?error=em_taken");
		exit();
	}
	$query = "SELECT user_name FROM rush_users WHERE user_name='$username';";
	$result = mysql_query($query);
	if (mysql_num_rows($result) > 0)
	{
		header("Location: /signup?error=un_taken");
		exit();
	}

	$password = password_hash($password1, PASSWORD_DEFAULT);
	date_default_timezone_set("Africa/Johannesburg");
	$datetime = strtotime("now");
	$query = "INSERT INTO rush_users (user_firstname, user_lastname, user_name, user_email, user_password, user_type, user_since) 
	values ('$firstname', '$lastname', '$username', '$email', '$password', 'consumer', $datetime);";
	mysql_query($query);
	unset($_SESSION['firstname']);
	unset($_SESSION['lastname']);
	unset($_SESSION['email']);
	header("Location: /signin");
?>