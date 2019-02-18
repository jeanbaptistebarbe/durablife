<?php
include 'header.php';
include 'controller/registerCtrl.php';
?>
<div class="backG">
    <div class="container">
        <h1>S'inscrire</h1>
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
                    <input type="text" name="name" placeholder="Nom" required/>
                    <?= isset($formError['name']) ? $formError['name'] : '';?>
                </div>
                <div class="col-sm">
                    <p>Votre date de naissance</p>
                    <input type="date" name="birthdate" placeholder="Date de Naissance" required/>             
                    <?= isset($formError['firstname']) ? $formError['firstname'] : '';?>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm">
                    <p>Votre Email</p>
                    <input type="email" name="mail" id="mail" placeholder="Mail" required/>
                    <?= isset($formError['mail']) ? $formError['mail'] : '';?>
                    <div class="mailMessage"></div>
                </div>
                <div class="col-sm">
                    <p>Votre Mot de Passe</p>
                    <input type="password" name="password" placeholder="Mot de Passe" required/>
                    <?= isset($formError['password']) ? $formError['password'] : '';?>
                </div>
                <div class="col-sm">
                    <p>Vérifier votre Mot de Passe</p>
                    <input type="password" name="passwordVerify" placeholder="Vérification Mot de Passe" required/>
                    <?= isset($formError['passwordVerify']) ? $formError['passwordVerify'] : '';?>
                </div>
                <div class="col-sm">
                    <p>Votre numéro de téléphone</p>
                    <input type="tel" name="phone" placeholder="Téléphone" required/>
                    <?= isset($formError['phone']) ? $formError['phone'] : '';?>
                </div>
            </div> 
            <hr>
            <input type="submit" value="Valider" name="submit" class="btn btn-dark"/>
            <hr>
        </form>
    </div>             
</div> 
<script src="assets/js/script.js" type="text/javascript"></script>
</body>
<?php
include 'footer.php';
?>
</html>


