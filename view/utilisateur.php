<?php
session_start ();
include('../include/ValidateAdmin.php');

require_once ("../manager/HomeManager.php");
$manager = new HomeManager ();
$users = $manager->getUser();
?>


<!DOCTYPE html>
<html>
<?php include('../view/header.php'); ?>

<script type="text/javascript">
    var users = <?php echo json_encode($users) ?>;
</script>

<link rel="stylesheet" href="../css/datatable.css" type="text/css" />
<script src="../js/datatable.js" type="text/javascript"></script>
<script src="../js/sha256.js" type="text/javascript"></script>

<body class="body_wrap">
    <div class="box_wrap">
        
        <div class="flex_split">
            <h1 class="font20" style="width:100px; display: inline;">Utilisateur</h1>
            <label id="add_user_popup_open" class="submit_button right">Ajouter</label>
        </div>
        
        <table id="user_datatable" class="display cell-border" style="width:100%">
            <thead>
                <tr class="front">
                    <th>Nom d'utilisateur</th>
                    <th>Email</th>
                    <th style="width: 60px">Date de création</th>
                    <th style="width: 40px">IsAdmin</th>
                    <th style="width: 60px">Éditer</th>
                    <th style="width: 60px">Effacer</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $user){?>
                    <tr class="front">
                        <td><?php echo $user->UserName ?></td>
                        <td><?php echo $user->Email ?></td>
                        <td style="width: 60px" class="center"><?php echo $user->DateCreated ?></td>
                        <td style="width: 40px"><?php echo ($user->IsAdmin ? 'Oui' : 'Non') ?></td>
                        <td style="width: 60px"><label class="edit_user_popup_open table_button" data-id="<?php echo $user->Id ?>">Éditer</label></td>
                        <td style="width: 60px"><label class="delete_user_popup_open table_button" data-id="<?php echo $user->Id ?>">Effacer</label></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    
    <div id="add_user_popup_wrap" class="popup_wrap">
        <div class="user_popup">
            
            <h1 class="font20">Ajouter un utilisateur</h1>
            <div class="padding"></div>

            <form>
                <div class="input_label_wrap">
                    <label class="label_top" for="add_username">Nom d'utilisateur</label>
                    <input id="add_username" type="text" name="username"/>
                </div>
                <div class="input_label_wrap">
                    <label class="label_top" for="add_email">Email</label>
                    <input id="add_email" type="text" name="email"/>
                </div>
                <div class="input_label_wrap">
                    <label class="label_top" for="add_password">Mot de Passe</label>
                    <input id="add_password" type="password" name="password"/>
                </div>
                <div class="input_label_wrap">
                    <label class="label_top" for="add_confirmation">Confirmation</label>
                    <input id="add_confirmation" type="password" name="confirmation"/>
                </div>
                <div class="input_label_wrap">
                    <label class="label_top">Admin</label>
                    <input type="checkbox" id="add_check_admin" unchecked="true"/>
                </div>
            </form>
            
            <div class="button_box">
                <label id="add_user_submit" class="submit_button">Sauvegarder</label>
                <label id="add_cancel_popup" class="submit_button" style="margin-left: 10px;">Annuler</label>
            </div>

            <span class="close_popup" id="add_close_popup">X</span>
        </div>
    </div>
    
    <div id="edit_user_popup_wrap" class="popup_wrap">
        <div class="user_popup">
            
            <h1 class="font20">Éditer l'utilisateur</h1>
            <div class="padding"></div>

            <form method="POST" action="../action/HomeController.php" id="edit_user_form">
                <div class="input_label_wrap">
                    <label class="label_top" for="edit_username">Nom d'utilisateur</label>
                    <input id="edit_username" type="text" name="username"/>
                </div>
                <div class="input_label_wrap">
                    <label class="label_top" for="edit_email">Email</label>
                    <p class="user_email_output" id="edit_email"></p>
                </div>
                <div class="input_label_wrap">
                    <label class="label_top">Admin</label>
                    <input type="checkbox" id="edit_check_admin" unchecked="true"/>
                </div>
                
                <input type="hidden" name="id" id="edit_user_id"/>
                <input type="hidden" name="admin" id="edit_admin"/>
                <input type="hidden" name="task" value="edit_user"/>
            </form>
            
            <div class="button_box">
                <label id="edit_user_submit" class="submit_button">Sauvegarder</label>
                <label id="edit_cancel_popup" class="submit_button" style="margin-left: 10px;">Annuler</label>
            </div>

            <span class="close_popup" id="edit_close_popup">X</span>
        </div>
    </div>
    
    <div id="delete_user_popup_wrap" class="popup_wrap">
        <div class="user_popup">
            
            <h1 class="font20">Effacer un utilisateur</h1>
            <div class="padding"></div>
            
            <form method="POST" action="../action/HomeController.php" id="delete_user_form">
                <input type="hidden" name="id" id="delete_user_id"/>
                <input type="hidden" name="task" value="delete_user"/>
            </form>
            
            <div class="button_box">
                <label id="delete_user_submit" class="submit_button">Effacer</label>
                <label id="delete_cancel_popup" class="submit_button" style="margin-left: 10px;">Annuler</label>
            </div>

            <span class="close_popup" id="delete_close_popup">X</span>
        </div>
    </div>
    
</body>

</html>
