
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
                     <h2>Assign Customer</h2>  

                     <?php 
session_start();
require_once 'dbconnect.php';

if(!isset($_SESSION['userSession'])) {
include_once("logout.php");
exit;
}

$id=$_POST['userId'];
print_r($id);

$se="SELECT * FROM customer WHERE id = $id";
$quer=mysqli_query($DBcon,$se);
$we=mysqli_fetch_array($quer);

?>
<form  method="post" >
<b>User Id</b><br>

<input type="text" name="user_id"  ><br>
<input type="hidden" name="userId" value="<?php echo $id; ?>">
<input type="submit" class="btn btn-primary" name="edit" value="Submit">
<input type="button" class="btn btn-primary" accesskey="c" value="Cancel" onclick="window.location.href='admin_customer_panel.php'" />
</form>

<?php 
if(isset($_POST['edit'])){
	$user_id = $_POST['user_id'];
	$id=$_POST['userId'];
 	//print_r($id);
 	$query = $DBcon->query("UPDATE customer set u_id='$user_id' WHERE id='$id'");


	if ($query) {
	 	echo "Asign a user success";
	 }else{
	 	echo "Can not update";
	 }
}
//  $id = $_SESSION["userSession4"] ;
// $select_query = $DBcon->query("SELECT * FROM customer WHERE id='$id'");
// $userRow = $select_query->fetch_array();	

	
 $DBcon->close();
?>









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


























