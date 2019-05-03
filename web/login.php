<?PHP
// Start the session
//session_start();
include 'session.php';

if (isset($_POST['user'])){
$_SESSION['user'] = $_POST['user'];
}

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
	<main>

		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
			Name: <input type="text" name="user"><br>
			<button type="submit">Temp Login as Admin</button>
		</form>


		<p>
		</p>
		<?PHP echo $_SESSION['user']; ?>

		<a href="/home.php">Log In as Administrator</a>
		<a href="/home.php">Log In as Tester</a>
	</main>
</body>

</html>