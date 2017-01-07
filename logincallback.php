<?php 
include_once('connection.php');
include_once('session_exists.php');

// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 


session_start();

$teamname = $_POST['teamname'];
$pass = $_POST['password'];


$stmt = $con->prepare("SELECT TeamPassword FROM teamprofile WHERE teamname = ?");
$stmt->bind_param('s', $teamname);

$stmt->execute();

$stmt->bind_result($realpass);

$stmt->fetch();

$stmt -> close();





/*echo $pass." grey ".$realpass." yo".$teamname;
*/if(strcmp($realpass,$pass)==0)
{
		 $_SESSION['user']=$teamname;
	    echo "0";
}	
else
	echo "1";
$con -> close();

?>