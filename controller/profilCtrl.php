<?php

$nameRegex = "/^([a-zA-Z'-]+)$/";
$phoneRegex = "/^[0-9]{10}$/";
$name = '';
$firstname = '';
$birthdate = '';
$mail = '';
$phone = '';
$password = '';
//consultation d'un profil 
$isMembers = false;
$members = new members();
if (!empty($_GET['id'])) {
    $members->id = htmlspecialchars($_GET['id']);
    $isMembers = $members->profilMember();
}

//modification du profil
//verifier que le submitModify est bien isset
if (isset($_POST['submitModify'])) {
//On verifie si tout les post sont bien isset (remplis) ou =! de empty.
//Si erreur il y a on les stock dans la variable $formError.
    if (!empty($_POST['name'])) {
        // On preg_match (regex, variable) afin de comparer la variable avec la regex
        if (preg_match($nameRegex, $_POST['name'])) {
            $name = htmlspecialchars($_POST['name']);
        } else {
            $formError['name'] = 'le champs n\'est pas valide';
        }
    } else {
        $formError['name'] = 'le champs est vide';
    }
    if (!empty($_POST['firstname'])) {
        if (preg_match($nameRegex, $_POST['firstname'])) {
            $firstname = htmlspecialchars($_POST['firstname']);
        } else {
            $formError['firstname'] = 'le champs n\'est pas valide';
        }
    } else {
        $formError['firstname'] = 'le champs est vide';
    }
    if (!empty($_POST['birthdate'])) {
        $birthdate = htmlspecialchars($_POST['birthdate']);
    } else {
        $formError['birthdate'] = 'le champs n\'est pas valide';
    }
    if (!empty($_POST['mail'])) {
        if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
            $mail = htmlspecialchars($_POST['mail']);
        } else {
            $formError['mail'] = 'le champs n\'est pas valide';
        }
    } else {
        $formError['mail'] = 'le champs est vide';
    }
    if (!empty($_POST['phone'])) {
        if (preg_match($phoneRegex, $_POST['phone'])) {
            $phone = htmlspecialchars($_POST['phone']);
        } else {
            $formError['phone'] = 'le champs n\'est pas valide';
        }
    } else {
        $formError['phone'] = 'le champs est vide';
    }
    //on verifie si il n'y a pas d'erreur alors on instancie la classe "members".

    if (count($formError) === 0) {

        $members->name = $name;
        $members->firstname = $firstname;
        $members->birthdate = $birthdate;
        $members->mail = $mail;
        $members->phone = $phone;
        $members->profilUpdate();
    }
}
//Changement de mot de passe
$pass = '';
if (isset($_POST['submitPass'])) {
    // il faut verifier qu'ils sont egaux avant de les hacher (sinon ils seront tjs !=)
    if (!empty(($_POST['passwordModify1']) === ($_POST['passwordModify2']))) {
        $pass = password_hash($_POST['passwordModify1'], PASSWORD_BCRYPT);
    } else {
        $formError['passwordModify1'] = 'le champs n\'est pas conforme';
    }
    //On verifie que le pwd1 et le pwd2 sont bien = alors on execute la methode passwordUpdate()
    if (count($formError) === 0) {
        $members->password = $pass;
        $members->passwordUpdate();
    }
}
?>

