<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Durablife</title>
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
    </head>
    <body> 
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ffd684;">
            <a class="navbar-brand" href="index.php"><img src="assets/img/infinitx.png" width="50px"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link titleNavBar" href="index.php">accueil<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link titleNavBar" href="contact.php">contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link titleNavBar" href="articles.php">articles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link titleNavBar" href="signup.php" data-toggle="modal" data-target="#modalSign">s'inscrire</a>
                    </li>
                </ul>
            </div>
            <div  class="titleNavBar">Durablife</div>
        </nav> 
        <!-- Modal -->
        <div class="modal fade" id="modalSign" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">     
                    <div class="modal-body">
                        <?php
//On dit que si ils existent, mais ne sont pas remplis, on les charge quand meme
                        if (!empty($_POST)) {
//On initialise les $_POST dans des variables
                            $dateOfBirth = htmlspecialchars($_POST['dateOfBirth']);
                            $lastName = htmlspecialchars($_POST['lastName']);
                            $firstName = htmlspecialchars($_POST['firstName']);
                            $countryOfBirth = htmlspecialchars($_POST['countryOfBirth']);
                            $nationality = htmlspecialchars($_POST['nationality']);
                            $adresse = htmlspecialchars($_POST['adresse']);
                            $email = htmlspecialchars($_POST['email']);
                            $phone = htmlspecialchars($_POST['phone']);
                            $password = htmlspecialchars($_POST['password']);
                        }
//On verifie si tout les post sont bien isset (remplis) ou =! de empty
                        if (isset($dateOfBirth) && ($lastName) && ($firstName) && ($countryOfBirth) && ($nationality) &&
                                ($adresse) && ($email) && ($poleEmpNumb) && ($phone) && ($diplome) && ($badge) && ($hero) && ($hacks) && ($experience)) {
                            // On preg_match (regex, variable) afin de comparer la variable avec la regex
                            if (preg_match("/^([a-zA-Z' ]+)$/", ($lastName))) {
                                echo '<div> Votre nom est ' . $lastName . '.';
                            } else {
                                echo 'nom invalide';
                            }
                            if (preg_match("/^([a-zA-Z' ]+)$/", ($firstName))) {
                                echo ' Votre prénom est ' . $firstName . '.';
                            } else {
                                echo 'prenom invalide';
                            }
                            if ($dateOfBirth) {
                                echo ' Vous etes né(e) le ' . $dateOfBirth . '.</div>';
                            } else {
                                echo ' Date de naissance invalide ';
                            }
                            if (preg_match("/^([a-zA-Z' ]+)$/", ($countryOfBirth))) {
                                echo '<div> Vous etes né(e) en ' . $countryOfBirth . '.';
                            } else {
                                echo 'pays de naissance invalide';
                            }
                            if (preg_match("/^([a-zA-Z' ]+)$/", ($nationality))) {
                                echo ' Votre nationalité est : ' . $nationality . '.</div>';
                            } else {
                                echo 'nationalité invalide';
                            }
                            if (preg_match("/^[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/", ($email))) {
                                echo '<div> Votre mail est :' . $email . '.';
                            } else {
                                echo 'email invalide';
                            }
                            if (preg_match("/^[0-9]{10}/", ($phone))) {
                                echo ' Votre numero de telephone est : ' . $phone . '.</div>';
                            } else {
                                echo 'Numero de telephone invalide';
                            }
                            if (preg_match("/^([a-zA-Z' ]+)$/", ($password))) {
                                echo ' Votre mot de passe est : ' . $password . '.</div>';
                            } else {
                                echo 'Mot de passe invalide invalide';
                            }
                        } else {
                            //si les champs ne sont pas remplis ou sont invalides on affiche le form
                            ?> 
                            <div class="backG">
                                <div class="container">
                                    <h1>S'inscrire</h1>
                                    <hr class="underLine">
                                    <form method="POST" action="index.php">
                                        <div class="row">
                                            <div class="col-sm">
                                                <p>Votre Prénom</p>
                                                <input type="text" name="firstName" placeholder="Prenom" required/>
                                            </div>
                                            <div class="col-sm">
                                                <p>Votre Nom</p>
                                                <input type="text" name="lastName" placeholder="Nom" required/>
                                            </div>
                                            <div class="col-sm">
                                                <p>Votre date de naissance</p>
                                                <input type="date" name="dateOfBirth" placeholder="Date de Naissance" required/>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm">
                                                <p>Votre pays de naissance</p>
                                                <input type="text" name="countryOfBirth" placeholder="Pays de Naissance" required/>
                                            </div>
                                            <div class="col-sm">
                                                <p>Votre nationalité</p>
                                                <input type="text" name="nationality" placeholder="Nationalité" required/>
                                            </div>
                                            <div class="col-sm">
                                                <p>Votre adresse</p>
                                                <input type="text" name="adresse" placeholder="Adresse" required/>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm">
                                                <p>Votre Email</p>
                                                <input type="email" name="email" placeholder="Mail" required/>
                                            </div>
                                            <div class="col-sm">
                                                <p>Votre Mot de Passe</p>
                                                <input type="password" name="password" placeholder="Mot de Passe" required/>
                                            </div>
                                            <div class="col-sm">
                                                <p>Votre numéro de téléphone</p>
                                                <input type="tel" name="phone" placeholder="Téléphone" required/>
                                            </div>
                                        </div>                       
                                        <hr>
                                        <input type="submit" value="Valider" class="btn btn-dark"/>
                                    </form>
                                    <?=
                                    '<div class="emptyField">remplir les champs vides et/ou invalides!</div>';
                                }
                                ?>
                            </div>             
                        </div>          

                    </div>
                </div>
            </div>
        </div>
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
    <!-- creation du footer -->
    <footer class="pageDown">
        <div class="row">
            <div class="pageDown col-sm-12 col-md-4 col-xl-4">
                <div><img src="assets/img/infinitw.png" alt="logoDurablife" height="50" width="50"></div>
            </div>
        </div>
        <div class="row">
            <div class="pageDown col-sm-12 col-md-4 col-xl-4">
                <div class="">
                    <div>conditions d'utilisations</div>
                    <div>confidentialité</div>
                    <div>cookies</div>
                </div>
            </div>
            <div class="pageDown col-sm-12 col-md-4 col-xl-4">
                <div>derniers articles</div>
                <a href="signup.php" data-toggle="modal" data-target="#modalSign">inscription</a> 
            </div>
            <div class="pageDown col-sm-12 col-md-4 col-xl-4">
                <div class="">Durablife</div>
                <div>A propos</div>
                <a href="contact.php"><div>Nous contacter</div></a>
                <a href="https://twitter.com/durablife"><img src="assets/img/whiteTwitter.png" alt="logoTwitter" height="30" width="30"></a>
            </div>
        </div>
    </div>
    <div class="pageDown placeCopy col-sm-12 col-md-12 col-xl-12">
        <div class="">© 2018-2019 Durablife</div>
        <div>Barbé Jean-Baptiste</div>
    </div>
</div>
</footer>
</html>

