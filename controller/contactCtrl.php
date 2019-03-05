<?php

$lastname = '';
$firstname = '';
$message = '';
$email = '';

if (isset($_POST['submit'])) {
    if (!empty($_POST['firstname'])) {
        $firstname = htmlspecialchars($_POST['firstname']);
    } else {
        $formError['firstname'] = '<div class="errorMessage">le champs prénom n\'est pas valide</div>';
    }
    if (!empty($_POST['lastname'])) {
        $lastname = htmlspecialchars($_POST['lastname']);
    } else {
        $formError['lastname'] = '<div class="errorMessage">le champs nom n\'est pas valide</div>';
    }
    if (!empty($_POST['email'])) {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $email = htmlspecialchars($_POST['email']);
        } else {
            $formError['email'] = '<div class="errorMessage">le champs mail n\'est pas valide</div>';
        }
    } else {
        $formError['email'] = '<div class="errorMessage">le champs mail est vide</div>';
    }
    if (!empty($_POST['message'])) {
        $message = htmlspecialchars($_POST['message']);
    } else {
        $formError['message'] = '<div class="errorMessage">le champs message est vide</div>';
    }
}


if (count($formError) === 0) {
    mail('lamanu02@gmail.com', 'Message', 'Nom : .$lastname./ Prénom : .$firstname./ Mail : .$email./ Message : .$message.', 'Message Durablife');
}


