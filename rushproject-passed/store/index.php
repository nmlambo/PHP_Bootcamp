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
	<?php include_once "../snippets/storeheader.php" ?>
		<!-- Portfolio Gallery Grid -->
		<?php
			$query = "SELECT * FROM rush_products;";
			$result = mysql_query($query);

		for($r = 0; $i < 4; ++$r) {
		?>
		<div class="row">
			<?php
				for($c = 0; $c < 3; ++$c) {
					$row = mysql_fetch_array($result);
					if ($row == NULL)
						break;
			?>
			<div class="column">
				<a href="/product?id=<?php echo $row['product_id']?>"><div class="content">
					<img src="<?php echo $row['product_showcase_img'] ?>" alt="<?php echo $row['product_name'] ?>">
					<h4><?php echo $row['product_name'] ?></h4>
					<p><?php echo $row['product_release'], " - R", $row['product_price'] ?></p>
				</div></a>
			</div>
			<?php } ?>
		</div>
		<br>
		<?php
			if ($row == NULL)
				break;
		}
	?>
		<!-- END ROW -->
	</body>
</html>