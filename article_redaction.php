
    <?php
    include 'header.php';
    ?>
    <body>
        
        <form method="POST" action="">
        <div class="row col-sm-12 col-md-12 col-xl-12 titleArticle">
            <h1>Titre de l'article</h1>
            <img src="assets/img/fleche.png" alt="fleche" height="55" width="55" /> 
            <input type="text" id="articleTitle" name="articleTitle" />
        </div>
        <hr class="underLineTitle">
        <div class="row col-sm-12 col-md-12 col-xl-12">
            <h1>Contenu de l'article</h1>
        </div>
        <div class="row col-sm-12 col-md-12 col-xl-12">
            <img src="assets/img/flechedown.png" alt="fleche2" height="65" width="65" />
        </div>  
        <script type="text/javascript">
            $(document).ready(function () {
                $("#article").ckeditor();
            });
        </script>
        <textarea name="article" id="article"></textarea>
        <input type="submit" name="submitArticle" class="btn btn-dark" value="Valider" />
        </form>
        
    </body>
    <?php
    include 'footer.php';
    ?>
</html>