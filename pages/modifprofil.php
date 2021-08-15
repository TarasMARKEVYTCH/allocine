<?php
require '../connexion.php';
require '../edition.php';

if (isset($_SESSION['id']) && $_SESSION['id'] > 0) {
    $getId = intval($_SESSION['id']);
    $reqUser = $bdd->prepare('SELECT * FROM users WHERE id = ?');
    $reqUser->execute(array($getId));
    $userInfo = $reqUser->fetch();

?>
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta discription="Cinema, marvel, dc, kino, huina">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Arvo&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../media/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="../media/assets/css/style.css" media="all">
        <title>AlloCiné</title>
    </head>

    <body>
        <?php require('../includes/header.php'); ?>


        <div class="container-fluid">
            <div class="row">
                <div class="main_content">

                    <div class="user col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="user_logo">
                        <?php if (!empty($userInfo['avatar'])) { ?>
                            <img src="../media/pictures/avatar/<?= $userInfo['avatar']; ?>" alt="mylogo">
                        <?php } else { ?>
                            <img src="../img/defaultavatar.jpeg" alt="logouser">
                        <?php } ?>
                        </div>
                        <div class="user_info">
                            <div class="user_name">
                                <h2><?= $userInfo['username']; ?></h2>
                            </div>
                            <div class="user_status">
                                <h4>Amateur</h4>
                            </div>
                            <div class="deconnect">
                                <a href="allocine.php">Se deconnecter</a>
                                <a href="account.php?id=" . <?php $_SESSION['id']; ?>>Mon profil</a>
                            </div>
                        </div>

                    </div>


                    <form class="modif col-xs-12 col-sm-8 offset-sm-1 col-md-6 offset-md-1 col-lg-4 offset-lg-1" method="POST" action="" enctype="multipart/form-data">
                        <label for="avatar">Choisir fichier: </label>
                        <input type="file" id="avatar" name="avatar">
                        <label for="newusername">Nouveau nom utilisateur:</label>
                        <input type="text" id="username" name="newusername" placeholder="Nom utilisateur">
                        <label for="newmail1">Nouvelle adresse mail:</label>
                        <input type="email" id="mail" name="newmail1" placeholder="Adresse mail">
                        <label for="newmail2">Confirmez nouvelle adresse mail:</label>
                        <input type="email" id="mail2" name="newmail2" placeholder="Confirmez adresse mail">
                        <label for="newpass1">Nouveau mot de passe</label>
                        <input type="password" name="newpass1" id="pass" placeholder="Mot de passe">
                        <label for="newpass2">Confirmez nouveau mot de passe</label>
                        <input type="password" name="newpass2" id="pass2" placeholder="Confirmez mot de passe">
                        <?php if (isset($error)) {
                            echo $error;
                        } ?>
                        <div class="buttons">
                            <button class="formbutton" id="valid" type="submit" name="valid">Valider</button>
                            <button class="formbutton" id="reset" type="reset" name="reset">Rejeter</button>
                        </div>
                    </form>


                </div>
            </div>

        </div>




        <?php require('../includes/footer.php'); ?>



        <script src="/allocine/js/bootstrap.min.js"></script>
        <script src="/allocine/js/index.js"></script>

    </body>

    </html>

    <?php
} else {
    header('Location: allocine.php');
}
?>