<?php
session_start();
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "connect.php";

$teamUid = $_SESSION["teamUid"];
$schoolName = mysqli_real_escape_string($conn,$_POST["schoolName"]);
$uniName = mysqli_real_escape_string($conn,$_POST["uniName"]);
$uniAbbr = mysqli_real_escape_string($conn,$_POST["uniAbbr"]);
$teamName = mysqli_real_escape_string($conn,$_POST["preferName"]);

$path = "../../upload/";
$valid_extension = array('jpeg','jpg','png','pdf');
$fileName = $_FILES["teamLogo"]["name"];
$fileTemp = $_FILES["teamLogo"]["tmp_name"];


if(!empty($_FILES['teamLogo'])){
$extension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
$final_image = "teamLogo_".$teamUid.".".$extension;
if(in_array($extension, $valid_extension)){
    $path = $path.$final_image;
    if(file_exists($path)){
        unlink($path);
    }
    if(move_uploaded_file($fileTemp,$path)){
        $insert = $conn->query("UPDATE `teamdata` SET `schoolName` = '".$schoolName."', `uniName` = '".$uniName."', `uniAbbr` = '".$uniAbbr."', `teamName` = '".$teamName."'");
    if($insert){
        header("location: /auth/regis_team.html");
    }else{
        echo mysql_error($insert);
    }
    }
}else{
    $insert = $conn->query("UPDATE `teamdata` SET `schoolName` = '".$schoolName."', `uniName` = '".$uniName."', `uniAbbr` = '".$uniAbbr."', `teamName` = '".$teamName."'");
    if($insert){
        header("location: /auth/regis_team.html");
    }else{
        header("location: /auth/team_setup.html?err=1");
    }
    }
}else{
    echo "EXT INVALID";
}
   
?>