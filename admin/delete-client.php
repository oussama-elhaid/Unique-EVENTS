<?php
session_start();
error_reporting(0);
include('../login-auth/config.php');

$cid=intval($_GET['clientid']);
    
    $sql = "DELETE FROM client where id='$cid' ";
    $result = mysqli_query($conn, $sql);


    header("Location:admin-client.php");




?>