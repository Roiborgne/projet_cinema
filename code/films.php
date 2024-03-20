<?php
require_once "../assets/pdo.php";
require_once "fonction.php";

head();
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
<main>
    <div class="container text-center mt-3">
        <h1 class="text-start text-primary text-bg-secondary">Lites des films</h1>
        <div class="row row-cols-auto justify-content-center">
            <?php for ($i = 0; $i < count($films); $i++) {?>
                <div class="card col m-4" style="width: 18rem;">
                    <img src="<?php echo($images[$i]);?>" class="card-img-top mt-2" alt="...">
                    <div class="card-header text-bg-secondary">
                        <h5 class="card-title text-primary fs-3"><?php echo($titres[$i]);?></h5>
                    </div>
                    <div class="card-body">
                        <?php $seconds = $durees[$i]*60;
                        echo gmdate("H", $seconds)." h ".gmdate("i", $seconds); ?>
                    </div>

                    <div class="card-footer text-bg-secondary">
                        <?php
                        echo ('<a href="./detail.php?id='.$i.'" class="btn btn-primary btn-outline-dark rounded-pill text-decoration-none border-dark">Détail</a>');
                        ?>

                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</main>


<script src="../assets/bootstrap.bundle.min.js"></script>
</body>
</html>
