<?php
//On dit que si ils existent, mais ne sont pas remplis, on les charge quand meme
if (!empty($_POST)) {
//On initialise les $_POST dans des variables
    $lastName = htmlspecialchars($_POST['lastName']);
    $firstName = htmlspecialchars($_POST['firstName']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['experience']);
}
//On verifie si tout les post sont bien isset (remplis) 
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
    if (preg_match("/^[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/", ($email))) {
        echo '<div> Votre mail est :' . $email . '.';
    } else {
        echo 'email invalide';
    }
    if ($experience) {
        echo '<div> Votre experience dans l\'informatique est : ' . $message . '</div>';
    } else {
        echo 'Zone de texte invalide';
    }
} else {
    //si les champs ne sont pas remplis ou sont invalides on affiche le form
    ?>
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
            <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ffd684;">
                <a class="navbar-brand" href="index.php"><img src="assets/img/infinitx.png" width="50px"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link tittleNavBar" href="index.php">accueil<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link tittleNavBar" href="contact.php">contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link tittleNavBar" href="articles.php">articles</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link tittleNavBar" href="signup.php" data-toggle="modal" data-target="#modalSign">s'inscrire</a>
                        </li>
                    </ul>
                </div>
                <div  class="tittleNavBar">Durablife</div>
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
            <div class="backG">
                <div class="container">
                    <h1>Contact</h1>
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
                                <p>Votre Email</p>
                                <input type="email" name="email" placeholder="Mail" required/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm"> 
                                <hr>
                                <div class="centerSizeBox">Votre message (250 caractères):</div>
                                <textarea class="sizeBox" type="text" name="message" maxlength="250"></textarea>
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
    </body>
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