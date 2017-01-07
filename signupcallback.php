<?php 
include_once('connection.php');


if (session_status() == PHP_SESSION_NONE) {
    session_start();

}

// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 


session_start();

$teamname=$_POST['teamname'];
$teamsize=$_POST['teamsize'];
$password=$_POST['password'];

$contestantname1=$_POST['name_contestant1'];
$contestantphone1=$_POST['phone_contestant1'];
$contestantemail1=$_POST['email_contestant1'];
$contestantcollege1=$_POST['email_contestant1'];

if($teamsize == 2){
	$contestantname2=$_POST['name_contestant2'];
        $contestantphone2=$_POST['phone_contestant2'];
	$contestantemail2=$_POST['email_contestant2'];
	$contestantcollege2=$_POST['email_contestant2'];
}
else{
	$contestantname2="";
	$contestantphone2="";
	$contestantemail2="";
	$contestantcollege2="";	
}

$str = "SELECT * FROM teamprofile WHERE teamname='$teamname'";
$result = mysqli_query($con,$str);

if( mysqli_num_rows($result) > 0) {
  echo "Teamname ALready exist";
  mysqli_close($con);
  exit();
} 

$sql = "INSERT INTO `teamprofile`(`TeamName`, `TeamSize`, `Contestant1Name`, `Contestant1Email`, `Contestant1Phone`, `Contestant1College`, `Contestant2Name`, `Contestant2Email`, `Contestant2Phone`, `Contestant2College`, `TeamPassword`) VALUES ('$teamname','$teamsize','$contestantname1','$contestantemail1','$contestantphone1','$contestantcollege1','$contestantname2','$contestantemail2','$contestantphone2','$contestantcollege2','$password') ";
if (!mysqli_query($con,$sql)) {
 	 die('Error: ' . mysqli_error($con));
}



//get the pattern
$stmt = $con->prepare("SELECT `pattern`, `vacant` FROM `binarypattern`");
do{
$stmt->execute();

$stmt->bind_result($pattern,$vacant);

$stmt->fetch();
}while($vacant!=1);
$stmt -> close();
//echo $pattern;

//lock the pattern
$stmt = $con->prepare("UPDATE `binarypattern` SET `vacant`=0 WHERE  vacant=1");
$stmt->execute();
$stmt -> close();

$QuestionPattern=generaterandomstring($pattern,$teamname,$con);
//echo "<br />".$QuestionPattern."<br />";
//unlock the pattern
$stmt = $con->prepare("UPDATE `binarypattern` SET `vacant`=1,`pattern`=\"$QuestionPattern\" WHERE  vacant=0");
$stmt->execute();
$stmt -> close();

function getrand($numbers){
	if(count($numbers)==10)
		return $numbers;
	$selected=array();
	$i=10;
	$size=count($numbers);
	while($i>0)
	{
		shuffle($numbers);
		$num=rand(1,$size);
		array_push($selected,$numbers[$num-1]);
        $numbers = array_diff($numbers, array($numbers[$num-1]));
		$i--;
		$size--;
	}
	return $selected;
}
function getString($val)
{
	$str="";
	for($i=0;$i<100;$i++)
		$str=$str.$val;
	return $str;
}
function generaterandomstring($pattern,$teamname,$con){
	$start=0;$end=20; 
	$randomstring=getString('0');
	$make=false;
	echo $pattern;
	for($i=0;$i<3;$i++){
			$arr=array();
		for(;$start<$end;$start++){
			if($pattern[$start]=='1')
			{
					array_push($arr,$start+1);
			}
		}
		if(count($arr)==10)
			$make=true;
		//print_r($arr);
		$arr=getrand($arr);
		for($j=0;$j<count($arr);$j++)
		{
			$val=$arr[$j];

			$randomstring[$val-1]='1';
            $pattern[$val-1]='0';
		}
		$end+=20;
	}
		if($make)
			$pattern=getString('1');

	$ChangeQn=0;
	$Skip=3;
	$zero=0;

	$nw=0;
	for($nw=0;$nw<100;$nw++)
	{
		if($randomstring[$nw]=='1'){
			$nw++;
			break;
		}
	}
	$sql="INSERT INTO `solved`(`TeamName`, `Solved`, `QuestionPattern`, `ChangeQn`, `Skip`,`currentQ`,`time`) VALUES ('$teamname','$zero','$randomstring','$ChangeQn','$Skip','$nw','$zero')";


	if (!mysqli_query($con,$sql)) {
	 	 die('Error: ' . mysqli_error($con));
	}
	echo "Registered Sucessfully";

	return $pattern;
}
//echo "1 and salt = ".$salt." and pass = ".$pass ." and sp = ".$salt.$pass1
mysqli_close($con);

?>