<?php
/**
 * Template HTML pour les autres pages
 *
 * $title -> est délcarée dans chaque page et permet d'afficher le titre.
 *
 * $index, $stats, $affect, $rech -> permet de mettre chaque item en 'active'
 *
 * $content -> sera le contenu de chaque page.
 */
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!--  Font Awesome Picto  -->
    <script src="https://kit.fontawesome.com/b1b4f5435a.js" crossorigin="anonymous"></script>
    <title><?php echo $title ?> - Buvettes !</title>
</head>
<body>
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Buvettes</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link <?php echo $index ?>" href="index.php"><i class="fas fa-newspaper"></i>
                    Nouveautés</a>
                <a class="nav-item nav-link <?php echo $stats ?>" href="stats.php"><i class="fas fa-chart-pie"></i>
                    Statistiques</a>
                <a class="nav-item nav-link <?php echo $affect ?>" href="affect.php"><i
                            class="far fa-address-card"></i> Affectations</a>
                <a class="nav-item nav-link <?php echo $rech ?>" href="rechercheM.php"><i class="fas fa-search"></i>
                    Rechercher
                    un
                    membre</a>
                <a class="nav-item nav-link <?php echo $admin ?>" href="login.php"><i class="fas fa-users-cog"></i>
                    Administration</a>
            </div>
        </div>
    </nav>
</div>


<?php echo $content ?>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>
</html>