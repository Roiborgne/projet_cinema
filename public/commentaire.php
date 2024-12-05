<?php

require_once '../base.php';
require_once BASE_PROJET .'/src/_partials/header.php';
require_once BASE_PROJET .'/src/database/base_utilisateurs.php';
require_once BASE_PROJET .'/src/database/base_films.php';
require_once BASE_PROJET .'/src/database/base_commentaire.php';

head();

if (!isset($_SESSION["utilisateur"])){
    header(header:"Location: ./index.php");
}else{
    $pdo=connexion();

    $email = $_SESSION["utilisateur"]["email"];

    $titre = "";
    $note = "";
    $avis = "";
    $date = "";
    $pays = "";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
//Le formulaire est soumis !
//Traiter les données du formulaire
//Récuperer les valeurs saisis de l'utilisateur
//superglobale $_POST : tableaux assoc
        $titre = $_POST ["titre"];
        $avis = $_POST ["avis"];
        $note = $_POST ["note"];

//Validification des données
        $erreurs = [];
//email
        if (empty($titre)) {
            $erreurs["titre"] = "Le titre est obligatoire";

        }if (empty($avis)) {
            $erreurs["avis"] = "La durée est obligatoire";

            //mdp
        }if (empty($note)) {
            $erreurs["note"] = "Le résumé est obligatoire";

        }

//Traiter les données
        if (empty($erreurs)) {
            //fonction insérer dans film
            $id_utilisateur = recupUtilisateur($email);
            $id_utilisateur = $id_utilisateur["id_utilisateur"];
            ajoutcom($titre, $avis, $note, $id_utilisateur);
        }
    }
    ?>

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
        <h1 class="text-center text-primary text-bg-secondary mt-3">Ajoutez un films</h1>
        <form action="" method="post" class="w-50 mx-auto p-4 my-5 shadow bg-dark">

            <div class="mb-3">
                <label class="form-label" for="titre">Titre*</label>
                <input
                    type="text"
                    class="form-control <?php if(isset($erreurs["titre"])) echo("border border-danger border-3")?>"
                    id="titre"
                    name="titre"
                >

                <?php if (isset($erreurs["titres"])): ?>
                    <p class="form-text text-danger"><?php echo($erreurs["titre"]) ?></p>
                <?php endif; ?>
            </div>


            <div class="mb-3">
                <label class="form-label" for="avis">Avis</label>
                <input
                    type="text"
                    class="form-control <?php if(isset($erreurs["avis"])) echo("border border-danger border-3")?>"
                    id="avis"
                    name="avis"
                >

                <?php if (isset($erreurs["durée"])): ?>
                    <p class="form-text text-danger"><?php echo($erreurs["durée"]) ?></p>
                <?php endif; ?>
            </div>


            <div class="mb-3">
                <label class="form-label" for="note">Note*</label>
                <input
                    type="number"
                    class="form-control <?php if(isset($erreurs["note"])) echo("border border-danger border-3")?>"
                    id="note"
                    name="note"
                >

                <?php if (isset($erreurs["note"])): ?>
                    <p class="form-text text-danger"><?php echo($erreurs["note"]) ?></p>
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-primary">Valider</button>
        </form>
    </div>

    <script src="assets/bootstrap.bundle.min.js"></script>
    </body>
    </html>
<?php } ?>
