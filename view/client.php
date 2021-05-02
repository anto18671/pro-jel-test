<?php
session_start ();
include('../include/ValidateAdmin.php');

require_once ("../manager/HomeManager.php");
$manager = new HomeManager ();

$clients = $manager->getClient();
?>


<!DOCTYPE html>
<html>
<?php include('../view/header.php'); ?>

<script type="text/javascript">
    var clients = <?php echo json_encode($clients) ?>;
</script>

<link rel="stylesheet" href="../css/datatable.css" type="text/css" />
<script src="../js/datatable.js" type="text/javascript"></script>

<body class="body_wrap">
    <div class="box_wrap">
        
        <div class="padding"></div>
        <div class="flex_split">
            <h1 class="font20" style="width:100px; display: inline;">Client</h1>
            <label id="add_client_popup_open" class="submit_button right">Ajouter</label>
        </div>
        <div class="padding"></div>
        
        <table id="client_datatable" class="display cell-border" style="width:100%">
            <thead>
                <tr class="front">
                    <th>Name</th>
                    <th>Adresse</th>
                    <th>Ville</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Compte payable</th>
                    <th>Email</th>
                    <th style="width: 60px">Éditer</th>
                    <th style="width: 60px">Effacer</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($clients as $client){?>
                    <tr class="front">
                        <td><?php echo $client->Name ?></td>
                        <td><?php echo $client->Address ?></td>
                        <td><?php echo $client->City ?></td>
                        <td><?php echo $client->Contact ?></td>
                        <td><?php echo $client->Email1 ?></td>
                        <td><?php echo $client->ContactPay ?></td>
                        <td><?php echo $client->Email2 ?></td>
                        <td style="width: 60px"><label class="edit_client_popup_open table_button" data-id="<?php echo $client->Id ?>">Éditer</label></td>
                        <td style="width: 60px"><label class="delete_client_popup_open table_button" data-id="<?php echo $client->Id ?>">Effacer</label></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    
    <div id="add_client_popup_wrap" class="popup_wrap">
        <div class="client_popup">
            
            <h1 class="font20">Ajouter un client</h1>
            <div class="padding"></div>

            <form method="POST" action="../action/HomeController.php" id="add_client_form">
                
                <div class="client_email_wrap">
                    <div>
                        <div class="input_label_wrap">
                            <label class="label_top" for="add_name">Nom</label>
                            <input id="add_name" type="text" name="name"/>
                        </div>

                        <div class="input_label_wrap">
                            <label class="label_top" for="add_address">Adresse</label>
                            <input id="add_address" type="text" name="address"/>
                        </div>

                        <div class="input_label_wrap">
                            <label class="label_top" for="add_city">Ville</label>
                            <input id="add_city" type="text" name="city"/>
                        </div>
                    </div>
                    <div style="padding-left: 16px">
                        <div class="input_label_wrap">
                            <label class="label_top" for="add_noClient">No. Client</label>
                            <input id="add_noClient" type="text" name="noClient"/>
                        </div>

                        <div class="input_label_wrap">
                            <label class="label_top" for="add_telephone1">Téléphone1</label>
                            <input id="add_telephone1" type="text" name="telephone1"/>
                        </div>

                        <div class="input_label_wrap">
                            <label class="label_top" for="add_telephone2">Téléphone2</label>
                            <input id="add_telephone2" type="text" name="telephone2"/>
                        </div>
                    </div>
                </div>
                <div class="client_email_wrap">
                    <div>
                        <div class="input_label_wrap">
                            <label class="label_top" for="add_province">Province</label>
                            <input id="add_province" type="text" name="province"/>
                        </div>
                    </div>
                    <div style="padding-left: 16px">
                        <div class="input_label_wrap">
                            <label class="label_top" for="add_codePostal">Code Postal</label>
                            <input id="add_codePostal" type="text" name="codePostal"/>
                        </div>
                    </div>
                </div>
                <div class="client_email_wrap">
                    <div>
                        <div class="input_label_wrap">
                            <label class="label_top" for="add_pays">Pays</label>
                            <input id="add_pays" type="text" name="pays"/>
                        </div>
                    </div>
                </div>

                <div class="client_email_wrap">
                    <div>
                        <div class="input_label_wrap">
                            <label class="label_top" for="add_contact">Contact</label>
                            <input class="client_contact_input" id="add_contact" type="text" name="contact"/>
                        </div>
                        <div class="input_label_wrap">
                            <label class="label_top">Email</label>
                            <input type="checkbox" id="add_valideEmail1" unchecked="true"/>
                            <input id="add_email1" type="text" name="email1"/>
                        </div>
                    </div>
                    <div style="padding-left: 16px">
                        <div class="input_label_wrap">
                            <label class="label_top" for="add_contactPay">Compte payable</label>
                            <input class="client_contact_input" id="add_contactPay" type="text" name="contactPay"/>
                        </div>
                        <div class="input_label_wrap">
                            <label class="label_top">Email</label>
                            <input type="checkbox" id="add_valideEmail2" unchecked="true"/>
                            <input id="add_email2" type="text" name="email2"/>
                        </div>
                    </div>
                </div>
                <br>
                <div class="client_email_wrap">
                    <div>
                        <div class="input_label_wrap">
                            <label class="label_top" for="add_other1">Autre</label>
                            <input class="client_contact_input" id="add_other1" type="text" name="other1"/>
                        </div>
                        <div class="input_label_wrap">
                            <label class="label_top">Email</label>
                            <input type="checkbox" id="add_valideEmail3" unchecked="true"/>
                            <input id="add_email3" type="text" name="email3"/>
                        </div>
                    </div>
                    <div style="padding-left: 16px">
                        <div class="input_label_wrap">
                            <label class="label_top" for="add_other2">Autre</label>
                            <input class="client_contact_input" id="add_other2" type="text" name="other2"/>
                        </div>
                        <div class="input_label_wrap">
                            <label class="label_top" for="add_email4">Email</label>
                            <input type="checkbox" id="add_valideEmail4" unchecked="true"/>
                            <input id="add_email4" type="text" name="email4"/>
                        </div>
                    </div>
                </div>
                
                <input type="hidden" name="valide_email1" id="add_valide_email_input1"/>
                <input type="hidden" name="valide_email2" id="add_valide_email_input2"/>
                <input type="hidden" name="valide_email3" id="add_valide_email_input3"/>
                <input type="hidden" name="valide_email4" id="add_valide_email_input4"/>
                <input type="hidden" name="task" value="add_client"/>
            </form>
            
            <div class="button_box">
                <label id="add_client_submit" class="submit_button">Ajouter</label>
                <label id="add_cancel_popup" class="submit_button" style="margin-left: 10px;">Annuler</label>
            </div>

            <span class="close_popup" id="add_close_popup">X</span>
        </div>
    </div>
    
    <div id="edit_client_popup_wrap" class="popup_wrap">
        <div class="client_popup">
            
            <h1 class="font20">Éditer le client</h1>
            <div class="padding"></div>

            <form method="POST" action="../action/HomeController.php" id="edit_client_form">
                <div class="client_email_wrap">
                    <div>
                        <div class="input_label_wrap">
                            <label class="label_top" for="edit_name">Nom</label>
                            <input id="edit_name" type="text" name="name"/>
                        </div>

                        <div class="input_label_wrap">
                            <label class="label_top" for="edit_address">Adresse</label>
                            <input id="edit_address" type="text" name="address"/>
                        </div>

                        <div class="input_label_wrap">
                            <label class="label_top" for="edit_city">Ville</label>
                            <input id="edit_city" type="text" name="city"/>
                        </div>
                    </div>
                    <div style="padding-left: 16px">
                        <div class="input_label_wrap">
                            <label class="label_top" for="edit_noClient">No. Client</label>
                            <input id="edit_noClient" type="text" name="noClient"/>
                        </div>

                        <div class="input_label_wrap">
                            <label class="label_top" for="edit_telephone1">Téléphone1</label>
                            <input id="edit_telephone1" type="text" name="telephone1"/>
                        </div>

                        <div class="input_label_wrap">
                            <label class="label_top" for="edit_telephone2">Téléphone2</label>
                            <input id="edit_telephone2" type="text" name="telephone2"/>
                        </div>
                    </div>
                </div>
                <div class="client_email_wrap">
                    <div>
                        <div class="input_label_wrap">
                            <label class="label_top" for="edit_province">Province</label>
                            <input id="edit_province" type="text" name="province"/>
                        </div>
                    </div>
                    <div style="padding-left: 16px">
                        <div class="input_label_wrap">
                            <label class="label_top" for="edit_codePostal">Code Postal</label>
                            <input id="edit_codePostal" type="text" name="codePostal"/>
                        </div>
                    </div>
                </div>
                <div class="client_email_wrap">
                    <div>
                        <div class="input_label_wrap">
                            <label class="label_top" for="edit_pays">Pays</label>
                            <input id="edit_pays" type="text" name="pays"/>
                        </div>
                    </div>
                </div>

                <div class="client_email_wrap">
                    <div>
                        <div class="input_label_wrap">
                            <label class="label_top" for="edit_contact">Contact</label>
                            <input class="client_contact_input" id="edit_contact" type="text" name="contact"/>
                        </div>
                        <div class="input_label_wrap">
                            <label class="label_top">Email</label>
                            <input type="checkbox" id="edit_valideEmail1" unchecked="true"/>
                            <input id="edit_email1" type="text" name="email1"/>
                        </div>
                    </div>
                    <div style="padding-left: 16px">
                        <div class="input_label_wrap">
                            <label class="label_top" for="edit_contactPay">Compte payable</label>
                            <input class="client_contact_input" id="edit_contactPay" type="text" name="contactPay"/>
                        </div>
                        <div class="input_label_wrap">
                            <label class="label_top">Email</label>
                            <input type="checkbox" id="edit_valideEmail2" unchecked="true"/>
                            <input id="edit_email2" type="text" name="email2"/>
                        </div>
                    </div>
                </div>
                <br>
                <div class="client_email_wrap">
                    <div>
                        <div class="input_label_wrap">
                            <label class="label_top" for="edit_other1">Autre</label>
                            <input class="client_contact_input" id="edit_other1" type="text" name="other1"/>
                        </div>
                        <div class="input_label_wrap">
                            <label class="label_top">Email</label>
                            <input type="checkbox" id="edit_valideEmail3" unchecked="true"/>
                            <input id="edit_email3" type="text" name="email3"/>
                        </div>
                    </div>
                    <div style="padding-left: 16px">
                        <div class="input_label_wrap">
                            <label class="label_top" for="edit_other2">Autre</label>
                            <input class="client_contact_input" id="edit_other2" type="text" name="other2"/>
                        </div>
                        <div class="input_label_wrap">
                            <label class="label_top" for="edit_email4">Email</label>
                            <input type="checkbox" id="edit_valideEmail4" unchecked="true"/>
                            <input id="edit_email4" type="text" name="email4"/>
                        </div>
                    </div>
                </div>
                
                <input type="hidden" name="valide_email1" id="edit_valide_email_input1"/>
                <input type="hidden" name="valide_email2" id="edit_valide_email_input2"/>
                <input type="hidden" name="valide_email3" id="edit_valide_email_input3"/>
                <input type="hidden" name="valide_email4" id="edit_valide_email_input4"/>
                <input type="hidden" name="id" id="edit_client_id"/>
                <input type="hidden" name="task" value="edit_client"/>
            </form>
            
            <div class="button_box">
                <label id="edit_client_submit" class="submit_button">Éditer</label>
                <label id="edit_cancel_popup" class="submit_button" style="margin-left: 10px;">Annuler</label>
            </div>

            <span class="close_popup" id="edit_close_popup">X</span>
        </div>
    </div>
    
    <div id="delete_client_popup_wrap" class="popup_wrap">
        <div class="client_popup">
            
            <h1 class="font20">Effacer le client</h1>
            <div class="padding"></div>
            
            <form method="POST" action="../action/HomeController.php" id="delete_client_form">
                <input type="hidden" name="id" id="delete_client_id"/>
                <input type="hidden" name="task" value="delete_client"/>
            </form>
            
            <div class="button_box">
                <label id="delete_client_submit" class="submit_button">Effacer</label>
                <label id="delete_cancel_popup" class="submit_button" style="margin-left: 10px;">Annuler</label>
            </div>

            <span class="close_popup" id="delete_close_popup">X</span>
        </div>
    </div>
    
</body>

</html>
