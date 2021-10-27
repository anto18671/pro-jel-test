<?php
session_start ();
include('../include/ValidateAdmin.php');

require_once ("../manager/HomeManager.php");
$manager = new HomeManager ();

$factures = $manager->getFacture();
?>


<!DOCTYPE html>
<html>
<?php include('../view/header.php'); ?>

<script type="text/javascript">
    
</script>

<link rel="stylesheet" href="../css/datatable.css" type="text/css" />
<script src="../js/datatable.js" type="text/javascript"></script>

<body class="body_wrap">
    <div class="box_wrap">
        
        <div class="flex_split">
            <h1 class="font20" style="width:200px; display: inline;">Liste de facture</h1>
            <a id="add_facture_popup_open" class="submit_button right" href="../view/facture_add.php" >Ajouter</a>
        </div>
        
        <table id="facture_datatable" class="display cell-border" style="width:100%">
            <thead>
                <tr class="front">
                    <th># facture</th>
                    <th>Date</th>
                    <th>Client</th>
                    <th style="width: 60px">Afficher</th>
                    <th style="width: 60px">Éditer</th>
                    <th style="width: 60px">Effacer</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($factures as $facture){?>
                    <tr class="front">
                        <td><?php echo $facture->Id ?></td>
                        <td><?php echo $facture->Date ?></td>
                        <td><?php echo $facture->ClientName ?></td>
                        <td style="width: 60px"><a class="table_button" data-id="<?php echo $facture->Id ?>">Afficher</label></td>
                        <td style="width: 60px"><a class="table_button" href="../view/facture_edit.php?factureId=<?php echo $facture->Id ?>">Éditer</label></td>
                        <td style="width: 60px"><label class="table_button" data-id="<?php echo $facture->Id ?>">Effacer</label></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
