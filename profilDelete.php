<?php
include 'header.php';
include 'controller/profilDeleteCtrl.php';
?>
<body>
    <div class="container-fluid">
        <div>
            <?php
            if ($isDelete) {
                ?>                          
            <img class="deleteProfilImg" src="assets/img/delete3.png" />
                    <div class="deleteProfil">Compte supprimé avec succés</div>
                    <?php
                } else {
                    ?>
                <div>Error 404</div>
                <?php
            }
            ?>
        </div> 
    </div>
</body>
<?php
include 'footer.php';
?>
</html>
