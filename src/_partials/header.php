<?php function head(): void{
    session_start();?>
    <header>
        <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand text-black" href="#">Cinethèque</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="../index.php">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="./films.php">Liste des films</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php if(isset($_SESSION["utilisateur"])){
                                    $pseudo = $_SESSION["utilisateur"]["pseudo"];
                                    echo $pseudo;
                                }else{?> Compte
                                <?php } ?>
                            </a>
                            <ul class="dropdown-menu">
                                <?php if(isset($_SESSION["utilisateur"])){ ?>
                                    <li><a class="dropdown-item" href="./ajouter.php">Ajoutez un film</a></li>
                                    <li><a class="dropdown-item" href="./mesFilms.php">Mes Films</a></li>
                                    <li><a class="dropdown-item" href="./favoris.php">Mes favoris</a></li>
                                    <li class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="./deconnexion.php">Deconnexion</a></li>
                                <?php } else {  ?>
                                <li><a class="dropdown-item" href="./inscription.php">Inscription</a></li>
                                <li class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="./connexion.php">Connexion</a></li>
                                <?php }  ?>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex me-3 my-auto" role="search">
                        <input class="form-control me-2" type="search" placeholder="Rechercher" aria-label="Search">
                        <button class="btn btn-secondary" type="submit">Rechercher</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>

<?php }?>
