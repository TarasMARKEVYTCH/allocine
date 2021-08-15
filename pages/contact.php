<?php
    // session_start();
    require '../config/config.php';
    require '../connexion.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arvo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../media/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../media/assets/css/style.css">
    <title>AlloCiné</title>
</head>

<body>
    <?php require('../includes/header.php'); ?>



    <div class="container-fluid">
        <div class="main_content">
            <div class="container">
                <div class="row_vide"></div>
                <div class="row">

                    <div class="inscription col-xs-12 col-sm-10 offset-sm-1 col-md-7 col-lg-6 offset-lg-2">
                        <div class="contact_title">
                            <h2>Contactez nous: </h2>
                        </div>
                        <form method="POST" action="#">
                            <div class="mb-3 contact_field">
                                <label for="exampleFormControlInput1" class="form-label">Prénom</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Votre Prénom" required>
                            </div>
                            <div class="mb-3 contact_field">
                                <label for="exampleFormControlInput2" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="exampleFormControlInput2" placeholder="Votre email" required>
                            </div>
                            <div class="mb-3 contact_field">
                                <label for="exampleFormControlTextarea1" class="form-label">Laisser votre
                                    message:</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Votre avis est important!" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-outline-info btn-contact">Envoyer</button>
                        </form>
                    </div>
                    <?php require('../includes/aside.php'); ?>
                </div>
            </div>
        </div>

    </div>













    <?php require('../includes/footer.php'); ?>
    <script src="/allocine/js/index.js"></script>
</body>
</html>