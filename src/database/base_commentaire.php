<?php
function recupCom($id): array
{
    $pdo = connexion();
    $com = $pdo->query("SELECT * FROM commentaire WHERE id_film = '$id'");
    return $com->fetchAll(PDO::FETCH_ASSOC);
}

function ajoutcom ($titre, $avis, $note, $id_utilisateur){
    $pdo = connexion();
    $pdo->query("INSERT INTO `film` (`id_commentaire`, `titre`, `avis`, `notes`, `id_utilisateur`) VALUES (NULL, '$titre', '$avis', '$note', '$id_utilisateur');");
}