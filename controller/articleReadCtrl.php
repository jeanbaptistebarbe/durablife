<?php

$articles = new articles();
if (!empty($_GET['id'])) {
    $articles->id = htmlspecialchars($_GET['id']);
    $articles->articleRead();

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
                    $formError['title'] = '<div class="errorMessage">Le champs titre n\'est pas valide</div>';
                }
            } else {
                $formError['title'] = '<div class="errorMessage">Le champs est vide</div>';
            }
            if (!empty($_POST['text'])) {
                $text = htmlspecialchars($_POST['text']);
            } else {
                $formError['text'] = '<div class="errorMessage">Le champs n\'est pas valide</div>';
            }
        } else {
            $formError['connexion'] = '<div class="errorMessage">Vous devez vous connecter ou vous inscrire</div>';
        }

//on verifie que l'id de session actif est bien = a l'id du membre qui a publier l'article 
        if ($articles->id_myd_member == $_SESSION['id']) {
            //on verifie si il n'y a pas d'erreur alors on hydrate les variables.
            if (count($formError) === 0) {
                $articles->text = $text;
                $articles->title = $title;
                $articles->date = date('Y-m-d');
                $articles->ArticleUpdate();
            }
        } else {
            $formError['sessionMember'] = '<div class="errorMessage">Vous ne pouvez pas modifier un article que vous n\'avez pas écrit</div>';
        }
    }
}
if (isset($_POST['delete'])) {
    if ($articles->id_myd_member == $_SESSION['id']) {
        //on verifie si il n'y a pas d'erreur alors on hydrate les variables.
        if (count($formError) === 0) {
            $articles->deleteArticle();
            header('Location: articleDelete.php');
        }
    } else {
        $formError['deleteArticle'] = '<div class="errorMessage">Vous ne pouvez pas supprimer un article que vous n\'avez pas écrit</div>';
    }
}
//On va chercher la methode addNote() afin de noter un article

if (isset($_POST['submitNote'])) {
    if (!empty($_SESSION)) {
        $grade = htmlspecialchars(intval($_POST['note']));
        if (count($formError) === 0) {
            $note = new notes();
            $note->grade = $grade;
            $note->id_myd_member = $_SESSION['id'];
            $note->id_myd_article = $_GET['id'];
            $note->addNote();
        }
    } else {
        $formError['note'] = '<div class="errorMessage">Vous devez vous connecter pour noter un article</div>';
    }
}

//verification de la note
if (!empty($_GET['id'])) {
    $note = new notes();
    $note->id_myd_article = $_GET['id'];
    $note->getNote();
}

//verification du commentaire
if (isset($_POST['submitComment'])) {
    if (!empty($_POST['comment'])) {
        $text = htmlspecialchars($_POST['comment']);
    } else {
        $formError['comment'] = '<div class="errorMessage">Le champs n\'est pas valide</div>';
    }
    if (!empty($_GET['id'])) {
        if (!empty($_SESSION)) {
            if (count($formError) === 0) {
                $comment = new comments();
                $comment->text = $text;
                $comment->id_myd_article = $_GET['id'];
                $comment->id_myd_member = $_SESSION['id'];
                $comment->date = date('Y-m-d');
                $comment->addComment();
            }
        } else {
            $formError['comment'] = '<div class="errorMessage">Vous devez vous connecter pour commenter un article</div>';
        }
    }
}
// lister les commentaires 
$comments = new comments();
$comments->id_myd_article = $articles->id;
$commentList = $comments->getCommentList();

?>

