<?php
$dir = dirname (__FILE__);
require_once ($dir . '/ConnectionManager.php');

class HomeManager
{
	function GetDate()
	{
		date_default_timezone_set ('America/Montreal');
		return date_create ()->format ('Y-m-d');
	}

	function AddMateriel($pieceNumber, $description, $distributor, $fabricant, $cost)
    {
		$connManager = new ConnectionManager ();
		$conn = $connManager->ConnectToDb ();
        $date = self::GetDate();

        $sql = "INSERT INTO materiel VALUES (null,?,?,?,?,?,?,0)";
		$result = $conn->prepare ($sql);
		$result->execute (array($pieceNumber, $description, $distributor, $cost, $fabricant, $date));
    }
    
    function EditMateriel($id, $pieceNumber, $description, $distributor, $fabricant, $cost)
    {
		$connManager = new ConnectionManager ();
		$conn = $connManager->ConnectToDb ();
        $date = self::GetDate();
        
        $sql = "UPDATE materiel SET PieceNumber = ?, Description = ?, Distributor = ?, Cost = ?, Fabricant = ?, UpdateDate = ? WHERE Id = ?";
		$result = $conn->prepare ($sql);
		$result->execute (array($pieceNumber, $description, $distributor, $cost, $fabricant, $date, $id));
    }
    
    function DeleteMateriel($id)
    {
		$connManager = new ConnectionManager ();
		$conn = $connManager->ConnectToDb ();
        
        $sql = "UPDATE materiel SET isArchived = 1 WHERE Id = ?";
		$result = $conn->prepare ($sql);
		$result->execute (array($id));
    }
    
    function AddDistributor($name, $telephone1, $telephone2, $address, $contact, $ville, $province, $codePostal, $pays, $noDistributeur)
    {
		$connManager = new ConnectionManager ();
		$conn = $connManager->ConnectToDb ();
        $date = self::GetDate();

        $sql = "INSERT INTO distributor VALUES (null,?,?,?,?,?,?,0,?,?,?,?,?)";
		$result = $conn->prepare ($sql);
		$result->execute (array($name, $telephone1, $telephone2, $address, $contact, $date, $ville, $province, $codePostal, $pays, $noDistributeur));
    }
    
    function EditDistributor($id, $name, $phone, $address, $contact)
    {
		$connManager = new ConnectionManager ();
		$conn = $connManager->ConnectToDb ();
        $date = self::GetDate();
        
        $sql = "UPDATE distributor SET Name = ?, Phone = ?, Address = ?, Contact = ?, UpdateDate = ? WHERE Id = ?";
		$result = $conn->prepare ($sql);
		$result->execute (array($name, $phone, $address, $contact, $date, $id));
    }
    
    function DeleteDistributor($id)
    {
		$connManager = new ConnectionManager ();
		$conn = $connManager->ConnectToDb ();
        
        $sql = "UPDATE distributor SET isArchived = 1 WHERE Id = ?";
		$result = $conn->prepare ($sql);
		$result->execute (array($id));
    }
    
    function AddClient($name, $address, $city, $contact, $email1, $contactPay, $email2, $other1, $email3, $other2, $email4, $valideEmail1, $valideEmail2, $valideEmail3, $valideEmail4, $noClient, $province, $codePostal, $pays, $telephone1, $telephone2)
    {
		$connManager = new ConnectionManager ();
		$conn = $connManager->ConnectToDb ();

        $sql = "INSERT INTO client VALUES (null,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,0,?,?,?,?,?,?)";
		$result = $conn->prepare ($sql);
		$result->execute (array($name, $address, $city, $contact, $contactPay, $other1, $other2, $email1, $email2, $email3, $email4, $valideEmail1, $valideEmail2, $valideEmail3, $valideEmail4, $noClient, $province, $codePostal, $pays, $telephone1, $telephone2));
    }
    
    function EditClient($id, $name, $address, $city, $contact, $email1, $contactPay, $email2, $other1, $email3, $other2, $email4, $valideEmail1, $valideEmail2, $valideEmail3, $valideEmail4, $noClient, $province, $codePostal, $pays, $telephone1, $telephone2)
    {
		$connManager = new ConnectionManager ();
		$conn = $connManager->ConnectToDb ();
        
        $sql = "UPDATE client SET Name = ?, Address = ?, City = ?, Contact = ?, Email1 = ?, ContactPay = ?, Email2 = ?, Other1 = ?, Email3 = ?, Other2 = ?, Email4 = ?, ValideEmail1 = ?, ValideEmail2 = ?, ValideEmail3 = ?, ValideEmail4 = ?, noClient = ?, Province = ?, CodePostal = ?, Pays = ?, Telephone1 = ?, Telephone2 = ? WHERE Id = ?";
		$result = $conn->prepare ($sql);
		$result->execute (array($name, $address, $city, $contact, $email1, $contactPay, $email2, $other1, $email3, $other2, $email4, $valideEmail1, $valideEmail2, $valideEmail3, $valideEmail4, $noClient, $province, $codePostal, $pays, $telephone1, $telephone2, $id));
    }
    
