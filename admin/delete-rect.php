<?php
session_start();
error_reporting(0);
include('../login-auth/config.php');

$cid=intval($_GET['prestid']);
    
    $sql = "DELETE FROM rectification where id='$cid' ";
    $result = mysqli_query($conn, $sql);


    header("Location:demande-rect.php");




?>