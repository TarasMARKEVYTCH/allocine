<?php
// session_start();
require '../config/config.php';
require '../connexion.php';
require '../favorite_series.php';
require '../comment.php';
if (isset($_SESSION['id'])) {
?>

    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Arvo&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="/allocine/media/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="/allocine/media/assets/css/style.css">
        <title>AlloCiné</title>
    </head>

    <body>
        <?php require('../includes/header.php'); ?>
        <div class="container-fluid">
            <div class="row">
                <?php
                $article = $bdd->prepare('SELECT * FROM video WHERE categorie = "serie" and id = ?');
                $article->execute(array($_GET['id']));
                $article = $article->fetch();
                if ($article['id'] == $_GET['id']) { ?>
                    <div class="articles col-xs-12 col-sm-11 offset-sm-1 col-md-7 col-lg-6">
                        <form method="POST">
                        <div class="card_film">
                            <img src="../media/pictures/filmsimage/<?= $article['image']; ?>" class="img-fluid card_films-img-top " alt="...">
                            <div class="card_film-body">
                                <h5 class="card_films-title my-2"><?= $article['title']; ?></h5>
                                <div class="overflow-hidden">
                                    <p class="card_films-text"><?= $article['description']; ?></p>
                                </div>
                                <a href="https://www.youtube.com/embed/aRnlU_k4HI8?autoplay=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="btn btn-info films_btn">Regarder teaser</a>
                            </div>
                                <?php
                                if (isset($_SESSION['id'])) { ?>
                                    <input class="favoris_btn" type="submit" name="favoris" value="Ajouter dans favoris">
                                    <span><?php if (isset($error)) {
                                                echo $error;
                                            } ?></span>
                                <?php
                                }
                                ?>
                        </form>

                        </div>
                    </div>
                <?php }
                ?>
                <?php require('../includes/aside.php'); ?>
                <form method="Post">
                    <textarea name="serie_comment" class="comment" cols="50" rows="10"placeholder="Votre commentaire"></textarea><br>
                    <input type="submit" class="comment_btn" name="serie_comment_btn" value="Envoyer">
                </form>
            </div>
            <div class="comments">
            <?php $comment = $bdd->prepare('SELECT * from comments c left join users u on u.id = c.id_user WHERE id_video = ?');
            $comment->execute(array($_GET['id']));
            ?>
            <h2>Commentaires</h2>
            <div class="comments_text">
                <?php foreach ($comment as $c) { ?>
                    <div class="comment_item">
                        <div class="comment_logo"><img src="../media/pictures/avatar/<?= $c['avatar']; ?>" class="img-fluid card_films-img-top " alt="..."></div>
                        <p><?= $c['comment_text']; ?></p>
                    </div>
                    <hr>
                <?php } ?>
            </div>
        </div>
        <?php require('../includes/footer.php'); ?>

        <script src="/allocine/js/bootstrap.min.js"></script>
        <script src="/allocine/js/index.js"></script>
    </body>

    

    </html>
<?php } else {
    header('Location: series.php');
}
