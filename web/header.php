<header>
	<link rel="stylesheet" type="text/css" href="style/main.css">
	<?PHP
	$current_file = basename($_SERVER['PHP_SELF']);

	$home_color = "inherit";
	$about_us_color = "inherit";
	$login_color = "inherit";

	switch ($current_file) {
		case "home.php":
			$home_color = "Teal";
			break;
		case "about-us.php":
			$about_us_color = "Teal";
			break;
		case "login.php":
			$login_color = "Teal";
			break;
		default:
			$home_color = "inherit";
			$about_us_color = "inherit";
			$login_color = "inherit";
	}
	?>


	<div class=header>

		<h2>Think.</h2>

		<ul class=navbar>
			<li class=navitem><a style="background-color:<?PHP echo $home_color ?>;" href="/home.php">Home</a></li>
			<li class=navitem><a style="background-color:<?PHP echo $about_us_color ?>;" href="/about-us.php">About Us</a></li>
			<li class=navitem><a style="background-color:<?PHP echo $login_color ?>;" href="/login.php">login</a></li>
		</ul>
	</div>
</header>