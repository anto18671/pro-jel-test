<?php
session_start ();
if (isset ( $_SESSION ['Id'] )) {
	session_destroy ();
	echo "<script> window.location.replace('https://www.projeltestautomatisation.com/') </script>";
	exit ();
} else {
	echo "<script> window.location.replace('https://www.projeltestautomatisation.com/') </script>";
}
?>