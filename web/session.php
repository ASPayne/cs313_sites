<?php
// Start the session
session_start();

if (! isset($_SESSION["user"]))
{
	$_SESSION["user"] = "NOBODY";
}

function login_user($username)
{
$_SESSION["user"] = $username;
}

?>
