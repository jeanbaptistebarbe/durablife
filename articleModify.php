<?php
include 'header.php';
include 'controller/articleReadCtrl.php';
?>
<body>
    <form method="POST" action="">
        <div class="row col-sm-12 col-md-12 col-xl-12 titleArticle">
            <?= isset($formError['sessionMember']) ? $formError['sessionMember'] : ''; ?>
        <?= isset($formError['deleteArticle']) ? $formError['deleteArticle'] : ''; ?> 
            <?= isset($formError['connexion']) ? $formError['connexion'] : ''; ?>
            <h1>Titre de l'article</h1>
            <img src="assets/img/fleche.png" alt="fleche" height="55" width="55" /> 
            <input type="text" id="articleTitle" name="title" value="<?= $articles->title ?>" />
            <?= isset($formError['title']) ? $formError['title'] : ''; ?>
        </div>
        <hr class="underLineTitle">
        <div class="row col-sm-12 col-md-12 col-xl-12">
            <h2>Contenu de l'article</h2>
        </div>
        <div class="row col-sm-12 col-md-12 col-xl-12">
            <img src="assets/img/flechedown.png" alt="fleche2" height="65" width="65" />
        </div>  
        <script type="text/javascript">
            $(document).ready(function () {
                $("#article").ckeditor();
            });
        </script>
        <textarea name="text" id="article"></textarea>
        <?= isset($formError['text']) ? $formError['text'] : ''; ?>        
        <input type="submit" name="submit" class="col-md-12 btn btn-dark btn-lg" value="Modifier l'article" />
        <input type="submit" name="delete" class="col-md-12 btn btn-danger btn-lg" value="Supprimer l'article" />
    </form>
</body>
<?php
include 'footer.php';
?>
</html>

