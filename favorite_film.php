<?php
if (isset($_POST['favoris'])) {
    $confirme = $bdd->prepare('SELECT * from favorites_films where user_id = ? and film_id =?');
    $confirme->execute(array($_SESSION['id'], $_GET['id']));
    $confirme = $confirme->fetch();
    // $confirmeVerif = $confirme['confirme'];
    if (!isset($confirme['confirme'])) {
        $req = $bdd->prepare('INSERT INTO favorites_films (user_id, film_id, confirme) VALUES(?, ?, 1)');
        $req->execute(array($_SESSION['id'], $_GET['id']));
    } else {
        $error = 'Ce film est déjà dans vos favoris';
    }
}
