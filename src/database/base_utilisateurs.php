<?php
require_once '../base.php';
require_once BASE_PROJET .'/src/config/pdo.php';

function recupUtilisateur($email): array
{
    $pdo = connexion();
    $id_utilisateur = $pdo->query("SELECT id_utilisateur FROM utilisateur WHERE email_utilisateur like '$email'");
    return $id_utilisateur-> fetchAll(PDO::FETCH_ASSOC);
}
function creerUtilisateur($pseudo,$email,$mdp_hache):array
{
    $pdo = connexion();
    $inscription = $pdo->query("INSERT INTO `utilisateur` (`id_utilisateur`, `pseudo_utilisateur`, `email_utilisateur`, `mdp_utilisateur`) VALUES (NULL, '$pseudo', '$email', '$mdp_hache')");
    // Exécution
    return $inscription -> fetchAll(PDO::FETCH_ASSOC);
}
function verifUtilisateur($email_get):array
{
    $pdo = connexion();
    $recup = $pdo->query("SELECT * FROM `utilisateur` WHERE `email_utilisateur` LIKE '$email_get'");
    // Exécution
    return $recup -> fetchAll(PDO::FETCH_ASSOC);
}

?>
