
<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="icon" href="hnet.com-image.ico" type="image/x-icon" >
		<!-- bootstrap css and js -->
		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		bootstrap jquery and proper.js
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
		<link rel="stylesheet" href="asset/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="asset/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<!-- bootstrap jquery and proper.js -->
		<script src="asset/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="asset/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		
		<!-- google fonts -->
		<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="asset/css2.css" rel="stylesheet">
		<!-- meta tag for responsive website -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">	
		<title>Pharmacy managment</title>
		<style>

			
		</style>
	<!-- 	<script type="text/javascript">
// 			function validation() {
// 	//var a = document.forms["adform"]["adPassword"].value;
// 	//var b = document.forms["adform"]["adpassword1"].value;
	

// 	if(document.mrform.mrPassword.value != document.adform.mrPassword1.value )	{
// 		alert("Password not match!");
// 	}

// 	return false;
// }
		</script> -->
	</head>
	
	<body>
	<?php
	require('newpmsdb.php');
	if(isset($_POST['submit'])) {

	        // removes backslashes
        $mrname = stripslashes($_POST['mrName']);
        //escapes special characters in a string
        $mrname = mysqli_real_escape_string($mysqli, $mrname);
        $mremail = stripslashes($_POST['mrEmail']);
        $mremail = mysqli_real_escape_string($mysqli, $mremail);
        $mrusername    = stripslashes($_POST['mrUsername']);
        $mrusername    = mysqli_real_escape_string($mysqli, $mrusername);
        $mrpassword = stripslashes($_POST['mrPassword']);
        $mrpassword = mysqli_real_escape_string($mysqli, $mrpassword);
        $mrpassword1 = stripslashes($_POST['mrPassword1']);
        $mrpassword1 = mysqli_real_escape_string($mysqli, $mrpassword1);
        $mrmob = stripcslashes($_POST['mrMob']);
        $mrmob = mysqli_real_escape_string($mysqli, $mrmob);

        if($mrpassword != $mrpassword1) 
        	echo "<p style='color: red'>password not match</p>";
      		 
 
 $q = "SELECT * from mr where mrEmail = '$mremail'"; 
 $r = mysqli_query($mysqli, $q);
 $n = mysqli_num_rows($r);

 if($n >= 1)
 {
 	echo "<p style='color : red;'>This email ". $mremail ." is already registered try another email.</p>";
 	mysqli_close($mysqli);
 	$_SERVER['PHP_SELF'];
 }  
 else {
 		if($adpassword==$adpassword1)
		$res = "INSERT INTO mr (mrName,mrEmail,mrUsername,mrPassword,mrMob) VALUES ('$mrname','$mremail','$mrusername','".md5($mrpassword)."', '$mrmob')";

		if(mysqli_query($mysqli, $res)) {
		echo "New record created successfully!";
		header('location: admin.php');
		}
		else{
			echo "Error: ". $res . " " . mysqli_error($mysqli);
		}
	}

}

	?>
		<div class="container" >
			<br />
      		<h2>Create M.R. Account</h2>
      		<br />

		
		<form method="POST" name="mrform" onsubmit="validation();" action="">
      			<div class="form-group">
			
				<label for="aname">Name: </label>
					<input type="text" name="mrName" class="form-control" placeholder="mr-Name" autocomplete="off" required/>
				</label>
				<br>
				<br>
				<label for="aemail">Email: </label>
					<input type="email" name="mrEmail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+.[a-z]{2,4}$" class="form-control" placeholder="mr-Email" autocomplete="off"required />
				</label>
				<br>
				<br>
				<label for="uname">Username: </label>
					<input type="username" name="mrUsername" class="form-control" placeholder="mr-Username" autocomplete="off" required/>
				</label>
				<br>
				<br>
				<label for="pass">Password: </label>
					<input type="password" name="mrPassword" pattern="^[a-zA-Z0-9[:punct:]]{8,}$" class="form-control" placeholder="Password" title="at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Password" autocomplete="off" required/>
				</label>
				<br>
				<br>
				<label for="cpass">Comfrim Password: </label>
					<input type="password" name="mrPassword1" pattern="^[a-zA-Z0-9[:punct:]]{8,}$" class="form-control" placeholder="Password" title="at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Comfrim Password" autocomplete="off" required/>
				</label>
				<br>
				<br>
				<label for="num">Mobile: </label>
					<input type="tel" pattern="[0-9]{10}" name="mrMob" class="form-control" placeholder="Mobile-Number" minlength="10" maxlength="10" autocomplete="off" required/>
				</label>
				<br>
				<br>
				<button type="submit" name="submit" class="btn btn-outline-primary btn-lg">Submit</button>
			</form>
			</div>
		</div>
	</body>
</html>
