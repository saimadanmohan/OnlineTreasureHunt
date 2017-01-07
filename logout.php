<?php
include_once("session_exists.php");
// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 

header( 'Location: index.php' ) ;
?>