    function DeleteClient($id)
    {
		$connManager = new ConnectionManager ();
		$conn = $connManager->ConnectToDb ();
        
        $sql = "UPDATE client SET isArchived = 1 WHERE Id = ?";
		$result = $conn->prepare ($sql);
		$result->execute (array($id));
    }
    
    function AddUser($username, $email, $password, $isAdmin)
    {
        if ($_SESSION['IsAdmin'] == 1) {
            $connManager = new ConnectionManager ();
            $conn = $connManager->ConnectToDb ();
            $date = self::GetDate();
            $hashUsername = hash('sha256', $username);

            $sql = "INSERT INTO usertablebigname VALUES (null,?,?,?,?,?,?,?,0)";
            $result = $conn->prepare ($sql);
            $result->execute (array($username, $hashUsername, $password, $email, $date, $date, $isAdmin));
        }
    }
    
    function EditUser($id, $username, $isAdmin)
    {
        if ($_SESSION['IsAdmin'] == 1) {
            $connManager = new ConnectionManager ();
            $conn = $connManager->ConnectToDb ();
            $hashUsername = hash('sha256', $username);

            $sql = "UPDATE usertablebigname SET UserName = ?, UserNameSha = ?, IsAdmin = ? WHERE Id = ?";
            $result = $conn->prepare ($sql);
            $result->execute (array($username, $hashUsername, $isAdmin, $id));
        }
    }
    
    function DeleteUser($id)
    {
        if ($_SESSION['IsAdmin'] == 1) {
            $connManager = new ConnectionManager ();
            $conn = $connManager->ConnectToDb ();

            $sql = "UPDATE usertablebigname SET isArchived = 1 WHERE Id = ?";
            $result = $conn->prepare ($sql);
            $result->execute (array($id));
        }
    }
    
    function getMateriel()
    {
		$connManager = new ConnectionManager ();
		$conn = $connManager->ConnectToDb ();
		
		$sql = "SELECT m.*, d.Name from materiel m
                INNER JOIN distributor d ON m.Distributor = d.Id
                WHERE m.isArchived = 0";
		$result = $conn->prepare($sql);
		$result->execute();

		$materiels = Array();
		if ($result != null)
		{
			while ($row = $result->fetch (PDO::FETCH_ASSOC))
			{
				$materiel = new Materiel();
				$materiel->Id = $row['Id'];
                $materiel->PieceNumber = $row['PieceNumber'];
                $materiel->Description = $row['Description'];
                $materiel->DistributorId = $row['Distributor'];
                $materiel->DistributorName = $row['Name'];
                $materiel->Cost = $row['Cost'];
                $materiel->Fabricant = $row['Fabricant'];
                $materiel->UpdateDate = $row['UpdateDate'];
                
                $materiels[$materiel->Id] = $materiel;
            }
        }
        
        return $materiels;
    }
    
    function getDistributor()
    {
		$connManager = new ConnectionManager ();
		$conn = $connManager->ConnectToDb ();
		
		$sql = "SELECT * from distributor WHERE isArchived = 0";
		$result = $conn->prepare($sql);
		$result->execute();

		$distributors = Array();
		if ($result != null)
		{
			while ($row = $result->fetch (PDO::FETCH_ASSOC))
			{
				$distributor = new Distributor();
				$distributor->Id = $row['Id'];
                $distributor->Name = $row['Name'];
                $distributor->Telephone1 = $row['Telephone1'];
                $distributor->Telephone2 = $row['Telephone2'];
                $distributor->Address = $row['Address'];
                $distributor->Contact = $row['Contact'];
                $distributor->UpdateDate = $row['UpdateDate'];
                
                $distributor->Ville = $row['Ville'];
                $distributor->Province = $row['Province'];
                $distributor->CodePostal = $row['CodePostal'];
                $distributor->Pays = $row['Pays'];
                $distributor->noDistributeur = $row['noDistributeur'];
                
                $distributors[$distributor->Id] = $distributor;
            }
        }
        
        return $distributors;
    }
    
    function getClient()
    {
		$connManager = new ConnectionManager ();
		$conn = $connManager->ConnectToDb ();
		
		$sql = "SELECT * from client WHERE isArchived = 0";
		$result = $conn->prepare($sql);
		$result->execute();

		$clients = Array();
		if ($result != null)
		{
			while ($row = $result->fetch (PDO::FETCH_ASSOC))
			{
				$client = new Client();
				$client->Id = $row['Id'];
                $client->Name = $row['Name'];
                $client->Address = $row['Address'];
                $client->City = $row['City'];
                $client->Contact = $row['Contact'];
                $client->ContactPay = $row['ContactPay'];
                $client->Other1 = $row['Other1'];
                $client->Other2 = $row['Other2'];
                $client->Email1 = $row['Email1'];
                $client->Email2 = $row['Email2'];
                $client->Email3 = $row['Email3'];
                $client->Email4 = $row['Email4'];
                $client->ValideEmail1 = $row['ValideEmail1'];
                $client->ValideEmail2 = $row['ValideEmail2'];
                $client->ValideEmail3 = $row['ValideEmail3'];
                $client->ValideEmail4 = $row['ValideEmail4'];
                $client->noClient = $row['noClient'];
                $client->Province = $row['Province'];
                $client->CodePostal = $row['CodePostal'];
                $client->Pays = $row['Pays'];
                $client->Telephone1 = $row['Telephone1'];
                $client->Telephone2 = $row['Telephone2'];
                
                $clients[$client->Id] = $client;
            }
        }
        
        return $clients;
    }
    
