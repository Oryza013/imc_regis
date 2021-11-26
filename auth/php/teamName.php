<?php
include "connect.php";

$teamName = $_POST['teamName'];

$getTeamName = $conn->query("SELECT teamName FROM `teamdata` WHERE teamName = '".$teamName."'");
$teamRows = mysqli_num_rows($getTeamName);
if(0==$teamRows){
    echo "teamNameOK";
}else if(0 < $teamRows){
    echo "teamNameTaken";
}
?>