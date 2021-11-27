<?php
session_start();
$teamUid = $_SESSION["teamUid"];
include "connect.php";
$date = date("Y-m-d H:i:s");
$confirmData = $conn->query("UPDATE competdata SET
cp1PicsStat = 'Submitted',
cp2PicsStat = 'Submitted',
cp3PicsStat = 'Submitted',
letApprStat = 'Submitted',
submitConfirm = true,
dateConfirmed = '".$date."',
paymentStat = 'Reviewing' WHERE teamUid = '".$teamUid."'");

header("location: ../dashboard.php");
?>