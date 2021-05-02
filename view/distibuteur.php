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
            <h1 class="font20" style="width:100px; display: inline;">Distributeur</h1>
            <label id="add_distributor_popup_open" class="submit_button right">Ajouter</label>
        </div>
        <div class="padding"></div>
        
        <table id="distributor_datatable" class="display cell-border" style="width:100%">
            <thead>
                <tr class="front">
                    <th>Nom</th>
                    <th>Téléphone</th>
                    <th>Adresse</th>
                    <th>Contact</th>
                    <th style="width: 60px">Éditer</th>
                    <th style="width: 60px">Effacer</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($distributors as $distributor){?>
                    <tr class="front">
                        <td><?php echo $distributor->Name ?></td>
                        <td><?php echo $distributor->Telephone1 ?></td>
                        <td><?php echo $distributor->Address ?></td>
                        <td><?php echo $distributor->Contact ?></td>
                        <td style="width: 60px"><label class="edit_distributor_popup_open table_button" data-id="<?php echo $distributor->Id ?>">Éditer</label></td>
                        <td style="width: 60px"><label class="delete_distributor_popup_open table_button" data-id="<?php echo $distributor->Id ?>">Effacer</label></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    
    <div id="add_distributor_popup_wrap" class="popup_wrap">
        <div class="distributor_popup">
            
            <h1 class="font20">Ajouter un distributeur</h1>
            <div class="padding"></div>

            <form method="POST" action="../action/HomeController.php" id="add_distributor_form">
                <div class="client_email_wrap">
                    <div>
                        <div class="input_label_wrap">
                            <label class="label_top" for="add_noDistributeur">No. Distributeur</label>
                            <input id="add_noDistributeur" type="text" name="noDistributeur"/>
                        </div>
                        <div class="input_label_wrap">
                            <label class="label_top" for="add_name">Nom</label>
                            <input id="add_name" type="text" name="name"/>
                        </div>
                        <div class="input_label_wrap">
                            <label class="label_top" for="add_telephone1">Téléphone1</label>
                            <input id="add_telephone1" type="text" name="telephone1"/>
                        </div>
                        <div class="input_label_wrap">
                            <label class="label_top" for="add_telephone2">Téléphone2</label>
                            <input id="add_telephone2" type="text" name="telephone2"/>
                        </div>
                        <div class="input_label_wrap">
                            <label class="label_top" for="add_contact">Contact</label>
                            <input id="add_contact" type="text" name="contact"/>
                        </div>
                    </div>
                    <div style="padding-left: 16px">
                        <div class="input_label_wrap">
                            <label class="label_top" for="add_address">Adresse</label>
                            <input id="add_address" type="text" name="address"/>
                        </div>
                        <div class="input_label_wrap">
                            <label class="label_top" for="add_ville">Ville</label>
                            <input id="add_ville" type="text" name="ville"/>
                        </div>
                        <div class="input_label_wrap">
                            <label class="label_top" for="add_province">Province</label>
                            <input id="add_province" type="text" name="province"/>
                        </div>
                        <div class="input_label_wrap">
                            <label class="label_top" for="add_codePostal">Code Postal</label>
                            <input id="add_codePostal" type="text" name="codePostal"/>
                        </div>
                        <div class="input_label_wrap">
                            <label class="label_top" for="add_pays">Pays</label>
                            <input id="add_pays" type="text" name="pays"/>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="task" value="add_distributor"/>
            </form>
            
            <div class="button_box">
                <label id="add_distributor_submit" class="submit_button">Ajouter</label>
                <label id="add_cancel_popup" class="submit_button" style="margin-left: 10px;">Annuler</label>
            </div>

            <span class="close_popup" id="add_close_popup">X</span>
        </div>
    </div>
    
    <div id="edit_distributor_popup_wrap" class="popup_wrap">
        <div class="distributor_popup">
            
            <h1 class="font20">Éditer le distributeur</h1>
            <div class="padding"></div>

            <form method="POST" action="../action/HomeController.php" id="edit_distributor_form">
                <div class="client_email_wrap">
                    <div>
                        <div class="input_label_wrap">
                            <label class="label_top" for="edit_noDistributeur">No. Distributeur</label>
                            <input id="edit_noDistributeur" type="text" name="noDistributeur"/>
                        </div>
                        <div class="input_label_wrap">
                            <label class="label_top" for="edit_name">Nom</label>
                            <input id="edit_name" type="text" name="name"/>
                        </div>
                        <div class="input_label_wrap">
                            <label class="label_top" for="edit_telephone1">Téléphone1</label>
                            <input id="edit_telephone1" type="text" name="telephone1"/>
                        </div>
                        <div class="input_label_wrap">
                            <label class="label_top" for="edit_telephone2">Téléphone2</label>
                            <input id="edit_telephone2" type="text" name="telephone2"/>
                        </div>
                        <div class="input_label_wrap">
                            <label class="label_top" for="edit_contact">Contact</label>
                            <input id="edit_contact" type="text" name="contact"/>
                        </div>
                    </div>
                    <div style="padding-left: 16px">
                        <div class="input_label_wrap">
                            <label class="label_top" for="edit_address">Adresse</label>
                            <input id="edit_address" type="text" name="address"/>
                        </div>
                        <div class="input_label_wrap">
                            <label class="label_top" for="edit_ville">Ville</label>
                            <input id="edit_ville" type="text" name="ville"/>
                        </div>
                        <div class="input_label_wrap">
                            <label class="label_top" for="edit_province">Province</label>
                            <input id="edit_province" type="text" name="province"/>
                        </div>
                        <div class="input_label_wrap">
                            <label class="label_top" for="edit_codePostal">Code Postal</label>
                            <input id="edit_codePostal" type="text" name="codePostal"/>
                        </div>
                        <div class="input_label_wrap">
                            <label class="label_top" for="edit_pays">Pays</label>
                            <input id="edit_pays" type="text" name="pays"/>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="id" id="edit_distributor_id"/>
                <input type="hidden" name="task" value="edit_distributor"/>
            </form>
            
            <div class="button_box">
                <label id="edit_distributor_submit" class="submit_button">Éditer</label>
                <label id="edit_cancel_popup" class="submit_button" style="margin-left: 10px;">Annuler</label>
            </div>

            <span class="close_popup" id="edit_close_popup">X</span>
        </div>
    </div>
    
    <div id="delete_distributor_popup_wrap" class="popup_wrap">
        <div class="distributor_popup">
            
            <h1 class="font20">Effacer le distributeur</h1>
            <div class="padding"></div>
            
            <form method="POST" action="../action/HomeController.php" id="delete_distributor_form">
                <input type="hidden" name="id" id="delete_distributor_id"/>
                <input type="hidden" name="task" value="delete_distributor"/>
            </form>
            
            <div class="button_box">
                <label id="delete_distributor_submit" class="submit_button">Effacer</label>
                <label id="delete_cancel_popup" class="submit_button" style="margin-left: 10px;">Annuler</label>
            </div>

            <span class="close_popup" id="delete_close_popup">X</span>
        </div>
    </div>
    
</body>

</html>
