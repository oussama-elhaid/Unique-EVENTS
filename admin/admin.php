<?php  
 

 
session_start();
error_reporting(0);
include '../auth/config.php'; 
if($_SESSION['alogin']!=''){
    $_SESSION['alogin']='';
    }
 
if (isset($_POST['submit'])) { 
 $usname = $_POST['usname'];  
 $pswd = $_POST['pswd']; 
 
 $sql = "SELECT * FROM admin WHERE usname='$usname' AND pswd='$pswd'"; 
 $result = mysqli_query($conn, $sql); 
 if ($result->num_rows > 0) { 
  $row = mysqli_fetch_assoc($result); 
  $_SESSION['usname'] = $row['usname']; 
  $_SESSION['pswd'] = $row['pswd'];
  $_SESSION['alogin']=$_POST['usname']; 
  
  header("Location:dashboard.php");
  
 } else { 
  echo "<script>alert('oops mot de passe ou Email invalide !')</script>"; 
 } 
}
?> 
<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="admin.css"> 
    <title>Document</title> 
</head> 
<body> 
 <form action="" method="POST">
    <div class="wrapper"> 
        <div class="logo"> 
            <img src="images/admin.png" alt=""> 
        </div> 
        <div class="text-center mt-4 name"> 
            admin 
        </div> 
        <form class="p-3 mt-3" action="results.php" method="post"> 
            <div class="form-field d-flex align-items-center"> 
                <span class="far fa-user"></span> 
                <input type="text" name="usname" id="userName" placeholder="Username" autocomplete="off" required> 
            </div> 
            <div class="form-field d-flex align-items-center"> 
                <span class="fas fa-key"></span> 
                <input type="password" name="pswd" id="pwd" placeholder="Mot de passe" required> 
            </div> 
            <button class="btn mt-3" type="submit" name="submit">Se connecter</button>    
    </div> 
 
 
    </form> 
</body> 
</html>
