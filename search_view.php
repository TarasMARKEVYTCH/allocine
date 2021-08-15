<div class="container-fluid main">
            <div class="row">
                <div class="content col-xs-12 col-sm-12 col-md-8 col-lg-7 offset-lg-1">
                    <div class="films">
                        <ul class="search_list">
                            <?php foreach ($result as $result) { ?>
                                <li class="search_list_item"><a href="film_article.php?id=<?= $result['id']; ?>"><img src="../media/pictures/filmsimage/<?= $result['image']; ?>" alt="" class="img-fluid">
                                        <div><?= $result['title']; ?></div>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
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