<?php
	 if(!$_SESSION['UserName'])
	 {
	 	session_destroy();
	 	echo "<script> window.location.replace('../view/login.php') </script>";
	 }
?>
