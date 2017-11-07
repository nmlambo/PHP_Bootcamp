<?php
	include_once "../header.php";

	$username = mysql_escape_string($_POST['username']);
	$password = mysql_escape_string($_POST['password']);

	$_SESSION['username'] = $username;

	$query = "SELECT * FROM rush_users WHERE user_name='$username';";
	$result = mysql_query($query);
	if (mysql_num_rows($result) == 0)
	{
		header("Location: /signin?error=un_none");
		exit();
	}
	else
	{
		$row = mysql_fetch_array($result);
		if (!password_verify($password, $row['user_password']))
		{
			header("Location: /signin?error=pwd_wrong");
			exit();
		}
	}
	$_SESSION['uid'] = $row['user_id'];
	header("Location: /store");
?>