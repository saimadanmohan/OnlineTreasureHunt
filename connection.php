<?php

$con=new mysqli("localhost","othuser","oth@vce","oth");

if(mysqli_connect_errno())
{
	echo "Invalid Server";
	exit();
}
?>