<?php

$mysqli = new mysqli("localhost","root", "", "newpms");

if($mysqli -> connect_errno)
{ 
	echo "Failed to connnect to MYSQL : " . $mysqli -> connect_error;
	exit();
}

?>