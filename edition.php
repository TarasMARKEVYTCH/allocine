<?php
require 'config/config.php';
if (isset($_SESSION['id'])) {
    $reqUser = $bdd->prepare('SELECT * FROM users WHERE id = ?');
    $reqUser->execute(array($_SESSION['id']));
    $user = $reqUser->fetch();

    if (isset($_FILES['avatar']) && !empty($_FILES['avatar']['name'])) {
        $tailleMax = 2097152;
        $extensionValide = array('jpg', 'jpeg', 'gif', 'png');

        if ($_FILES['avatar']['size'] <= $tailleMax) {
            $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
            if (in_array($extensionUpload, $extensionValide)) {
                $path = "../media/pictures/avatar/" . $_SESSION['id'] . "." . $extensionUpload;
                $result = move_uploaded_file($_FILES['avatar']['tmp_name'], $path);
                if ($result) {
                    $insertAvatar = $bdd->prepare('UPDATE users SET avatar = :avatar WHERE id = :id');
                    $insertAvatar->execute(array(
                        'avatar' => $_SESSION['id'] . "." . $extensionUpload,
                        'id' => $_SESSION['id']
                    ));
                    $error = 'Modifications sont enregistrées';
                    header('Location:account.php?id=' . $_SESSION['id']);
                } else {
                    $error = 'Une erreur se produite lors du telechargement';
                }
            } else {
                $error = 'Votre photo doit être en format jpeg, jpg, gif ou png';
            }
        } else {
            $error = 'Votre photo ne doit pas depasser 2Mo';
        }
    }


    if (isset($_POST['newusername']) && !empty($_POST['newusername']) && $_POST['newusername'] != $user['username']) {
        $newUserName = htmlspecialchars($_POST['newusername']);
        $newUserNameLength = strlen($newUserName);
        if ($newUserNameLength <= 255) {
            $reqNewUserName = $bdd->prepare('SELECT * FROM users WHERE username = ?');
            $reqNewUserName->execute(array($newUserName));
            $newUserNameExist = $reqNewUserName->rowCount();
            if ($newUserNameExist == 0) {
                $insertNewUserName = $bdd->prepare('UPDATE users SET username = ? WHERE id = ?');
                $insertNewUserName->execute(array($newUserName, $_SESSION['id']));
                $error = 'Modifications sont enregistrées';
                header('Location:account.php?id=' . $_SESSION['id']);
            } else {
                $error = 'Username déjà utilisé';
            }
        } else {
            $error = 'Username ne peut pas depasser 255 caracteres!';
        }
    }

    if (isset($_POST['newmail1']) && !empty($_POST['newmail1']) && isset($_POST['newmail2'])  && !empty($_POST['newmail2']) && $_POST['newmail1'] != $user['mail'] && $_POST['newmail2'] != $user['mail']) {
        $newMail1 = htmlspecialchars($_POST['newmail1']);
        $newMail2 = htmlspecialchars($_POST['newmail2']);
        if ($newMail1 == $newMail2 && filter_var($newMail1, FILTER_VALIDATE_EMAIL)) {

            $reqNewMail = $bdd->prepare('SELECT * FROM users WHERE mail = ?');
            $reqNewMail->execute(array($newMail1));
            $newMailExist = $reqNewMail->rowCount();
            if ($newMailExist == 0) {
                $insertNewMail = $bdd->prepare('UPDATE users SET mail = ? WHERE id = ?');
                $insertNewMail->execute(array($newMail1, $_SESSION['id']));
                $error = 'Modifications sont enregistrées';
                header('Location:account.php?id=' . $_SESSION['id']);
            } else {
                $error = 'Adresse mail déjà utilisée';
            }
        } else {
            $error = 'Vos mails ne correspondent pas ou ne sont pas valides';
        }
    }


    if (isset($_POST['newpass1'], $_POST['newpass2']) && !empty($_POST['newpass1']) && !empty($_POST['newpass2'])) {
        $newPass1 = $_POST['newpass1'];
        $newPass2 = $_POST['newpass2'];
        if ($newPass1 == $newPass2) {
            $hash = password_hash($newPass1, PASSWORD_DEFAULT);
            if(password_verify($newPass1, $hash)){
                $insertNewPass = $bdd->prepare('UPDATE users SET password = ? WHERE id = ?');
                $insertNewPass->execute(array($hash, $_SESSION['id']));
                $error = 'Modifications sont enregistrées';
                header('Location:account.php?id=' . $_SESSION['id']);
            }
        } else {
            $error = 'Mots de passe ne correspondent pas';
        }
    }
} else {
    header('Location:allocine.php');
}
