<?php
session_start();
include "connect.php";

$teamUid = $_SESSION["teamUid"];

$queryTeamData = $conn->query("SELECT `SchoolName`,`UniName`,`UniAbbr`,`teamUid`,`teamName` FROM teamdata WHERE `teamUid` = '".$teamUid."'");
while($result = mysqli_fetch_assoc($queryTeamData)){
    $returnArray = array("schoolName" => $result['SchoolName'], "uniName" => $result['UniName'], "uniAbbr" => $result['UniAbbr'], "teamName" => $result['teamName']);
    echo json_encode($returnArray);
}
?>