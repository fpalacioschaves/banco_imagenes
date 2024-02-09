<?php session_start();
$_SESSION["usuario"] = "";
$_SESSION["password"] = "";
unset($_SESSION);
header('Location: index.php'); 
?>