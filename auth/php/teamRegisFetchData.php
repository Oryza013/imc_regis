<?php
session_start();
include "connect.php";
if(!isset($_SESSION["teamUid"])){
    header("location: team_setup.html");
}
$teamUid = $_SESSION["teamUid"];
$getData = $conn->query("SELECT * FROM `competdata` WHERE `teamUid`='".$teamUid."'");
while($result = mysqli_fetch_assoc($getData)){
   $returnArray = array($result);
   $returnJson = json_encode($returnArray);
   echo $returnJson;
}

?>