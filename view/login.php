<!DOCTYPE html>
<html>
<?php include('../view/header.php'); ?>
    <body class="login_body_wrap">
        <div class="login_wrap">
            <form method="POST" action="../action/LoginController.php" id="login_form">
                <div class="input_label_wrap">
                    <label class="label_top" for="username">Nom d'utilisateur</label>
                    <input type="text" id="username" name="username"/>
                </div>
                <div class="input_label_wrap">
                    <label class="label_top" for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" />
                </div>

                <input type="hidden" name="task" value="login_task"/>
            </form>
            <label id="login_submit" class="submit_button">Se connecter</label>
        </div>
    </body>
</html>
