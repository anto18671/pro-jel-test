<?php
session_start ();
include('../include/ValidateAdmin.php');

require_once ("../manager/HomeManager.php");
$manager = new HomeManager ();

$clients = $manager->getClient();
$materiels = $manager->getMateriel2();
?>


<!DOCTYPE html>
<html>
<?php include('../view/header.php'); ?>

<script type="text/javascript">
    var clients = <?php echo json_encode($clients) ?>;
    var materiels = <?php echo json_encode($materiels) ?>;
</script>

<link rel="stylesheet" href="../css/datatable.css" type="text/css" />
<script src="../js/datatable.js" type="text/javascript"></script>
<img src="../images/227604_down_arrow_icon.png" hidden="">
<img src="../images/2561334_up_arrow_icon.png" hidden="">

<body class="body_wrap">
    <div class="box_wrap">
        
        <div class="flex_split">
            <h1 class="font20" style="width:100px; display: inline;">Facture</h1>
        </div>
        
        <form method="POST" action="../action/HomeController.php" id="facture_form">
            
            <div class="border_wrap">
                <div class="input_label_wrapper">
                    <label class="label_top" for="client">Client</label>
                    <select id="client" name="client" style="width: 152px">
                        <option value="0">--</option>
                        <?php foreach($clients as $client){ ?>
                            <option value="<?php echo $client->Id ?>"><?php echo $client->Name ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="input_label_wrapper">
                    <label class="label_top" for="POClient">P.O Client</label>
                    <input id="POClient" type="text" name="POClient"/>
                </div>
                
                <br>
                
                <div class="input_label_wrapper">
                    <label class="label_top" for="conditionVente">Condition de vente</label>
                    <input id="conditionVente" type="text" name="conditionVente"/>
                </div>
                <div class="input_label_wrapper">
                    <label class="label_top" for="note1">Note 1</label>
                    <input id="note1" type="text" name="note1"/>
                </div>
                
                <br>
                
                <div class="input_label_wrapper">
                    <label class="label_top" for="note2">Note 2</label>
                    <input id="note2" type="text" name="note2"/>
                </div>
            </div>
            
            <div class="button_box">
                <label id="add_text" class="submit_button">Texte</label>
                <label id="add_time" style="margin-left: 6px;" class="submit_button">Temps</label>
                <label id="add_materiel" style="margin-left: 6px;" class="submit_button">Matériel</label>
                <label id="add_space" style="margin-left: 6px;" class="submit_button">Espace</label>
            </div>
            <div class="all_task_wrap">
                
            </div>
        </form>
    </div>
</body>
</html>
