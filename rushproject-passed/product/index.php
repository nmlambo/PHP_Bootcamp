<html>
	<head>
		<?php
			include_once "../header.php";
			readfile("../snippets/head.php");
		?>
		<link rel="stylesheet" type="text/css" href="/css/product.css">
		<title>Rush00</title>
	</head>
	<body>
	<?php include_once "../snippets/storeheader.php"; ?>
		<?php
			if (isset($_GET['id']))
			{
				$product_id = mysql_real_escape_string($_GET['id']);
				$query = "SELECT * FROM rush_products WHERE product_id='$product_id';";
				$result = mysql_query($query);
				if (mysql_num_rows($result) == 0)
				{
					header("HTTP/1.0 404 Not Found");
					exit();
				}
				$row = mysql_fetch_array($result);
			}
			else
			{
				header("HTTP/1.0 404 Not Found");
				exit();
			}
		?>
		
		<br>
		<div class="basic-info">
			<div class="content">
				<h2><?php echo $row['product_name'] ?></h2>
				<img class="showcase" src="<?php echo $row['product_showcase_img']?>">
			</div>
			<div class="info">
				<p><?php echo $row['product_short']; ?></p>
				<hr>
				<p><?php echo "Rating: ", $row['product_rating'] ?><p>
				<?php echo $row['product_description'] ?>
				<div class="trading-info">
					<p><?php echo "R ", $row['product_price']; ?></p>
					<p><?php echo $row['product_status'] ?></p>
					<a href="/product/addtocart.php?product_id=<?php echo $row['product_id'] ?>"><div class="button button-med button-cart">Add To Cart</div></a>
				</div>
			</div>
		</div>
		<p><?php echo $row['product_description'] ?></p>
	</body>
</html>