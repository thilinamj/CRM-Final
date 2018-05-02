<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<body> 
<form  method="post" id="view-form">

<header>
<h3>Admin</h3>      
<h2 ><center>Find user Details</center></h2>
</header>


<br>
<b>User Id / Name :</b>
<input type="text"  placeholder="User Id/ Name" name="user_id" required />
      


<footer>       
<button type="submit"   name="btn-view" id="btn-view">
 Enter
</button> 
<input type="button"  value="Cancel" onclick="window.location.href='admin_home.php?back'" />
</footer>
</form>  

</body>
</html>
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


if (isset($_POST['btn-view'])) {
 
 $user_id = strip_tags($_POST['user_id']);
 $user_id = $DBcon->real_escape_string($user_id);


 $query = $DBcon->query("SELECT * FROM user WHERE user_id='$user_id' or first_name = '$user_id'");
 $row=$query->fetch_array();
 
 $count = $query->num_rows; 
 
 if ( $count>0) {
  $_SESSION['userSession3'] = $row['user_id'];


echo '<table border="1">';
while($row= $query->fetch_assoc())
           {


echo '<tr >';
echo '<tr>';
echo '<td>';
echo $row['user_id'];
echo '</td>';
          
echo '<td>';
echo $row['first_name'];
echo '</td>';
           
echo '<td>';
echo $row['last_name'];
echo '</td>';
                       
echo '<td>';
echo $row['email'];
echo '</td>';

echo '<td>';
echo $row['phone_num'];
echo '</td>';
echo '<td>';
echo $row['position'];
echo '</td>';
echo '<td>';
echo '<a href="update_user" style="text-decoration: none;" >Update </a>';
echo '</td>';
echo '<td>';
echo '<a href="del_comfirm.php" style="text-decoration: none;" >Delete </a>';
echo '</td>';
echo '<td>';
echo '<a href="reset.php" style="text-decoration: none;" >Reset Password </a>';
echo '</td>';
echo '</tr><br>';

}
echo '</table>';
}

else {
echo "<script>alert('Invalied User Id/ Name ')</script>";

 }
 $DBcon->close();
}
?>
