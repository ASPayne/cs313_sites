<?PHP
// Start the session
//session_start();
include 'session.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Home</title>
</head>

<body>
	<?php
	include 'header.php';
	?>
	<main>
		<h1>Welcome
			<?PHP echo $_SESSION["user"] ?>!</h1>
		<p>You are
			<?PHP if (!isset($_SESSION['user'])) {
				echo "not";
			} ?> logged in.</p>
	</main>
</body>