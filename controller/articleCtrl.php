<?php

//insertion d'un article dans la db
//On initialise les variables a vide pour éviter les erreurs
$titleRegex = "/^([a-zA-Z' -]+)$/";
$text = '';
$title = '';
//création d'un tableau d'erreur, ou l'on vient stocker les erreurs des != champs 
$formError = array();

//verifier le submit est bien isset
if (isset($_POST['submit'])) {
//On verifie si tout les post sont bien isset (remplis) ou =! de empty.
//Si erreur il y a on les stock dans la variable $formError.
    if (!empty($_SESSION)) {
        if (!empty($_POST['title'])) {
            // On preg_match (regex, variable) afin de comparer la variable avec la regex
            if (preg_match($titleRegex, $_POST['title'])) {
                $title = htmlspecialchars($_POST['title']);
            } else {
                $formError['title'] = '<div class="errorMessage">le champs titre n\'est pas valide</div>';
            }
        } else {
            $formError['title'] = '<div class="errorMessage">le champs est vide</div>';
        }
        if (!empty($_POST['text'])) {
            $text = $_POST['text'];
        } else {
            $formError['text'] = '<div class="errorMessage">le champs n\'est pas valide</div>';
        }
    } else {
        $formError['connexion'] = '<div class="errorMessage">Vous devez vous connecter ou vous inscrire</div>';
    }
//on verifie si il n'y a pas d'erreur alors on hydrate les variables.
    if (count($formError) === 0) {
        $article = new articles();
        $article->title = $title;
        $article->text = $text;
        //Mon phpMyadmin attend un INT donc je transforme mon string en INT grace a la
        //fonction intval()
        $article->id_myd_member = intval($_SESSION['id']); 
        $article->date = date('Y-m-d');
        $article->id_myd_category = 3;
        $article->addArticle();
        
    }
}
?> 