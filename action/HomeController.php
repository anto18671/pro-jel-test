<?php
session_start ();
header("Content-Type: text/html;charset=utf-8");

if (isset ($_POST ['task']))
{
	switch ($_POST ['task'])
	{
		case 'add_materiel' :
			AddMateriel ();
			break;
        case 'edit_materiel' :
			EditMateriel ();
			break;
         case 'delete_materiel' :
			DeleteMateriel ();
			break;
	}
}

function AddMateriel()
{
	if (isset ($_POST ['piece_number']) && isset ($_POST ['description']) && isset ($_POST ['distributor']) && isset ($_POST ['cost'])) {
		$pieceNumber = strip_tags ($_POST ['piece_number']);
		$description = strip_tags ($_POST ['description']);
		$distributor = strip_tags ($_POST ['distributor']);
		$cost = strip_tags ($_POST ['cost']);

		$costSize = strlen($cost);

		for($i = 0; $i < $costSize; $i++) {
			if($cost[$i] == ","){
				$cost[$i] = ".";
			}
		}

		require_once ("../manager/HomeManager.php");
		$manager = new HomeManager ();
		$manager->AddMateriel($pieceNumber, $description, $distributor, $cost);

		echo "<script> window.location.replace('../view/materiel.php') </script>";
	}
}

function EditMateriel()
{
	if (isset($_POST ['id']) && isset($_POST ['piece_number']) && isset($_POST ['description']) && isset($_POST ['distributor']) && isset($_POST ['cost'])) {
		$id = strip_tags ($_POST ['id']);
        $pieceNumber = strip_tags ($_POST ['piece_number']);
		$description = strip_tags ($_POST ['description']);
		$distributor = strip_tags ($_POST ['distributor']);
		$cost = strip_tags ($_POST ['cost']);

		$costSize = strlen($cost);

		for($i = 0; $i < $costSize; $i++) {
			if($cost[$i] == ","){
				$cost[$i] = ".";
			}
		}

		require_once ("../manager/HomeManager.php");
		$manager = new HomeManager ();
		$manager->EditMateriel($id, $pieceNumber, $description, $distributor, $cost);

		echo "<script> window.location.replace('../view/materiel.php') </script>";
	}
}

function DeleteMateriel()
{
	if (isset($_POST ['id'])) {
		$id = strip_tags ($_POST ['id']);

		require_once ("../manager/HomeManager.php");
		$manager = new HomeManager ();
        
		$manager->DeleteMateriel($id);

		echo "<script> window.location.replace('../view/materiel.php') </script>";
	}
}
?>
