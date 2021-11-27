<?php
session_start();
include "connect.php";
if(isset($_SESSION["teamUid"])){
    $teamUid = $_SESSION["teamUid"];
    $getStat = $conn->query("SELECT submitConfirm FROM competdata WHERE teamUid = '".$teamUid."'");
    while($result = mysqli_fetch_assoc($getStat)){
        if($result['submitConfirm']==1){
            echo json_encode(array("submitConfirm"=>1));
        } 
    }
}else{
    echo json_encode(array("submitConfirm"=>1));
}
?>