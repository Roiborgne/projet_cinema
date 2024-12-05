<?php
require_once '../base.php';
require_once BASE_PROJET .'/src/_partials/header.php';
require_once BASE_PROJET .'/src/_partials/fonction.php';
require_once BASE_PROJET .'/src/database/base_utilisateurs.php';



head();
if (isset($_SESSION["utilisateur"])){
    interdit();
}else {

$email = "";
$mdp ="";
$id_utilisateur ="";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $mdp = $_POST ["mdp"];
    $email = $_POST ["email"];

    $recup = verifUtilisateur($email,$mdp);
    foreach ($recup as $champs) {
        $recup_mail = $champs ["email_utilisateur"];
        $recup_mdp = $champs ["mdp_utilisateur"] ;
        $recup_pseudo = $champs ["pseudo_utilisateur"] ;
    }


//Validification des données
    $erreurs = [];
    if (empty($mdp)){
        $erreurs["mdp"] = "Le mot de passe est obligatoire";
    }elseif (empty($email)){
        $erreurs["email"] = "L'email est obligatoire";
    }elseif (empty($recup_mail)){
        $erreurs["email"] = "L'email ou le mot de passe est incorrect";
        $erreurs["mdp"] = "L'email ou le mot de passe est incorrect";
    }


//Traiter les données
    if (empty($erreurs)){
        //traiter les infos
        if (password_verify($mdp, $recup_mdp)) {
            //Rediriger l'utilisateur vers une autre page du site (Page accueil)
            header(header:"Location: ./index.php");
            $_SESSION["utilisateur"] = [
                "id_utilisateur" => $id_utilisateur,
                "pseudo" => $recup_pseudo,
                "email" => $email
            ];
            print_r($_SESSION);
            exit();
        }else{
            $erreurs["email"] = "L'email ou le mot de passe est incorrect";
            $erreurs["mdp"] = "L'email ou le mot de passe est incorrect";
        }


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
    <h1 class="text-center text-primary text-bg-secondary mt-3">Connexion</h1>
    <form action="" method="post" class="w-50 mx-auto p-4 my-5 shadow bg-dark">

        <div class="mb-3">
            <label class="form-label" for="email">Mail*</label>
            <input
                    type="text"
                    class="form-control <?php if(isset($erreurs["email"])) echo("border border-danger border-3")?>"
                    id="email"
                    name="email"
                    value="<?= $email?>"
            >

            <?php if (isset($erreurs["email"])): ?>
                <p class="form-text text-danger"><?php echo($erreurs["email"]) ?></p>
            <?php endif; ?>
        </div>


        <div class="mb-3">
            <label class="form-label" for="mdp">Mot de passe*</label>
            <input
                    type="password"
                    class="form-control <?php if(isset($erreurs["mdp"])) echo("border border-danger border-3")?>"
                    id="mdp"
                    name="mdp"
            >

            <?php if (isset($erreurs["mdp"])): ?>
                <p class="form-text text-danger"><?php echo($erreurs["mdp"]) ?></p>
            <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-primary">Valider</button>
    </form>
</div>

<script src="assets/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php } ?>
