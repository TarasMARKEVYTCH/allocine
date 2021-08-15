<?php if(isset($_SESSION['id'], $_POST['film_comment_btn'], $_POST['film_comment'])){
    if(!empty($_POST['film_comment'])){
        $comment = htmlspecialchars($_POST['film_comment']);
        $insComment = $bdd->prepare('INSERT INTO comments (id_video, id_user, comment_text) VALUES (?, ?, ?)');
        $insComment->execute(array($_GET['id'], $_SESSION['id'], $comment));
        header('Location: film_article.php?id='.$_GET['id']);
    } else {
       $error = 'Veuillez ecrire votre commentaire';
    }


}

if(isset($_SESSION['id'],  $_POST['serie_comment']) && !empty($_POST['serie_comment'])){
    $comment = htmlspecialchars($_POST['serie_comment']);
    $insComment = $bdd->prepare('INSERT INTO comments (id_video, id_user, comment_text) VALUES (?, ?, ?)');
    $insComment->execute(array($_GET['id'], $_SESSION['id'], $comment));
    header('Location: serie_article.php?id='.$_GET['id']);


}