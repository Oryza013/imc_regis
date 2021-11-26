<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "connect.php";

# INITIALIZE
$teamUid = $_SESSION['teamUid'];
$path = "../../upload/";
$valid_extension = array('jpeg','jpg','png','pdf');

#POST INSTITUTE DATA
$uniAddr = mysqli_real_escape_string($conn, $_POST["uniAddr"]);
$country = mysqli_real_escape_string($conn, $_POST["inputCountry"]);

#POST COMPET 1 DATA
$cp1FirstName = mysqli_real_escape_string($conn, $_POST["cp1FirstName"]);
$cp1MiddleName = mysqli_real_escape_string($conn, $_POST["cp1MiddleName"]);
$cp1LastName = mysqli_real_escape_string($conn, $_POST["cp1LastName"]);
$cp1PreferName = mysqli_real_escape_string($conn, $_POST["cp1PreferName"]);
$cp1Email = mysqli_real_escape_string($conn, $_POST["cp1Email"]);
$cp1Dob = mysqli_real_escape_string($conn, $_POST["cp1Dob"]);
$cp1Gpa = mysqli_real_escape_string($conn, $_POST["cp1Gpa"]);
$cp1CurrentYear = mysqli_real_escape_string($conn, $_POST["cp1CurrentYr"]);
$cp1Program = mysqli_real_escape_string($conn, $_POST["cp1Program"]);
$cp1PreferContId = mysqli_real_escape_string($conn, $_POST["cp1PreferContId"]);
$cp1PhoneNumber = mysqli_real_escape_string($conn, $_POST["cp1PhoneNum"]);
if(isset($_POST["cp1Title"])){
    $cp1Title = mysqli_real_escape_string($conn, $_POST["cp1Title"]);
}else{
    $cp1Title = "";
}
if(isset($_POST["cp1Gender"])){
    $cp1Gender = mysqli_real_escape_string($conn, $_POST["cp1Gender"]);
}else{
    $cp1Gender="";
}
if(isset($_POST["cp1PreferCont"])){
    $cp1PreferCont = mysqli_real_escape_string($conn, $_POST["cp1PreferCont"]);
    if($_POST["cp1PreferCOnt"]="Other"){
        if(isset($_POST["other1"])){
            $cp1PreferCont = mysqli_real_escape_string($conn, $_POST["other1"]);
        }
    }
}else{
    $cp1PreferCont = "";
}

#POST COMPET 2 DATA
$cp2FirstName = mysqli_real_escape_string($conn, $_POST["cp2FirstName"]);
$cp2MiddleName = mysqli_real_escape_string($conn, $_POST["cp2MiddleName"]);
$cp2LastName = mysqli_real_escape_string($conn, $_POST["cp2LastName"]);
$cp2PreferName = mysqli_real_escape_string($conn, $_POST["cp2PreferName"]);
$cp2Email = mysqli_real_escape_string($conn, $_POST["cp2Email"]);
$cp2Dob = mysqli_real_escape_string($conn, $_POST["cp2Dob"]);
$cp2Gpa = mysqli_real_escape_string($conn, $_POST["cp2Gpa"]);
$cp2CurrentYear = mysqli_real_escape_string($conn, $_POST["cp2CurrentYr"]);
$cp2Program = mysqli_real_escape_string($conn, $_POST["cp2Program"]);
$cp2PreferContId = mysqli_real_escape_string($conn, $_POST["cp2PreferContId"]);
$cp2PhoneNumber = mysqli_real_escape_string($conn, $_POST["cp2PhoneNum"]);
if(isset($_POST["cp2Title"])){
    $cp2Title = mysqli_real_escape_string($conn, $_POST["cp2Title"]);
}else{
    $cp2Title = "";
}
if(isset($_POST["cp2Gender"])){
    $cp2Gender = mysqli_real_escape_string($conn, $_POST["cp2Gender"]);
}else{
    $cp2Gender="";
}
if(isset($_POST["cp2PreferCont"])){
    $cp2PreferCont = mysqli_real_escape_string($conn, $_POST["cp2PreferCont"]);
    if($_POST["cp2PreferCOnt"]="Other"){
        if(isset($_POST["other2"])){
            $cp2PreferCont = mysqli_real_escape_string($conn, $_POST["other2"]);
        }
    }
}else{
    $cp2PreferCont = "";
}

