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
    if($_POST["cp2PreferCont"]="Other"){
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
    if($_POST["cp3PreferCont"]="Other"){
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
        if(isset($_POST["other"])){
            $adPreferCont = mysqli_real_escape_string($conn, $_POST["other"]);
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
    `adRank` = '".$adRank."',
    `paymentStat` = ''
    WHERE `teamUid` = '".$teamUid."'");
    if($updateCompetDataOnly = true){
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
            $updateFacLogo = $conn->query("UPDATE `competdata` SET `facLogo` = '".$facLogoFinal."' WHERE `teamUid` = '".$teamUid."'");
            if($updateFacLogo = true){
            }else{
                echo mysql_error($updateFacLogo);
                echo mysql_error($updateTeamData);
            }
        }
    }
}

if(!empty($_FILES["cp1CardPhoto"])){
    $cp1CardPhotoUploadName = $_FILES["cp1CardPhoto"]["name"];
    $cp1CardPhotoTemp = $_FILES["cp1CardPhoto"]["tmp_name"];
    $cp1CardPhotoExt = strtolower(pathinfo($cp1CardPhotoUploadName, PATHINFO_EXTENSION));
    $cp1CardPhotoFinal = "cp1CardPhoto_".$teamUid.".".$cp1CardPhotoExt;
    $cp1CardPhotoPath = $path.$cp1CardPhotoFinal;
    if(file_exists($cp1CardPhotoPath)){
        unlink ($cp1CardPhotoPath);
    }
    if(in_array($cp1CardPhotoExt, $valid_extension)){
        if(move_uploaded_file($cp1CardPhotoTemp,$cp1CardPhotoPath)){
            $updatecp1CardPhoto = $conn->query("UPDATE `competdata` SET `cp1CardPhoto` = '".$cp1CardPhotoFinal."' WHERE `teamUid` = '".$teamUid."'");
            if($updatecp1CardPhoto = true){
                $updatecp1CardStat = $conn->query("UPDATE `competdata` SET `cp1PicsStat` = 'Saved' WHERE `teamUid` = '".$teamUid."'");
            }else{
                echo mysql_error($updatecp1CardPhoto);
                echo mysql_error($updateTeamData);
            }
        }
    }
}

if(!empty($_FILES["cp2CardPhoto"])){
    $cp2CardPhotoUploadName = $_FILES["cp2CardPhoto"]["name"];
    $cp2CardPhotoTemp = $_FILES["cp2CardPhoto"]["tmp_name"];
    $cp2CardPhotoExt = strtolower(pathinfo($cp2CardPhotoUploadName, PATHINFO_EXTENSION));
    $cp2CardPhotoFinal = "cp2CardPhoto_".$teamUid.".".$cp2CardPhotoExt;
    $cp2CardPhotoPath = $path.$cp2CardPhotoFinal;
    if(file_exists($cp2CardPhotoPath)){
        unlink ($cp2CardPhotoPath);
    }
    if(in_array($cp2CardPhotoExt, $valid_extension)){
        if(move_uploaded_file($cp2CardPhotoTemp,$cp2CardPhotoPath)){
            $updatecp2CardPhoto = $conn->query("UPDATE `competdata` SET `cp2CardPhoto` = '".$cp2CardPhotoFinal."' WHERE `teamUid` = '".$teamUid."'");
            if($updatecp2CardPhoto = true){
                $updatecp2CardStat = $conn->query("UPDATE `competdata` SET `cp2PicsStat` = 'Saved' WHERE `teamUid` = '".$teamUid."'");
            }else{
                echo mysql_error($updatecp2CardPhoto);
                echo mysql_error($updateTeamData);
            }
        }
    }
}

if(!empty($_FILES["cp3CardPhoto"])){
    $cp3CardPhotoUploadName = $_FILES["cp3CardPhoto"]["name"];
    $cp3CardPhotoTemp = $_FILES["cp3CardPhoto"]["tmp_name"];
    $cp3CardPhotoExt = strtolower(pathinfo($cp3CardPhotoUploadName, PATHINFO_EXTENSION));
    $cp3CardPhotoFinal = "cp3CardPhoto_".$teamUid.".".$cp3CardPhotoExt;
    $cp3CardPhotoPath = $path.$cp3CardPhotoFinal;
    if(file_exists($cp3CardPhotoPath)){
        unlink ($cp3CardPhotoPath);
    }
    if(in_array($cp3CardPhotoExt, $valid_extension)){
        if(move_uploaded_file($cp3CardPhotoTemp,$cp3CardPhotoPath)){
            $updatecp3CardPhoto = $conn->query("UPDATE `competdata` SET `cp3CardPhoto` = '".$cp3CardPhotoFinal."' WHERE `teamUid` = '".$teamUid."'");
            if($updatecp3CardPhoto = true){
                $updatecp3CardStat = $conn->query("UPDATE `competdata` SET `cp3PicsStat` = 'Saved' WHERE `teamUid` = '".$teamUid."'");
            }else{
                echo mysql_error($updatecp3CardPhoto);
                echo mysql_error($updateTeamData);
            }
        }
    }
}

if(!empty($_FILES["letAppr"])){
    $letApprUploadName = $_FILES["letAppr"]["name"];
    $letApprTemp = $_FILES["letAppr"]["tmp_name"];
    $letApprExt = strtolower(pathinfo($letApprUploadName, PATHINFO_EXTENSION));
    $letApprFinal = "letAppr_".$teamUid.".".$letApprExt;
    $letApprPath = $path.$letApprFinal;
    if(file_exists($letApprPath)){
        unlink ($letApprPath);
    }
    if(in_array($letApprExt, $valid_extension)){
        if(move_uploaded_file($letApprTemp,$letApprPath)){
            $updateletAppr = $conn->query("UPDATE `competdata` SET `letAppr` = '".$letApprFinal."' WHERE `teamUid` = '".$teamUid."'");
            if($updateletAppr = true){
                $updateletApprCardStat = $conn->query("UPDATE `competdata` SET `letApprStat` = 'Saved' WHERE `teamUid` = '".$teamUid."'");
            }else{
                echo mysql_error($updateletAppr);
                echo mysql_error($updateTeamData);
            }
        }
    }
}

if(!empty($_FILES["voucherPics"])){
    $voucherPicsUploadName = $_FILES["voucherPics"]["name"];
    $voucherPicsTemp = $_FILES["voucherPics"]["tmp_name"];
    $voucherPicsExt = strtolower(pathinfo($voucherPicsUploadName, PATHINFO_EXTENSION));
    $voucherPicsFinal = "voucherPics_".$teamUid.".".$voucherPicsExt;
    $voucherPicsPath = $path.$voucherPicsFinal;
    if(file_exists($voucherPicsPath)){
        unlink ($voucherPicsPath);
    }
    if(in_array($voucherPicsExt, $valid_extension)){
        if(move_uploaded_file($voucherPicsTemp,$voucherPicsPath)){
            $updatevoucherPics = $conn->query("UPDATE `competdata` SET `voucherPics` = '".$voucherPicsFinal."' WHERE `teamUid` = '".$teamUid."'");
            if($updatevoucherPics = true){
            }else{
                echo mysql_error($updatevoucherPics);
                echo mysql_error($updateTeamData);
            }
        }
    }
}

if(!empty($_FILES["cp1ProfilePhoto"])){
    $cp1ProfilePhotoUploadName = $_FILES["cp1ProfilePhoto"]["name"];
    $cp1ProfilePhotoTemp = $_FILES["cp1ProfilePhoto"]["tmp_name"];
    $cp1ProfilePhotoExt = strtolower(pathinfo($cp1ProfilePhotoUploadName, PATHINFO_EXTENSION));
    $cp1ProfilePhotoFinal = "cp1ProfilePhoto_".$teamUid.".".$cp1ProfilePhotoExt;
    $cp1ProfilePhotoPath = $path.$cp1ProfilePhotoFinal;
    if(file_exists($cp1ProfilePhotoPath)){
        unlink ($cp1ProfilePhotoPath);
    }
    if(in_array($cp1ProfilePhotoExt, $valid_extension)){
        if(move_uploaded_file($cp1ProfilePhotoTemp,$cp1ProfilePhotoPath)){
            $updatecp1ProfilePhoto = $conn->query("UPDATE `competdata` SET `cp1ProfilePhoto` = '".$cp1ProfilePhotoFinal."' WHERE `teamUid` = '".$teamUid."'");
            if($updatecp1ProfilePhoto = true){
            }else{
                echo mysql_error($updatecp1ProfilePhoto);
                echo mysql_error($updateTeamData);
            }
        }
    }
}

if(!empty($_FILES["cp2ProfilePhoto"])){
    $cp2ProfilePhotoUploadName = $_FILES["cp2ProfilePhoto"]["name"];
    $cp2ProfilePhotoTemp = $_FILES["cp2ProfilePhoto"]["tmp_name"];
    $cp2ProfilePhotoExt = strtolower(pathinfo($cp2ProfilePhotoUploadName, PATHINFO_EXTENSION));
    $cp2ProfilePhotoFinal = "cp2ProfilePhoto_".$teamUid.".".$cp2ProfilePhotoExt;
    $cp2ProfilePhotoPath = $path.$cp2ProfilePhotoFinal;
    if(file_exists($cp2ProfilePhotoPath)){
        unlink ($cp2ProfilePhotoPath);
    }
    if(in_array($cp2ProfilePhotoExt, $valid_extension)){
        if(move_uploaded_file($cp2ProfilePhotoTemp,$cp2ProfilePhotoPath)){
            $updatecp2ProfilePhoto = $conn->query("UPDATE `competdata` SET `cp2ProfilePhoto` = '".$cp2ProfilePhotoFinal."' WHERE `teamUid` = '".$teamUid."'");
            if($updatecp2ProfilePhoto = true){
            }else{
                echo mysql_error($updatecp2ProfilePhoto);
                echo mysql_error($updateTeamData);
            }
        }
    }
}

if(!empty($_FILES["cp3ProfilePhoto"])){
    $cp3ProfilePhotoUploadName = $_FILES["cp3ProfilePhoto"]["name"];
    $cp3ProfilePhotoTemp = $_FILES["cp3ProfilePhoto"]["tmp_name"];
    $cp3ProfilePhotoExt = strtolower(pathinfo($cp3ProfilePhotoUploadName, PATHINFO_EXTENSION));
    $cp3ProfilePhotoFinal = "cp3ProfilePhoto_".$teamUid.".".$cp3ProfilePhotoExt;
    $cp3ProfilePhotoPath = $path.$cp3ProfilePhotoFinal;
    if(file_exists($cp3ProfilePhotoPath)){
        unlink ($cp3ProfilePhotoPath);
    }
    if(in_array($cp3ProfilePhotoExt, $valid_extension)){
        if(move_uploaded_file($cp3ProfilePhotoTemp,$cp3ProfilePhotoPath)){
            $updatecp3ProfilePhoto = $conn->query("UPDATE `competdata` SET `cp3ProfilePhoto` = '".$cp3ProfilePhotoFinal."' WHERE `teamUid` = '".$teamUid."'");
            if($updatecp3ProfilePhoto = true){
            }else{
                echo mysql_error($updatecp3ProfilePhoto);
                echo mysql_error($updateTeamData);
            }
        }
    }
}

header("location: /auth/confirmData.html")
?>