<?php
include("session_exists.php"); 
error_reporting(E_ALL & ~E_NOTICE);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body >

<img 
src=<?php echo ".\\final\\".$_SESSION["imageName"]?> 

<?php 
if($_SESSION["templateType"] == 1){
	echo "usemap=#map";
}

?>

/>



<form id="myform" <?php echo "method=post"; ?>>

<?php
include("connection.php");

		$stmt = $con->prepare("SELECT  `map` FROM `template12` WHERE `qid`=?");
		$stmt->bind_param('d', $_SESSION['currentQ']);

		$stmt->execute();

		$stmt->bind_result($mapcord);

		$stmt->fetch();
if($_SESSION["templateType"] == 1){
echo "<map name=\"map\"> <area shape=\"poly\" coords=\"$mapcord\" onclick=\"mapsee()\" /> </map>";

echo "<div class=\"field\">";
	}
else{
	if($_SESSION["templateType"] >= 3){
		echo "<input type=\"text\" id=\"field1\" name=\"field1\" >";
	}
	if($_SESSION["templateType"] == 4){
			echo "<input type=\"text\" id=\"field2\" name=\"field2\" >";
	}
	if($_SESSION["templateType"] > 2)
	echo "<input type=\"submit\" id=\"submit\" class=\"btn btn-primary\" value=\"submit\">";
	
}
echo "<input  type=\"hidden\" id=\"skip\" name=\"skip\" value =\"0\">";
	if(($_SESSION["availableskip"]>1 && $_SESSION["solved"]<14)||($_SESSION["availableskip"]>0 && $_SESSION["solved"]<10)){
	echo "<input type=\"button\" value=\"skip\" id=\"skiper\" class=\"btn btn-info\">";		
	}
	/*if(($_SESSION["availableskip"]>1 && $_SESSION["currentQ"]<14)||($_SESSION["availableskip"]>0 && $_SESSION["currentQ"]<10)){
	echo "<input  type=\"hidden\" id=\"skip\" name=\"skip\" value =\"1\">";
	echo "<input type=\"submit\" value=\"skip\" id=\"skiper\" class=\"btn btn-info\">";		
	}*/
	echo "<input  type=\"hidden\" id=\"change\" name=\"change\" value =\"0\">";
	if($_SESSION["availablechange"]>0){
	echo "<input type=\"button\" value=\"change\" id=\"changer\" class=\"btn btn-warning\">";		
	}
echo "</div>";
?>
</form>
<?php
echo "<!-- ".$_SESSION['comments']." -->";  
?>
<script src =".\common\js\jquery.js" type="text/javascript"></script>
<script type="text/javascript">
	
</script>
<script type="text/javascript">
	<?php
	if($_SESSION["templateType"] ==1)
echo "function mapsee() { $(\"#skip\").val(\"0\"); $(\"#change\").val(\"0\"); $.ajax({ url: \"hello.php\",type: \"POST\",data: $(\"#myform\").serialize()});}";

        ?>
</script>

</body>
</html>