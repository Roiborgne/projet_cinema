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
                            <a class="nav-link active" aria-current="page" href="../../code/index.php">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="../../code/films.php">Liste des films</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle disabled" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Connexion
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../../code/inscription.php">Inscription</a></li>
                                <li><a class="dropdown-item" href="../../code/connexion.php">Connexion</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Deconnexion</a></li>
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
    </header>
<?php }?>
