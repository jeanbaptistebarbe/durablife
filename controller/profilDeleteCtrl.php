<?php
$isDelete = FALSE;
$members = new members();
$members->id = $_GET['id'];
$isDelete = $members->profilDelete();
?>

