<?php 
session_start();
require_once 'dbconnect.php';

if(!isset($_SESSION['userSession'])) {
include_once("logout.php");
exit;
}
		
if(isset($_POST['edit']))
{		
$name=$_POST['name'];
$name1=$_POST['name1'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$position=$_POST['position'];

$user_id = $_SESSION["userSession3"] ;

$query = $DBcon->query("UPDATE user set first_name='$name' , last_name='$name1', email='$email', phone_num='$phone', position='$position' WHERE user_id='$user_id'");


echo "<script>alert('Update Sucessfully'); window.location='admin_home.php'</script>";
		
}
$user_id = $_SESSION["userSession3"] ;
$select_query = $DBcon->query("SELECT * FROM user WHERE user_id='$user_id'");
$userRow = $select_query->fetch_array();	
	
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
<h2><center>Update User</center></h2>
</header>

<h4><font color="#004b66">User Id  :<?php echo $user_id; ?>
<br>Position :<?php echo $userRow['position']; ?></font></h4>



<b>First Name:</b><br>
<input type="hidden" name="user_id" class="txtField" value="<?php echo $userRow['user_id']; ?>">
<input type="text" name="name" class="txtField"  value="<?php echo $userRow['first_name']; ?>"><br>

<b>Last Name:</b><br>
<input type="text" name="name1" class="txtField"  value="<?php echo $userRow['last_name']; ?>"><br>

<b>E-mail:</b><br>
<input type="email" name="email" class="txtField"  value="<?php echo $userRow['email']; ?>"><br>

<b>Phone Number:</b><br>
<input type="text" name="phone" class="txtField"  value="<?php echo $userRow['phone_num']; ?>"><br>

<b>Position:</b>
<br>
<input type="radio" class="txtField"  name="position" value="admin" value="<?php echo $userRow['position']; ?>" >  Admin<br>
<input type="radio" class="txtField"  name="position" value="user" value="<?php echo $userRow['position']; ?>" > User<br>



<footer>
<button type="submit"  name="edit">
&nbsp; Submit
</button>

<input type="button" accesskey="c" value="Cancel" onclick="window.location.href='admin_home.php?back'" />
</footer>
</form>                  
</body>
</html>