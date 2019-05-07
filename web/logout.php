<?php
   session_start();
   unset($_SESSION["username"]);
   unset($_SESSION["password"]);
   unset($_SESSION["user"]);
   
   echo 'You have cleaned the session';
   header('Refresh: 2; URL = login.php');
?>