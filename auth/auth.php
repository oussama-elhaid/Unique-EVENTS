<?php 

include 'config.php';

error_reporting(0);

session_start();





if (isset($_POST['submit'])) {
	
	$nomc = $_POST['nom'];
	$prenomc = $_POST['prenom'];
	$ville = $_POST['ville'];
	$numtelc = $_POST['numtel'];
	$emailc = $_POST['email'];
	$passwordc = md5($_POST['mdp']);
	$img=hash('ripemd160',date("Y-m-d H:i:s"));
    $path="D:\\XA\\htdocs\\unique-events\\util-images\\$img".".jpg";
    $source= "util-images/$img".".jpg";
    move_uploaded_file($_FILES['fl']['tmp_name'],$path);

	$_SESSION['email'] = $row['email'];

	
					$sql = "SELECT * FROM utulisateurs WHERE email='$emailc'";
					$result = mysqli_query($conn, $sql);
					if (!$result->num_rows > 0) {
				$sql = "INSERT INTO utulisateurs(nom, prenom, ville, numtel, email, motdepasse,source) values
						 ('$nomc', '$prenomc','$ville','$numtelc','$emailc','$passwordc','$source')";
				$result = mysqli_query($conn, $sql);
				if ($result) {
					echo "<script>alert('bien inscrit!')</script>";
					$username = "";
					$email = "";
					$tel = "";
					$adresse = "";
					$_POST['mdp'] = "";
				} else {
					echo "<script>alert('oops! Probleme, veuillez ressayez!')</script>";
				}
			} else {
				echo "<script>alert('oops! email deja existant !')</script>";
			}
			
		} 




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="auth-css/style2.css">
    <title>Document</title>
</head>
<body>
<div class="container">
	<div class="screen">
		<div class="screen__content"><a href="login.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left" viewBox="-5 -5 20 20" id="svg1">
            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
            </svg></a>
			<form class="login" method="post">

				<div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input type="text" class="login__input" placeholder="Nom" name="nom" autocomplete="off">
				</div>
				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input type="text" class="login__input" placeholder="Prenom" name="prenom" autocomplete="off">
				</div>
                <div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input type="text" class="login__input" placeholder="Ville" name="ville" autocomplete="off">
				</div>
                <div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input type="text" class="login__input" placeholder="Numero de telephone"name="numtel"autocomplete="off">
				</div>
                <div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input type="email" class="login__input" placeholder="Email"name="email"autocomplete="off">
				</div>
                <div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input type="password" class="login__input" placeholder="Mot de passe"name="mdp"autocomplete="off">
				</div>
                <div class="login__field">
					<i class="login__icon fas fa-lock"></i>
                    <span>inserez votre image</span>
					<input type="file" class="login__input" placeholder="Mot de passe"name="fl">
				</div>
				<button class="button login__submit" type="submit" name="submit">
					<span class="button__text">S'authentifier</span>
					<i class="button__icon fas fa-chevron-right"></i>
				</button>				
			</form>
			<div class="social-login">

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