<?php
require_once '../base.php';
require_once BASE_PROJET .'/src/_partials/header.php';
require_once BASE_PROJET .'/src/database/base_films.php';
require_once BASE_PROJET .'/src/database/base_utilisateurs.php';
?>


<?php function pagination() {
    $debut = 0;
    return $debut;
    ?>
<?php }?>


<?php
function verif_email($email, $mysqlClient ){
    $verif_email = $mysqlClient->prepare("SELECT COUNT(*) AS 'valeur' FROM utilisateur WHERE email_utilisateur = '$email' ");
    $verif_email->execute();
    $test_emails = $verif_email->fetch();
    return($test_emails["valeur"]);
}

function testmdp($mdp,$erreurs){
    $nbr = false;
    $min = false;
    $maj = false;
    $caract = false;
    $longueur_mdp = false;
    $longueur = strlen($mdp);
    for ($i = 0; $i < $longueur; $i++) {
        // On sélectionne une à une chaque lettre
        $lettre = $mdp[$i];
        if (ctype_upper($lettre)){
            $maj = true;
        }elseif (ctype_lower($lettre)){
            $min = true;
        }elseif ( ctype_digit($lettre)){
            $nbr = true;
        }elseif ( !ctype_alnum($lettre)){
            $caract = true;
        }elseif (strlen($mdp) < 8 or strlen($mdp) > 14) {
            $longueur_mdp = true;
        }

    }
    if (!$maj){
        $erreurs["mdp"] = "Il faut au moins une majuscule";
    }elseif (!$min){
        $erreurs["mdp"] = "Il faut au moins une minuscule";
    }elseif (!$nbr){
        $erreurs["mdp"] = "Il faut au moins un nombre";
    }elseif (!$caract){
        $erreurs["mdp"] = "Il faut au moins un caractère spécial";
    }elseif ($longueur_mdp){
        $erreurs["mdp"] = "Le mot de passe doit contenir entre 8 et 14 caractères";
    }

    return $erreurs;
}

function dateFormat ($details): array
{
    $dateExplode = explode("-",$details["date"]);
    $date["année"] = $dateExplode[0];
    $date["mois"] = $dateExplode[1];
    $date["jour"] = $dateExplode[2];
    return $date;
}

function interdit ():void
{?>
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <title>Cinemathèque</title>
</head>
<body>
    <div class="container">
        <p class="text-warning text-center fs-1 pt-5 mt-5">ERREUR 403 <br> <span class="text-primary fst-italic fs-5">accès interdit</span></p>
    </div>
</body>

<?php
}
?>
