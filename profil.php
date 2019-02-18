<?php
include 'header.php';
include 'controller/profilCtrl.php';
?>
<body> 
    <?php
    if ($isMembers) {
        ?> 
        <div class="container-fluid">
            <div class="row profilFile">  
                <div class="pictureProfil centerSizeBox"><img src="assets/img/user2.png" width="25%" /></div>
                <div class="titleProfil">Mes informations</div>           
                <div class="col-sm-12 col-md-12 col-xl-12">                   
                </div>
                <div class="col-sm-12 col-md-12 col-xl-12">
                    <p>Nom : <?= $members->name ?></p>
                    <p>Prenom : <?= $members->firstname ?></p>
                    <p>Date de naissance : <?= $members->birthdate ?></p>
                    <p>Email : <?= $members->mail ?></p>
                    <p>Téléphone : <?= $members->phone ?></p>
                </div>    
            </div> 
            <div class="row profilModify"> 
                <div class="pictureProfil centerSizeBox"><img src="assets/img/modify.png" width="25%" /></div>
                <div class="titleProfil">Modifier le profil</div>                  
                <form method="POST" action="profil.php?id=<?= $members->id ?>">
                    <div class="col-12">
                        <input type="text" name="name" placeholder="<?= $members->name ?>" value="<?= $members->name ?>"/>                   
                        <input type="text" name="firstname" placeholder="<?= $members->firstname ?>" value="<?= $members->firstname ?>"/>
                    </div>
                    <div class="col-12">
                        <input type="date" name="birthdate" placeholder="<?= $members->birthdate ?>" value="<?= $members->birthdate ?>"/>
                        <input type="text" name="mail" placeholder="<?= $members->mail ?>" value="<?= $members->mail ?>"/>
                    </div>
                    <div class="col-12">
                        <input type="text" name="phone" placeholder="<?= $members->phone ?>" value="<?= $members->phone ?>"/>
                    </div>
                    <div class="modifPro">
                        <input type="submit" value="Valider" name="submitModify" class="btn btn-dark" />
                    </div>
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
        <a href="profilDelete.php?id=<?= $members->id ?>" class="col-md-6 btn btn-dark btn-lg ">Supprimer le compte</a>
    </div>
</body>
<?php
include 'footer.php';
?>
</html>

