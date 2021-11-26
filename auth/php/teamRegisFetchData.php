<?php
session_start();
include "connect.php";
if(!isset($_SESSION["teamUid"])){
    header("location: team_setup.html");
}


?>