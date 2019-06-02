<?php
// Start the session
session_start();
function login_user($userid)
{
$_SESSION["user"] = $userid;
}
?>
