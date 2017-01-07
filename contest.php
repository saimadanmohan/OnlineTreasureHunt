<?php
include_once("session_exists.php");
include("connection.php");
if(isset($_SESSION['currentQ']) && isset($_SESSION['solved'])  && isset($_SESSION['templateType']) && isset($_SESSION['imageName'])
	&&isset($_SESSION['comments'])
	)
{
		$stmt = $con->prepare("SELECT Solved,ChangeQn,Skip,currentQ FROM solved WHERE TeamName = ?");
		$team=$_SESSION['user'];
		$stmt->bind_param('s', $team);

		$stmt->execute();

		$stmt->bind_result($solved,$availablechange,$availableskip,$currentQ);

		$stmt->fetch();


	    $_SESSION['solved']=$solved;

	    $_SESSION['currentQ']=$currentQ;

		$_SESSION['availableskip']=$availableskip;
		$_SESSION['availablechange']=$availablechange;

		$stmt->close();

		$templateType=$_SESSION['templateType']	;
		$currentQ=$_SESSION['currentQ'] ;

		$imageName=$_SESSION['imageName'];
	//	include('template1.php');
		//header( 'Location: contest/qn'.$currentQ.'.php' ) ;
}
else
{

				$stmt = $con->prepare("SELECT Solved,ChangeQn,Skip,currentQ FROM solved WHERE TeamName = ?");
		$team=$_SESSION['user'];
		$stmt->bind_param('s', $team);

		$stmt->execute();

		$stmt->bind_result($solved,$availablechange,$availableskip,$currentQ);

		$stmt->fetch();


	    $_SESSION['solved']=$solved;

	    $_SESSION['currentQ']=$currentQ;

		$_SESSION['availableskip']=$availableskip;
		$_SESSION['availablechange']=$availablechange;

		$stmt->close();

		$stmt = $con->prepare("SELECT  `image`, `comments`, `templateNo` FROM `questions` WHERE Id=?");
		$stmt->bind_param('d', $currentQ);

		$stmt->execute();

		$stmt->bind_result($imageName,$comments,$templateNo);

		$stmt->fetch();

		$_SESSION["imageName"]=$imageName;
		$_SESSION["comments"]=$comments;

		$_SESSION["templateType"]=$templateNo;

}
		//echo $_SESSION['currentQ'];

	/*echo $_SESSION["user"]."<br />";

	echo $_SESSION["imageName"]."<br />";
	echo $_SESSION["templateType"]."<br />";*/
	

	/*echo $_SESSION["availableskip"]."<br />";
	echo $_SESSION["templateType"]."<br />";
*/
// my code below
//	echo $_SESSION["availablechange"]."<br />";
//	if(isset($_SESSION['currentQ']))
//		echo $_SESSION['user']."tommy";
 
 	echo $_SESSION['currentQ'];
  include('template1.php');
        
?>