#POST COMPET 3 DATA
$cp3FirstName = mysqli_real_escape_string($conn, $_POST["cp3FirstName"]);
$cp3MiddleName = mysqli_real_escape_string($conn, $_POST["cp3MiddleName"]);
$cp3LastName = mysqli_real_escape_string($conn, $_POST["cp3LastName"]);
$cp3PreferName = mysqli_real_escape_string($conn, $_POST["cp3PreferName"]);
$cp3Email = mysqli_real_escape_string($conn, $_POST["cp3Email"]);
$cp3Dob = mysqli_real_escape_string($conn, $_POST["cp3Dob"]);
$cp3Gpa = mysqli_real_escape_string($conn, $_POST["cp3Gpa"]);
$cp3CurrentYear = mysqli_real_escape_string($conn, $_POST["cp3CurrentYr"]);
$cp3Program = mysqli_real_escape_string($conn, $_POST["cp3Program"]);
$cp3PreferContId = mysqli_real_escape_string($conn, $_POST["cp3PreferContId"]);
$cp3PhoneNumber = mysqli_real_escape_string($conn, $_POST["cp3PhoneNum"]);
if(isset($_POST["cp3Title"])){
    $cp3Title = mysqli_real_escape_string($conn, $_POST["cp3Title"]);
}else{
    $cp3Title = "";
}
if(isset($_POST["cp3Gender"])){
    $cp3Gender = mysqli_real_escape_string($conn, $_POST["cp3Gender"]);
}else{
    $cp3Gender="";
}
if(isset($_POST["cp3PreferCont"])){
    $cp3PreferCont = mysqli_real_escape_string($conn, $_POST["cp3PreferCont"]);
    if($_POST["cp3PreferCOnt"]="Other"){
        if(isset($_POST["other3"])){
            $cp3PreferCont = mysqli_real_escape_string($conn, $_POST["other3"]);
        }
    }
}else{
    $cp3PreferCont = "";
}


#POST ADVISOR DATA
$adRank = mysqli_real_escape_string($conn, $_POST["adRank"]);
$adFirstName = mysqli_real_escape_string($conn, $_POST["adFirstName"]);
$adMiddleName = mysqli_real_escape_string($conn, $_POST["adMiddleName"]);
$adLastName = mysqli_real_escape_string($conn, $_POST["adLastName"]);
$adPreferName = mysqli_real_escape_string($conn, $_POST["adPreferName"]);
$adEmail = mysqli_real_escape_string($conn, $_POST["adEmail"]);
$adPreferContId = mysqli_real_escape_string($conn, $_POST["adPreferContId"]);
if(isset($_POST["adTitle"])){
    $adTitle = mysqli_real_escape_string($conn, $_POST["adTitle"]);
}else{
    $adTitle = "";
}
if(isset($_POST["adGender"])){
    $adGender = mysqli_real_escape_string($conn, $_POST["adGender"]);
}else{
    $adGender="";
}
if(isset($_POST["adPreferCont"])){
    $adPreferCont = mysqli_real_escape_string($conn, $_POST["adPreferCont"]);
    if($_POST["adPreferCOnt"]="Other"){
        if(isset($_POST["other3"])){
            $adPreferCont = mysqli_real_escape_string($conn, $_POST["other3"]);
        }
    }
}else{
    $adPreferCont = "";
}

