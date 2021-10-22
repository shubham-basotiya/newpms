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
	<!--	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		 bootstrap jquery and proper.js 
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		 meta tag for responsive website 
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">	
	google fonts 
		<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Monoton&display=swap" rel="stylesheet"> -->
  <link rel="stylesheet" href="asset/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="asset/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- bootstrap jquery and proper.js -->
    <script src="asset/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="asset/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="asset/css2.css" rel="stylesheet">

		<title>Pharmacy managment</title>
		<style>
			.table-dark {
				 background-color: #0062cc;
				 color: white;
			}
		</style>
	
	</head>
	<body>
		<h2 class="display-3 text-center text-primary" style=" color: white;">Pharmacy Management System<hr /></h2>
		
		<h1 class="h1 text-primary text-lg text-center	">M.R. Ordered Products
    <small class="text-muted"><?php if(!empty($_SESSION['mrEmail'])) {
        }
        else
        {
          header('location:home.php');
        }
      ?></small> </h1>
		<br />
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" title="LOGO" href="#LOGO" style="font-family: 'Monoton', cursive;
">PMS</a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="mr.php">M.R. Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="mr_Profile.php">M.R. Profile</a>
      </li>
     <li class="nav-item">
        <a class="nav-link" href="mr_stock.php">M.R. Stock</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" method="POST" name="mrform" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <input class="form-control mr-sm-2" type="search" name="stockSearch" placeholder="Search Product here..." aria-label="Search">
      <button class="btn btn-outline-primary my-2 my-sm-0" name="search" type="submit">Search</button>
    </form>
  </div>
</nav>
<br />
    <h3 class="h3 text-primary">Ordered Stock Details</h3>
    
    
    
    <br />
    <?php
    require('newpmsdb.php');
    //$output = '';
    if(isset($_POST['search'])) {

          // removes backslashes
        $stocksearch = stripslashes($_POST['stockSearch']);
        //escapes special characters in a string
        $stocksearch = mysqli_real_escape_string($mysqli, $stocksearch);
    
    $stk = "SELECT * FROM stock where Id LIKE '%$stocksearch%' OR companyName LIKE '%$stocksearch%' OR tabletName LIKE '%$stocksearch%' OR quantity LIKE '%$stocksearch%' OR mfDate LIKE '%$stocksearch%' OR exDate LIKE '%$stocksearch%' OR holsalePrice LIKE '%$stocksearch%' OR retailPrice LIKE '%$stocksearch%'";
    $rslt = mysqli_query($mysqli, $stk);
    $count = mysqli_num_rows($rslt);

      if($count == 0) {
        echo "<p>this item is not in stock list!</P>";
      }
      else {
    echo "<table class='container text-center table table-bordered'>
    <thead class='table-dark' style='background-color: #0062cc; color: white;'>
    <tr>
    <th>Id</th>
    <th>Company Name</th>
    <th>Tablet Name</th>
    <th>Qty.</th>
    <th>M.F. Date</th>
    <th>E.X. Date</th>
    <th>Holesale Price</th>
    <th>Retail Price</th>
    </tr>
    </thead>";

    while($row = mysqli_fetch_array($rslt))
    {
    echo "<tr>";
    echo "<td>" . $row['Id'] . "</td>";
    echo "<td>" . $row['companyName'] . "</td>";
    echo "<td>" . $row['tabletName'] . "</td>";
    echo "<td>" . $row['quantity'] . "</td>";
    echo "<td>" . $row['mfDate'] . "</td>";
    echo "<td>" . $row['exDate'] . "</td>";
    echo "<td>" . $row['holsalePrice'] . "</td>";
    echo "<td>" . $row['retailPrice'] . "</td>";
    echo "</tr>";
    }   
    echo "</table>";
  }
} else {
  $stk = "SELECT * FROM stock";
  $rslt = mysqli_query($mysqli, $stk);

  echo "<table class='container text-center table table-bordered'>
    <thead class='table-dark'>
    <tr>
    <th>Id</th>
    <th>Company Name</th>
    <th>Tablet Name</th>
    <th>Qty.</th>
    <th>M.F. Date</th>
    <th>E.X. Date</th>
    <th>Holesale Price</th>
    <th>Retail Price</th>
    </tr>
    </thead>";

    while($row = mysqli_fetch_array($rslt))
    {
    echo "<tr>";
    echo "<td>" . $row['Id'] . "</td>";
    echo "<td>" . $row['companyName'] . "</td>";
    echo "<td>" . $row['tabletName'] . "</td>";
    echo "<td>" . $row['quantity'] . "</td>";
    echo "<td>" . $row['mfDate'] . "</td>";
    echo "<td>" . $row['exDate'] . "</td>";
    echo "<td>" . $row['holsalePrice'] . "</td>";
    echo "<td>" . $row['retailPrice'] . "</td>";
    echo "</tr>";
    }   
    echo "</table>";
  }

    ?>
    <br />

		<h2 class="text-center"><a class="btn btn-primary btn-lg" href="logout.php">Logout</a></h2>
	
	</body>
</html>