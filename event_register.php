<?php 
	require "connection.php";
	include "header.php";
	error_reporting(E_ERROR | E_PARSE);
	if(!isset($_COOKIE['uname'])){
		header(
			"Location: auth/login.php"
		);
	}
	else if($_COOKIE['uname'] == "admin" || $_COOKIE['uname'] == "admin2"){
		header(
			"Location: home_admin.php"
		);
	}
	$uname = $_COOKIE['uname'];
	$query = "SELECT * FROM Users WHERE uname='$uname'";
	$res = mysqli_query($conn, $query);
	$fname = "";
	$lname = "";
	$rno = "";
	$emailid = "";
	$ename = $_GET['ename'];
	if(mysqli_num_rows($res)){
		while($row = mysqli_fetch_assoc($res)){
			$fname = $row['fname'];
			$lname = $row['lname'];
			$rno = $row['rno'];
			$emailid = $row['emailid'];
			$e1 = $row['e1'];
			$e2 = $row['e2'];
			$e3 = $row['e3'];
		}
	}
	$alreadyreg = "";
	if($e1 == $ename || $e2 == $ename || $e3 == $ename){
		$alreadyreg = "Vous etes déjà insrit.";
	}
	$che = $_POST['agreement'];
	$regfullErr = "";
	$regsuc = "";
	if(isset($_POST['register'])){
		if($e1 == '0'){
			$query3 = "UPDATE Users SET e1='$ename' WHERE uname='$uname'";
			$res3 = mysqli_query($conn, $query3);
			$regsuc = "Vous avez participer avec succes.";
		}
		else if($e2 == '0'){
			$query3 = "UPDATE Users SET e2='$ename' WHERE uname='$uname'";
			$res3 = mysqli_query($conn, $query3);
			$regsuc = "Vous avez participer avec succes.";
		}
		else if($e3 == '0'){
			$query3 = "UPDATE Users SET e3='$ename' WHERE uname='$uname'";
			$res3 = mysqli_query($conn, $query3);
			$regsuc = "Vous avez participer avec succes.";
		}
		else{
			$regfullErr = "Désolé vous ne pouvez pas dépasser 3 participations.";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>

	<br/><br/>
	<div class="container">
		<?php 
			$query2 = "SELECT * FROM events WHERE ename = '$ename'";
			$res2 = mysqli_query($conn, $query2);
			if(mysqli_num_rows($res2)){
				while($row = mysqli_fetch_assoc($res2)){
					echo "<div class='jumbotron text-center'>";
					echo "<h1>".$row['ename']."</h1>";
				
					echo "<div>";
					echo "<p>".$row['description']."</p><br>";
					echo "</div>";
					echo "<div class='d-flex'>";
					echo "<a href='#'>".$row['edate']."</a><br>";
					echo "<a href='#' class='ml-auto'>".$row['etime']."</a><br>";
					echo "</div></div><br><br>";
					if($regsuc == "" && $regfullErr == "" && $alreadyreg == ""){
						echo "<div class='jumbotron'>";
						echo "<p>J'accepte les condition de l'événement ,et je sousigne que tout mes informations sont valide .</p>";
						echo "
							<form action='event_register.php?ename=".$ename."' method='POST'>
							  	<div class='form-group form-check'>
							    	<label class='form-check-label'>
							      		<input class='form-check-input' type='checkbox' name='agreement' required> J'accepte les conditions.
							    	</label>
								</div>
								<input type='submit' class='btn btn-primary' name='register' value='Participer'>
							</form>
						";
						echo "</div>";
					}
				}
			}
		?>
	</div>
	<div class="container text-center">
		<?php
			if($alreadyreg != ""){
				echo "<div class='jumbotron text-center'><p class='text-success'>".$alreadyreg."</p></div>";
			}
			if($regfullErr != ""){
				echo "<div class='jumbotron text-center'><p class='text-success'><p class='text-danger'>".$regfullErr."</p></div>";
			}
			else{
				echo "<p class='text-success'>".$regsuc."</p>";
			}
		?>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
<?php include "footer.php";?>