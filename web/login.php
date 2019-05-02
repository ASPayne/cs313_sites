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
	<title>Login</title>
	<?php
include 'header.php';
?>
</head>
<body>


<form action="home.php" method="post">
Name: <input type="text" name="<?PHP $_SESSION["user"] ?>"><br>
<button type="submit">Temp Login as Admin</button>
</form>

<a href="/home.php">Log In as Administrator</a>
<a href="/home.php">Log In as Tester</a>

</body>
</html>