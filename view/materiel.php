<?php
session_start ();
include('../include/ValidateAdmin.php');

require_once ("../manager/HomeManager.php");
$manager = new HomeManager ();

$materiels = $manager->getMateriel();
$distributors = $manager->getDistributor();
?>


<!DOCTYPE html>
<html>
<?php include('../view/header.php'); ?>

<script type="text/javascript">
    var materiels = <?php echo json_encode($materiels) ?>;
    var distributors = <?php echo json_encode($distributors) ?>;
</script>

<link rel="stylesheet" href="../css/datatable.css" type="text/css" />
<script src="../js/datatable.js" type="text/javascript"></script>

<body class="body_wrap">
    <div class="box_wrap">
        
        <div class="padding"></div>
        <div class="flex_split">
            <h1 class="font20" style="width:100px; display: inline;">Matériel</h1>
            <label id="add_materiel_popup_open" class="submit_button right">Ajouter</label>
        </div>
        <div class="padding"></div>
        
        <table id="materiel_datatable" class="display cell-border" style="width:100%">
            <thead>
                <tr class="front">
                    <th>No. Pièce</th>
                    <th>Description</th>
                    <th>Distributeur</th>
                    <th>Coût</th>
                    <th style="width: 60px">Date</th>
                    <th style="width: 60px">Éditer</th>
                    <th style="width: 60px">Effacer</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($materiels as $materiel){?>
                    <tr class="front">
                        <td><?php echo $materiel->PieceNumber ?></td>
                        <td><?php echo $materiel->Description ?></td>
                        <td><?php echo $materiel->DistributorName ?></td>
                        <td style="width: 120px" class="end"><?php echo $materiel->Cost . " $";?></td>
                        <td style="width: 60px" class="center"><?php echo $materiel->UpdateDate;?></td>
                        <td style="width: 60px"><label class="edit_materiel_popup_open table_button" data-id="<?php echo $materiel->Id ?>" data-distributor="<?php echo $materiel->Id ?>">Éditer</label></td>
                        <td style="width: 60px"><label class="delete_materiel_popup_open table_button" data-id="<?php echo $materiel->Id ?>">Effacer</label></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    
    <div id="add_materiel_popup_wrap" class="popup_wrap">
        <div class="materiel_popup">
            
            <h1 class="font20">Ajouter du matériel</h1>
            <div class="padding"></div>

            <form method="POST" action="../action/HomeController.php" id="add_materiel_form">
                <div class="input_label_wrap">
                    <label class="label_top" for="add_piece_number">No. Pièce</label>
                    <input id="add_piece_number" type="text" name="piece_number"/>
                </div>

                <div class="input_label_wrap">
                    <label class="label_top" for="add_description">Description</label>
                    <input id="add_description" type="text" name="description"/>
                </div>
                
                <div class="input_label_wrap">
                    <label class="label_top" for="add_distributor">Distributeur</label>
                    <select id="add_distributor" name="distributor" style="width: 152px">
                        <option value="0">--</option>
                        <?php foreach($distributors as $distributor){ ?>
                            <option value="<?php echo $distributor->Id ?>"><?php echo $distributor->Name ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="input_label_wrap">
                    <label class="label_top" for="add_cost">Coût</label>
                    <input id="add_cost" type="text" name="cost"/>
                    <p class="dollar_sign">$</p>
                </div>
                
                <input type="hidden" name="task" value="add_materiel"/>
            </form>
            
            <div class="button_box">
                <label id="add_materiel_submit" class="submit_button">Ajouter</label>
                <label id="add_cancel_popup" class="submit_button" style="margin-left: 10px;">Annuler</label>
            </div>

            <span class="close_popup" id="add_close_popup">X</span>
        </div>
    </div>
    
    <div id="edit_materiel_popup_wrap" class="popup_wrap">
        <div class="materiel_popup">
            
            <h1 class="font20">Éditer le matériel</h1>
            <div class="padding"></div>

            <form method="POST" action="../action/HomeController.php" id="edit_materiel_form">
                <div class="input_label_wrap">
                    <label class="label_top" for="edit_piece_number">No. Pièce</label>
                    <input id="edit_piece_number" type="text" name="piece_number"/>
                </div>

                <div class="input_label_wrap">
                    <label class="label_top" for="edit_description">Description</label>
                    <input id="edit_description" type="text" name="description"/>
                </div>

                <div class="input_label_wrap">
                    <label class="label_top" for="edit_distributor">Distributeur</label>
                    <select id="edit_distributor" name="distributor" style="width: 152px">
                        <option style="display: none" value="0">--</option>
                        <?php foreach($distributors as $distributor){ ?>
                            <option value="<?php echo $distributor->Id ?>"><?php echo $distributor->Name ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="input_label_wrap">
                    <label class="label_top" for="add_cost">Coût</label>
                    <input id="edit_cost" type="text" name="cost"/>
                    <p class="dollar_sign">$</p>
                </div>
                
                <input type="hidden" name="id" id="edit_materiel_id"/>
                <input type="hidden" name="task" value="edit_materiel"/>
            </form>

            <div class="button_box">
                <label id="edit_materiel_submit" class="submit_button">Éditer</label>
                <label id="edit_cancel_popup" class="submit_button" style="margin-left: 10px;">Annuler</label>
            </div>
            
            <span class="close_popup" id="edit_close_popup">X</span>
        </div>
    </div>
    
    <div id="delete_materiel_popup_wrap" class="popup_wrap">
        <div class="materiel_popup">
            
            <h1 class="font20">Effacer le matériel</h1>
            <div class="padding"></div>
            
            <form method="POST" action="../action/HomeController.php" id="delete_materiel_form">
                <input type="hidden" name="id" id="delete_materiel_id"/>
                <input type="hidden" name="task" value="delete_materiel"/>
            </form>
            
            <div class="button_box">
                <label id="delete_materiel_submit" class="submit_button">Effacer</label>
                <label id="delete_cancel_popup" class="submit_button" style="margin-left: 10px;">Annuler</label>
            </div>

            <span class="close_popup" id="delete_close_popup">X</span>
        </div>
    </div>
    
</body>

</html>
