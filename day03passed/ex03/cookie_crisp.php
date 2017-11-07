<?php

	$name = $_GET['name'];
	$value = $_GET['value'];
	$action = $_GET['action'];

	if ($action == 'set')
	{
		setcookie($name, $value, time() + (86400 * 30));
	}
	else if ($action == 'get')
	{
		echo $_COOKIE[$name]."\n";
	}
	else if ($action == 'del')
	{
		setcookie($name, '', time() - 3600 )
	}
?>
