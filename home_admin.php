<?php 

	require "connection.php";
	session_start();
	
	error_reporting(E_ERROR | E_PARSE);
	if(!isset($_COOKIE['uname'])){
		header(
			"Location: auth/login.php"
		);
	}
	else {
		include "header.php";

		$id=$_SESSION['id'];



?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body>
	<br/><br/>
	<div class="container">
		<?php  
			$query2 = "SELECT * FROM events where id_organisateur='$id' ";
			$res2 = mysqli_query($conn, $query2);
			if(mysqli_num_rows($res2)){
				$ctr = 0;
				while($row = mysqli_fetch_assoc($res2)){
					$ctr++;
					$now = date_create(date('Y-m-d'));
					$edate = date_create($row['edate']);
					if(date_diff($now, $edate) > 0){
						echo "<div class='card'>";
						echo "<div class='card-body'>";
						echo "<h2 class='card-title'>".$row['ename']."</h2>";
					    echo "<p class='card-text'>".$row['description']."</p>";
					    echo "<a href='event_update.php?ename=".$row['ename']."' class='card-link'>Modifier</a>";
					    echo "<a href='' class='card-link'>".date('d/m/Y', strtotime($row['edate']))."</a>";
					    echo "<a href='' class='card-link'>".date('h:i:sa', strtotime($row['etime']))."</a>";
						echo "</div>";
						echo "</div><br/>";
					}
				}
			}
			else{
				echo "<div class='card'>";
				echo "<div class='card-body'>";
						echo "<div class='text-center text-danger'>";
						echo "<h2>Vous n'avez pas d'événements.</h2>";
						echo "</div>";
				echo "</div>";
				echo "</div><br/>";
			}
		?>
		<br>
		<div class="d-flex">
			<button type="button" class="btn btn-primary btn-lg"><a href="add_event.php" class="text-white"><i class="fa fa-plus" aria-hidden="true">&nbsp;&nbsp;</i>Ajouter</a></button>
			<button type="button" class="btn btn-danger btn-lg ml-auto"><a href="remove_event.php" class="text-white"><i class="fa fa-minus" aria-hidden="true">&nbsp;&nbsp;</i>Supprimer</a></button>
		</div>
	</div>
	<br>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
<?php include "footer.php";	}?>