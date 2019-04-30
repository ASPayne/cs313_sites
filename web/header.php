<?php 

$file = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);

?>

<header>
	<h2>Think.</h2>
		<ul>
			<li><a <?php if ($file === "home") echo 'active' ?>href="/home.php">Home</a></li>
			<li><a href="/about-us.php">About Us</a></li>
			<li><a href="/login.php">login</a></li>
		</ul>
	</header>