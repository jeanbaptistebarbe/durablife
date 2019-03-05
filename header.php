<?php
include 'model/member.php';
include 'model/article.php';
include 'model/note.php';
include 'model/comment.php';
session_start();
$members = new members();
$formError = array();
$mail = '';
$password = '';
//Je n'include pas un ctrl de header car mon header est include deja sur toute les pages
// et 2 ctrl pour une vue est impossible.
if (isset($_POST['submitConnexion'])) {
    if (!empty($_POST['mailConnexion'])) {
        if (filter_var($_POST['mailConnexion'], FILTER_VALIDATE_EMAIL)) {
            $mail = htmlspecialchars($_POST['mailConnexion']);
        } else {
            $formError['mailConnexion'] = 'Le mail n\'est pas valide';
        }
    } else {
        $formError['mailConnexion'] = 'Veuillez renseigner un courriel';
    }
    if (!empty($_POST['passwordConnexion'])) {
        $password = $_POST['passwordConnexion'];
    } else {
        $formError['passwordConnexion'] = 'Veuillez renseigner un mot de passe';
    }
    if (count($formError) == 0) {
        $members->mail = $mail;
        $hash = $members->getHashMember();
        if (is_object($hash)) {
            $isConnect = password_verify($password, $hash->password);
            //l'utilisateur est connecté
            if ($isConnect) {
                $userInfo = $members->getMemberInfo();
                $_SESSION['mailConnexion'] = $members->mail;
                $_SESSION['id'] = $userInfo->id;
                $_SESSION['name'] = $userInfo->name;
                $_SESSION['id_myd_grade'] = $userInfo->id_myd_grade;
                $_SESSION['isConnect'] = true;
                header('Location:index.php');
                exit();
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Durablife</title>
        <!-- Library -->      
        <script src="assets/js/jquery-3.3.1.js"></script>
        <script src="assets/js/script.js" type="text/javascript"></script>
        <script type="text/javascript" src="assets/js/ckeditor/ckeditor.js"></script>
        <script type="text/javascript" src="assets/js/ckeditor/adapters/jquery.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" href="assets/styleContact.css">
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet"> 
        <!--FavIcon -->
        <link rel="icon" type="image/png" href="assets/img/infinitx.png" />
    </head>
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
                <?php
                if (empty($_SESSION)) {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link titleNavBar" href="register.php">s'inscrire</a>
                    </li>
                    <?php
                }
                ?>
                <li class="nav-item">
                    <a class="nav-link titleNavBar" <?php
                    if (!empty($_SESSION)) {
                        ?>
                           href="profil.php?id=<?= $_SESSION['id'] ?>"<?php } else {
                        ?> data-toggle="modal" <?php }
                    ?> data-target="#modalCo"><div class="sessionMail"><img src="assets/img/user.png" width="50px"><?php
                       if (!empty($_SESSION)) {
                           echo $_SESSION['mailConnexion'];
                       }
                       ?></div></a>
                </li>
                <?php
                if(!empty($_SESSION) and $_SESSION['id_myd_grade'] === '1') {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link titleNavBar" href="spaceAdmin.php">admin</a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
        <div  class="titleNavBar">Durablife</div>
    </nav> 

    <!-- Modal Co-->
    <div class="modal fade" id="modalCo" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">     
                <div class="modal-body">
                    <div class="backG">
                        <div class="container">
                            <h1>Connexion</h1>
                            <hr class="underLine">
                            <form method="POST" action="">
                                <div class="row">
                                    <div class="col-sm">
                                        <p>Votre Email</p>
                                        <input type="email" name="mailConnexion" placeholder="Mail" required/>
                                    </div>
                                    <div class="col-sm">
                                        <p>Votre Mot de Passe</p>
                                        <input type="password" name="passwordConnexion" placeholder="Mot de Passe" required/>
                                    </div>
                                </div>                       
                                <hr>
                                <input type="submit" value="Valider" name="submitConnexion" class="btn btn-dark"/>
                            </form>
                        </div>             
                    </div>          
                </div>
            </div>
        </div>
    </div>
