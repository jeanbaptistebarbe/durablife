<?php
include 'header.php';
include 'controller/articleReadCtrl.php';
?>
<body>
    <div class="container">
        <hr class="hrArticle">
        <div class="row col-sm-12 col-md-12 col-xl-12 titreReadArticle">
            L'article <?= $articles->title ?> fait le <?= $articles->date ?> <div><?= $note->grade ?><img src="assets/img/star2.png" width="4%" /></div></div> 
        <hr class="hrArticle">
        <!-- le html_entity_decode permet de decoder le htmlspecialchars qui est stocker en db -->
        <div class="row col-sm-12 col-md-12 col-xl-12 listArticles viewArticle"><?= html_entity_decode($articles->text) ?></div>                            
    </div>
    <hr class="hrArticle">
    <div class="row col-md-6 offset-md-3 noteSelect">
        <form method="POST" action="">
            <label for="Séléctionner une note">Séléctionner une note pour cet article</label>
            <select name="note">
                <option name="note" value="5">5</option>
                <option name="note" value="4">4</option>
                <option name="note" value="3">3</option>
                <option name="note" value="2">2</option>
                <option name="note" value="1">1</option>
                <option name="note" value="0">0</option>
            </select>
            <input name="submitNote" type="submit" value="Valider" class="btn btn-secondary" />
        </form>
        <?= isset($formError['note']) ? $formError['note'] : ''; ?>
        <?= isset($formError['comment']) ? $formError['comment'] : ''; ?>
    </div>  
    <?php foreach ($commentList as $comment) { ?>          
        <div class="row col-sm-12 col-md-12 col-xl-12 listCom viewArticle"> 
            <div class="col-sm-12 col-md-12 col-xl-12"><?= $comment->date ?> par <?= $comment->firstname ?> :</div>               
            <div class="col-sm-12 col-md-12 col-xl-12">" <?= $comment->textComment ?> "
            </div>
            <?php
            if (!empty($_SESSION)) {
                if ($_SESSION['id_myd_grade'] == 1) {
                    ?>
                    <a href="comDelete.php?id=<?= $comment->id ?>" class="col-md-12 btn btn-dark btn-lg"><img src="assets/img/deleteIcon.png" width="20px" /></a>
                    <?php
                }
            }
            ?>
        </div>         
    <?php } ?> 
    <div class="row col-md-12 col-sm-12 col-xl-12 noteSelect"> 
        <?= isset($formError['commentDel']) ? $formError['commentDel'] : ''; ?>
        <div class="row col-md-6 offset-md-3">Laisser un commentaire sur cet article
            <form method="POST" action="">
                <div>
                    <input type="text" class="commentResponsive col-md-10 offset-md-2" name="comment" />
                    <input type="submit" value="ok" class="hide" name="submitComment" />

                </div>
            </form>
        </div>
    </div>
    <hr class="hrArticle">
    <a href="articleModify.php?id=<?= $articles->id ?>" class="col-md-12 btn btn-dark btn-lg">Modifier l'article</a>
</body>
<?php
include 'footer.php';
?>
</html>
