<?php

//insertion d'un membre dans la db
//stockage des regex dans des variables
$nameRegex = "/^([a-zA-Z'-]+)$/";
$phoneRegex = "/^[0-9]{10}$/";
//On initialise les variables a vide pour éviter les erreurs
$name = '';
$firstname = '';
$birthdate = '';
$mail = '';
$phone = '';
$password = '';
$isOk = '';
//création d'un tableau d'erreur, ou l'on vient stocker les erreurs des != champs 
$formError = array();

//verifier le submit est bien isset
if (isset($_POST['submit'])) {
//On verifie si tout les post sont bien isset (remplis) ou =! de empty.
//Si erreur il y a on les stock dans la variable $formError.
    if (!empty($_POST['name'])) {
        // On preg_match (regex, variable) afin de comparer la variable avec la regex
        if (preg_match($nameRegex, $_POST['name'])) {
            $name = htmlspecialchars($_POST['name']);
        } else {
            $formError['name'] = '<div>le champs nom n\'est pas valide</div>';
        }
    } else {
        $formError['name'] = '<div>le champs est vide</div>';
    }
    if (!empty($_POST['firstname'])) {
        if (preg_match($nameRegex, $_POST['firstname'])) {
            $firstname = htmlspecialchars($_POST['firstname']);
        } else {
            $formError['firstname'] = '<div>le champs prénom n\'est pas valide</div>';
        }
    } else {
        $formError['firstname'] = '<div>le champs est vide</div>';
    }
    if (!empty($_POST['birthdate'])) {
        $birthdate = htmlspecialchars($_POST['birthdate']);
    } else {
        $formError['birthdate'] = '<div>le champs n\'est pas valide</div>';
    }
    if (!empty($_POST['mail'])) {
        if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
            $mail = htmlspecialchars($_POST['mail']);
        } else {
            $formError['mail'] = '<div>le champs mail n\'est pas valide</div>';
        }
    } else {
        $formError['mail'] = '<div>le champs est vide</div>';
    }
    if (!empty($_POST['phone'])) {
        if (preg_match($phoneRegex, $_POST['phone'])) {
            $phone = htmlspecialchars($_POST['phone']);
        } else {
            $formError['phone'] = '<div>le champs téléphone n\'est pas valide</div>';
        }
    } else {
        $formError['phone'] = '<div>le champs est vide</div>';
    }
    if (!empty($_POST['password']) && !empty($_POST['passwordVerify'])) {
        if ($_POST['password'] == $_POST['passwordVerify']) {
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        } else {
            $formError['password'] = '<div>Les mots de passe ne sont pas identiques</div>';
        }
    } else {
        $formError['password'] = '<div>Veuillez renseigner un mot de passe</div>';
        $formError['passwordVerify'] = '<div>Veuillez confirmer le mot de passe</div>';
    }
//verification si un mail existe 
    $membersMail = new members();
    $membersMail->mail = $mail;
    $countMail = $membersMail->checkMail();

    if ($countMail == 0) {
//on verifie si il n'y a pas d'erreur alors on hydrate les variables.
        if (count($formError) === 0) {
            $members = new members();
            $members->name = $name;
            $members->firstname = $firstname;
            $members->birthdate = $birthdate;
            $members->mail = $mail;
            $members->password = $password;
            $members->phone = $phone;
            $members->addMember();
        }
    }else{
        $formError['mail'] = '<div>Adresse mail invalide</div>';
    }
}
?>