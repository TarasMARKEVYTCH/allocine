<?php
// session_start();
require '../config/config.php';
require '../connexion.php';
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
    <link rel="stylesheet" href="../media/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../media/assets/css/style.css">
    <title>AlloCiné</title>
</head>

<body>
    <?php require('../includes/header.php'); ?>

    <div class="container-fluid">
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../media/pictures/filmsimage/lord_of_the_rings.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../media/pictures/filmsimage/Mortal_kombat.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../media/pictures/filmsimage/the_dark_knight.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../media/pictures/filmsimage/gladiator.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>


        <div class="row">
            <div class="articles col-xs-12 col-sm-11 offset-sm-1 col-md-7 col-lg-6">
                <?php
                $film = $bdd->query('SELECT * FROM video WHERE categorie = "film" ORDER BY date_publication DESC');
                foreach ($film as $f) { ?>
                    <div class="card_film">
                        <img src="../media/pictures/filmsimage/<?= $f['image']; ?>" class="img-fluid card_films-img-top " alt="...">
                        <div class="card_films-body">
                            <h5 class="card_films-title my-2"><?= $f['title']; ?></h5>
                            <div class="overflow-hidden">
                                <p class="card_films-text"><?= $f['description']; ?></p>
                            </div>
                            <a href="film_article.php?id=<?= $f['id']; ?>" class="btn btn-outline-info films_btn">Voir plus</a>
                        </div>
                    </div>
                <?php } ?>


            </div>
            <?php require('../includes/aside.php'); ?>



        </div>

    </div>













    <?php require('../includes/footer.php'); ?>




    <script src="/allocine/js/bootstrap.min.js"></script>
    <script src="/allocine/js/index.js"></script>
</body>

</html>