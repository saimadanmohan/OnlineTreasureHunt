<?php include('session_exists.php');?>

<?php
if(!isset($_SESSION['user'])) {
	header( 'Location: login.php' ) ;
}
?>
