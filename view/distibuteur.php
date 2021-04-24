<?php
session_start ();
include('../include/ValidateAdmin.php');

require_once ("../manager/HomeManager.php");
$manager = new HomeManager ();

$distributors = $manager->getDistributor();
?>


<!DOCTYPE html>
<html>
<?php include('../view/header.php'); ?>

<script type="text/javascript">
    var distributors = <?php echo json_encode($distributors) ?>;
</script>

<link rel="stylesheet" href="../css/datatable.css" type="text/css" />
<script src="../js/datatable.js" type="text/javascript"></script>

<body class="body_wrap">
    <div class="box_wrap">
        
        <div class="padding"></div>
        <div class="flex_split">
            <h1 class="font20" style="width:100px; display: inline;">Matériel</h1>
            <label id="add_distributor_popup_open" class="submit_button right">Ajouter</label>
        </div>
        <div class="padding"></div>
        
        <table id="material_datatable" class="display cell-border" style="width:100%">
            <thead>
                <tr class="front">
                    <th>Nom</th>
                    <th>Téléphone</th>
                    <th>Adresse</th>
                    <th>Date</th>
                    <th style="width: 60px">Éditer</th>
                    <th style="width: 60px">Effacer</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($distributors as $distributor){?>
                    <tr class="front">
                        <td><?php echo $distributor->Name ?></td>
                        <td><?php echo $distributor->Phone ?></td>
                        <td><?php echo $distributor->Address ?></td>
                        <td style="width: 60px" class="center"><?php echo $distributor->UpdateDate;?></td>
                        <td style="width: 60px"><label class="edit_distributor_popup_open table_button" data-id="<?php echo $distributor->Id ?>">Éditer</label></td>
                        <td style="width: 60px"><label class="delete_distributor_popup_open table_button" data-id="<?php echo $distributor->Id ?>">Effacer</label></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    
    <div id="add_distributor_popup_wrap" class="popup_wrap">
        <div class="distributor_popup">
            
            <h1 class="font20">Ajouter du matériel</h1>
            <div class="padding"></div>

            <form method="POST" action="../action/HomeController.php" id="add_distributor_form">
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
                    <input id="add_distributor" type="text" name="distributor"/>
                </div>

                <div class="input_label_wrap">
                    <label class="label_top" for="add_cost">Coût</label>
                    <input id="add_cost" type="text" name="cost"/>
                    <p class="dollar_sign">$</p>
                </div>
                
                <div class="button_box">
                    <label id="add_distributor_submit" class="submit_button">Ajouter</label>
                    <label id="add_cancel_popup" class="submit_button" style="margin-left: 10px;">Annuler</label>
                </div>
                
                <input type="hidden" name="task" value="add_distributor"/>
            </form>

            <span class="close_popup" id="add_close_popup">X</span>
        </div>
    </div>
    
    <div id="edit_distributor_popup_wrap" class="popup_wrap">
        <div class="distributor_popup">
            
            <h1 class="font20">Éditer le matériel</h1>
            <div class="padding"></div>

            <form method="POST" action="../action/HomeController.php" id="edit_distributor_form">
                <div class="input_label_wrap">
                    <label class="label_top" for="add_piece_number">No. Pièce</label>
                    <input id="edit_piece_number" type="text" name="piece_number"/>
                </div>

                <div class="input_label_wrap">
                    <label class="label_top" for="add_description">Description</label>
                    <input id="edit_description" type="text" name="description"/>
                </div>

                <div class="input_label_wrap">
                    <label class="label_top" for="add_distributor">Distributeur</label>
                    <input id="edit_distributor" type="text" name="distributor"/>
                </div>

                <div class="input_label_wrap">
                    <label class="label_top" for="add_cost">Coût</label>
                    <input id="edit_cost" type="text" name="cost"/>
                    <p class="dollar_sign">$</p>
                </div>
                
                <div class="button_box">
                    <label id="edit_distributor_submit" class="submit_button">Éditer</label>
                    <label id="edit_cancel_popup" class="submit_button" style="margin-left: 10px;">Annuler</label>
                </div>
                
                <input type="hidden" name="id" id="edit_material_id"/>
                <input type="hidden" name="task" value="edit_distributor"/>
            </form>

            <span class="close_popup" id="edit_close_popup">X</span>
        </div>
    </div>
    
    <div id="delete_distributor_popup_wrap" class="popup_wrap">
        <div class="distributor_popup">
            
            <h1 class="font20">Effacer le matériel</h1>
            <div class="padding"></div>
            
            <form method="POST" action="../action/HomeController.php" id="delete_distributor_form">
                <div class="button_box">
                    <label id="delete_distributor_submit" class="submit_button">Effacer</label>
                    <label id="delete_cancel_popup" class="submit_button" style="margin-left: 10px;">Annuler</label>
                </div>
                
                <input type="hidden" name="id" id="delete_material_id"/>
                <input type="hidden" name="task" value="delete_distributor"/>
            </form>

            <span class="close_popup" id="delete_close_popup">X</span>
        </div>
    </div>
    
</body>

</html>