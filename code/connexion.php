<?php
require_once "../assets/pdo.php";
require_once "fonction.php";

head();

if(!empty($_GET['pseudo'])){
    $get = $_GET['pseudo'];

}

$pseudo = "";
$mdp ="";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
//Le formulaire est soumis !
//Traiter les données du formulaire
//Récuperer les valeurs saisis de l'utilisateur
//superglobale $_POST : tableaux assoc
    //mdp hash
    $mdp = password_hash($_POST ["mdp"],PASSWORD_ARGON2I);
    $pseudo = $_POST ["pseudo"];
}


//Validification des données
$erreurs = [];
if (empty($mdp)){
    $erreurs["mdp"] = "Le mot de passe est obligatoire";
}if (empty($pseudo)){
    $erreurs["pseudo"] = "Le pseudo est obligatoire";
}




//Traiter les données
if (empty($erreurs)){
    //traiter les infos
    if (password_verify($mdp, $mdpget)) {
        //Rediriger l'utilisateur vers une autre page du site (Page accueil)
        header(header:"Location: ./index.php");
        exit();
    }else{
        $mdp = "Le mdp est incorrect";
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
    <link rel="stylesheet" href="../assets/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <title>Cinemathèque</title>
</head>
<body>

<div class="container">
    <form action="" method="post" class="w-50 mx-auto p-4 my-5 shadow bg-dark">

        <div class="mb-3">
            <label class="form-label" for="pseudo">Pseudo*</label>
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
            <label class="form-label" for="mdp">Mot de passe*</label>
            <input
                type="password"
                class="form-control <?php if(isset($erreurs["mdp"])) echo("border border-danger border-3")?>"
                id="mdp"
                name="mdp"
                value="<?= $mdp?>"
            >

            <?php if (isset($erreurs["mdp"])): ?>
                <p class="form-text text-danger"><?php echo($erreurs["mdp"]) ?></p>
            <?php endif; ?>
        </div>
        <?php
        echo ('<button type="submit" href="./detail.php?nom='.$pseudo.'" >Valider</button>');
        ?>
    </form>
</div>

<script src="../assets/bootstrap.bundle.min.js"></script>
</body>
</html>
