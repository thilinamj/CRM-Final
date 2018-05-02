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

if(isset($_POST['btn-signup'])) {
 
 $uname = strip_tags($_POST['name']);
 $uname1 = strip_tags($_POST['name1']);
 $email = strip_tags($_POST['email']);
 $phone = strip_tags($_POST['phone']);
 $upass = strip_tags($_POST['password']);
 $position = strip_tags($_POST['position']); 


 $uname = $DBcon->real_escape_string($uname); 
 $uname1 = $DBcon->real_escape_string($uname1); 
 $email = $DBcon->real_escape_string($email);
 $phone = $DBcon->real_escape_string($phone);
 $upass = $DBcon->real_escape_string($upass);
 $position = $DBcon->real_escape_string($position);

 
 $hashed_password = password_hash($upass, PASSWORD_DEFAULT); 
 
$check_email = $DBcon->query("SELECT email FROM user WHERE email='$email'");

$count=$check_email->num_rows;
 
if ($count==0) {

$query = "INSERT INTO user(first_name,last_name,email,phone_num,password,position,) VALUES('$uname','$uname1','$email','$phone','$hashed_password','$position')";

  

if ($DBcon->query($query) === TRUE) {
      $last_id = $DBcon->insert_id;
    echo "<font color='red'>New user added successfully. your ID is: " . $last_id . "</font>";


}
else {
   
     echo "<script>alert('error while registering !'); window.location='add_user.php'</script>";
}
  
} 
else {
  
echo "<script>alert('sorry email already taken !'); window.location='add_user.php'</script>";
}

$DBcon->close();
}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<title>Admin :<?php echo  $userRow['user_id']; ?></title>
<body>

<form  method="post" >

<header>
<h3>Admin</h3>
<h2><center>Create User</center></h2>
</header>

<font color="#004b66">
<b>User Name : </b><br>
<input type="text" ng-model="name" placeholder="First Name" name="name" required  /><br>
<input type="text" ng-model="name1" placeholder="Last Name" name="name1" required  />
<br>
<b>E-mail address : </b><br>
<input type="email" placeholder="E-mail address" name="email" required  /><br>
<b>Password :</b><br>
<input type="password"  placeholder="Password" name="password" required  /><br>
<b>Phone Number :</b><br>
<input type="text"  placeholder="Phone Number" name="phone" required  /><br>
<b>Position :</b>
<br>
<input type="radio"   name="position" value="admin" checked>Admin<br>
<input type="radio"   name="position" value="user" >User<br>
        
</div>
</font>
</div>

<footer> 

<button type="submit"  name="btn-signup">Submit </button>
<input type="button" value="Cancel" onclick="window.location.href='admin_home.php?back'" />            

</footer>                    
</form>
</div>
</div>
</body>
</html>