<?php
session_start();
include "connect.php";

$teamUid = $_SESSION["teamUid"];

$queryTeamData = $conn->query("SELECT `schoolName`,`uniName`,`uniAbbr`,`teamUid`,`teamName`,`inputCountry`,`uniAddr`,`facLogo` FROM teamdata WHERE `teamUid` = '".$teamUid."'");
while($result = mysqli_fetch_assoc($queryTeamData)){
    $returnArray = array("schoolName" => $result['schoolName'], "uniName" => $result['uniName'], "uniAbbr" => $result['uniAbbr'], "teamName" => $result['teamName'], "uniAddr" => $result['uniAddr'], "inputCountry" => $result["inputCountry"], "facLogo" => $result["facLogo"]);
    echo json_encode($returnArray);
}
?>