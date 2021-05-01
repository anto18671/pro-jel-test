<!DOCTYPE html>
<html>
<?php include('../view/header.php'); ?>
<script src="../js/sha256.js" type="text/javascript"></script>
    <body class="login_body_wrap">
        <div class="login_wrap">
            <div class="input_label_wrap">
                <label class="label_top" for="username">Nom d'utilisateur</label>
                <input type="text" id="username"/>
            </div>
            <div class="input_label_wrap">
                <label class="label_top" for="password">Mot de passe</label>
                <input type="password" id="password"/>
            </div>
            <input type="hidden" name="task" value="login_task"/>
            <form method="POST" action="../action/LoginController.php" id="login_submit_form">
                <input type="hidden" name="task" value="login_task"/>
                <input type="hidden" id="username_output" name="username"/>
                <input type="hidden" id="password_output" name="password"/>
            </form>
            <label id="login_submit" class="submit_button">Se connecter</label>
        </div>
    </body>
</html>
