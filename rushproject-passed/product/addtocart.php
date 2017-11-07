<?php
	include_once "../header.php";

	if (isset($_GET['product_id']))
	{
		$product_id = $_GET['product_id'];
		$query = "SELECT * FROM rush_products WHERE product_id='$product_id'";
		$result = mysql_query($query);
		if (mysql_num_rows($result) == 1)
		{
			if ($_SESSION['cart'] == NULL )
			{
				$_SESSION['cart'] = array(0, array());
			}
			$_SESSION['cart'][0] += 1;
			array_push($_SESSION['cart'][1], $product_id);
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
		else
		{
			header("HTTP/1.0 404 Not Found");
			exit(0);
		}
	}
	else
	{
		header("HTTP/1.0 404 Not Found");
		exit(0);
	}
?>