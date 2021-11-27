<?php 
session_start();
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "connect.php";
if(isset($_SESSION["teamUid"])){
    $getData = $conn->query("SELECT * FROM teamdata WHERE teamUid = '".$_SESSION["teamUid"]."'");
    while($result = mysqli_fetch_assoc($getData)){
        echo json_encode($result);
    }
}
?>