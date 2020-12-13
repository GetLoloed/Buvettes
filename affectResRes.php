<?php
$title = "Affectation responsable";
$affect = 'active';
ob_start();

echo '<br>';
include_once 'config/connect.php';
$sql = 'SELECT idB FROM EstOuverte WHERE idM = ' . $_POST['idM'] . ' AND idB = ' . $_POST['idB'] . '';
$sth = $dbh->query($sql);
$result = $sth->fetchAll(PDO::FETCH_ASSOC);
if ($result == null) {
    ?>

    <div class="container text-center">
        <h1 style="color: red"> Erreur :</h1>
        <h4> La buvette et le match choisis ne concorde pas ensemble </h4>
    </div>
    <?php
} else {
    $sql = 'UPDATE Buvette SET Responsable = ' . $_POST['idV'] . ' WHERE Buvette.Responsable=Volontaire.idV';
    $sth = $dbh->query($sql);
    ?>

    <div class="container text-center">
        <h2 style="color: green"> L'affectation s'est effectuée </h2>
        <h4> redirection vers la page des choix dans 3 secondes </h4>
    </div>
    <meta http-equiv="refresh" content="3; url=Affectation.php"/>
    <?php
}
?>
<div class="containrer text-center">
    <a class="btn btn-outline-secondary" href="affectResp.php">Retour</a>
</div>
<?php
$content = ob_get_clean();
include "layouts/base.php";
?>
