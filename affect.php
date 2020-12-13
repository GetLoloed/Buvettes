<?php
$title = 'Affectation';
$affect = 'active';

ob_start();
?>
    <div class="container text-center">
        <hr>
        <h1> Affectation </h1>
        <hr>
        <br>
        <h2> Que voulez vous faire ? </h2>
        <br>
    </div>
    <div class="container text-center">
        <a class="btn btn-outline-primary" href="affectResp.php"><i class="fas fa-plus"></i> Nouveau
            responsable</a>
        <a class="btn btn-outline-primary" href="affectVol.php"><i class="fas fa-plus"></i> Nouveau volontaire</a>
        <a class="btn btn-outline-secondary" href="affectBuv.php"><i class="fas fa-eye"></i> Voir les buvettes
            ouvertes</a>
    </div>
    </form>
<?php
$content = ob_get_clean();
include "layouts/base.php";
?>