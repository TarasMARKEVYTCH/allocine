<?php
session_start();
require '../config/config.php';
require '../recuperation.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arvo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../media/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../media/assets/css/style.css">
    <title>AlloCiné</title>
</head>

<body>



    <?php require('../includes/header.php'); ?>

    <div class="signup_box container-fluid">

        <div class="container_main">
            <div class="row_vide"></div>
            <div class="row">
                <div class="signup col-xs-12 col-sm-10 offset-sm-1 col-md-6 offset-md-3 col-lg-4 offset-lg-4">
                    <?php if ($section == 'code') { ?>
                        <h1>Recuperation de mot de passe</h1>
                        <form method="POST">
                            <div class="user_info">
                                <input type="text" name="verif_code" required placeholder="Code de confirmation"><span></span>
                            </div>
                            <div class="btn_signup"><input name="valid_code" type="submit" value="Valider"></div>
                        </form>
                    <?php } else if ($section == 'changepass') { ?>
                        <h1>Noveau mot de passe</h1>
                        <form method="POST">
                            <div class="user_info">
                                <input type="password" name="new_pass1" required placeholder="Nouveau password"><span></span>
                            </div>
                            <div class="user_info">
                                <input type="password" name="new_pass2" required placeholder="Confirmez nouveau password"><span></span>
                            </div>

                            <div class="btn_signup"><input name="valid_pass" type="submit" value="Valider"></div>
                        </form>
                    <?php } else { ?>
                        <h1>Recuperation de mot de passe</h1>
                        <form method="POST">
                            <div class="user_info">
                                <input type="email" name="recup_mail" required placeholder="Adresse mail"><span></span>
                            </div>

                            <div class="btn_signup"><input name="recup_valid" type="submit" value="Envoyer"></div>
                        </form>
                    <?php } ?>
                </div>
            </div> <br><br>
            <?php if (isset($error)) {
                echo $error;
            } ?>
        </div>
    </div>

    <?php require('../includes/footer.php'); ?>

    <script src="/allocine/js/bootstrap.min.js"></script>

    <script src="/allocine/js/index.js"></script>
</body>

</html>