<?php
include_once("connection.php");
include_once("redirect.php");
$sql = "SELECT a.TeamName tn, b.contestant1Name,b.contestant2Name,a.Solved solved, a.time time FROM solved a,teamprofile b WHERE a.TeamName = b.TeamName order by a.solved DESC,a.time ASC ";
$result = $con->query($sql);
if ($result->num_rows > 0) {
?>

<div align="center">
<table class="table" style="width: 50%;">
<?php
    echo "<tr><th>Team Name</th><th>Solved</th><th>Time</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["tn"]. "</td><td>" . $row["solved"]. "</td><td>" . $row["time"]. "<br>";
    }
?>
</table>
</div>
<?php
} else {
    echo "0 results";
}
?>

