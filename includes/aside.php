<?php
// session_start();
// require '../connexion.php';

?>

<aside class="col-xs-12 col-sm-12 col-md-3 offset-md-1 col-lg-3 offset-lg-1 my-5">
    <?php if (!isset($_SESSION['id'])) { ?>
        <div class="login ">
            <form method="POST">
                <p class="h2">LogIn</p>
                <div class="login_field">
                    <input type="text" name="nameuser" autocomplete="username" class="name my-2" placeholder="Your name" required><span></span>
                </div>
                <div class="login_field">
                    <input type="password" name="pass" autocomplete="current-password" class="password my-2" placeholder="Your password" required><span></span>
                    <span><?php if (isset($error)) {
                        echo $error;
                    } ?></span>
                    <button type="submit" name="login" class="btn btn-info my-2 ">LogIn</button>
                </div>
                <div class="remember">
                    <input type="checkbox" name="rememberme" id="remember"><label for="remember">Se souvenir de moi</label>
                </div>



                <span class="links"><a href="/allocine/pages/recuperationview.php">Mot de passe oublié</a></span> |
                <span class="links"><a href="/allocine/pages/signup.php">SignUp</a></span>
            </form>
        </div>
    <?php } else { ?>

        <span class="links"><a href="/allocine/pages/account.php">Mon profil</a></span> |
        <span class="links"><a href="/allocine/deconnexion.php">Se deconnecter</a></span>
        <div class="classement">
            <p class="h2">Notre classement</p>
            <ul class="list-group">
                <li class="list-group-item">Monster Hunter <span>8,7</span></li>
                <li class="list-group-item">Mortal Kombat <span>8,3</span></li>
                <li class="list-group-item">Une affaire de details <span>7,9</span></li>
                <li class="list-group-item">Godzilla vs Kong <span>7,5</span></li>
            </ul>
        </div> <br><br>
        <div class="commentaires">
            <p class="h2">Commentaires plus recentes</p>
            <ul class="list-group">
            <?php $comment = $bdd->query('SELECT comment_text from comments ORDER BY date_publication DESC LIMIT 5');
            foreach($comment as $c){?>
                <li class="list-group-item"><?= $c['comment_text']; ?> </li>
                <?php } ?>
            </ul>
        </div>
    <?php } ?>
</aside>