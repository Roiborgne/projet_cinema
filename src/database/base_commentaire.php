<?php
function recupCom($id): array
{
    $pdo = connexion();
    $com = $pdo->query("SELECT * FROM commentaire WHERE id_film = '$id'");
    return $com->fetchAll(PDO::FETCH_ASSOC);
}