<?php
session_start();
error_reporting(0);
include('../login-auth/config.php');

$cid=intval($_GET['demandeid']);
    
    $sql = "DELETE FROM pending where idpending='$cid' ";
    $result = mysqli_query($conn, $sql);


    header("Location:admin-demandes-attante.php");




?>