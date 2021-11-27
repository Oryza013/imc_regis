<?php
    require "config.php";
    session_start();
    //echo "hi";
    if(isset($_SESSION["teamUid"])){
        $teamUid = $_SESSION["teamUid"];
    //// USER DATA ///////
        $userdata = $conn->query("SELECT verified FROM users WHERE id = '".$_SESSION['id']."'");
        while($x=mysqli_fetch_assoc($userdata)){
            $verified = $x['verified'];
        }
        //////////////
    $sql = "SELECT * FROM competdata WHERE teamUid=? LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $teamUid);
    if($stmt->execute()){
      // echo 'executed 1';
    }
    $result = $stmt->get_result();
    $competResult = $result->fetch_assoc();
//////////////
    $sql = "SELECT * FROM teamdata WHERE teamUid=? LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $teamUid);
    if($stmt->execute()){
       //echo 'executed 2';
    }
    $result = $stmt->get_result();
    $teamResult = $result->fetch_assoc();
    

    //Check School and team information
    if(empty($teamResult['schoolName'])){
        $teamInfoStat = '';
    }else{
        $teamInfoStat = 'Saved';
    }
    //check institution info
    if(empty($teamResult['uniAddr'])){
        $institutionInfoStat = '';
    }else{
        $institutionInfoStat = 'Saved';
    }
    //check voucher
    if(empty($competResult['voucherPics'])){
        $voucherStat = '';
    }else{
        $voucherStat = 'Submitted';
    }
    if($competResult["submitConfirm"]==1){
        echo json_encode(array("teamInfoStat" => "Submitted",
        "institutionInfoStat" => "Submitted", 
        "cp1PicsStat" => $competResult['cp1PicsStat'],
        "cp2PicsStat" => $competResult['cp2PicsStat'],
        "cp3PicsStat" => $competResult['cp3PicsStat'],
        "letApprStat" => $competResult['letApprStat'],
        "voucherStat" => $voucherStat,
        "paymentStat" => $competResult['paymentStat'],
        "teamName" => $teamResult['teamName'],
        "schoolName" => $teamResult['schoolName'],
        "uniName" => $teamResult['uniName'],
        "submitConfirm" => 1,
        "verified" => $verified,
        "returnSucces"=>1
    ));
    }else{$returnArray = array("teamInfoStat" => $teamInfoStat,
        "institutionInfoStat" => $institutionInfoStat, 
        "cp1PicsStat" => $competResult['cp1PicsStat'],
        "cp2PicsStat" => $competResult['cp2PicsStat'], 
        "cp3PicsStat" => $competResult['cp3PicsStat'],
        "letApprStat" => $competResult['letApprStat'],
        "voucherStat" => $voucherStat,
        "paymentStat" => $competResult['paymentStat'],
        "teamName" => $teamResult['teamName'],
        "schoolName" => $teamResult['schoolName'],
        "uniName" => $teamResult['uniName'],
        "submitConfirm" => 0,
        "verified" => $verified,
        "returnSucces"=>1
        );
        echo json_encode($returnArray);}
}else{
    $getUserData = $conn->query("SELECT verified FROM users WHERE id = '".$_SESSION["id"]."'");
    while($x = mysqli_fetch_assoc($getUserData)){
        echo json_encode(array("teamInfoStat" => "",
        "institutionInfoStat" => "", 
        "cp1PicsStat" => "",
        "cp2PicsStat" => "", 
        "cp3PicsStat" => "",
        "letApprStat" => "",
        "voucherStat" => "",
        "paymentStat" => 0,
        "teamName" => "",
        "schoolName" => "",
        "uniName" => "",
        "submitConfirm" => "",
        "verified" => $x["verified"],
        "returnSucces"=>1));
    }
    
}
    