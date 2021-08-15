<?php
/*_____________________________________Envoi du code de confirmation_______________________ */
if (isset($_GET['section'])) {
    $section = htmlspecialchars($_GET['section']);
} else {
    $section = "";
}

if (isset($_POST['recup_valid'], $_POST['recup_mail'])) {
    if (!empty($_POST['recup_mail'])) {
        $recupMail = htmlspecialchars($_POST['recup_mail']);
        if (filter_var($recupMail, FILTER_VALIDATE_EMAIL)) {
            $mailExist = $bdd->prepare('SELECT id, username FROM users WHERE mail = ?');
            $mailExist->execute(array($recupMail));
            $mailExistCount = $mailExist->rowCount();
            if ($mailExistCount == 1) {
                $name = $mailExist->fetch();
                $name = $name['username'];
                $_SESSION['recup_mail'] = $recupMail;
                $recupCode = "";
                for ($i = 0; $i < 9; $i++) {
                    $recupCode .= mt_rand(0, 9);
                }

                $mailRecupExist = $bdd->prepare('SELECT id FROM recuperation WHERE mail = ?');
                $mailRecupExist->execute(array($recupMail));
                $mailRecupExist = $mailRecupExist->rowCount();
                if ($mailRecupExist == 1) {
                    $recupMailInsert = $bdd->prepare('UPDATE recuperation SET code = ? WHERE mail = ?');
                    $recupMailInsert->execute(array($recupCode, $recupMail));
                } else {
                    $recupMailInsert = $bdd->prepare('INSERT INTO recuperation (mail, code) VALUES(?, ?)');
                    $recupMailInsert->execute(array($recupMail, $recupCode));
                }

                $header = "MIME-Version: 1.0\r\n";
                $header .= 'From:"mark09.com"<support@pmark09.com>' . "\n";
                $header .= 'Content-Type:text/html; charset="uft-8"' . "\n";
                $header .= 'Content-Transfer-Encoding: 8bit';

                $message =
                    ' <html>
                    <body>
                        <div align="center">
                            <br>
                            <div > Bonjour ' . $name . ' </div> <br>
                            Voici votre code de recuperation : <b>' . $recupCode . '</b>. <br>
                            <br >
                        </div>
                    </body>
                </html>
                ';

                mail("markevych09@gmail.com", "Recuperation de  mot de passe", $message, $header);
                header('Location: recuperationview.php?section=code');
            } else {
                $error = 'Adresse mail n\'est pas enregistrée';
            }
        } else {
            $error = 'Adresse mail invalide';
        }
    } else {
        $error = 'Veuillez entrer votre adresse mail';
    }
}
/*______________________________Confirmation de code___________________*/

if (isset($_POST['valid_code'], $_POST['verif_code'])) {
    if (!empty($_POST['verif_code'])) {
        $verifCode = htmlspecialchars($_POST['verif_code']);
        $reqVerifCode = $bdd->prepare('SELECT id FROM recuperation WHERE mail = ? AND code = ?');
        $reqVerifCode->execute(array($_SESSION['recup_mail'], $verifCode));
        $reqVerifCode = $reqVerifCode->rowCount();
        if ($reqVerifCode == 1) {
            $insertConfirme = $bdd->prepare('UPDATE recuperation SET confirme = 1 WHERE mail = ?');
            $insertConfirme->execute(array($_SESSION['recup_mail']));
            header('Location: recuperationview.php?section=changepass');
        } else {
            $error = 'Code invalide';
        }
    } else {
        $error = 'Entrez votre code de confirmation';
    }
}

/*__________________________________Enregistrement de nouveau mot de passe___________________ */

if (isset($_POST['valid_pass'])) {
    if (isset($_POST['new_pass1'], $_POST['new_pass2']) && !empty($_POST['new_pass1']) && !empty($_POST['new_pass2'])) {
        $verifConfirme = $bdd->prepare('SELECT confirme FROM recuperation WHERE mail = ?');
        $verifConfirme->execute(array($_SESSION['recup_mail']));
        $verifConfirme = $verifConfirme->fetch();
        $verifConfirme = $verifConfirme['confirme'];
        if ($verifConfirme == 1) {
            $newPass1 = $_POST['new_pass1'];
            $newPass2 = $_POST['new_pass2'];
            $newHash = password_hash($newPass1, PASSWORD_DEFAULT);
            if ($newPass1 == $newPass2 && password_verify($newPass1, $newHash)) {

                $insertNewPass = $bdd->prepare('UPDATE users SET password = ? WHERE mail = ?');
                $insertNewPass->execute(array($newHash, $_SESSION['recup_mail']));
                $delConfirme = $bdd->prepare('DELETE FROM recuperation WHERE mail = ?');
                $delConfirme->execute(array($_SESSION['recup_mail']));
                header('Location: allocine.php');
            } else {
                $error = 'Vos mots de passe ne correspondent pas';
            }
        } else {
            $error = 'Veuillez confirmer recuperation de mot de passe';
        }
    } else {
        $error = 'Tous les chapms doivent être remplis';
    }
}
