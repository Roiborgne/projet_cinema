<?php
require_once "../assets/pdo.php";
?>
<?php function head() { ?>
<header>
    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Cinethèque</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="films.php">Liste des films</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Connection
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="inscription.php">Inscription</a></li>
                            <li><a class="dropdown-item" href="connexion.php">Connexion</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Rechercher" aria-label="Search">
                    <button class="btn btn-secondary" type="submit">Rechercher</button>
                </form>
            </div>
        </div>
    </nav>
    <script src="../assets/bootstrap.bundle.min.js"></script>
</header>
<?php }?>

<?php function foot() { ?>
<footer>
</footer>
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
