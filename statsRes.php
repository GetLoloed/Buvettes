<?php
$title = 'Statistiques'; // Définition de la variable pour avoir un titre.
$stats = 'active'; // Met en Active dans la navbar
ob_start(); // démarre la temporisation de sortie

include_once 'config/connect.php'; // BDD
require 'fonct/foncts.php'; // Fonctions
echo '<br>';


// Redirection en fonction du choix
echo '<div class="container text-center">';
if ($_POST['choix'] == null) {
    echo '<meta http-equiv="refresh" content="0; url=stats.php">';
} else if ($_POST['choix'] == 0) {
    $idV = 0;
    TopVolon($idV);
} else if ($_POST['choix'] == 1) {
    $idB = 0;
    TopBuv($idB);
} else {
    $idB = 0;
    StatMatch($idB);
}
?>
    <div class="container text-center">
        <a class="btn btn-outline-secondary" href="stats.php">Retour</a>
    </div>
<?php
$content = ob_get_clean(); // Lit le contenu courant du tampon de sortie puis l'efface
include "layouts/base.php"; // Template
?>