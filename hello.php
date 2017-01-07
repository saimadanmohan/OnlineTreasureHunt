<?php
include_once("session_exists.php");
//include_once("redirect.php");
$arr=array();

if($_SESSION["templateType"]==1){
	array_push($arr,"correct");
}
else if($_SESSION["templateType"]==2){
	array_push($arr,"correct" );
}
else if($_SESSION["templateType"]==3){
	array_push($arr,trim(strtolower($_POST["field1"])," "));
}
else if($_SESSION["templateType"]==4){
	array_push($arr,trim(strtolower($_POST["field1"])," "));
	array_push($arr,trim(strtolower($_POST["field2"])," "));
}
$_SESSION['ans']=$arr;
$_SESSION['skip']=$_POST['skip'];
$_SESSION['change']=$_POST['change'];


//echo  $_POST['field1'];
header( 'Location: validateAns.php' ) ;

?>