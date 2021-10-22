<?php
session_start();
require('newpmsdb.php');
require('delete.php');

?>

<!DOCTYPE html>
<html>
	<head>
    <link rel="icon" href="hnet.com-image.ico" type="image/x-icon" >
		<meta charset="utf-8">
    <!-- font-awesome icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
		<!-- bootstrap css and js -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<!-- bootstrap jquery and proper.js -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<!-- meta tag for responsive website -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">	
		<title>Pharmacy managment</title>
		<!-- google fonts -->
		<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Monoton&display=swap" rel="stylesheet">
		<!-- JQUERY FROM GOOGLE API -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

    <style>
    	
    </style>
	
	</head>
	<body>
		<h2 class="display-3 text-center">Pharmacy Management System<hr /></h2>
		<h1 class="h1 text-success text-lg text-center">Admin Stock
    <small class="text-muted"><?php if(!empty($_SESSION['adEmail'])) {
        }
        else
        {
          header('location:home.php');
        }
      ?></small></h1>
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
      <li class="nav-item">
        <a class="nav-link" href="admin_Profile.php">Admin Profile</a>
      </li>
     <li class="nav-item active">
        <a class="nav-link" href="stock.php">Stock</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" method="POST" name="mrform" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <input class="form-control mr-sm-2" type="search" name="stockSearch" placeholder="Search Product here..." aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" name="search" type="submit">Search</button>
    </form>
  </div>
