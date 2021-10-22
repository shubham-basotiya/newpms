<?php
//session_start();
require('newpmsdb.php');
$id = 0;
$update = false;
$cname = '';
$tname = '';
$tdisp = '';
$qty = '';
$MDF = '';
$EXD = '';
$WSP = '';
$REP = '';
// for delete selected row in stock table
 if(isset($_GET['delete'])){
	$id = $_GET['delete'];
	$s = "DELETE FROM stock WHERE Id =$id";
	mysqli_query($mysqli,$s);
	header('Location: mr_stock.php');
}
//for edit selected row in stock table
if(isset($_GET['edit'])){
	$id = $_GET['edit'];
	$update = true;
	$a = "SELECT * FROM stock WHERE Id =$id";
	$rt = mysqli_query($mysqli, $a);
	$count = mysqli_num_rows($rt);
	if($count == 0){
		echo "this item is not in stock.";
	}
	else {
		
		$row = mysqli_fetch_array($rt) or die(mysqli_error($mysqli)); 
		$cname = $row['companyName'];
		$tname = $row['tabletName'];
		$tdisp = $row['tabletDiscription'];
		$qty   = $row['quantity'];
		$MFD  =  $row['mfDate'];
		$EXD  =  $row['exDate'];
		$WSP  =  $row['holsalePrice'];
		$REP  =  $row['retailPrice'];
	}
	//header('Location: mr_stock.php');
}

if(isset($_POST['update'])){
        $id = $_POST['id'];
        $comname = $_POST['companyName'];
        $tabname = $_POST['tabletName'];
        $tabdis = $_POST['tabletDiscription'];
        $qun = $_POST['quantity'];
        $mand = $_POST['mfDate'];
        $expd = $_POST['exDate'];
        $hosalep = $_POST['holsalePrice'];
        $retp = $_POST['retailPrice'];
        $s = "UPDATE stock SET companyName = '$comname', tabletName = '$tabname', tabletDiscription = '$tabdis', quantity = '$qun', mfDate = '$mand', exDate = '$expd', holsalePrice = '$hosalep', retailPrice = '$retp' WHERE Id = $id";
  		mysqli_query($mysqli, $s);

        header('Location: mr_stock.php');
    
  }
  
// stock for admain 

  if(isset($_GET['del'])){
	$id = $_GET['del'];
	$s = "DELETE FROM stock WHERE Id =$id";
	mysqli_query($mysqli,$s);
	header('Location: stock.php');
}


if(isset($_GET['edt'])){
	$id = $_GET['edt'];
	$update = true;
	$a = "SELECT * FROM stock WHERE Id =$id";
	$rt = mysqli_query($mysqli, $a);
	$count = mysqli_num_rows($rt);
	if($count == 0){
		echo "this item is not in stock.";
	}
	else {
		
		$row = mysqli_fetch_array($rt) or die(mysqli_error($mysqli)); 
		$cname = $row['companyName'];
		$tname = $row['tabletName'];
		$tdisp = $row['tabletDiscription'];
		$qty   = $row['quantity'];
		$MFD  =  $row['mfDate'];
		$EXD  =  $row['exDate'];
		$WSP  =  $row['holsalePrice'];
		$REP  =  $row['retailPrice'];
	}
	//header('Location: stock.php');
}

if(isset($_POST['updt'])){
        $id = $_POST['id'];
        $comname = $_POST['companyName'];
        $tabname = $_POST['tabletName'];
        $tabdis = $_POST['tabletDiscription'];
        $qun = $_POST['quantity'];
        $mand = $_POST['mfDate'];
        $expd = $_POST['exDate'];
        $hosalep = $_POST['holsalePrice'];
        $retp = $_POST['retailPrice'];
        $s = "UPDATE stock SET companyName = '$comname', tabletName = '$tabname', tabletDiscription = '$tabdis', quantity = '$qun', mfDate = '$mand', exDate = '$expd', holsalePrice = '$hosalep', retailPrice = '$retp' WHERE Id = $id";
  		mysqli_query($mysqli, $s);

       header('Location: stock.php');
    
  }
  // for delete mr a/c in mr table
 if(isset($_GET['dte'])){
	$mrid = $_GET['dte'];
	$s = "DELETE FROM mr WHERE mrId =$mrid";
	mysqli_query($mysqli,$s);
	header('Location: admin.php');
}
?>

