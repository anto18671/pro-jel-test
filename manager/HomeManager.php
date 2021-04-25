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

	function AddMateriel($pieceNumber, $description, $distributor, $cost)
    {
		$connManager = new ConnectionManager ();
		$conn = $connManager->ConnectToDb ();
        $date = self::GetDate();

        $sql = "INSERT INTO materiel VALUES (null,?,?,?,?,?,0)";
		$result = $conn->prepare ($sql);
		$result->execute (array($pieceNumber, $description, $distributor, $cost, $date));
    }
    
    function EditMateriel($id, $pieceNumber, $description, $distributor, $cost)
    {
		$connManager = new ConnectionManager ();
		$conn = $connManager->ConnectToDb ();
        $date = self::GetDate();
        
        $sql = "UPDATE materiel SET PieceNumber = ?, Description = ?, Distributor = ?, Cost = ?, UpdateDate = ? WHERE Id = ?";
		$result = $conn->prepare ($sql);
		$result->execute (array($pieceNumber, $description, $distributor, $cost, $date, $id));
    }
    
    function DeleteMateriel($id)
    {
		$connManager = new ConnectionManager ();
		$conn = $connManager->ConnectToDb ();
        
        $sql = "UPDATE materiel SET isArchived = 1 WHERE Id = ?";
		$result = $conn->prepare ($sql);
		$result->execute (array($id));
    }
    
    function AddDistributor($name, $phone, $address, $contact)
    {
		$connManager = new ConnectionManager ();
		$conn = $connManager->ConnectToDb ();
        $date = self::GetDate();

        $sql = "INSERT INTO distributor VALUES (null,?,?,?,?,?,0)";
		$result = $conn->prepare ($sql);
		$result->execute (array($name, $phone, $address, $contact, $date));
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
    
    function getMateriel()
    {
		$connManager = new ConnectionManager ();
		$conn = $connManager->ConnectToDb ();
		
		$sql = "SELECT m.*, d.Name from materiel m
                INNER JOIN distributor d ON m.Distributor = d.Id";
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
                $distributor->Phone = $row['Phone'];
                $distributor->Address = $row['Address'];
                $distributor->Contact = $row['Contact'];
                $distributor->UpdateDate = $row['UpdateDate'];
                
                $distributors[$distributor->Id] = $distributor;
            }
        }
        
        return $distributors;
    }
    
    function getClient()
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
                $distributor->Phone = $row['Phone'];
                $distributor->Address = $row['Address'];
                $distributor->Contact = $row['Contact'];
                $distributor->UpdateDate = $row['UpdateDate'];
                
                $distributors[$distributor->Id] = $distributor;
            }
        }
        
        return $distributors;
    }
}

class Materiel {
	public $Id;
	public $PieceNumber;
    public $Description;
    public $DistributorId;
    public $DistributorName;
    public $Cost;
    public $UpdateDate;
}

class Distributor {
    public $Id;
	public $Name;
    public $Phone;
    public $Address;
    public $Contact;
    public $UpdateDate;
}

?>
