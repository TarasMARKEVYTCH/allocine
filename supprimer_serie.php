<?php
if (isset($_GET['serie_id'])) {
$title = (int)$_GET['title'];
    $req = $bdd->prepare('DELETE FROM favorites_series WHERE user_id = ? and serie_id = ?');
        $req->execute(array($_SESSION['id'], $_GET['id']));
   
}