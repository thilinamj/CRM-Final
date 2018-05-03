<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Details</title>
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
                        <a href="add_user.php"><i class="fa fa-table "></i>Add Staff  <span class="badge">Add User</span></a>
                    </li>
                    <li>
                        <a href="user_details.php"><i class="fa fa-edit "></i>Staff Details  <span class="badge">User Details</span></a>
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
                     <h2>Staff Details </h2>   

   <form  method="post" id="view-form">
  <div class="form-group">
    <?php
session_start();
require_once 'dbconnect.php';

if(!isset($_SESSION['userSession'])) {
include_once("logout.php");
exit;
}

$se="SELECT * FROM user";
$query=mysqli_query($DBcon,$se);
echo '<table class="table table-condensed">';
while($row=mysqli_fetch_array($query)){
 $id=$row['user_id'];
//print_r($row);
  
echo '<tr>';
echo '<td>';
echo $id;
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
//echo '<td>';
?>
<td><form method="post" action="new_update.php" >
  <input type="hidden" name="userId" value="<?php echo $id; ?>">
  <input type="submit" class="btn btn-primary" name="Update" value="Update">
</form></td>
<td><form method="post" action="del_comfirm.php" >
  <input type="hidden" name="userId" value="<?php echo $id; ?>">
  <input type="submit" class="btn btn-danger" name="Delete" value="Delete"></td>
</form>
<td><form method="post" action="reset.php" >
  <input type="hidden" name="userId" value="<?php echo $id; ?>">
  <input type="submit" class="btn btn-secondary" name="Reset" value="Reset">
</form></td>
<?php
//echo '<a href="update_user" style="text-decoration: none;" >Update </a>';
// echo '</td>';
// echo '<td>';
// echo '<a href="del_comfirm.php" style="text-decoration: none;" >Delete </a>';
// echo '</td>';
// echo '<td>';
// echo '<a href="reset.php" style="text-decoration: none;" >Reset Password </a>';
// echo '</td>';
 echo '</tr>';
}
 echo '</table>';



// $user_id = $_SESSION["userSession"] ;

// $query = $DBcon->query("SELECT * FROM user where user_id= '$user_id'");
// $userRow=$query->fetch_array();


// if (isset($_POST['btn-view'])) {
 
//  $user_id = strip_tags($_POST['user_id']);
//  $user_id = $DBcon->real_escape_string($user_id);


//  $query = $DBcon->query("SELECT * FROM user WHERE user_id='$user_id' or first_name = '$user_id'");
// $row= $query->fetch_assoc();
//   $_SESSION['userSession3'] = $row['user_id'];

//  echo '<table><tr >';
// echo '<tr>';
// echo '<td>';
// echo $row['user_id'];
// echo '</td>';
          
// echo '<td>';
// echo $row['first_name'];
// echo '</td>';
           
// echo '<td>';
// echo $row['last_name'];
// echo '</td>';
                       
// echo '<td>';
// echo $row['email'];
// echo '</td>';

// echo '<td>';
// echo $row['phone_num'];
// echo '</td>';
// echo '<td>';
// echo $row['position'];
// echo '</td>';
// echo '<td>';
// echo '<a href="update_user" style="text-decoration: none;" >Update </a>';
// echo '</td>';
// echo '<td>';
// echo '<a href="del_comfirm.php" style="text-decoration: none;" >Delete </a>';
// echo '</td>';
// echo '<td>';
// echo '<a href="reset.php" style="text-decoration: none;" >Reset Password </a>';
// echo '</td>';
// echo '</tr><br></table>';


// echo '<table>';
//  while($row= $query->fetch_assoc())
  

//            {


// echo '<tr >';
// echo '<tr>';
// echo '<td>';
// echo $row['user_id'];
// echo '</td>';
          
// echo '<td>';
// echo $row['first_name'];
// echo '</td>';
           
// echo '<td>';
// echo $row['last_name'];
// echo '</td>';
                       
// echo '<td>';
// echo $row['email'];
// echo '</td>';

// echo '<td>';
// echo $row['phone_num'];
// echo '</td>';
// echo '<td>';
// echo $row['position'];
// echo '</td>';
// echo '<td>';
// echo '<a href="update_user.php" style="text-decoration: none;" >Update </a>';
// echo '</td>';
// echo '<td>';
// echo '<a href="del_comfirm.php" style="text-decoration: none;" >Delete </a>';
// echo '</td>';
// echo '<td>';
// echo '<a href="reset.php" style="text-decoration: none;" >Reset Password </a>';
// echo '</td>';
// echo '</tr><br>';

// }
// echo '</table>';
// }


 $DBcon->close();

?>
  <button type="button" class="btn btn-danger value="Cancel" onclick="window.location.href='admin_home.php?back'" />Cancel</button>
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
                    &copy;  2018| Design by: 
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

