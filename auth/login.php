<?php 

include 'config.php';

error_reporting(0);

session_start();




$radio=$_POST['rd1'];
$_SESSION['idp'] = $row['idp'];
$_SESSION['idc'] = $row['id'];

if (isset($_POST['submit'])) {


		$emailp = $_POST['email'];	
	    $passwordp = md5($_POST['password']);

	$sql = "SELECT * FROM utulisateurs WHERE email='$emailp' AND motdepasse='$passwordp'";
	$result = mysqli_query($conn, $sql);

	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['id'] = $row['id'];
		$_SESSION['nom'] = $row['nom'];
		$_SESSION['prenom'] = $row['prenom'];
		$_SESSION['ville'] = $row['ville'];
		$_SESSION['numtel'] = $row['numtel'];
		$_SESSION['email'] = $row['email'];
		$_SESSION['motdepasse'] = $row['motdepasse'];

		//header("Location: ../demandes-prest/demande-prest.php");
		header("Location:../index.php");
		
	} else {
		echo "<script>alert('oops! email ou bien mot de passe incorrect !')</script>";
	}
}

	


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="auth-css/style.css">
    <title>Document</title>
</head>
<body>
<div class="container">
	<div class="screen">
		<div class="screen__content"><a href="../index.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left" viewBox="-5 -5 20 20" id="svg1">
            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
            </svg></a>
			<form class="login" method="post">
				<div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input type="text" class="login__input" placeholder="Email" name="email" autocomplete="off">
				</div>
				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input type="password" class="login__input" placeholder="Mot de passe" name="password" autocomplete="off">
				</div>
				<button class="button login__submit" type="submit" name="submit">
					<span class="button__text">Se connecter</span>
					<i class="button__icon fas fa-chevron-right"></i>
				</button>				
			</form>
			<div class="social-login">
               
				<h3><a href="auth.php" id="a1">Creer un compte</a></h3>
				<div class="social-icons">
					<a href="#" class="social-login__icon fab fa-instagram"></a>
					<a href="#" class="social-login__icon fab fa-facebook"></a>
					<a href="#" class="social-login__icon fab fa-twitter"></a>
				</div>
			</div>
		</div>
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>		
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
		</div>		
	</div>
</div>
</body>
</html>