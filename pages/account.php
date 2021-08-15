<?php
session_start();
require '../config/config.php';
require '../supprimer_film.php';
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
        <meta discription="Cinema, marvel, dc">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Arvo&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../media/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="/allocine/media/assets/css/style.css" media="all">
        <title>AlloCiné</title>
    </head>

    <body>
        <?php require('../includes/header.php'); ?>

        <div class="container-fluid main">
            <div class="row">
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
                        <?php if (isset($_SESSION['id']) && $userInfo['id'] == $_SESSION['id']) { ?>
                            <div class="deconnect">
                                <a href="../deconnexion.php">Se deconnecter</a>
                                <a href="modifprofil.php">Modifier mon profil</a>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="content col-xs-12 col-sm-12 col-md-8 col-lg-11 offset-lg-1">
                    <div class="films">
                        <h2>Mes films préferées</h2>
                        <hr>
                        <form method="POST">
                            <ul class="favorites">
                                <?php $favorites = $bdd->prepare('SELECT * from favorites_films ff LEFT JOIN video v ON v.id=ff.film_id WHERE user_id = ? and confirme = ?');
                                $favorites->execute(array($_SESSION['id'], 1));
                                foreach ($favorites as $favorites) { ?>

                                    <li class="favorites_items"><a href="film_article.php?id=<?= $favorites['id'];?>"><img src="../media/pictures/filmsimage/<?= $favorites['image']; ?>" alt="" class="img-fluid">
                                            <p><?= $favorites['title']; ?></p>
                                        </a>
                                        <a class="del_btn" href="account.php?id=<?= $favorites['id']; ?>">Supprimer</a>
                                    </li>
                        </form>

                    <?php } ?>
                    </ul>

                    </div>
                    <hr>
                    <div class="films">
                        <h2>Mes series préferées</h2>
                        <hr>
                        <form method="POST">
                            <ul class="favorites">
                                <?php $favoriteSerie = $bdd->prepare('SELECT * from favorites_series fs LEFT JOIN video v ON v.id=fs.serie_id WHERE user_id = ? and confirme = ?');
                                $favoriteSerie->execute(array($_SESSION['id'], 1));
                                foreach ($favoriteSerie as $f) { ?>
                                    <li class="favorites_items"><a href="serie_article.php?id=<?= $f['id'];?>"><img src="../media/pictures/filmsimage/<?= $f['image']; ?>" alt="" class="img-fluid">
                                            <p><?= $f['title']; ?></p>
                                        </a>
                                        <a class="del_btn" href="account.php?serie_id=<?= $f['serie_id']; ?>">Supprimer</a>
                                    </li>
                        </form>
                    <?php } ?>
                    </ul>
                    </div>
                    <hr>
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