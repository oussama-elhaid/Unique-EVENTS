<?php 
session_start();
session_destroy();
	setcookie('uname', "", time()-3600, '/');
	header(
		"Location: index.php"
	);
?>