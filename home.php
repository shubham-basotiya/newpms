<?php 
session_start();

?>

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
		<link type="text/css" rel="stylesheet" href="index.css">
	</head>
	
	<body>

		<?php
	
	require('newpmsdb.php');
	
	if(isset($_POST['adsubmit'])) {
    $adEmail = $_POST['adEmail'];
    $adPassword = $_POST['adPassword'];
	$sql = "SELECT adEmail, adPassword FROM admin WHERE adEmail = '$adEmail' AND adPassword = '".md5($adPassword)."'";
	$result = mysqli_query($mysqli,$sql);
	//$rslt = $mysqli -> query($sql);
	$rslt = mysqli_fetch_array($result);    
  	  
    if($rslt > 0){  
    	
		$_SESSION['adEmail'] = $adEmail;
		
		header("location:admin.php");
	}
	else {
		header('Location: login_failed.php');
		}
	} 
		$mysqli -> close();
?>
		<div class="jumbotron text-center" style="background-color: #0062cc;">
  			<h1 style="color: #ffffff;">Pharmacy Management System </h1>
  			<p style="color: #ffffff;">Choose Login As</p>
  		</div>

  		<div class="container login-container">

            <div class="row">
                <div class="col-md-6 login-form-1">
                    <h3 title="Login for Company Admin">Login for Admin</h3>
                    <form method="POST">
                        <div class="form-group">
                            <input type="email" class="form-control" name="adEmail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+.[a-z]{2,4}$" placeholder="Your Email *"  autocomplete="off" required />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="adPassword" pattern="^[a-zA-Z0-9[:punct:]]{8,}$" placeholder="Your Password *" autocomplete="off" required />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" name="adsubmit" value="Login" />
                        </div>
                        <div class="form-group">
                            <a href="admin_form.php" class="ForgetPwd">Register here</a>
                        </div>
                    </form>
         
                </div>

        <?php
	
	require('newpmsdb.php');
	
	if(isset($_POST['mrsubmit'])) {
    $mrEmail = $_POST['mrEmail'];
    $mrPassword = $_POST['mrPassword'];
	$sql = "SELECT mrEmail, mrPassword FROM mr WHERE mrEmail = '$mrEmail' AND mrPassword = '".md5($mrPassword)."'";

	$result = mysqli_query($mysqli,$sql);
	//$rslt = $mysqli -> query($sql);
	$rslt = mysqli_fetch_array($result);    
  	  
    if($rslt > 0){
    	
		$_SESSION['mrEmail'] = $mrEmail;
		
		header("location:mr.php");
	}
	else {
		
		header('Location: login_failed.php');
		}
	}// else 
	//{
		/*echo "<script>
		alert('<h3>Login failed!</h3>
			<br />
			<p>your Email and Password doesn't match</p></br>
			<span style='background-color: blue;'><a href='index.php' target='_blank'>Retry</a></span>');
		</script>";
	}*/
?>    
            <div class="col-md-6 login-form-2">
          
                    <h3 title="Login for Medical Representative">Login for MR</h3>
                    <form method="POST">
                        <div class="form-group">
                            <input type="email" class="form-control" name="mrEmail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+.[a-z]{2,4}$" placeholder="Your Email *" autocomplete="off" required />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="mrPassword" pattern="^[a-zA-Z0-9[:punct:]]{8,}$" placeholder="Your Password *" autocomplete="off" required />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" name="mrsubmit" value="Login"/>
                        </div>
                        
                </form>
            </div>
            	
        </div>
    </div>
</body>
</html>