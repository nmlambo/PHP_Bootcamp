<?php
	session_start();
	header("Content-Type: text/html");
	define('DB_SERVER', 'localhost:3306');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', 'letmein');
	define('DB_DATABASE', 'rush00');
	$conn = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);
	mysql_select_db(DB_DATABASE);
?>