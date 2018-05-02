<?php
session_start();
require_once 'dbconnect.php';



if(isset($_POST['btn-signup'])) {
 
 $uname = strip_tags($_POST['name']);
 $nationality = strip_tags($_POST['nationality']);
 $email = strip_tags($_POST['email']);
 $phone = strip_tags($_POST['phone']);
 $city = strip_tags($_POST['city']);
 $tdate = strip_tags($_POST['tdate']); 
 $nights = strip_tags($_POST['nights']);
 $adult = strip_tags($_POST['adult']);
 $kid = strip_tags($_POST['kid']);
 $baby = strip_tags($_POST['baby']);
 $destination = strip_tags($_POST['destination']);
 $massages = strip_tags($_POST['massages']); 

 $uname = $DBcon->real_escape_string($uname); 
 $nationality = $DBcon->real_escape_string($nationality); 
 $email = $DBcon->real_escape_string($email);
 $phone = $DBcon->real_escape_string($phone);
 $city = $DBcon->real_escape_string($city);
 $tdate = $DBcon->real_escape_string($tdate);
 $nights = $DBcon->real_escape_string($nights); 
 $adult = $DBcon->real_escape_string($adult); 
 $kid = $DBcon->real_escape_string($kid);
 $baby = $DBcon->real_escape_string($baby);
 $destination = $DBcon->real_escape_string($destination);
 $massages = $DBcon->real_escape_string($massages);
 
 


$query = "INSERT INTO customer(name,nationality,email,phone,city,tdate,nights,adult,kid,baby,destination,massages) VALUES('$uname','$nationality','$email','$phone','$city','$tdate','$nights','$adult','$kid','$baby','$destination','$massages')";

  

if ($DBcon->query($query) === TRUE) {
      $last_id = $DBcon->insert_id;
    echo "<font color='red'>New user added successfully. your ID is: " . $last_id . "</font>";


}
else {
   
     echo "<script>alert('error while registering !'); window.location='###'</script>";
}
  


$DBcon->close();
}
?>

<html>
<head>
	<title>Tailor Made Holiday Form</title>
	<link rel="stylesheet" type="text/css" href="form.css">
</head>
<body>
<div class="wrapp">
	<h1>Tailor Made Holiday Form</h1>
	<hr>
	<div class="form">
		<form method="post">
			<font color="white">
			 <div class="text">
			 	Name <br>    
				<input type="text" name="name" placeholder="Your Name" margin-right="100px"><br><br>
				Email<br>
				<input type="text" name="email" placeholder="Email"><br><br>
				Phone Number<br>
				<input type="text" name="phone" placeholder="Phone Number"><br><br>
			 </div><br><br>

			
	
			<div class="select">
				Nationality <br>
				
					<input type="text" name="nationality" placeholder="Eg :-Sri Lankan">
					
				
			</div>		
			

			<div class="city">
				Departure City <br>
				<input type="text" name="city" placeholder="City">
			</div>
						
			<div class="tdate">
				Travel Date <br>
				<input type="date" name="tdate" placeholder="Preffered Travel Date">
			</div>


			<div class="nights">
				Nights <br>
				<input type="text" name="nights" placeholder="Nights">
			</div>	

			<table>
				<font color="white"></font>
				<tr>
					<th>
						<font color="white">
							Adults <br>
						<input type="text" name="adult" placeholder="Adults">
						</font>
						
					</th>
					<th>
						<font color="white">
							Kids(<12) <br>
						<input type="text" name="kid" placeholder="Kids">
						</font>
					</th>
					<th>
						<font color="white">
							Baby(<2)<br>
						<input type="text" name="baby" placeholder="Baby">
						</font>
					</th>
				</tr>
			</table>

			<div class="destination">
				Destination <br>
				<input type="text" name="destination" placeholder="City">
			</div>
			<div class="text_area">
				Message/Request <br>
				<textarea name="massages" placeholder="Text your massage here" ></textarea>
			</div>

			<div class="submit">
				<input type="submit" value=" SEND HOLIDAY REQUEST " name="btn-signup">
				
						    </div>
		</font>
	</form>
	</div>
	
</div>


</body>
</html>