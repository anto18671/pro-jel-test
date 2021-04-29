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
        case 'add_client' :
			AddClient ();
			break;
        case 'edit_client' :
			EditClient ();
			break;
         case 'delete_client' :
			DeleteClient ();
			break;
        case 'add_user' :
			AddUser ();
			break;
        case 'edit_user' :
			EditUser ();
			break;
         case 'delete_user' :
			DeleteUser ();
			break;
	}
}

function AddMateriel()
{
	if (isset ($_POST ['piece_number']) && isset ($_POST ['description']) && isset ($_POST ['distributor']) && isset ($_POST ['fabricant']) && isset ($_POST ['cost'])) {
		$pieceNumber = strip_tags ($_POST ['piece_number']);
		$description = strip_tags ($_POST ['description']);
		$distributor = strip_tags ($_POST ['distributor']);
        $fabricant = strip_tags ($_POST ['fabricant']);
		$cost = strip_tags ($_POST ['cost']);

		$costSize = strlen($cost);

		for($i = 0; $i < $costSize; $i++) {
			if($cost[$i] == ","){
				$cost[$i] = ".";
			}
		}

		require_once ("../manager/HomeManager.php");
		$manager = new HomeManager ();
		$manager->AddMateriel($pieceNumber, $description, $distributor, $fabricant, $cost);
	}
    echo "<script> window.location.replace('../view/materiel.php') </script>";
}

function EditMateriel()
{
	if (isset($_POST ['id']) && isset($_POST ['piece_number']) && isset($_POST ['description']) && isset($_POST ['distributor']) && isset ($_POST ['fabricant'])  && isset($_POST ['cost'])) {
		$id = strip_tags ($_POST ['id']);
        $pieceNumber = strip_tags ($_POST ['piece_number']);
		$description = strip_tags ($_POST ['description']);
		$distributor = strip_tags ($_POST ['distributor']);
        $fabricant = strip_tags ($_POST ['fabricant']);
		$cost = strip_tags ($_POST ['cost']);

		$costSize = strlen($cost);

		for($i = 0; $i < $costSize; $i++) {
			if($cost[$i] == ","){
				$cost[$i] = ".";
			}
		}

		require_once ("../manager/HomeManager.php");
		$manager = new HomeManager ();
		$manager->EditMateriel($id, $pieceNumber, $description, $distributor, $fabricant, $cost);
	}
    echo "<script> window.location.replace('../view/materiel.php') </script>";
}

function DeleteMateriel()
{
	if (isset($_POST ['id'])) {
		$id = strip_tags ($_POST ['id']);

		require_once ("../manager/HomeManager.php");
		$manager = new HomeManager ();
        
		$manager->DeleteMateriel($id);
	}
    echo "<script> window.location.replace('../view/materiel.php') </script>";
}

function AddDistributor()
{
	if (isset($_POST ['name']) && isset($_POST ['phone']) && isset($_POST ['address']) && isset($_POST ['contact'])) {
        $name = strip_tags ($_POST ['name']);
		$phone = strip_tags ($_POST ['phone']);
		$address = strip_tags ($_POST ['address']);
        $contact = strip_tags ($_POST ['contact']);

		require_once ("../manager/HomeManager.php");
		$manager = new HomeManager ();
		$manager->AddDistributor($name, $phone, $address, $contact);
	}
    echo "<script> window.location.replace('../view/distibuteur.php') </script>";
}

function EditDistributor()
{
	if (isset($_POST ['id']) && isset($_POST ['name']) && isset($_POST ['phone']) && isset($_POST ['address']) && isset($_POST ['contact'])) {
		$id = strip_tags ($_POST ['id']);
        $name = strip_tags ($_POST ['name']);
		$phone = strip_tags ($_POST ['phone']);
		$address = strip_tags ($_POST ['address']);
        $contact = strip_tags ($_POST ['contact']);
        
		require_once ("../manager/HomeManager.php");
		$manager = new HomeManager ();
		$manager->EditDistributor($id, $name, $phone, $address, $contact);
	}
    echo "<script> window.location.replace('../view/distibuteur.php') </script>";
}

function DeleteDistributor()
{
	if (isset($_POST ['id'])) {
		$id = strip_tags ($_POST ['id']);

		require_once ("../manager/HomeManager.php");
		$manager = new HomeManager ();
        
		$manager->DeleteDistributor($id);
	}
    echo "<script> window.location.replace('../view/distibuteur.php') </script>";
}

