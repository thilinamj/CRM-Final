<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<input type="button" accesskey="c" value="Back" ONCLICK="window.location.href='admin_home.php' ""/>
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



 $query = $DBcon->query("SELECT * FROM customer ");
 $row=$query->fetch_array();
 
 $count = $query->num_rows; 
 
 if ( $count>0) {
  $_SESSION['userSession4'] = $row['id'];

echo '<table>';

echo '<tr >';
echo '<tr>';
echo '<td>';
echo $row['name'];
echo '</td>';
          
echo '<td>';
echo $row['email'];
echo '</td>';
           
echo '<td>';
echo $row['phone'];
echo '</td>';
                       
echo '<td>';
echo $row['nationality'];
echo '</td>';

echo '<td>';
echo $row['city'];
echo '</td>';
echo '<td>';
echo $row['nights'];
echo '</td>';

echo '<td>';
echo $row['adult'];
echo '</td>';
          
echo '<td>';
echo $row['kid'];
echo '</td>';
           
echo '<td>';
echo $row['baby'];
echo '</td>';
                       
echo '<td>';
echo $row['destination'];
echo '</td>';

echo '<td>';
echo $row['massages'];
echo '</td>';
echo '<td>';
echo '<a href="admin_asign_user.php" style="text-decoration: none;" >Asign a user </a>';
echo '</td>';
/*
echo '<td>';
echo '<a href="update_user.php" style="text-decoration: none;" >Update </a>';
echo '</td>';

echo '<td>';
echo '<a href="del_comfirm.php" style="text-decoration: none;" >Delete </a>';
echo '</td>';
echo '<td>';
echo '<a href="reset.php" style="text-decoration: none;" >Reset Password </a>';
echo '</td>';*/
echo '</tr><br>'; 


while($row= $query->fetch_assoc())
           {
echo '<table>';

echo '<tr >';
echo '<tr>';
echo '<td>';
echo $row['name'];
echo '</td>';
          
echo '<td>';
echo $row['email'];
echo '</td>';
           
echo '<td>';
echo $row['phone'];
echo '</td>';
                       
echo '<td>';
echo $row['nationality'];
echo '</td>';

echo '<td>';
echo $row['city'];
echo '</td>';
echo '<td>';
echo $row['nights'];
echo '</td>';

echo '<td>';
echo $row['adult'];
echo '</td>';
          
echo '<td>';
echo $row['kid'];
echo '</td>';
           
echo '<td>';
echo $row['baby'];
echo '</td>';
                       
echo '<td>';
echo $row['destination'];
echo '</td>';

echo '<td>';
echo $row['massages'];
echo '</td>';

echo '<td>';
echo '<a href="admin_asign_user.php" style="text-decoration: none;" >Asign a user </a>';
echo '</td>';/*
echo '<td>';
echo '<a href="del_comfirm.php" style="text-decoration: none;" >Delete </a>';
echo '</td>';
echo '<td>';
echo '<a href="reset.php" style="text-decoration: none;" >Reset Password </a>';
echo '</td>';*/
echo '</tr><br>';

}
}

 $DBcon->close();

?>
