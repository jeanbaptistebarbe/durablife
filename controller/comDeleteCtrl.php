<?php
//supprimer un commentaire

$comments = new comments();
$comments->id = $_GET['id'];
$comments->deleteComment();
?>