    function getUser()
    {
		$connManager = new ConnectionManager ();
		$conn = $connManager->ConnectToDb ();
		
		$sql = "SELECT Id, UserName, Email, DateCreated, IsAdmin from usertablebigname WHERE isArchived = 0";
		$result = $conn->prepare($sql);
		$result->execute();

		$users = Array();
		if ($result != null)
		{
			while ($row = $result->fetch (PDO::FETCH_ASSOC))
			{
				$user = new User();
                $user->Id = $row['Id'];
				$user->UserName = $row['UserName'];
                $user->Email = $row['Email'];
                $user->DateCreated = $row['DateCreated'];
                $user->IsAdmin = $row['IsAdmin'];
                
                $users[$user->Id] = $user;
            }
        }
        
        return $users;
    }
    
    function ImportCsv($list, $telephones)
    {
        $size = sizeof($list);
        $container = array();
        
        for($i = 0; $i < $size; $i++){
            $ligne = array();
            array_push($ligne, $list[$i+0]);
            array_push($ligne, $list[$i+1]);
            array_push($ligne, $list[$i+2]);
            array_push($ligne, $list[$i+3]);
            array_push($ligne, $list[$i+4]);
            
            array_push($container, $ligne);
            
            $i = $i + 5;
        }
        
        foreach($container as $c){
            $bundle = preg_split ("/\,/", $c[3]); 
            self::AddDistributor($c[1], "", "", $c[2], "", $bundle[0], $bundle[1], $bundle[2], $c[4], $c[0]);
        }
        
        $connManager = new ConnectionManager ();
        $conn = $connManager->ConnectToDb ();

        $sql = "UPDATE distributor SET Telephone1 = ?, Telephone2 = ? WHERE Name = ?";
        $result = $conn->prepare ($sql);
        
        foreach($telephones as $tel){
            $result->execute (array($tel[1], $tel[2], $tel[0]));
        }
    }
    
//    function ImportCsv($list, $telephones)
//    {
//        $size = sizeof($list);
//        $container = array();
//        
//        for($i = 0; $i < $size; $i++){
//            $ligne = array();
//            array_push($ligne, $list[$i+0]);
//            array_push($ligne, $list[$i+1]);
//            array_push($ligne, $list[$i+2]);
//            array_push($ligne, $list[$i+3]);
//            array_push($ligne, $list[$i+4]);
//            
//            array_push($container, $ligne);
//            
//            $i = $i + 5;
//        }
//        
//        foreach($container as $c){
//            $bundle = preg_split ("/\,/", $c[3]); 
//            self::AddClient($c[1], $c[2], $bundle[0], "", "", "", "", "", "", "", "", 0, 0, 0, 0, $c[0], $bundle[1], $bundle[2], $c[4], "", "");
//        }
//        
//        $connManager = new ConnectionManager ();
//        $conn = $connManager->ConnectToDb ();
//
//        $sql = "UPDATE client SET Telephone1 = ?, Telephone2 = ? WHERE Name = ?";
//        $result = $conn->prepare ($sql);
//        
//        foreach($telephones as $tel){
//            $result->execute (array($tel[1], $tel[2], $tel[0]));
//        }
//    }
}

class Materiel {
	public $Id;
	public $PieceNumber;
    public $Description;
    public $DistributorId;
    public $DistributorName;
    public $Cost;
    public $Fabricant;
    public $UpdateDate;
}

class Distributor {
    public $Id;
	public $Name;
    public $Telephone1;
    public $Telephone2;
    public $Address;
    public $Contact;
    public $UpdateDate;
    public $Ville;
    public $Province;
    public $CodePostal;
    public $Pays;
    public $noDistributeur;
}

class Client {
    public $Id;
	public $Name;
    public $Address;
    public $City;
    public $Contact;
    public $ContactPay;
	public $Other1;
    public $Other2;
    public $Email1;
    public $Email2;
    public $Email3;
    public $Email4;
    public $ValideEmail1;
    public $ValideEmail2;
    public $ValideEmail3;
    public $ValideEmail4;
    public $noClient;
    public $Province;
    public $CodePostal;
    public $Pays;
    public $Telephone1;
    public $Telephone2;
    
}

class User {
    public $Id;
    public $UserName;
    public $Email;
    public $DateCreated;
    public $IsAdmin;
}
?>
