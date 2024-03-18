<?php
require_once "../assets/pdo.php";
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
    $nbr = 0;
    $min = 0;
    $maj = 0;
    $longueur = strlen($mdp);
    for ($i = 0; $i < $longueur; $i++) {
        // On sélectionne une à une chaque lettre
        $lettre = $mdp[$i];
        if (ctype_upper($lettre)){
            $maj = 1;
        }elseif (ctype_lower($lettre)){
            $min = 1;
        }elseif ( ctype_digit($lettre)){
            $nbr = 1;
        }
    }
    if ($maj != 1){
        $erreurs["mdp"] = "Il faut au moins une majucule";
    }elseif ($min != 1){
        $erreurs["mdp"] = "Il faut au moins une minuscule";
    }elseif ($nbr != 1){
        $erreurs["mdp"] = "Il faut au moins un nombre";
    }
    return $erreurs;
}
?>
