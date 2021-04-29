<?php
session_start ();
header("Content-Type: text/html;charset=utf-8");

if (isset ($_POST ['task']))
{
	switch ($_POST ['task'])
	{
		case decode('login_task') :
			Login ();
			break;
        case 'edit_materiel' :
			EditMateriel ();
			break;
	}
}

function Login()
{
    if (isset($_POST ['username']) && isset($_POST ['password'])) {
		$username = decode($_POST ['username']);
        $password = decode($_POST ['password']);
        
        require_once ("../manager/LoginManager.php");
		$manager = new LoginManager ();
        $manager->Login($username, $password);
    }
}

function decode($encoded) {
    $decoded = "";
    for( $i = 0; $i < strlen($encoded); $i++ ) {
        $b = ord($encoded[$i]);
        $a = $b ^ 20;
        $decoded .= chr($a);
    }
    return $decoded;
}
?>
