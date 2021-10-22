<?php
session_start();
require('newpmsdb.php');

?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="icon" href="hnet.com-image.ico" type="image/x-icon" >
		<meta charset="utf-8">
		<!-- bootstrap css and js -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<!-- bootstrap jquery and proper.js -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<!-- meta tag for responsive website -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">	
		<!-- google fonts -->
		<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Monoton&display=swap" rel="stylesheet">
		<title>Pharmacy managment</title>
		<style>
			
		</style>
	
	</head>
	<body>
		<h2 class="display-3 text-center text-primary" style=" color: white;">Pharmacy Management System<hr /></h2>
		
		<h1 class="h1 text-primary text-lg text-center	">M.R. Profile</h1>
		<br />
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" title="LOGO" href="#LOGO" style="font-family: 'Monoton', cursive;
">PMS</a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item">
        <a class="nav-link" href="mr.php">M.R. Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="mr_Profile.php">M.R. Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="mr_stock.php">M.R. Stock</a>
      </li>
    </ul>
    
  </div>
</nav>
		<br />
		<h3 class="h3 text-primary"><?php if(!empty($_SESSION['mrEmail'])) {
				echo $_SESSION['mrEmail'];}
				else
				{
					header('location:home.php');
				}
			?>
  			<small class="text-muted">You are in M.R. Profile</small>
		</h3>
	
		<br />
		
		<?php
		$sql = "SELECT * FROM mr where mrEmail = '". $_SESSION['mrEmail'] . "'";
		$rslt = mysqli_query($mysqli,$sql);
		echo "<table class='container text-center table table-bordered'>
		<thead class='table-dark' style='background-color: #0062cc; color: white;'>
		<tr>
		<th>M.R. Id</th>
		<th>M.R. Name</th>
		<th>M.R. Username</th>
		<th>M.R. Mobile</th>
		</tr>
		</thead>";

		$row = mysqli_fetch_array($rslt);
		
		echo "<tr>";
		echo "<td>" . $row['mrId'] . "</td>";
		echo "<td>" . $row['mrName'] . "</td>";
		echo "<td>" . $row['mrUsername'] . "</td>";
		
		echo "<td>" . $row['mrMob'] . "</td>";
		echo "</tr>";
		
		echo "</table>";
		?>
		<br />

		<h3 class="h3 text-primary">Update Profile
  			<small class="text-muted">Edit your M.R. Profile detail here</small>
		</h3>

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
        $mrmob = stripcslashes($_POST['mrMob']);
        $mrmob = mysqli_real_escape_string($mysqli, $mrmob);
        if($adpassword != $adpassword1) 
        	echo "password not match";
      		 
 if($adpassword==$adpassword1)
		$res =  "Update mr SET mrName = '$mrname',mrEmail = '$mremail',mrUsername = '$mrusername',mrPassword = '".md5($mrpassword)."',mrMob = '$mrmob' where mrEmail = '". $_SESSION['mrEmail'] . "'";
	if(mysqli_query($mysqli, $res)) {
		echo "New record updated successfully!";
		header('location: home.php');
}

	else{
		echo "Error: ". $res . " " . mysql_error($mysqli);
		}
		}
	?>

		
		
		<form method="POST" name="mrform" onsubmit="validation();" action="">
			<br />
			
		<div class="form-group">
		<table class='container text-center table table-bordered'>
		<thead class='table-dark' style='background-color: #0062cc; color: white;'>
		<tr>
		
		<th>M.R. Name</th>
		<th>M.R. Email</th>
		<th>M.R. Username</th>
		<th>M.R. Password</th>
		<th>M.R. Confrim Password</th>
		<th>M.R. Mobile</th>
		</tr>
		</thead>
      			
			
				<tr>
					<td>
					<input type="text" name="mrName" class="form-control"  value="<?php echo $row['mrName'];?>" placeholder="mr-Name" style="text-align: center;" autocomplete="off" required/>
					</td>
				
					<td>				
					<input type="email" name="mrEmail" style="text-align: center;" value="<?php echo $row['mrEmail'];?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+.[a-z]{2,4}$" class="form-control" placeholder="mr-Email" autocomplete="off"required />
					</td>
					<td>
					<input type="username" name="mrUsername" class="form-control" style="text-align: center;" value="<?php echo $row['mrUsername'];?>" placeholder="mr-Username"  autocomplete="off" required/>
					</td>
					<td>
					<input type="password" name="mrPassword"  value="<?php echo $row['mrPassword']; ?>" pattern="^[a-zA-Z0-9[:punct:]]{8,}$" class="form-control" placeholder="Password" title="at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Password" autocomplete="off" required/>
					</td>
					<td>
					<input type="password" name="mrpPassword1"  value="<?php echo $row['mrPassword'];?>" pattern="^[a-zA-Z0-9[:punct:]]{8,}$" class="form-control" placeholder="Password" title="at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Comfrim Password" autocomplete="off" required/>
					</td>
					<td>
					<input type="tel" pattern="[0-9]{10}" name="mrMob" style="text-align: center;" class="form-control"  value="<?php echo $row['mrMob'];?>" placeholder="Mobile-Number" minlength="10" maxlength="10" autocomplete="off" required/>
					</td>
				</tr>
			</table>
					
					
				<button type="submit" name="submit" class="btn btn-primary" style="margin-left: 10px;">Save</button>
			</form>
			</div>
		
		<br />

		<h2 class="text-center"><a class="btn btn-primary btn-lg" href="logout.php">Logout</a></h2>
	
	</body>
</html>