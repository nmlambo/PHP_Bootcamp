<html>
	<head>
		<?php
			include_once "../header.php";
			readfile("../snippets/head.php");
		?>
		<link rel="stylesheet" type="text/css" href="/css/store.css">
		<title>Rush00</title>
	</head>
	<title>Rush00</title>
	<body>
	<?php include_once "../snippets/storeheader.php";

		if ($_SESSION['cart'] == NULL)
			echo "<h2>Empty Cart</h2>\n";
		else
		{
			foreach($_SESSION['cart'][1] as $product_id)
			{
				$total = 0;
				$query = "SELECT * FROM rush_products WHERE product_id='$product_id';";
				$result = mysql_query($query);
				$row = mysql_fetch_array($result);
				$total += floatval($row['product_price']);
		?>
			<div class="column">
				<a href="/product?id=<?php echo $row['product_id']?>"><div class="content">
					<img src="<?php echo $row['product_showcase_img'] ?>" alt="<?php echo $row['product_name'] ?>">
					<h4><?php echo $row['product_name'] ?></h4>
					<p><?php echo $row['product_release'], " - R", $row['product_price'] ?></p>
				</div></a>
				<br>
			</div>
			<?php 
			}
		}
			?>
			<h3>Total: R <?php echo ($total ? "0.00" : $total) ?></h3>

		<!-- END ROW -->
	</body>
</html>