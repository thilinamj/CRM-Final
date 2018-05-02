<?php
session_start();
require_once 'dbconnect.php';



if (isset($_POST['btn-login'])) {
 
 $user_id = strip_tags($_POST['user_id']);
 $password = strip_tags($_POST['password']);
 
 $user_id = $DBcon->real_escape_string($user_id);
 $password = $DBcon->real_escape_string($password);
 

//select admin

 $query = $DBcon->query("SELECT user_id, email, password,position FROM user WHERE user_id='$user_id' and position='admin'");
 $row=$query->fetch_array();
 
 $count = $query->num_rows; // if id/password are correct returns must be 1 row
 
 if (password_verify($password, $row['password']) && $count==1) {
  $_SESSION['userSession'] = $row['user_id'];

 header("Location: admin_home.php");
}

// select customer service

 $query = $DBcon->query("SELECT user_id, email, password,position FROM user WHERE user_id='$user_id' and position='user'");
 $row=$query->fetch_array();
 
 $count = $query->num_rows; // if id/password are correct returns must be 1 row
 
 if (password_verify($password, $row['password']) && $count==1) {
  $_SESSION['userSession1'] = $row['user_id'];

 header("Location: user_home.php");
}


 else {
  echo "<script>alert('Invalied User Id or Password')</script>";
 }

 $DBcon->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>System login</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/main.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

</head>
<body>
<div class="login-form">
    <h2>Login</h2>
    <form action="login.php" method="post">
        <div class="text-center">
            <img src="images/user.png" class="img-circle avatar" alt="Avatar">
        </div>        
        <div class="form-group">
            <input type="text" class="form-control" placeholder="User Id" name="user_id"  required="required">
            <input type="password" class="form-control" placeholder="Password" name="password" required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block" name="btn-login" id="btn-login">Login in</button>
        </div>
        <div class="clearfix">
            <label class="pull-left checkbox-inline"><input type="checkbox"> Remember me</label>
            <a href="#" class="pull-right">Forgot Password?</a>
        </div>        
    </form>
    
</div>
</body>
</html>                            