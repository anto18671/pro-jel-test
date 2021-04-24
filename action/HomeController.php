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
        case 'add_distributor' :
			AddDistributor ();
			break;
        case 'edit_distributor' :
			EditDistributor ();
			break;
         case 'delete_distributor' :
			DeleteDistributor ();
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

function AddDistributor()
{
	if (isset($_POST ['name']) && isset($_POST ['phone']) && isset($_POST ['address'])) {
        $name = strip_tags ($_POST ['name']);
		$phone = strip_tags ($_POST ['phone']);
		$address = strip_tags ($_POST ['address']);

		require_once ("../manager/HomeManager.php");
		$manager = new HomeManager ();
		$manager->AddDistributor($name, $phone, $address);

		echo "<script> window.location.replace('../view/distibuteur.php') </script>";
	}
}

function EditDistributor()
{
	if (isset($_POST ['id']) && isset($_POST ['name']) && isset($_POST ['phone']) && isset($_POST ['address'])) {
		$id = strip_tags ($_POST ['id']);
        $name = strip_tags ($_POST ['name']);
		$phone = strip_tags ($_POST ['phone']);
		$address = strip_tags ($_POST ['address']);
        
		require_once ("../manager/HomeManager.php");
		$manager = new HomeManager ();
		$manager->EditDistributor($id, $name, $phone, $address);

		echo "<script> window.location.replace('../view/distibuteur.php') </script>";
	}
}

function DeleteDistributor()
{
	if (isset($_POST ['id'])) {
		$id = strip_tags ($_POST ['id']);

		require_once ("../manager/HomeManager.php");
		$manager = new HomeManager ();
        
		$manager->DeleteDistributor($id);

		echo "<script> window.location.replace('../view/distibuteur.php') </script>";
	}
}

?>
