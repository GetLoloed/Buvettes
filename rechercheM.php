<?php
$title = 'Rechercher un membre';
$rech = 'active';

ob_start();
?>
<br>
<div class="container text-center">
    <h1>Recherche de membre(s)</h1><br>
    <h2> Rechercher à partir de ces critères : </h2>
</div>
<br>
<div class="container text-center">
    <form action="rechercheMres.php" method="post">
        <button type="submit" name="choix" value="1" class="btn btn-outline-primary">Age</button>
        <button type="submit" name="choix" value="2" class="btn btn-outline-primary">Nom</button>
        <button type="submit" name="choix" value="3" class="btn btn-outline-primary">NB minimal participations</button>
        <button type="submit" name="choix" value="4" class="btn btn-outline-primary">Responsable Buvette (Oui/Non)
        </button>
    </form>
</div>
</div>
<?php
$content = ob_get_clean();
include "layouts/base.php";
?>
