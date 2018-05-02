
<?php 
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['userSession1'])) {
   include_once("logout.php");
   exit;
}

$user_id = $_SESSION["userSession1"] ;

$query = $DBcon->query("SELECT * FROM user where user_id= '$user_id'");
$userRow=$query->fetch_array();
$DBcon->close();
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>


<form>
<header>
<h3><b>User</b></h3>	

</header>
<center>
<input type="button"   value="View Customer" onclick="window.location.href='use_view_cus.php'" />

</div></center>
<footer>
<a href="logout.php?logout" style="text-decoration: none;" >Log out</a><br>
<a href="user_change.php" style="text-decoration: none;" accesskey="p">Change password</a><br>
 </footer>      
</form> 
</body>
</html>