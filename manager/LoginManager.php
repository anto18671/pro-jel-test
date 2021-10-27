<?php
$dir = dirname (__FILE__);
require_once ($dir . '/ConnectionManager.php');

class LoginManager
{
    function GetDate()
	{
		date_default_timezone_set ('America/Montreal');
		return date_create ()->format ('Y-m-d');
	}
    
    function Login($hashUsername, $password)
    {
        $connManager = new ConnectionManager ();
        $conn = $connManager->ConnectToDb ();

        $sql = "SELECT Id, Password, UserName, Email, IsAdmin from usertablebigname WHERE UserNameSha = ? AND isArchived = 0 LIMIT 1";
        $result = $conn->prepare ($sql);
        $result->execute (array($hashUsername));
        
        if ($result != null)
        {
            $row = $result->fetch (PDO::FETCH_ASSOC);
            
            if ($password == $row['Password'])
            {
                ini_set('session.gc_maxlifetime', 7200);
                $_SESSION ['Id'] = $row ['Id'];
                $_SESSION ['UserName'] = $row ['UserName'];
                $_SESSION ['Email'] = $row ['Email'];
                $_SESSION ['IsAdmin'] = $row['IsAdmin'];
                self::setLastConnect($_SESSION ['Id']);
                
                

                echo "<script> window.location.replace('../view/materiel.php') </script>";
            }
            else
            {
                echo "<script> alert('Wrong email or password. Try again.') </script>";
                echo "<script> window.location.replace('../view/login.php') </script>";
            }
            
        }
        else
        {
            echo "<script> alert('Wrong informations. Try again.') </script>";
            echo "<script> window.location.replace('../view/login.php') </script>";
        }
    }
    
    function setLastConnect($id){
        $connManager = new ConnectionManager ();
        $conn = $connManager->ConnectToDb ();
        $date = self::getDate();

        $sql = "UPDATE usertablebigname SET LastConnect = ? WHERE Id = ?";
        $result = $conn->prepare ($sql);
        $result->execute (array($date, $id));
    }
}
?>