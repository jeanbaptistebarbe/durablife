<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>article</title>
        <!-- Library -->
        <script src="assets/js/jquery-3.3.1.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" href="assets/styleContact.css">
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet"> 
        <!--FavIcon -->
        <link rel="icon" type="image/png" href="assets/img/infinitx.png" />
    </head>
    <body>
        <?php
        include 'header.php';
        ?>
        <div class="container">
            <div class="row col-sm-12 col-md-12 col-xl-12">             
                <select class="selectpicker col-sm-6 col-md-6 col-xl-6">
                    <option value="">Catégories</option>
                    <option value="1">économique</option>
                    <option value="2">écologique</option>
                    <option value="3">économique & écologique</option>
                </select>
                <div class="col-sm-6 col-md-6 col-xl-6">
                    <a href="article_redaction.php" class="btn btn-secondary btn-lg btn-block">Ecrire un article</a>
                </div>
            </div>
        </div>
    </body>
    <?php
    include 'footer.php';
    ?>
</html>
