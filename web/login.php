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
</head>

<body>
<?php
include 'header.php';
?>

<form action="home.php" method="post">
Name: <input type="text" name="user"><br>
<button type="submit">Temp Login as Admin</button>
</form>

<button>Temp Login as Admin</button>
<button>Temp Login as Tester</button>
<a href="/home.php">Log In as Administrator</a>
<a href="/home.php">Log In as Tester</a>

</body>
</html>