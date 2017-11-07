<h1 id="header">RUSH ONLINE STORE</h1>
	<ul id="nav-bar">
		<li class="nav-bar"><a href="/store">HOME</a></li>
		<?php
			if (isset($_SESSION['uid']))
			{
				echo '<li class="nav-bar"><a href="/signin/signout.php">SIGN OUT</a></li>\n';
			}
			else
			{
				echo '<li class="nav-bar"><a href="/signin">SIGN IN</a></li>';
				echo '<li class="nav-bar"><a href="/signup">SIGN UP</a></li>';
			}
			echo '<li class="cart"><a class="cart" href="/cart">';
				if (isset($_SESSION['uid']))
				{
					echo "Cart: ";
					echo ($_SESSION['cart'] == NULL) ? "Empty" : $_SESSION['cart'][0];
				}
				else
					echo "Not logged in";
				?>
		</a></li>
	</ul>
	<br>