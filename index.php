<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Durablife</title>
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
        include 'controller/indexCtrl.php';
        ?>
        <div class="container-fluid">
            <!-- Carousel bootstrap -->
            <div class="carouselImg">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="assets/img/flowers.jpg" alt="flower">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="assets/img/eatgood.jpg" alt="eatgood">
                        </div>
                        <div class="carousel-item">
                            <a href="https://fr.wikipedia.org/wiki/Plogging"><img class="d-block w-100" src="assets/img/ploggingcar.png" alt="plogging" ></a>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <!-- Les BOXS -->
            <div class="row">
                <div class="titleHome col-sm-12 col-md-12 col-xl-12">Nos actualités</div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-4 col-xl-4">
                    <div class="twitterBox">
                        <a class="twitter-timeline" data-width="360" data-height="360" href="https://twitter.com/durablife?ref_src=twsrc%5Etfw">Tweets by durablife</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> 
                    </div>
                </div>
                <div class="col-sm-12 col-md-8 col-xl-8">
                    <div>
                        <div class="commentHome">Les derniers commentaires </div>
                        <?php foreach ($commentListLim as $comment) { ?>          
                            <div class="row col-sm-12 col-md-12 col-xl-12 listCom viewArticle"> 
                                <div class="col-sm-12 col-md-12 col-xl-12"><?= $comment->date ?> par <?= $comment->firstname ?> :</div>               
                                <div class="col-sm-12 col-md-12 col-xl-12">" <?= $comment->textComment ?> "
                                </div>               
                            </div>         
                        <?php } ?> 
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="titleHome col-sm-12 col-md-12 col-xl-12">Mieux nous connaître</div>
            </div>
            <div class="row">
                <div class="articleBox col-sm-12 col-md-4 col-xl-4">
                    <p>"Venez échanger vos astuces pour vivre durablement au quotidien. Partageons nos "tips" pour consommer moins et vivre mieux."</p>
                    <ul>
                        <li>Evaluez les Posts</li>
                        <li>Commentez</li>
                        <li>Ajoutez vos "tips"</li>
                    </ul>
                </div>
                <div class="col-sm-12 col-md-8 col-xl-8">
                    <img class="d-block w-100" src="assets/img/dnm.png">
                </div>
            </div>
        </div> 
    </body>
    <?php
    include 'footer.php';
    ?>
</html>

