<?php
session_start();
require_once 'dbconnect.php';

if(!isset($_SESSION['userSession'])) {
include_once("logout.php");
exit;
}

$user_id = $_SESSION["userSession"] ;

$query = $DBcon->query("SELECT * FROM user where user_id= '$user_id'");
$userRow=$query->fetch_array();

$DBcon->close();

?>

<a href="https://notemanage.000webhostapp.com">send</a>

<input type="button"  value="Indox" ONCLICK="window.location.href='receive.php' "/><br>

<input type="button"  value="Back" ONCLICK="window.location.href='admin_home.php' "/>