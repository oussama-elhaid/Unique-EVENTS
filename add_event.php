<?php
	require "connection.php";
	session_start();

	error_reporting(E_ERROR | E_PARSE);
	if(!isset($_COOKIE['uname'])){
		header(
			"Location: auth/login.php"
		);
	}
	else{
		include "header.php";

	$id=$_SESSION['id'];
	$RegisterErr = "";
	$enameErr = "";
	$descErr = "";
	$dateErr = "";
	if(isset($_POST['add_event'])){

		$ename = $_POST['ename'];
		$desc = $_POST['desc'];
		$ville = $_POST['ville'];
		$nbrpersonnes=$_POST['nbrpersonnes'];
		$adresse = $_POST['adresse'];
		$now = date_create(date('Y-m-d'));
		$edate = date('Y-m-d',strtotime($_POST['edate']));
		$etime = date('H:i:s', strtotime($_POST['etime']));
		$img=hash('ripemd160',date("Y-m-d H:i:s"));
		$path="D:\\XA\\htdocs\\unique-events\\util-images\\$img".".jpg";
		$source= "util-images/$img".".jpg";
		move_uploaded_file($_FILES['fl']['tmp_name'],$path);
		$c = date_create($edate);
		$query = "SELECT * FROM events WHERE ename = '$ename'";
		$res = mysqli_query($conn, $query) or die("Error: " . $query);
		$diff = date_diff($now, $c);
		if(mysqli_num_rows($res)){
			$RegisterErr = "événement deja axistant.";
		}
		else{

			if(strlen($desc) == 0 || strlen($desc) > 100){
				$descErr = "Description doit pas depasser 100 caracteres";
			}
			else if(intval($diff->format('%R%a')) <= 0){
				$dateErr = "inserez une date valide.";
			}
			else{
				$query3 = "INSERT INTO events (ename, description, edate, etime,ville,localisation,nbrpersonnes,source,id_organisateur) VALUES ('$ename','$desc','$edate','$etime','$ville','$adresse','$nbrpersonnes','$source','$id');";
				$res3 = mysqli_query($conn, $query3) or die("Error: " . $query3 . "<br>" . mysqli_error($conn));
				header("Location:home.php");
			}
		}

	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Event</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
<br><br>
	<div class="container">
		<div class="jumbotron">
			<div class="container">
				<h1 class="text-center">Ajouter un événement</h1><br/>
				<form method="POST" enctype="multipart/form-data">
				<div class="row">
						<div class="col-sm-12 col-md-4 col-lg-4">
							<div class="form-group">
								<label for="ename">Inserer une image</label>
								<input type="file" class="form-control" id="fl" name="fl" >
							</div>	
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12 col-md-12 col-lg-12">
							<div class="form-group">
								<label for="ename">Nom d'événement</label>
								<input type="text" class="form-control" id="ename" name="ename" placeholder="Entrer le nom de l'événement " required>
							</div>	
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12 col-md-12 col-lg-12">
							<div class="form-group">
								<label for="desc">Desciption</label>
								<input type="text" class="form-control" id="desc" name="desc" placeholder="Entrer la description (ne dépassez pas 100 caracteres)" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6 col-md-4 col-lg-4">
							<div class="form-group">
								<label for="desc">Nombre de personnes</label>
								<input type="number" class="form-control" id="nbrpersonnes" name="nbrpersonnes" placeholder="Nombre de personnes" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12 col-md-4 col-lg-4">
							<div class="form-group">
						    	<label for="edate">Ville</label>
						      	<input type="text" class="form-control" id="ville" placeholder="Entrer la ville" name="ville" required>
						    </div>
						</div>
						<div class="col-sm-12 col-md-8 col-lg-8">
							<div class="form-group">
						    	<label for="etime">Adresse</label>
						      	<input type="text" class="form-control" id="adresse" placeholder="Entrer l'adresse" name="adresse" required>
						    </div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-12 col-md-6 col-lg-6">
							<div class="form-group">
						    	<label for="edate">Date de l'événement:</label>
						      	<input type="date" class="form-control" id="edate" placeholder="Entrer Date de l'événement" name="edate" required>
						    </div>
						</div>
						<div class="col-sm-12 col-md-6 col-lg-6">
							<div class="form-group">
						    	<label for="etime">Horraire:</label>
						      	<input type="time" class="form-control" id="etime" placeholder="Entrer l'horraire" name="etime" required>
						    </div>
						</div>
					</div>
				    <div class="form-group text-center">
				    	<input type="submit" name="add_event" class="btn btn-primary" value="Ajouter">
				    </div>
				</form>
			</div>
		</div>
	</div>
	<div class="container text-center">
		<p class="text-danger">
			<?php
				if($RegisterErr != "")
					echo $RegisterErr;
				else if($enameErr != "")
					echo $enameErr;
				else if($descErr != "")
					echo $descErr;
				else if($dateErr != "")
					echo $dateErr;
			?>
		</p>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
<?php 	include "footer.php";}

?>