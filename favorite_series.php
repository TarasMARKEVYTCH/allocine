<?php
if (isset($_POST['favoris'])) {
    $confirme = $bdd->prepare('SELECT * from favorites_series where user_id = ? and serie_id =?');
    $confirme->execute(array($_SESSION['id'], $_GET['id']));
    $confirme = $confirme->fetch();
    if (!isset($confirme['confirme'])) {
        $req = $bdd->prepare('INSERT INTO favorites_series (user_id, serie_id, confirme) VALUES(?, ?, 1)');
        $req->execute(array($_SESSION['id'], $_GET['id']));
    } else {
        $error = 'Cette serie est déjà dans vos favoris';
    }
}
