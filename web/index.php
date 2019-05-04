<?PHP
// Start the session
session_start();
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

header('Refresh: 0; URL = login.php');
	include 'footer.php';
	?>
</body>
</html>

<?php /*
  phpinfo(); */
?>