    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <!-- Library -->
            <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
            <script src="assets/bootstrap/js/bootstrap.min.js"></script>
            <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
            <!-- CSS -->
            <link rel="stylesheet" type="text/css" href="style.css">
            <link rel="stylesheet" href="assets/styleContact.css">
            <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet"> 
            <!--FavIcon -->
            <link rel="icon" type="image/png" href="assets/img/infinitx.png" />
            <title>contact</title>
        </head>
        <body>
            <?php
            include 'header.php';
            include 'controller/contactCtrl.php';
            ?>
            <div class="backG">
                <div class="container">
                    <h1>Contact</h1>
                    <hr class="underLine">
                    <form method="POST" action="">
                        <div class="row">
                            <div class="col-sm">
                                <p>Votre Prénom</p>
                                <input type="text" name="firstname" placeholder="Prenom" required/>
                                <?= isset($formError['firstname']) ? $formError['firstname'] : '';?>
                            </div>
                            <div class="col-sm">
                                <p>Votre Nom</p>
                                <input type="text" name="lastname" placeholder="Nom" required/>
                                <?= isset($formError['lastname']) ? $formError['lastname'] : '';?>
                            </div>
                            <div class="col-sm">
                                <p>Votre Email</p>
                                <input type="email" name="email" placeholder="Mail" required/>
                                <?= isset($formError['email']) ? $formError['email'] : '';?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm"> 
                                <hr>
                                <div class="centerSizeBox">Votre message (250 caractères):</div>
                                <textarea class="sizeBox" type="text" name="message" maxlength="250"></textarea>
                                <?= isset($formError['message']) ? $formError['message'] : '';?>
                            </div>
                        </div>
                        <hr>
                        <input type="submit" name="submit" value="Valider" class="btn btn-dark"/>
                    </form>
            </div>             
        </div> 
    </body>
    <?php
    include 'footer.php';
    ?>
</html>