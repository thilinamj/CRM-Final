


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title></title>
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
                  <a href="#" style="color:#fff;">LOGOUT</a>  

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
                     <h2>Reset Password</h2> 


                     <form  method="post" action="">



		
New Password :


<div class="form-group">
    <label for="formGroupExampleInput">New Password</label>
    <input type="text" class="form-control" id="formGroupExampleInput"  name="new_pass" required>
  </div>

			
<footer>
<button type="submit" class="btn btn-danger" accesskey="s" name="reset">
&nbsp; Submit
</button>
<input type="button"  class="btn btn-primary" accesskey="c" value="Cancel" onclick="window.location.href='user_details.php?back'" />
</footer>	
</form>  
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
                    &copy;  2018 All Rights Received
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


<?php 
session_start();
require_once 'dbconnect.php';

if(!isset($_SESSION['userSession'])) {
include_once("logout.php");
exit;

$u_id=$_SESSION['userSession'];
$query = $DBcon->query("SELECT * FROM user where user_id= '$u_id'");
$userRow=$query->fetch_array();

}
$user_id = $_SESSION["userSession3"] ;

if(isset($_POST['reset']))
		{
		
$new_pass=$_POST['new_pass'];
		

$hashed_password = password_hash($new_pass, PASSWORD_DEFAULT);

$user_id = $_SESSION["userSession3"] ;

$update_pwd=$DBcon->query("UPDATE user set password='$hashed_password' where user_id='$user_id'");

echo "<script>alert('Update Sucessfully'); window.location='user_details.php'</script>";
		
}
else
?>


