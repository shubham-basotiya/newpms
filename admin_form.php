<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="icon" href="hnet.com-image.ico" type="image/x-icon" >
		<!-- bootstrap css and js -->
		<link rel="stylesheet" href="asset/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="asset/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<!-- bootstrap jquery and proper.js -->
		<script src="asset/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="asset/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<!-- meta tag for responsive website -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">	
		<title>Pharmacy managment</title>
		<style>

			
		</style>
		<!-- <script type="text/javascript">
			function validation() {
	//var a = document.forms["adform"]["adPassword"].value;
	//var b = document.forms["adform"]["adpassword1"].value;
	

	if(document.adform.adPassword.value != document.adform.adPassword1.value )	{
		alert("Password not match!");
	}

	return false;
		}
		</script> -->
	</head>
	
	<body>
		<?php
		require('newpmsdb.php');
		if(isset($_POST['submit'])) {

	        // removes backslashes
        $adname = stripslashes($_POST['adName']);
        //escapes special characters in a string
        $adname = mysqli_real_escape_string($mysqli, $adname);
        $ademail = stripslashes($_POST['adEmail']);
        $ademail = mysqli_real_escape_string($mysqli, $ademail);
        $adusername    = stripslashes($_POST['adUsername']);
        $adusername    = mysqli_real_escape_string($mysqli, $adusername);
        $adpassword = stripslashes($_POST['adPassword']);
        $adpassword = mysqli_real_escape_string($mysqli, $adpassword);
        $adpassword1 = stripcslashes($_POST['adPassword1']);
        $adpassword1 = mysqli_real_escape_string($mysqli, $adpassword1);
        $admob = stripcslashes($_POST['adMob']);
        $admob = mysqli_real_escape_string($mysqli, $admob);
        
        	if($adpassword != $adpassword1) 
        	echo "<p style='color: red'>password not match</p>";
      		 
 
 $q = "SELECT * from admin where adEmail = '$ademail'"; 
 $r = mysqli_query($mysqli, $q);
 $n = mysqli_num_rows($r);

 if($n >= 1)
 {
 	echo "<p style='color : red;'>This email ". $ademail ." is already registered try another email.</p>
 ";
 	mysqli_close($mysqli);
 	$_SERVER['PHP_SELF'];
 }  
 else {
     if ($adpassword == $adpassword1)
         $res = "INSERT INTO admin (adName,adEmail,adUsername,adPassword,adMob) VALUES ('$adname','$ademail','$adusername','" . md5($adpassword) . "','$admob')";

     if (mysqli_query($mysqli, $res)) {
         echo "New record created successfully!";
         header('location: home.php');
     } else {
         echo "Error: " . $res . " " . mysqli_error($mysqli);
     }
 }

}

?>		

		<div class="container" >
			<br />
      		<h2>Create Admin Account</h2>
      		<br />

		<form method="POST" name="adform" onsubmit="validation();">

			
      			<div class="form-group">
				<label for="aname">Name: </label>
					<input type="text" name="adName" class="form-control" placeholder="Admin-Name" autocomplete="off"required />
				</label>
				<br>
				<br>
				<label for="aemail">Email: </label>
					<input type="email" name="adEmail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+.[a-z]{2,4}$" class="form-control" placeholder="Admin-Email" autocomplete="off"required />
				</label>
				<br>
				<br>
				<label for="uname">Username: </label>
					<input type="username" name="adUsername" class="form-control" placeholder="Admin-Username" autocomplete="off" required/>
				</label>
				<br>
				<br>
				<label for="pass">Password: </label>
					<input type="password" name="adPassword" pattern="^[a-zA-Z0-9[:punct:]]{8,}$" class="form-control" placeholder="Password" title="at least one number and one uppercase and lowercase letter, and at least 8 or more characters" autocomplete="off" required/>
				</label>
				<br>
				<br>
				<label for="cpass">Comfrim Password: </label>
					<input type="password" name = "adPassword1" pattern="^[a-zA-Z0-9[:punct:]]{8,}$" class="form-control" placeholder="Comfrim Password" title="at least one number and one uppercase and lowercase letter, and at least 8 or more characters" autocomplete="off" required/>
				</label>
				<br>
				<br>
				<label for="num">Mobile: </label>
					<input type="tel" name="adMob" class="form-control" placeholder="Mobile-Number" pattern="[0-9]{10}" autocomplete="off" minlength="10" maxlength="10" required/>
				</label>
				<br>
				<br>
				<input type="submit" name="submit" class="btn btn-outline-primary btn-lg" value="Submit" />
                </div>
				</form>
		</div>

		</div>
	</body>
</html>
