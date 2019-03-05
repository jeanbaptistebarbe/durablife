<?php
include 'header.php';
include 'controller/profilCtrl.php';
?>
<body> 
    <?php
    if ($isMembers) {
        ?> 
        <div class="container-fluid">
            <div class="row ">
                <div class="profilFile col-sm-12 col-md-6 col-xl-6 profilInfo">                  
                    <div><img src="assets/img/user2.png" width="15%" /></div> 
                    <div class="titleProfil">Mes informations</div>               
                    <form method="POST" action="profil.php?id=<?= $members->id ?>">
                        <div class="col-12">
                            <div class="profilInfo">Nom : <?= $members->name ?></div>
                            <input type="text" name="name" value="<?= $members->name ?>"/> 
                        </div>
                        <div>
                            <div class="profilInfo">Prenom : <?= $members->firstname ?></div>
                            <input type="text" name="firstname" value="<?= $members->firstname ?>"/>
                        </div>
                        <div class="col-12">
                            <div class="profilInfo">Date de naissance : <?= $members->birthdate ?></div>
                            <input type="date" name="birthdate" value="<?= $members->birthdate ?>"/>
                        </div>
                        <div>
                            <div class="profilInfo">Email : <?= $members->mail ?></div>
                            <input type="text" name="mail" value="<?= $members->mail ?>"/>
                        </div>
                        <div class="col-12">
                            <div class="profilInfo">Téléphone : <?= $members->phone ?></div>
                            <input type="text" name="phone" value="<?= $members->phone ?>"/>
                        </div>
                        <div class="modifPro">
                            <input type="submit" value="Valider" name="submitModify" class="btn btn-dark" />
                        </div>
                    </form>                              
                </div> 
                <div class="cadreCenter profilFile col-sm-12 col-md-6 col-xl-6 profilInfo"> 
                    <div class="cadreModif">
                        <div><img src="assets/img/attention.png" width="10%" /></div>
                        <div>Une fois que vous appuierez sur le bouton "valider" les modifications de votre compte
                            seront effectives! La suppression du compte est irréversible, soyez prudent.
                            <div>   Mieux vaut prévenir que guérir.</div>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="row modifPass justify-content-center">
                <form method="POST" action="">
                    <div class="modifPassTitle">Modifier votre mot de passe</div>
                    <div>Nouveau mot de passe : <input type="password" name="passwordModify1" placeholder="Mot de passe" /></div>
                    <?= isset($formError['passwordModify1']) ? $formError['passwordModify1'] : ''; ?>
                    <div>Confirmer le mot de passe : <input type="password" name="passwordModify2" placeholder="Confirmer le mot de passe" /></div>
                    <?= isset($formError['passwordModify2']) ? $formError['passwordModify2'] : ''; ?>
                    <?= isset($formError['passwordModify']) ? $formError['passwordModify'] : ''; ?>
                    <input type="submit" name="submitPass" class="btn btn-dark" value="Valider" />
                    <hr class="hrPass" />
                </form>
            </div>
        </div>
        <?php
    } else {
        ?>
        <div>Votre profil n'a pas été trouvé!</div>
        <?php
    }
    ?>
    <div class="row">
        <a href="deconnexion.php" class="col-md-6 btn btn-secondary btn-lg ">Se déconnecter</a>
        <a href="profilDelete.php?id=<?= $members->id ?>" class="col-md-6 btn btn-danger btn-lg">Supprimer le compte</a>
    </div>
</body>
<?php
include 'footer.php';
?>
</html>

