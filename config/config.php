<?php   
    $bdd = new PDO('mysql:host=localhost;dbname=allocine', 'root', 'root');
    if($bdd == false){
        echo 'Une erreur de connection !';
        exit;
    }