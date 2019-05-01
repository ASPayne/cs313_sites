<header>
	<?PHP
	$current_file = basename($_SERVER['PHP_SELF']);

	?>
	<h2>Think.</h2>
		<ul>
			<li><div style="background-color:Blue;"><a style="<?PHP if($current_file == 'home.php') {
echo "background-color:Yellow;"
} else {
	echo "background-color:Pink;"
}?>
href="/home.php">Home</a></div></li>
			<li><a href="/about-us.php">About Us</a></li>
			<li><a href="/login.php">login</a></li>
		</ul>

		<H1><?PHP echo basename($_SERVER['PHP_SELF']); /* Returns The Current PHP File Name */ ?></H1>
	</header>