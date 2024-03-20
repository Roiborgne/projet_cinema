<?php
require_once '../base.php';
require_once BASE_PROJET .'/src/config/pdo.php';

function ecupUtilisateur(): array
{
    $pdo = connexion();
    $utilisateur = $pdo->query("SELECT * FROM utilisateur");
    return $utilisateur->fetchAll(PDO::FETCH_ASSOC);
}
?>
