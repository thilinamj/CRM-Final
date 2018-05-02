<?php 
session_start();
require_once 'dbconnect.php';
/*
if(!isset($_SESSION['userSession'])) {
include_once("logout.php");
exit;
}
*/		
if(isset($_POST['edit']))
{		
$user_id=$_POST['user_id'];


$id = $_SESSION["userSession4"] ;

$query = $DBcon->query("UPDATE customer set user_id='$user_id' WHERE id='$id'");


echo "<script>alert('Update Sucessfully'); window.location='admin_home.php'</script>";
		
}


	
$DBcon->close();
?>
<html>
<head>
<title>Admin</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

<form  method="post" action="">

<header>
<h3>Admin</h3> 

</header>





<b>User Id</b><br>

<input type="text" name="user_id"  ><br>





<footer>
<button type="submit"  name="edit">
&nbsp; Submit
</button>

<input type="button" accesskey="c" value="Cancel" onclick="window.location.href='admin_home.php?back'" />
</footer>
</form>                  
</body>
</html>