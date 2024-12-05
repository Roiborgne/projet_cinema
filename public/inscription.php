<?php
require_once '../base.php';
require_once BASE_PROJET .'/src/_partials/header.php';
require_once BASE_PROJET .'/src/database/base_utilisateurs.php';
require_once BASE_PROJET .'/src/_partials/fonction.php';
head();


if (isset($_SESSION["client"])){
    interdit();
}else {
$pdo=connexion();

$pseudo = "";
$email = "";
$mdp = "";
$mdp_verif = "";
$mdp_hache = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
//Le formulaire est soumis !
//Traiter les données du formulaire
//Récuperer les valeurs saisis de l'client
//superglobale $_POST : tableaux assoc
    $email = $_POST ["email"];
    //mdp hash
    $mdp = $_POST ["mdp"];
    $mdp_verif = $_POST ["mdp_verif"];
    $pseudo = $_POST ["pseudo"];
    $mdp_hache = password_hash($mdp,PASSWORD_ARGON2I);


//Validification des données
    $erreurs = [];
//email
    if (empty($email)){
        $erreurs["email"] = "L'email est obligatoire";

    }if (verif_email($email, $pdo)>=1){
        $erreurs["email"] = "Le mail est déjà utilisé";

    }elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $erreurs["email"] = "L'email n'est pas valide";


        //pseudo
    }if (empty($pseudo)){
        $erreurs["pseudo"] = "Le pseudo est obligatoire";

        //mdp
    }if (testmdp($mdp, $erreurs)){
        $erreurs["mdp"] = testmdp($mdp, $erreurs);

        //mdp verif
    }if ($mdp_verif != $mdp) {
        $erreurs["mdp_verif"] = "Le mot de passe doit être identique";
    }


//Traiter les données
    if (empty($erreurs)){
        //traiter les infos
        creerClient($pseudo,$email,$mdp_hache);

//Rediriger le client vers une autre page du site (Page accueil)
        header(header:"Location: ./index.php");
        exit();
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
    <h1 class="text-center text-primary text-bg-secondary mt-3">Inscription</h1>
    <form action="" method="post" class="w-50 mx-auto p-4 my-5 shadow bg-dark">

        <div class="mb-3">
            <label class="form-label fs-5" for="pseudo">Pseudo*</label>
            <input
                    type="text"
                    class="form-control <?php if(isset($erreurs["pseudo"])) echo("border border-danger border-3")?>"
                    id="pseudo"
                    name="pseudo"
                    value="<?= $pseudo?>"
            >

            <?php if (isset($erreurs["pseudo"])): ?>
                <p class="form-text text-danger"><?php echo($erreurs["pseudo"]) ?></p>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label for="Email" class="form-label fs-5 ">Email*</label>
            <input
                    type="email"
                    class="form-control <?php if(isset($erreurs["email"])) echo("border border-danger border-3")?>"
                    id="Email"
                    name="email"
                    value="<?= $email?>"
                    aria-describedby="emailHelp"
                    formnovalidate
            >

            <?php if (isset($erreurs["email"])): ?>
                <p class="form-text text-danger"><?php echo($erreurs["email"]) ?></p>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label class="form-label fs-5" for="mdp">Mot de passe*</label>

            <p class="fst-italic">
                    (majucule,
                    minuscule,
                    nombre,
                    caractère spécial,
                    avoir entre 8 et 14 caractères)
            </p>
            <input
                    type="password"
                    class="form-control <?php if(isset($erreurs["mdp"])) echo("border border-danger border-3")?>"
                    id="mdp"
                    name="mdp"
                    value="<?= $mdp?>"
            >

            <?php if (isset($erreurs["mdp"])): ?>
                <p class="form-text text-danger"><?php
                    if (is_array($erreurs["mdp"]))
                    {
                        foreach ($erreurs["mdp"] as $erreur)
                        {
                            echo($erreur . "<br>");
                        }
                    }else{
                        echo $erreurs["mdp"];
                    }?>
                </p>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label class="form-label fs-5" for="mdp_verif">Mot de passe vérification*</label>
            <input
                    type="password"
                    class="form-control <?php if(isset($erreurs["mdp_verif"])) echo("border border-danger border-3")?>"
                    id="mdp_verif"
                    name="mdp_verif"
                    value="<?= $mdp_verif?>"
            >

            <?php if (isset($erreurs["mdp_verif"])): ?>
                <p class="form-text text-danger"><?php echo($erreurs["mdp_verif"]) ?></p>
            <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-primary">Valider</button>
    </form>
</div>

<script src="assets/bootstrap.bundle.min.js"></script>
</body>
</html>

    <?php } ?>