<?php
require '../config/config.php';
require '../connexion.php';
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
    <?php if (isset($_GET['search_field']) && !empty($_GET['search_field'])) {
        require '../search_view.php';
    } else { ?>
        <div class="container-fluid main">
            <div class="row">
                <div class="content col-xs-12 col-sm-12 col-md-8 col-lg-7 offset-lg-1">
                    <div class="films">
                        <h2>Nouveaux films</h2>
                        <hr>
                        <ul class="media_list list-inline">
                            <?php $film = $bdd->query('SELECT * FROM video WHERE categorie = "film" ORDER BY date_publication DESC');
                            foreach ($film as $f) { ?>
                                <li class="list-inline-item"><a href="film_article.php?id=<?= $f['id']; ?>"><img src="../media/pictures/filmsimage/<?= $f['image']; ?>" alt="" class="img-fluid">
                                        <p><?= $f['title']; ?></p>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <hr>
                    <div class="series ">
                        <h2>Top series</h2>
                        <hr>
                        <ul class="media_list list-inline">
                            <?php $serie = $bdd->query('SELECT * FROM video WHERE categorie = "serie" ORDER BY date_publication DESC');
                            foreach ($serie as $s) { ?>
                                <li class="list-inline-item"><a href="serie_article.php?id=<?= $s['id']; ?>"><img src="../media/pictures/filmsimage/<?= $s['image']; ?>" alt="" class="img-fluid">
                                        <p><?= $s['title']; ?></p>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <hr>
                </div>
                <?php require('../includes/aside.php'); ?>
            </div>
            <div id="carouselExampleControls" class="carousel slide z-depth-1-half" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../media/pictures/filmsimage/BreakinBad.jpg" class="d-block w-100" alt="BreakinBad">
                    </div>
                    <div class="carousel-item">
                        <img src="../media/pictures/filmsimage/Chernobyl.jpg" class="d-block w-100" alt="Chernobyl">
                    </div>
                    <div class="carousel-item">
                        <img src="../media/pictures/filmsimage/GameofTrone.jpg" class="d-block w-100" alt="GameofTrones">
                    </div>
                    <div class="carousel-item">
                        <img src="../media/pictures/filmsimage/PeakyBlinders.jpg" class="d-block w-100" alt="GameofTrones">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <?php require('../includes/footer.php'); ?>
        <script src="/allocine/js/bootstrap.min.js"></script>
        <script src="../js/index.js"></script>

</body>

</html>
<?php } ?>