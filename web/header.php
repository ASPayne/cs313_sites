<header>
	<?PHP
	$current_file = basename($_SERVER['PHP_SELF']);
	 if($current_file == 'home.php') {
		$home_color = "Yellow"
		} else {
			$home_color = "Pink"
		}
	?>
	<h2>Think.</h2>
		<ul>
			<li><a href="/home.php">Home</a></li>
			<li><a href="/about-us.php">About Us</a></li>
			<li><a href="/login.php">login</a></li>
		</ul>

		<H1><?PHP echo basename($_SERVER['PHP_SELF']); /* Returns The Current PHP File Name */ ?></H1>
	</header>