function AddClient()
{
	if (isset($_POST ['name']) && isset($_POST ['address']) && isset($_POST ['city']) && isset($_POST ['contact']) &&
            isset($_POST ['email1']) && isset($_POST ['contactPay']) && isset($_POST ['email2']) && isset($_POST ['valide_email1']) && isset($_POST ['valide_email2'])) {

        $name = $_POST ["name"];
        $address = $_POST ["address"];
        $city = $_POST ["city"];
        $contact = $_POST ["contact"];
        $email1 = $_POST ["email1"];
        $contactPay = $_POST ["contactPay"];
        $email2 = $_POST ["email2"];
        
        $valideEmail1 = $_POST ["valide_email1"];
        $valideEmail2 = $_POST ["valide_email2"];
        
        $other1 = null;
        $email3 = null;
        $other2 = null;
        $email4 = null;
        
        $valideEmail3 = 0;
        $valideEmail4 = 0;
        
        if(!empty($_POST ['other1']) && !empty($_POST ['email3']) && isset($_POST ['valide_email3'])){
            $other1 = $_POST ["other1"];
            $email3 = $_POST ["email3"];
            $valideEmail3 = $_POST ["valide_email3"];
        }
        if(!empty($_POST ['other2']) && !empty($_POST ['email4']) && isset($_POST ['valide_email4'])){
            $other2 = $_POST ["other2"];
            $email4 = $_POST ["email4"];
            $valideEmail4 = $_POST ["valide_email4"];
        }

		require_once ("../manager/HomeManager.php");
		$manager = new HomeManager ();
		$manager->AddClient($name, $address, $city, $contact, $email1, $contactPay, $email2, $other1, $email3, $other2, $email4, $valideEmail1, $valideEmail2, $valideEmail3, $valideEmail4);
	}
    echo "<script> window.location.replace('../view/client.php') </script>";

}

function EditClient()
{
	if (isset($_POST ['name']) && isset($_POST ['address']) && isset($_POST ['city']) && isset($_POST ['contact']) &&
            isset($_POST ['email1']) && isset($_POST ['contactPay']) && isset($_POST ['email2']) && isset($_POST ['valide_email1']) && isset($_POST ['valide_email2'])) {

        $id = $_POST ["id"];
        $name = $_POST ["name"];
        $address = $_POST ["address"];
        $city = $_POST ["city"];
        $contact = $_POST ["contact"];
        $email1 = $_POST ["email1"];
        $contactPay = $_POST ["contactPay"];
        $email2 = $_POST ["email2"];
        
        $valideEmail1 = $_POST ["valide_email1"];
        $valideEmail2 = $_POST ["valide_email2"];
        
        $other1 = null;
        $email3 = null;
        $other2 = null;
        $email4 = null;
        
        $valideEmail3 = 0;
        $valideEmail4 = 0;
        
        if(!empty($_POST ['other1']) && !empty($_POST ['email3']) && isset($_POST ['valide_email3'])){
            $other1 = $_POST ["other1"];
            $email3 = $_POST ["email3"];
            $valideEmail3 = $_POST ["valide_email3"];
        }
        if(!empty($_POST ['other2']) && !empty($_POST ['email4']) && isset($_POST ['valide_email4'])){
            $other2 = $_POST ["other2"];
            $email4 = $_POST ["email4"];
            $valideEmail4 = $_POST ["valide_email4"];
        }
        
		require_once ("../manager/HomeManager.php");
		$manager = new HomeManager ();
		$manager->EditClient($id, $name, $address, $city, $contact, $email1, $contactPay, $email2, $other1, $email3, $other2, $email4, $valideEmail1, $valideEmail2, $valideEmail3, $valideEmail4);
	}
    echo "<script> window.location.replace('../view/client.php') </script>";
}

function DeleteClient()
{
	if (isset($_POST ['id'])) {
		$id = strip_tags ($_POST ['id']);

		require_once ("../manager/HomeManager.php");
		$manager = new HomeManager ();
        
		$manager->DeleteClient($id);
	}
    echo "<script> window.location.replace('../view/client.php') </script>";
}

function AddUser()
{
	if (isset($_POST ['username']) && isset($_POST ['email']) && isset($_POST ['password']) && isset($_POST ['confirmation']) &&
            isset($_POST ['admin'])) {

        $username = $_POST ["username"];
        $email = $_POST ["email"];
        $password = $_POST ["password"];
        $confirmation = $_POST ["confirmation"];
        $isAdmin = $_POST ["admin"];
        
        if($password == $confirmation){
            require_once ("../manager/HomeManager.php");
            $manager = new HomeManager ();
            $manager->AddUser($username, $email, $password, $isAdmin);
        }
	}
    echo "<script> window.location.replace('../view/utilisateur.php') </script>";

}

function EditUser()
{
	if (isset($_POST ['id']) && isset($_POST ['username']) && isset($_POST ['admin'])) {
        
        $id = $_POST ['id'];
        $username = $_POST ["username"];
        $isAdmin = $_POST ["admin"];
        
        require_once ("../manager/HomeManager.php");
        $manager = new HomeManager ();
        $manager->EditUser($id, $username, $isAdmin);
        
	}
    echo "<script> window.location.replace('../view/utilisateur.php') </script>";
}

function DeleteUser()
{
	if (isset($_POST ['id'])) {
		$id = strip_tags ($_POST ['id']);

		require_once ("../manager/HomeManager.php");
		$manager = new HomeManager ();
        
		$manager->DeleteUser($id);
	}
    echo "<script> window.location.replace('../view/utilisateur.php') </script>";
}

?>
