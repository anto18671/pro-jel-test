<?php
	$actual_link = "{$_SERVER['REQUEST_URI']}";
    $version = "?v=0.01";
    $isAdmin = false;
    
    if (!empty($_SESSION['IsAdmin']) && $_SESSION['IsAdmin'] == 1){
        $isAdmin = true;
    }
    
?>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="../css/style.css<?php echo $version;?>" type="text/css" />
    <script src="../js/jquery.js"></script>
    
    <?php if (strpos($actual_link, 'login.php') === false){ ?>
        <link rel="stylesheet" href="../css/jquery-ui.css" type="text/css" />
        <script src="../js/jquery-ui.js"></script>
        <script src="../js/jquery.popupoverlay.js"></script>
        
        <div class="admin_nav_wrap">
            <a href="../view/materiel.php" class="nav_button">Matériel</a>
            <a href="../view/distibuteur.php" class="nav_button">Distributeur</a>
            <a href="../view/client.php" class="nav_button">Client</a>
            <?php if ($isAdmin){ ?>
                <a href="../view/utilisateur.php" class="nav_button">Utilisateur</a>
            <?php } ?>
        </div>

    <?php } ?>

    <?php
        if (strpos($actual_link, 'materiel.php') !== false) {
	        echo '<script src="../js/materiel.js'.$version.'"></script>';
        }
        else if (strpos($actual_link, 'distibuteur.php') !== false) {
	        echo '<script src="../js/distibuteur.js'.$version.'"></script>';
        }
        else if (strpos($actual_link, 'client.php') !== false) {
	        echo '<script src="../js/client.js'.$version.'"></script>';
        }
        else if (strpos($actual_link, 'utilisateur.php') !== false) {
            if($isAdmin){
                echo '<script src="../js/utilisateur.js'.$version.'"></script>';
            }
            else{
                echo "<script> window.location.replace('../view/materiel.php') </script>";
            }
        }
        else if (strpos($actual_link, 'login.php') !== false) {
	        echo '<script src="../js/login.js'.$version.'"></script>';
        }
    ?>
</head>
