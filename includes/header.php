<?php 
require '../searchbar.php';
?>
<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <div class="row">
            <div class="menubar col-xs-12 col-sm-12 col-md-7 offset-md-5 col-lg-5 offset-lg-7 my-2">
                <ul class="list">
                    <li class="list-inline-item"><a href="/allocine/pages/allocine.php">Acceuil</a></li>
                    <li class="list-inline-item"><a href="/allocine/pages/films.php">Films</a></li>
                    <li class="list-inline-item"><a href="/allocine/pages/series.php">Series</a></li>
                    <li class="list-inline-item"><a href="/allocine/pages/contact.php">Contact</a></li>
                </ul>
            </div>
        </div>
        <div class="main_logo"><img src="../img/logo-main-12195cd9d9.svg" alt="">
            <a href="index.php" class="navbar-brand">AlloCiné</a>
        </div>
        <div class="search_form">
            <form method="GET" class="d-flex">
                <input class="form-control mx-2" name="search_field" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-info" name="search_btn" type="submit">Recherche</button>
            </form>
        </div>

    </div>

    <div class="hamburger">
        <span></span>
        <span></span>
        <span></span>
    </div>
</nav>