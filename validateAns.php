<?php
include_once("connection.php");
session_start();
$teamName=$_SESSION['user'];
$qid=$_SESSION["currentQ"];
$ans=$_SESSION["ans"];
$skip=$_SESSION["skip"];
$change=$_SESSION["change"];
//echo $skip."voila <br />";
//echo $change."voila <br />";

if($skip==1&&$change==1)
{
	//add team to violation table
	$violated = "INSERT into violated values ('$teamName')";
	if ($con->query($violated) === TRUE) {
//	    echo "Record inserted successfully";
	} else {
	    echo "Error inserting record: " . $con->error;
	}
	return;
}
function getEpochTime($con)
{
		$stmt = $con->prepare("SELECT UNIX_TIMESTAMP(now()) - UNIX_TIMESTAMP('2015-03-02 21:02:00')");
		$stmt->execute();
		$stmt->bind_result($epoch);
		$stmt->fetch();
		$stmt->close();
		return $epoch;
}
function getSkip($con)
{
		$stmt = $con->prepare("SELECT Solved,Skip FROM solved WHERE TeamName = ?");
		$team=$_SESSION['user'];
		$stmt->bind_param('s', $team);

		$stmt->execute();

		$stmt->bind_result($solved,$skip);


		$stmt->fetch();

		$_SESSION['solved']=$solved;

		$stmt->close();
		return $skip;
}
function getChange($con)
{
		$stmt = $con->prepare("SELECT Solved,ChangeQn FROM solved WHERE TeamName = ?");
		$team=$_SESSION['user'];
		$stmt->bind_param('s', $team);

		$stmt->execute();

		$stmt->bind_result($solved,$change);

		$stmt->fetch();
 
 		$_SESSION['solved']=$solved;

		$stmt->close();
		return $change;
}
function thumbsdown()
{
		unset($_SESSION['ans']);
	header( 'Location: contest.php' ) ;
}
$epoch=getEpochTime($con);
//echo $epoch."<br />";
if($skip==1)
{

	//decrement skip in solved depending on solved qs
	//increment solved
	$skiphere=getSkip($con);

	if($_SESSION['solved']<50 &&  $skiphere>0)
		$skipDec = "update solved set Skip=Skip-1,Solved=Solved+1,time=time+$epoch where TeamName='$teamName'";
	else if($_SESSION['solved']>50 && $skiphere>1)
		$skipDec = "update solved set Skip=Skip-2,Solved=Solved+1,time=time+$epoch where TeamName='$teamName'";
	else
		thumbsdown();
	if ($con->query($skipDec) === TRUE) {
//	    echo "Record updated successfully";
	} else {
	    echo "Error updating record: " . $con->error;
	}
	//next q
	$questionList= "SELECT QuestionPattern,Solved FROM solved where TeamName='$teamName'";
	$result = $con->query($questionList);
	if ($result->num_rows > 0) {
	    if($row = $result->fetch_assoc()) {
	        $questionList=$row['QuestionPattern'];
	        $solvedCount=$row['Solved'];
	    }
	} else {
	    echo "0 results";
	}

	echo $solvedCount;
	for($i=0,$j=0;$i<strlen($questionList)&&$j<$solvedCount+1;$i++)
	{
		if($questionList[$i]=='1')
		{
			$j++;
		}
	}
	//change current in session
	$_SESSION['currentQ']=$i;
	
	//echo "---".$_SESSION['currentQ']."---";

}
else if($change==1)
{
	$changehere=getChange($con);
	if($changehere<0){
		thumbsdown();
	}
	$questionListQ= "SELECT QuestionPattern,Solved FROM solved where TeamName='$teamName'";
	$result = $con->query($questionListQ);
	if ($result->num_rows > 0) {
	    if($row = $result->fetch_assoc()) {
	        $questionList=$row['QuestionPattern'];
	        $solvedCount=$row['Solved'];
	    }
	} else {
	    echo "0 results";
	}
	//get a random q from catagory
	$a=$_SESSION['currentQ']/10*10;
	if($a%20!=0)
		$a=$a-10;
	$leftQuestions=array();
	//change  this later
	for($i=0,$j=0;$i<60;$i++)
	{
		if($questionList[$i]!='0')
		{
			$leftQuestions[$j]=$i;
			$j++;
		}
	}
	//update questionpattern
	//print_r($leftQuestions);
	$rand_keys = array_rand($leftQuestions, 1);
	//print_r($rand_keys);
	//echo "rand  ".$leftQuestions[$rand_keys]."<br> bro";
	//echo "bro";
	$questionList[$leftQuestions[$rand_keys]]='1';
	
	$questionList[$_SESSION['currentQ']]='0';
	
	//update current in session
	$_SESSION['currentQ']=$leftQuestions[$rand_keys]+1;
	
	//echo $_SESSION['currentQ']."mamamia";

	//decrement change
	$changeDec = "update solved set ChangeQn=ChangeQn-1 where TeamName='$teamName'";
	if ($con->query($changeDec) === TRUE) {
//	    echo "Record updated successfully";
	} else {
	    echo "Error updating record: " . $con->error;
	}
	
}
else
{
	$checkAns=$con->prepare("select * from `answers` where `qid`=? and `ansno`=? and `answer`=?");
	$k=0;
	//echo $ans[0]." yoooooo ".$ans[1]."<br/ >";
	print_r($ans);
	for($l=1;$l<=count($ans);$l++)
	{
		if (!$checkAns->bind_param('dds'
	                     ,$qid
	                     ,$l
	                     ,$ans[$l-1]
	                     ))
	                     {
	                     echo "Binding parameters failed: (" . $checkAns->errno . ") " . $checkAns->error;
	                     }
	                     //execution error
	    if (!$checkAns->execute()) 
	    {
	    echo "Execute failed: (" . $checkAns->errno . ") " . $checkAns->error;
	    }              
	 	$result=$checkAns->get_result();

	 	print_r($result);
	 	echo "<br />";
	    if ($row = $result->fetch_array(MYSQLI_NUM)){
	    	$k++;
	    }
	 //	print_r($row);
	}
	$checkAns->close();
//	echo "<br />".$k." ------ ".$l;
	if($k==$l-1)
	{
//		 echo "in this";
	    	//UPDATE SOLVED
	    	$changeSolved = "update solved set Solved=Solved+1,time=time+$epoch where TeamName='$teamName'";
			if ($con->query($changeSolved) === TRUE) {
//			    echo "Record updated successfully";
			} else {
			    echo "Error updating record: " . $con->error;
			}
			//get next question no
			
			$list= "SELECT QuestionPattern,Solved FROM solved where TeamName='$teamName'";
			$result = $con->query($list);
			if ($result->num_rows > 0) {
			    if($row = $result->fetch_assoc()) {
			        $questionList=$row['QuestionPattern'];
			        $solvedCount=$row['Solved'];
			        $_SESSION['solved']=$solvedCount;
			    }
			} else {
			    echo "0 results";
			}

			for($i=0,$j=0;$i<strlen($questionList)&&$j<$solvedCount+1;$i++)
			{
				if($questionList[$i]=='1')
				{
					$j++;
				}
			}
			//change current in session
			$_SESSION['currentQ']=$i;
			echo $_SESSION['currentQ'];
	    
	}
	else
	{	
		thumbsdown();
//			echo "else block";
	}
}
unset($_SESSION['ans']);
/*unset($_SESSION['questionNo']);
*/unset($_SESSION['templateType']);
unset($_SESSION['skip']);
unset($_SESSION['change']);
unset($_SESSION['imageName']);
unset($_SESSION['comments']);





//update current in table
$cq=$_SESSION['currentQ'];
$updateCurrent = "update solved set currentQ=$cq where TeamName='$teamName'";
if ($con->query($updateCurrent) === TRUE) {
//    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $con->error;
}

//get next q url
/*$questionLink= "SELECT link FROM questionlinks where qid=$cq";
$result = $con->query($questionLink);
if ($result->num_rows > 0) {
    if($row = $result->fetch_assoc()) {
        $link=$row['link'];
        //redirect to link
//		header( 'Location: '.$link ) ;
        echo '/oth/'.$link;
    }
} else {
    echo "0 results";
}*/
$con->close();
header( 'Location: contest.php' ) ;

?>