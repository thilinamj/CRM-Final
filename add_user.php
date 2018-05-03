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

$query = "INSERT INTO user(first_name,last_name,email,phone_num,password,position) VALUES('$uname','$uname1','$email','$phone','$hashed_password','$position')";

  

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
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin :<?php echo  $userRow['user_id']; ?></title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
     
           
          
    <div id="wrapper">
         <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <img src="assets/img/logo.png" />
                    </a>
                </div>
              
                 <span class="logout-spn" >
                  <a href="logout.php" style="color:#fff;">LOGOUT</a>  

                </span>
            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                 

 <li class="active-link">
                       <a href="admin_home.php" ><i class="fa fa-desktop "></i>Dashboard <span class="badge">Included</span></a>
                    </li>
                   

                    <li>
                        <a href="add_user.php"><i class="fa fa-table "></i>Add Staff  <span class="badge">Add Staff</span></a>
                    </li>
                    <li>
                        <a href="user_details.php"><i class="fa fa-edit "></i>Staff Details  <span class="badge">Staff Details</span></a>
                    </li>


                    <li>
                        <a href="admin_customer_panel.php"><i class="fa fa-qrcode "></i>View Customer</a>
                    </li>
                    

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Add User </h2>  

                     <body>

<form method="post">
<div class="form-group row">
    <label for="First Name" class="col-sm-2 col-form-label">First Name</label>
    <div class="col-sm-10">
      <input type="" class="form-control" id="First Name" placeholder="First Name"  name="name" required >
    </div>
  </div>

  <div class="form-group row">
    <label for="Last Name" class="col-sm-2 col-form-label">Last Name</label>
    <div class="col-sm-10">
      <input type="Last Name" class="form-control" id="Last Name" placeholder="Last Name" name="name1" required>
    </div>
  </div>



 <div class="form-group row">
    <label for="E-mail address" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="E-mail address" placeholder="Email" name="email" required>
    </div>
  </div>


  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label" >Password </label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password" required >
    </div>
  </div>


<div class="form-group row">
    <label for="Phone Number" class="col-sm-2 col-form-label">Phone Number</label>
    <div class="col-sm-10">
      <input type="Phone Number" class="form-control" id="Phone Number" placeholder="Phone Number" name="phone" required >
    </div>
  </div>

  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Position</legend>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="position" id="gridRadios1" value="admin" checked>
          <label class="form-check-label" for="gridRadios1">
            Admin
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="position" id="gridRadios2" value="user">
          <label class="form-check-label" for="gridRadios2">
            User
          </label>
        </div>
        
      </div>
    </div>
  
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary"   name="btn-signup">Submit </button>
      <input type="button"  class="btn btn-danger"  value="Cancel" onclick="window.location.href='admin_home.php?back'" />   
    </div>
  </div>
</form>
</div>
</div>
</body> 
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
              
                 <!-- /. ROW  -->           
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
    <div class="footer">
      
    
             <div class="row">
                <div class="col-lg-12" >
                    &copy;  2018 All Right Reserved | Design by: 
                </div>
        </div>
        </div>
          

     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
