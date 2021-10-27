<?php
session_start ();
if (isset ( $_SESSION ['Id'] )) {
	session_destroy ();
	header ( "Location: ../view/login.php" );
	exit ();
} else {
	echo "<script> window.location.replace('../view/login.php') </script>";
}
?>