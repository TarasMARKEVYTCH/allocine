<?php
if (isset($_GET['id'])) {
    // $film = $bdd->query('SELECT * from  favorites');
        $req = $bdd->prepare('DELETE FROM favorites_films WHERE user_id = ? and film_id = ?');
        $req->execute(array($_SESSION['id'], $_GET['id']));
   
}