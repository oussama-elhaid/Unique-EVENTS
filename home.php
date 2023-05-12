<?php 
	require "connection.php";
	session_start();
	include "header.php";
	error_reporting(E_ERROR | E_PARSE);
	if($_COOKIE['uname'] == ""){
		header(
			"Location: auth/login.php"
		);
	}else{
	$uname = $_COOKIE['uname'];
	$query = "SELECT * FROM Users WHERE uname='$uname'";
	$res = mysqli_query($conn, $query);
	$fname = "";
	$lname = "";
	$rno = "";
	$emailid = "";
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

	<br/>
	<br>
	<div class="container">

		<br>
		<?php  
			$query2 = "SELECT * FROM events";
			$res2 = mysqli_query($conn, $query2);
			if(mysqli_num_rows($res2)){
				$ctr = 0;
				while($row = mysqli_fetch_assoc($res2)){
					$ctr++;
					$msg = "";
					if($e1 == $row['ename'] || $e2 == $row['ename'] || $e3 == $row['ename']){
						$msg = "Vous êtes déjà inscrit .";
					}
					$now = date_create(date('Y-m-d'));
					$edate = date_create($row['edate']);
					if(date_diff($now, $edate) > 0){
						echo "<div class='card'>";
						echo "<div class='card-body'>";
						echo "<img src=".$row['source']." class='h-25 d-inline-block' style='width: 150px';> ";
						echo "<h3 class='card-title'>".$row['ename']."</h3>";
					    echo "<p class='card-text'>".$row['description']."</p>";
						echo "<p class='card-text'>".$row['localisation']."</p>";
					    if($msg == ""){
					    	echo "<a href='event_register.php?ename=".$row['ename']."' class='card-link'>Participer</a>";
						}
						else{
							echo "<a href='event_register.php?ename=".$row['ename']."' class='card-link text-success'>Participant</a>";	
						}
					    echo "<a href='#' class='card-link'>".date('d/m/Y', strtotime($row['edate']))."</a>";
					    echo "<a href='#' class='card-link'>".date('h:i:sa', strtotime($row['etime']))."</a>";
						echo "<a href='#' class='card-link'>".strToUpper($row['ville'])."</a>";
						echo "</div>";
						echo "</div><br/>";
					}
				}
			}
			else{
				echo "<div class='card'>";
				echo "<div class='card-body'>";
						echo "<div class='text-center text-danger'>";
						echo "<h2>Pas d'événement pour le moment.</h2>";
						echo "</div>";
				echo "</div>";
				echo "</div><br/>";
			}
		?>

<div class="d-flex "  >
			<button type="button" class="btn btn-info btn-lg">
            <a href="home_admin.php" class="text-white">
          <i class="fa fa-plus" aria-hidden="true">&nbsp;&nbsp;</i>Mes evenements</a></button>
		</div>
	</div>
	<br>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
<?php include "footer.php";?>