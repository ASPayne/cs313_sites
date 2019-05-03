<header>
	<link rel="stylesheet" type="text/css" href="style/main.css">
	<?PHP
	$current_file = basename($_SERVER['PHP_SELF']);


	$home_active = false;
	$about_active = false;
	$login_active = false;

	switch ($current_file) {
		case "home.php":
			$home_active = true;
			break;
		case "about-us.php":
			$about_active = true;
			break;
		case "login.php":
			$login_active = true;
			break;
		default:
		$home_active = false;
		$about_active = false;
		$login_active = false;
	}
	?>


	<div class=header>
		<div class=topbanner>
			<h2>Think.</h2>
			<h3>A company to think about.</h3>
		</div>
		<ul class=navbar>
			<li class="navitem<?PHP if ($home_active) {echo " active";} ?>">
				<a href="/home.php">Home</a></li>
			<li class="navitem<?PHP if ($about_active) {echo " active";} ?>">
				<a href="/about-us.php">About Us</a></li>
			<li class="navitem<?PHP if ($login_active) {echo " active";} ?>">
				<a href="/login.php">login</a></li>
		</ul>
	</div>
</header>