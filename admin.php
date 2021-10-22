<?php
session_start();
require('newpmsdb.php');
require('delete.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="icon" href="hnet.com-image.ico" type="image/x-icon" >
		<!-- font-awesome icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
		<!-- bootstrap css and js -->
		<link rel="stylesheet" href="asset/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="asset/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<!-- bootstrap jquery and proper.js -->
		<script src="asset/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="asset/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		
		<!-- meta tag for responsive website -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">	
		<title>Pharmacy managment</title>
		<!-- google fonts -->
		<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Monoton&display=swap" rel="stylesheet">
		<!-- JQUERY FROM GOOGLE API -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

    <style>
/* _navbar.scss:184 */


/* _navbar.scss:228 */
$navbar-light-color
$navbar-light-toggler-border-color

/* _navbar.scss:280 */
$navbar-dark-color
$navbar-dark-toggler-border-color
    	
    	/* _navbar.scss:184 */
.navbar-toggler {
  display: none;
}

/* _navbar.scss:228 */
.navbar-toggler {
  color: $navbar-light-color;
  border-color: $navbar-light-toggler-border-color;
}

/* _navbar.scss:280 */
.navbar-toggler {
  color: $navbar-dark-color;
  border-color: $navbar-dark-toggler-border-color;
}
    </style>
	
	</head>
	<body>

		<h2 class="display-3 text-center" >Pharmacy Management System<hr /></h2>
		<h1 class="h1 text-success text-lg text-center">Admin's M.R.
		<small class="text-muted"><?php if(!empty($_SESSION['adEmail'])) {
				}
				else
				{
					header('location:home.php');
				}
			?></small></h1>
		<br />

<div class="collapse" id="navbarToggleExternalContent">
  <div class="bg-light p-4">
    <h5 class="text-black h4"><a class="navbar-brand" title="LOGO" href="#LOGO" style="font-family: 'Monoton', cursive;
">PMS</a></h5>
   
  </div>
</div>


		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" title="LOGO" href="#LOGO" style="font-family: 'Monoton', cursive;
">PMS</a>


  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="admin.php">Admin Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin_Profile.php">Admin Profile</a>

      </li>
     <li class="nav-item">
        <a class="nav-link" href="stock.php">Stock</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" method="POST" name="mrform" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <input class="form-control mr-sm-2" type="search" name="mrSearch" placeholder="Search M.R. here..." aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" name="search" type="submit">Search</button>
    </form>
  </div>
</nav>
	
		<br />
		<h3 class="h3">Your M.R. Details</h3>
		
		
		
		<br />
		<?php
		require('newpmsdb.php');
		//$output = '';
		if(isset($_POST['search'])) {

	        // removes backslashes
        $mrsearch = stripslashes($_POST['mrSearch']);
        //escapes special characters in a string
        $mrsearch = mysqli_real_escape_string($mysqli, $mrsearch);
		
		$sql = "SELECT * FROM mr where mrId LIKE '%$mrsearch%' OR mrName LIKE '%$mrsearch%' OR mrEmail LIKE '%$mrsearch%' OR mrUsername LIKE '%$mrsearch%' OR mrMob LIKE '%$mrsearch%'";
		$rslt = mysqli_query($mysqli, $sql);
		$count = mysqli_num_rows($rslt);
			if($count == 0) {
				echo "<p>this m.r. is not our employee!</P>";
			}
			else {
		echo "<table class='container text-center table table-bordered'>
		<thead class='table-dark'>
		<tr>
		<th>M.R. Id</th>
		<th>M.R. Name</th>
		<th>M.R. Email</th>
		<th>M.R. Username</th>
		<th>M.R. Mobile</th>
		<th>Delete</th>
		</tr>
		</thead>";

		while($row = mysqli_fetch_array($rslt))
		{
		echo "<tr>";
		echo "<td>" . $row['mrId'] . "</td>";
		echo "<td>" . $row['mrName'] . "</td>";
		echo "<td>" . $row['mrEmail'] . "</td>";
		echo "<td>" . $row['mrUsername'] . "</td>";
		
		echo "<td>" . $row['mrMob'] . "</td>";?>
		 <td><a href="delete.php?dte=<?php echo $row['mrId'];?>" class="btn btn-danger" tittle='Delete'><i class='far fa-trash-alt'></i></a></td>
   <?php 
    echo "</tr>";
    }   
    echo "</table>";
  }
} else {
	$sql = "SELECT * FROM mr";
	$rslt = mysqli_query($mysqli, $sql);

	echo "<table class='container text-center table table-bordered'>
		<thead class='table-dark'>
		<tr>
		<th>M.R. Id</th>
		<th>M.R. Name</th>
		<th>M.R. Email</th>
		<th>M.R. Username</th>
		<th>M.R. Mobile</th>
		<th>Delete</th>
		</tr>
		</thead>";

		while($row = mysqli_fetch_array($rslt))
		{
		echo "<tr>";
		echo "<td>" . $row['mrId'] . "</td>";
		echo "<td>" . $row['mrName'] . "</td>";
		echo "<td>" . $row['mrEmail'] . "</td>";
		echo "<td>" . $row['mrUsername'] . "</td>";
		
		echo "<td>" . $row['mrMob'] . "</td>";?>
		 <td><a href="delete.php?dte=<?php echo $row['mrId'];?>" class="btn btn-danger"><i class='far fa-trash-alt'></i></a></td>
   <?php
   echo "</tr>";
    }   
    echo "</table>";
  }

    ?>
		
                <a href="mr_form.php" class="btn btn-info">Create New M.R. A/C.</a>
        <br />
		<h2 class="text-center"><a class="btn btn-outline-success btn-lg" href="logout.php">Logout</a></h2>
	
	</body>
</html>