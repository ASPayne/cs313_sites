<header>
	<link rel="stylesheet" type="text/css" href="style/main.css">
	<?PHP
	$current_file = basename($_SERVER['PHP_SELF']);

	$home_color = "inherit";
	$about_us_color = "inherit";
	$login_color = "inherit";

	$home_active = false;
	$about_active = false;
	$login_active = false;

	switch ($current_file) {
		case "home.php":
			$home_color = "Teal";
			$home_active = true;
			break;
		case "about-us.php":
			$about_us_color = "Teal";
			$home_active = true;
			break;
		case "login.php":
			$login_color = "Teal";
			$home_active = true;
			break;
		default:
			$home_color = "inherit";
			$about_us_color = "inherit";
			$login_color = "inherit";
	}
	true;
	?>


	<div class=header>
		<div class=topbanner>
		<h2>Think.</h2>

		<ul class=navbar>
			<li class=navitem><a <?PHP if ($home_active) {echo "class=active";} ?> href="/home.php">Home</a></li>
			<li class=navitem><a <?PHP if ($about_active) {echo "class=active";} ?> href="/about-us.php">About Us</a></li>
			<li class=navitem><a <?PHP if ($login_active) {echo "class=active";} ?> href="/login.php">login</a></li>
		</ul>
	</div>
</header>