</nav>
<br />
    <h3 class="h3">Stock Details</h3>
    
    
    
    <br />
    <?php
    require('newpmsdb.php');
    //$output = '';
    if(isset($_POST['search'])) {

          // removes backslashes
        $stocksearch = stripslashes($_POST['stockSearch']);
        //escapes special characters in a string
        $stocksearch = mysqli_real_escape_string($mysqli, $stocksearch);
        
    $stk = "SELECT * FROM stock where Id LIKE '%$stocksearch%' OR companyName LIKE '%$stocksearch%' OR tabletName LIKE '%$stocksearch%' OR tabletDiscription LIKE '%$stocksearch%' OR quantity LIKE '%$stocksearch%' OR mfDate LIKE '%$stocksearch%' OR exDate LIKE '%$stocksearch%' OR holsalePrice LIKE '%$stocksearch%' OR retailPrice LIKE '%$stocksearch%'";
    $rslt = mysqli_query($mysqli, $stk);
    $count = mysqli_num_rows($rslt);
    
      if($count == 0) {
        echo "<p>this item is not in stock list!</P>";
      }
      else {
    echo "<table class='container text-center table table-bordered'>
    <thead class='table-dark'>
    <tr>
    <th>Id</th>
    <th>Company Name</th>
    <th>Tablet Name</th>
    <th>Tablet Discription</th>
    <th>Qty.</th>
    <th>M.F. Date</th>
    <th>E.X. Date</th>
    <th>Holesale Price</th>
    <th>Retail Price</th>
    <th>Edit</th>
    <th>Delete</th>
    </tr>
    </thead>";

    while($row = mysqli_fetch_array($rslt))
    {
    echo "<tr>";
    echo "<td>" . $row['Id'] . "</td>";
    echo "<td>" . $row['companyName'] . "</td>";
    echo "<td>" . $row['tabletName'] . "</td>";
    echo "<td>" . $row['tabletDiscription'] . "</td>";
    echo "<td>" . $row['quantity'] . "</td>";
    echo "<td>" . $row['mfDate'] . "</td>";
    echo "<td>" . $row['exDate'] . "</td>";
    echo "<td>" . $row['holsalePrice'] . "</td>";
    echo "<td>" . $row['retailPrice'] . "</td>";?>

    <td><a href="stock.php?edt=<?php echo $row['Id'];?>" class="btn btn-info" tittle='Edit'><i class='fas fa-edit'></i></td>
    <td><a href="delete.php?del=<?php echo $row['Id'];?>" class="btn btn-danger" tittle='Delete'><i class='far fa-trash-alt'></i></a></td>
   <?php 
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
    <th>Tablet Discription</th>
    <th>Qty.</th>
    <th>M.F. Date</th>
    <th>E.X. Date</th>
    <th>Holesale Price</th>
    <th>Retail Price</th>
    <th>Edit</th>
    <th>Delete</th>
    </tr>
    </thead>";

    while($row = mysqli_fetch_array($rslt))
    {
    echo "<tr>";
    echo "<td>" . $row['Id'] . "</td>";
    echo "<td>" . $row['companyName'] . "</td>";
    echo "<td>" . $row['tabletName'] . "</td>";
    echo "<td>" . $row['tabletDiscription'] . "</td>";
    echo "<td>" . $row['quantity']. "</td>";
    echo "<td>" . $row['mfDate'] . "</td>";
    echo "<td>" . $row['exDate'] . "</td>";
    echo "<td>" . $row['holsalePrice'] . "</td>";
    echo "<td>" . $row['retailPrice'] . "</td>";?>
    <td><a href="stock.php?edt=<?php echo $row['Id'];?>" class="btn btn-info"><i class='fas fa-edit'></i></td>
    <td><a href="delete.php?del=<?php echo $row['Id'];?>" class="btn btn-danger"><i class='far fa-trash-alt'></i></a></td>
   <?php
   echo "</tr>";
    }   
    echo "</table>";
  }

    ?>
    <br />

    <h3 class="h3 text-black">Add Product in Stock
        <small class="text-muted">Add your product in stock here..</small>
    </h3>

    <?php
    
  require('newpmsdb.php');
  if(isset($_POST['submit'])) {

          
        $comname = $_POST['companyName'];
        
        $tabname = $_POST['tabletName'];

        $tabdis = $_POST['tabletDiscription'];

        $qun = $_POST['quantity'];

        $mand = $_POST['mfDate'];

        $expd = $_POST['exDate'];

        $hosalep = $_POST['holsalePrice'];

        $retp = $_POST['retailPrice'];

    $res =  "INSERT INTO stock (companyName,tabletName,tabletDiscription,quantity,mfDate,exDate,holsalePrice,retailPrice) VALUES ('$comname','$tabname','$tabdis','$qun','$mand','$expd','$hosalep','$retp')";
  if(mysqli_query($mysqli, $res)) {
    echo "New record created successfully!";
    
   
   //header('location: stock.php');
}

  else{
    echo "Error: ". $res . " " . mysql_error($mysqli);
    }
    }
  ?>

    
    
    <form method="POST" name="mrform" action="">
        <input type="hidden" name="id" value="<?php echo $id;?>">

      <br />
      
    <div class="form-group">
    <table class='container text-center table table-bordered'>
    <thead class='table-dark'>
    <tr>
    
    <th>Company Name</th>
    <th>Tablet Name</th>
    <th>Tablet Discription</th>
    <th>Quantity</th>
    <th>Manufacture Date</th>
    <th>Expairy Date</th>
    <th>Holesale Price</th>
    <th>Retail Price</th>

    </tr>
    </thead>
            
      
        <tr>
          <td>
          <input type="text" name="companyName" class="form-control" value="<?php echo $cname; ?>" placeholder="Compmay Name" autocomplete="off"required />
          </td>
        
          <td>        
          <input type="text" name="tabletName"  class="form-control" value="<?php echo $tname; ?>" placeholder=" Tablet Name" autocomplete="off"required />
          </td>

          <td>        
          <input type="text" name="tabletDiscription"  class="form-control" value="<?php echo $tdisp; ?>" placeholder=" Tablet Discription" autocomplete="off"required />
          </td>

          <td>
          <input type="number" name="quantity"  class="form-control" value="<?php echo $qty; ?>" placeholder="Tablet Quantity" autocomplete="off" min = "0" required/>
          </td>
          <td>
          <input type="date" name="mfDate"  class="form-control" value="<?php echo $MFD; ?>" placeholder="Manufacture Date" autocomplete="off" required/>
          </td>
          <td>
          <input type="date" name="exDate"  class="form-control" value="<?php echo $EXD; ?>" placeholder="Expairy Date" autocomplete="off" required/>
          </td>
          <td>
          <input type="number" name="holsalePrice" class="form-control" value="<?php echo $WSP; ?>" placeholder="Holesale Price"  autocomplete="off"min = "0" required/>
          </td>
          <td>
          <input type="number" name="retailPrice" class="form-control" value="<?php echo $REP; ?>" placeholder="Retail Price"  autocomplete="off"min = "0" required/>
          </td>
        </tr>
      </table>
          
          
        <?php if($update == true) {?>
          <button type="submit" name="updt" class="btn btn-info" style="margin-left: 10px;">
          Update</button>
          <?php } else {
          ?>
        <button type="submit" name="submit" class="btn btn-success" style="margin-left: 10px;">Save</button>
      <?php  } ?> 
      </form>
        
      </div>




    <br />
    <h2 class="text-center"><a class="btn btn-outline-success btn-lg" href="logout.php">Logout</a></h2>
  
  </body>
</html>