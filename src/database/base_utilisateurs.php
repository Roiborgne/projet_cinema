<?php
require_once '../base.php';
require_once BASE_PROJET .'/src/config/pdo.php';

$test_utilisateur = $pdo-> prepare('SELECT * FROM utilisateur');
$test_utilisateur -> execute();
$utilisateurs = $test_utilisateur->fetchAll();

foreach ($utilisateurs as $champs_utilisateur) {
    $id_utilisateur [] = $champs_utilisateur ["id_utilisateur"];
    $email_utilisateur [] = $champs_utilisateur ["email_utilisateur"] ;
    $pseudo_utilisateur[] = $champs_utilisateur ["pseudo_utilisateur"] ;
    $mdp_utilisateur [] = $champs_utilisateur ["mdp_utilisateur"] ;
}
?>
