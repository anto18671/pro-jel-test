<?php
	$actual_link = "{$_SERVER['REQUEST_URI']}";
    $version = "?v=0.01";
?>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="../css/jquery-ui.css" type="text/css" />
    <script src="../js/jquery.js"></script>
    <script src="../js/jquery-ui.js"></script>
    <script src="../js/jquery.popupoverlay.js"></script>
    <link rel="stylesheet" href="../css/style.css<?php echo $version;?>" type="text/css" />

    <?php
        if (strpos($actual_link, 'materiel.php') !== false) {
	        echo '<script src="../js/materiel.js'.$version.'"></script>';
        }
    ?>
    
    <div class="admin_nav_wrap">
        <a href="../view/materiel.php" class="nav_button">Matériel</a>
        <a href="../view/materiel.php" class="nav_button">Distributeur</a>
        <a href="../view/materiel.php" class="nav_button">Utilisateur</a>
    </div>

</head>
