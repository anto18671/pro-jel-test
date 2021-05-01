<?php
$dir = dirname (__FILE__);
require_once ($dir . '/ConnectionManager.php');

class LoginManager
{
    function Login($username, $password)
    {
        $connManager = new ConnectionManager ();
        $conn = $connManager->ConnectToDb ();

        $sql = "SELECT Id, Password, UserName, Email, IsAdmin from usertablebigname WHERE UserName = ? AND isArchived = 0 LIMIT 1";
        $result = $conn->prepare ($sql);
        $result->execute (array($username));
        
        if ($result != null)
        {
            $row = $result->fetch (PDO::FETCH_ASSOC);
            
            if ($password == $row ['Password'])
            {
                ini_set('session.gc_maxlifetime', 7200);
                $_SESSION ['Id'] = $row ['Id'];
                $_SESSION ['UserName'] = $row ['UserName'];
                $_SESSION ['Email'] = $row ['Email'];
                $_SESSION ['IsAdmin'] = $row['IsAdmin'];            

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
}
?>