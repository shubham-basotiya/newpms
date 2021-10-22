<?php
session_start();
require('newpmsdb.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<!-- bootstrap css and js -->
		<!-- bootstrap css and js -->
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
		
		<!-- JQUERY FROM GOOGLE API -->
    <script type="text/javascript" src="asset/jquery.min.js"></script>

    <style>
    	
    </style>
	
	</head>
	<body>
		<h2 class="display-3 text-center" >Pharmacy Management System<hr /></h2>
		<h1 class="h1 text-success text-lg text-center">Admin Profile</h1>
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
        <a class="nav-link" href="admin.php">Admin Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="admin_Profile.php">Admin Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="stock.php">Stock</a>
      </li>
    </ul>
    
  </div>
</nav>
	<br />
		<h3 class="h3">
			<?php if(!empty($_SESSION['adEmail'])) {
				echo $_SESSION['adEmail'];}
				else
				{
					header('location:home.php');
				}
			?>
  			<small class="text-muted">You are in Admin Deshboard</small>
		</h3>
	
		<br />
		
		<?php
		$sql = "SELECT * FROM admin where adEmail ='". $_SESSION['adEmail'] . "'";
		$result = mysqli_query($mysqli,$sql);	
		echo "<table class='container text-center table table-bordered'>
		<thead class='table-dark'>
		<tr>
		<th>Admin Id</th>
		<th>Admin Name</th>
		<th>Admin Username</th>
		<th>Admin Mobile</th>
		</tr>
		</thead>";

		$row = mysqli_fetch_array($result);
		
		echo "<tr>";
		echo "<td>" . $row['adId'] . "</td>";
		echo "<td>" . $row['adName'] . "</td>";
		echo "<td>" . $row['adUsername'] . "</td>";
		
		echo "<td>" . $row['adMob'] . "</td>";
		echo "</tr>";
		
		echo "</table>";
		?>
		<br />

		<h3 class="h3 text-black">Update Profile
  			<small class="text-muted">Edit your Admin Profile detail here</small>
		</h3>

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
        	echo "password not match";
      		 
 if($adpassword==$adpassword1)
		$res =  "Update admin SET adName = '$adname',adEmail = '$ademail',adUsername = '$adusername',adPassword = '".md5($adpassword)."',adMob = '$admob' where adEmail = '". $_SESSION['adEmail'] . "'";
	if(mysqli_query($mysqli, $res)) {
		echo "New record updated successfully!";
		header('location: index.php');
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
		<thead class='table-dark'>
		<tr>
		
		<th>Admin Name</th>
		<th>Admin Email</th>
		<th>Admin Username</th>
		<th>Admin Password</th>
		<th>Admin Confrim Password</th>
		<th>Admin Mobile</th>
		</tr>
		</thead>
      			
			
				<tr>
					<td>
					<input type="text" name="adName" value="<?php echo $row['adName'];?>" class="form-control" placeholder="Admin-Name" autocomplete="off"required />
					</td>
				
					<td>				
					<input type="email" name="adEmail" value="<?php echo $row['adEmail'];?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+.[a-z]{2,4}$" class="form-control" placeholder="Admin-Email" autocomplete="off"required />
					</td>
					<td>
					<input type="username" name="adUsername" value="<?php echo $row['adUsername'];?>" class="form-control" placeholder="Admin-Username" autocomplete="off" required/>
					</td>
					<td>
					<input type="password" name="adPassword" value="<?php echo $row['adPassword'];?>" pattern="^[a-zA-Z0-9[:punct:]]{8,}$" class="form-control" placeholder="Password" title="at least one number and one uppercase and lowercase letter, and at least 8 or more characters" autocomplete="off" required/>
					</td>
					<td>
					<input type="password" name = "adPassword1" value="<?php echo $row['adPassword'];?>" pattern="^[a-zA-Z0-9[:punct:]]{8,}$" class="form-control" placeholder="Comfrim Password" title="at least one number and one uppercase and lowercase letter, and at least 8 or more characters" autocomplete="off" required/>
					</td>
					<td>
					<input type="tel" name="adMob" class="form-control" placeholder="Mobile-Number" value="<?php echo $row['adMob'];?>" pattern="[0-9]{10}" autocomplete="off" minlength="10" maxlength="10" required/>
					</td>
				</tr>
			</table>
					
					
				<button type="submit" name="submit" class="btn btn-success" style="margin-left: 10px;">Save</button>
			</form>
				
			</div>
		
		<br />
	
		
		

		<h2 class="text-center"><a class="btn btn-outline-success btn-lg" href="logout.php">Logout</a></h2>
	
	</body>
</html>