<?php
session_start();
require 'config/config.php';

if (isset($_POST['login'])) {
    $nameConnect = htmlspecialchars($_POST['nameuser']);
    $passConnect = $_POST['pass'];
    if (!empty($nameConnect) && !empty($passConnect)) {
        $verifName = $bdd->prepare('SELECT * FROM users WHERE username = ?');
        $verifName->execute(array(($nameConnect)));
        $nameExist = $verifName->rowCount();
        if ($nameExist == 1) {
            $user = $verifName->fetch();

            if (password_verify($passConnect, $user['password'])) {
                $passConnect = password_hash($_POST['pass'], PASSWORD_DEFAULT);
                if (isset($_POST['rememberme'])) {

                    setcookie('name', $nameConnect, time() + 365 * 24 * 3600, null, null, false, true);
                    setcookie('password', $passConnect, time() + 365 * 24 * 3600, null, null, false, true);
                }
                $_SESSION['id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['mail'] = $user['mail'];
                header('Location:account.php?id=' . $_SESSION['id']);
            } else {
                $error = 'Mauvaise mot de passe ou username';
            }
        } else {
            $error = 'Mauvaise mot de passe ou username';
        }
    } else {
        $error = 'Tous les champs doivent êtres remplis';
    }
}
