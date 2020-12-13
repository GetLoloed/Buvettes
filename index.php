<?php
$title = "Nouveautés"; // Définition de la variable pour avoir un titre.
$index = 'active'; // Met en Active dans la navbar
ob_start(); // démarre la temporisation de sortie
?>
<div class="container text-center">
    <hr>
    <h1><i class="fas fa-futbol"></i> Les matchs ! <i class="fas fa-futbol"></i></h1>
    <hr>
</div>
<div class="container text-center">
    <table class="table table-bordered table-striped table-hover table-sm "
    ">
    <thead class="thead-dark">
    <tr>
        <th><i class="fas fa-calendar-alt"></i> Date</th>
        <th> Equipe 1</th>
        <th> Equipe 2</th>
        <th> Score</th>
        <th>Buvettes Ouvertes</th>
        <th>Participants</th>
    </tr>
    </thead>
    <?php
    require "fonct/foncts.php";
    $idM = 0;
    affichematch($idM);
    ?>
</div>
<?php
$content = ob_get_clean(); // Lit le contenu courant du tampon de sortie puis l'efface
include "layouts/base.php"; // Template
?>
