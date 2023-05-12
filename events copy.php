<?php include('header.php');


?>
    <!-- success section start -->
    <head>
	<title>evenements</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
  <br><br>
	<div class="container">
		<?php  
			$query2 = "SELECT * FROM events";
			$res2 = mysqli_query($conn, $query2);
			if(mysqli_num_rows($res2)){
				$ctr = 0;
				while($row = mysqli_fetch_assoc($res2)){
					$ctr++;
					$msg = "";
					if($e1 == $row['ename'] || $e2 == $row['ename'] || $e3 == $row['ename']){
						$msg = "You are already registered.";
					}
					$now = date_create(date('Y-m-d'));
					$edate = date_create($row['edate']);
					if(date_diff($now, $edate) > 0){
						echo "<div class='card'>";
						echo "<div class='card-body'>";
						echo "<img src='test-image.jpg' class='h-25 d-inline-block' style='width: 300px';> ";
						echo "<h3 class='card-title'>".$row['ename']."</h3>";
					  echo "<p class='card-text'>".$row['description']."</p>";
						echo "<p class='card-text'>Localisation : ".$row['localisation']."</p>";
					    if($msg == ""){
					    	echo "<a href='event_register.php?ename=".$row['ename']."' class='card-link'>Register</a>";
						}
						else{
							echo "<a href='event_register.php?ename=".$row['ename']."' class='card-link text-success'>Registered</a>";	
						}
					    echo "<a href='' class='card-link'>".date('d/m/Y', strtotime($row['edate']))."</a>";
					    echo "<a href='' class='card-link'>".date('h:i:sa', strtotime($row['etime']))."</a>";
						echo "</div>";
						echo "</div> <br/>";
            
					}
				}
			}
			else{
				echo "<div class='text-center text-danger'>";
				echo "<h2>No events available.</h2>";
				echo "</div>";
			}
		?>
	</div>
  <br><br>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
    <!-- success section end --> 
    <?php include('footer.php');?>