
<?php 
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['userSession'])) {
   include_once("logout.php");
   exit;
}

$user_id = $_SESSION["userSession"] ;

$query = $DBcon->query("SELECT * FROM user where user_id= '$user_id'");
$userRow=$query->fetch_array();
$DBcon->close();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>

<body>


<form>
<header>
<h3><b>Admin</b></h3>	

</header>
<center>
<input type="button"  class="btn btn-primary"   value="Add User" onclick="window.location.href='add_user.php'" />
<input type="button"  value="User Details" onclick="window.location.href='user_details.php'" />
<input type="button"   value="View Customer" onclick="window.location.href='admin_customer_panel.php'" />
<input type="button"   value="Mail Box" onclick="window.location.href='mail_box.php'" />
</div></center>
<footer>
<a href="logout.php?logout" style="text-decoration: none;" >Log out</a><br>
<a href="change.php" style="text-decoration: none;" accesskey="p">Change password</a><br>
 </footer>      
</form> 
</body>
</html>