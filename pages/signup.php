<?php
require '../inscription.php';
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

    <div class="signup_box container-fluid">

        <div class="container_main">
            <div class="row_vide"></div>
            <div class="row">
                <div class="signup col-xs-12 col-sm-10 offset-sm-1 col-md-6 offset-md-3 col-lg-4 offset-lg-4">
                    <h1>SignUp</h1>
                    <form method="POST">
                        <div class="user_info">
                            <input type="text" name="username" required placeholder="Username"><span></span>
                        </div>
                        <div class="user_info">
                            <input type="text" name="mail" required placeholder="Email"><span></span>
                        </div>


                        <div class="user_info">
                            <input type="password" name="pass1" required placeholder="Mot de passe"><span></span>
                        </div>
                        <div class="user_info">
                            <input type="password" name="pass2" required placeholder="Confirmer mot de passe"><span></span>
                        </div>

                        <div class="btn_signup"><input name="signup" type="submit" value="SignUp"></div>
                    </form>
                </div>
            </div> <br><br>
            <?php if (isset($error)) {
                echo $error;
            } ?>

        </div>


    </div>










    <?php require('../includes/footer.php'); ?>




























    <script src="/allocine/js/bootstrap.min.js"></script>

    <script src="/allocine/js/index.js"></script>
</body>

</html>