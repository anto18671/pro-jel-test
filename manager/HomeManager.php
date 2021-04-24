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

        $sql = "INSERT INTO materiel VALUES (null,?,?,?,?,?)";
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
    
    function getMateriel()
    {
		$connManager = new ConnectionManager ();
		$conn = $connManager->ConnectToDb ();
		
		$sql = "SELECT * from materiel WHERE isArchived = 0";
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
                $materiel->Distributor = $row['Distributor'];
                $materiel->Cost = $row['Cost'];
                $materiel->UpdateDate = $row['UpdateDate'];;
                
                $materiels[$materiel->Id] = $materiel;

            }
        }
        
        return $materiels;
    }
}

class Materiel {
	public $Id;
	public $PieceNumber;
    public $Description;
    public $Distributor;
    public $Cost;
    public $UpdateDate;
}

?>
