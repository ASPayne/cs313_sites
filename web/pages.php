<?PHP
// Start the session
session_start();
?>

<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="style/main.css">
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
		<h1>Welcome! this will have future assignments.</h1>
		
		<br>
		<a href="/week3/week03_Store.php">week 3 store</a>
		<a href="/TeamActivities/Week05/activityweek05.php"> week 5 database select</a>
	</main>
    <?php
	include 'footer.php';
	?>
</body>