#UPDATE TEXT DATA WHOLE DOC
$updateTeamDataOnly = $conn->query("UPDATE `teamdata` SET
    `uniAddr` = '".$uniAddr."',
    `inputCountry` = '".$country."'
    WHERE `teamUid` = '".$teamUid."'");
    if($updateTeamDataOnly = true){
        echo "DataOnly TRUE";
    }

$updateCompetDataOnly = $conn->query("UPDATE `competdata` SET
    `cp1Title` = '".$cp1Title."',
    `cp1FirstName` = '".$cp1FirstName."',
    `cp1MiddleName` = '".$cp1MiddleName."',
    `cp1LastName` = '".$cp1LastName."',
    `cp1PreferName` = '".$cp1PreferName."',
    `cp1Email` = '".$cp1Email."',
    `cp1Gpa` = '".$cp1Gpa."',
    `cp1Program` = '".$cp1Program."',
    `cp1CurrentYr` = '".$cp1CurrentYear."',
    `cp1Dob` = '".$cp1Dob."',
    `cp1PreferCont` = '".$cp1PreferCont."',
    `cp1PreferContId` = '".$cp1PreferContId."',
    `cp1Gender` = '".$cp1Gender."',
    `cp1PhoneNumber` = '".$cp1PhoneNumber."',
    `cp2Title` = '".$cp2Title."',
    `cp2FirstName` = '".$cp2FirstName."',
    `cp2MiddleName` = '".$cp2MiddleName."',
    `cp2LastName` = '".$cp2LastName."',
    `cp2PreferName` = '".$cp2PreferName."',
    `cp2Email` = '".$cp2Email."',
    `cp2Gpa` = '".$cp2Gpa."',
    `cp2Program` = '".$cp2Program."',
    `cp2CurrentYr` = '".$cp2CurrentYear."',
    `cp2Dob` = '".$cp2Dob."',
    `cp2PreferCont` = '".$cp2PreferCont."',
    `cp2PreferContId` = '".$cp2PreferContId."',
    `cp2Gender` = '".$cp2Gender."',
    `cp2PhoneNumber` = '".$cp2PhoneNumber."',
    `cp3Title` = '".$cp3Title."',
    `cp3FirstName` = '".$cp3FirstName."',
    `cp3MiddleName` = '".$cp3MiddleName."',
    `cp3LastName` = '".$cp3LastName."',
    `cp3PreferName` = '".$cp3PreferName."',
    `cp3Email` = '".$cp3Email."',
    `cp3Gpa` = '".$cp3Gpa."',
    `cp3Program` = '".$cp3Program."',
    `cp3CurrentYr` = '".$cp3CurrentYear."',
    `cp3Dob` = '".$cp3Dob."',
    `cp3PreferCont` = '".$cp3PreferCont."',
    `cp3PreferContId` = '".$cp3PreferContId."',
    `cp3Gender` = '".$cp3Gender."',
    `cp3PhoneNumber` = '".$cp3PhoneNumber."',
    `adTitle` = '".$adTitle."',
    `adFirstName` = '".$adFirstName."',
    `adMiddleName` = '".$adMiddleName."',
    `adLastName` = '".$adLastName."',
    `adPreferName` = '".$adPreferName."',
    `adEmail` = '".$adEmail."',
    `adPreferCont` = '".$adPreferCont."',
    `adPreferContId` = '".$adPreferContId."',
    `adGender` = '".$adGender."',
    `adRank` = '".$adRank."'
    WHERE `teamUid` = '".$teamUid."'");
    if($updateCompetDataOnly = true){
        echo "updated";
    }


if(!empty($_FILES["facLogo"])){
    $facLogoUploadName = $_FILES["facLogo"]["name"];
    $facLogoTemp = $_FILES["facLogo"]["tmp_name"];
    $facLogoExt = strtolower(pathinfo($facLogoUploadName, PATHINFO_EXTENSION));
    $facLogoFinal = "facLogo_".$teamUid.".".$facLogoExt;
    $facLogoPath = $path.$facLogoFinal;
    if(file_exists($facLogoPath)){
        unlink ($facLogoPath);
    }
    if(in_array($facLogoExt, $valid_extension)){
        if(move_uploaded_file($facLogoTemp,$facLogoPath)){
            $updateFacLogo = $conn->query("UPDATE `competdata` SET (`facLogo`) = ('".$facLogoFinal."') WHERE `teamUid` = '".$teamUid."'");
            if($updateFacLogo = true){
                echo "teamLogo TRUE";
            }else{
                echo mysql_error($updateFacLogo);
                echo mysql_error($updateTeamData);
            }
        }
    }
}

if(!empty($_FILES["cp1CardPhoto"])){
    echo "cp1CardPhotoFound!";
}

#COMPET 1 ID
/*
if($_FILES["cp1CardPhoto"]){
    $facLogoUploadName = $_FILES["facLogo"]["name"];
    $facLogoTemp = $_FILES["facLogo"]["tmp_name"];
    $facLogoExt = strtolower(pathinfo($facLogoUploadName, PATHINFO_EXTENSION));
    $facLogoFinal = "facLogo_".$teamUid.".".$facLogoExt;
    $facLogoPath = $path.$facLogoFinal;
    if(file_exists($facLogoPath)){
        unlink ($facLogoPath);
    }
    if(in_array($facLogoExt, $valid_extension)){
        if(move_uploaded_file($facLogoTemp,$facLogoPath)){
            $updateFacLogo = $conn->query("UPDATE `competdata` SET `facLogo` = '".$facLogoFinal."' WHERE `teamUid` = '".$teamUid."'");
        }
    }
}
*/
?>