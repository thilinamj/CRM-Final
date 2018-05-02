<?php 
session_start();
require_once 'dbconnect.php';

if(!isset($_SESSION['userSession1'])) {
include_once("logout.php");
exit;
}
		
if(isset($_POST['edit']))
{

 $uname = $_POST['name'];
 $nationality = $_POST['nationality'];
 $email = $_POST['email'];
 $phone = $_POST['phone'];
 $city = $_POST['city'];
 $tdate = $_POST['tdate']; 
 $nights = $_POST['nights'];
 $adult = $_POST['adult'];
 $kid = $_POST['kid'];
 $baby = $_POST['baby'];
 $destination = $_POST['destination'];
 $massages = $_POST['massages']; 	



$user_id = $_SESSION["userSession4"] ;

$query = $DBcon->query("UPDATE customer set name='$uname' , nationality='$nationality', email='$email', phone='$phone', city='$city',tdate='$tdate' , nights='$nights', adult='$adult', kid='$kid', baby='$baby',destination='$destination',massages='$massages' WHERE id='$id'");


echo "<script>alert('Update Sucessfully'); window.location='user_home.php'</script>";
		
}
$id = $_SESSION["userSession4"] ;
$select_query = $DBcon->query("SELECT * FROM customer WHERE id='$id'");
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

Customer Id:
<?php echo $userRow['id']; ?>
<br>
<b>Name:</b><br>
<input type="hidden" name="id"  value="<?php echo $userRow['id']; ?>">
<input type="text" name="name"   value="<?php echo $userRow['name']; ?>"><br>

<b>Nationality:</b><br>
<input type="text" name="nationality" class="txtField"  value="<?php echo $userRow['nationality']; ?>"><br>

<b>E-mail:</b><br>
<input type="email" name="email" class="txtField"  value="<?php echo $userRow['email']; ?>"><br>

<b>Phone Number:</b><br>
<input type="text" name="phone" class="txtField"  value="<?php echo $userRow['phone']; ?>"><br>

<b>city:</b><br>
<input type="text" name="city" class="txtField"  value="<?php echo $userRow['city']; ?>"><br>

<b>Date:</b><br>
<input type="date" name="tdate" class="txtField"  value="<?php echo $userRow['tdate']; ?>"><br>

<b>Nights:</b><br>
<input type="text" name="nights" class="txtField"  value="<?php echo $userRow['nights']; ?>"><br>

<b>Adult:</b><br>
<input type="text" name="adult" class="txtField"  value="<?php echo $userRow['adult']; ?>"><br>

<b>Kids:</b><br>
<input type="text" name="kid" class="txtField"  value="<?php echo $userRow['kid']; ?>"><br>

<b>baby:</b><br>
<input type="text" name="baby" class="txtField"  value="<?php echo $userRow['baby']; ?>"><br>

<b>destination:</b><br>
<input type="text" name="destination" class="txtField"  value="<?php echo $userRow['destination']; ?>"><br>


<footer>
<button type="submit"  name="edit">
&nbsp; Submit
</button>

<input type="button" accesskey="c" value="Cancel" onclick="window.location.href='user_home.php?back'" />
</footer>
</form>                  
</body>
</html>