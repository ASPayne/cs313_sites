<header>
	<?PHP
	$current_file = basename($_SERVER['PHP_SELF']);

	$home_color = "Pink";
	$about_us_color = "Pink";
	$login_color = "Pink";

	switch ($current_file) {
		case "home.php":
			$home_color = "Yellow";
			break;
		case "about-us.php":
			$about_us_color = "Yellow";
			break;
		case "login.php":
			$login_color = "Yellow";
			break;
		default:
			$home_color = "Pink";
			$about_us_color = "Pink";
			$login_color = "Pink";
	}
	?>

	<h2>Think.</h2>
	<ul>
		<li><a style="background-color:<?PHP echo $home_color ?>;" href="/home.php">Home</a></li>
		<li><a style="background-color:<?PHP echo $about_us_color ?>;" href="/about-us.php">About Us</a></li>
		<li><a style="background-color:<?PHP echo $login_color ?>;" href="/login.php">login</a></li>
	</ul>
</header>