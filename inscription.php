<?php
require 'config/config.php';
if (isset($_POST['signup'])) {
    $userName = htmlspecialchars(($_POST['username']));
    $mail = htmlspecialchars($_POST['mail']);
    $pass1 = ($_POST['pass1']);
    $pass2 = ($_POST['pass2']);

    if (!empty($_POST['username']) && !empty($_POST['mail']) && !empty($_POST['pass1']) && !empty($_POST['pass2'])) {
        $usernameLength = strlen($userName);
        if ($usernameLength <= 255) {
            $verifUserName = $bdd->prepare('SELECT * FROM users WHERE username = ?');
            $verifUserName->execute(array($_POST['username']));
            $userNameExist = $verifUserName->rowCount();
            if ($userNameExist == 0) {
                if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                    $verifMail = $bdd->prepare('SELECT * FROM users WHERE mail = ?');
                    $verifMail->execute(array($_POST['mail']));
                    $mailExist = $verifMail->rowCount();
                    if ($mailExist == 0) {
                        if ($pass1 == $pass2) {
                            $hash = password_hash($pass1, PASSWORD_DEFAULT);
                            if (password_verify($pass1, $hash)) {
                                $insertUser = $bdd->prepare('INSERT INTO users (username, mail, password) VALUES (?, ?, ?)');
                                $insertUser->execute(array($userName, $mail, $hash));
                                $error = 'Vous etes inregistrés';
                                header('Location:allocine.php?id=' . $_SESSION['id']);
                            }
                        } else {
                            $error = 'Vos mots de passe ne correspondent pas';
                        }
                    } else {
                        $error = 'Adresse mail déjà utilisée';
                    }
                } else {
                    $error = 'Adresse mail n\'est pas valide';
                }
            } else {
                $error = 'Username deja utilisé';
            }
        } else {
            $error = 'Votre username ne doit pas depasser 255 caractéres';
        }
    } else {
        $error = 'Tous les champs doivent être completées';
    }
}
