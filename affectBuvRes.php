<?php
$title = "Affectation / BuvettesTest";
$affect = 'active';
ob_start();
echo '<br>';
include_once 'config/connect.php';
$sql = 'SELECT idB FROM EstOuverte WHERE idM = ' . $_POST['idM'] . ' AND idB = ' . $_POST['idB'];
$sth = $dbh->query($sql);
$result = $sth->fetchAll(PDO::FETCH_ASSOC);
if ($result == null) {
    ?>
    <br>
    <div class="container">
        <h1> Cette buvette n'est pas ouverte pour ce match </h1>
    </div>
    <?php
} else {
    $sql = 'SELECT nomB FROM Buvette WHERE idB = ' . $_POST['idB'];
    $sth = $dbh->query($sql);
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
        $idB = $row['nomB'];
    }
    $sql = 'SELECT eqA, eqB FROM Matchs WHERE idM = ' . $_POST['idM'];
    $sth = $dbh->query($sql);
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
        $eqA = $row['eqA'];
        $eqB = $row['eqB'];
    }
    echo '<div class="container">';
    echo '<table class="table table-bordered table-striped table-hover table-sm ">';
    echo '<thead class="thead-dark">';
    echo '<tr>';
    echo '<th>Nom de la buvette</th>';
    echo '<th>statut</th>';
    echo '<th>Match</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    echo '<tr>';
    echo '<td>' . $idB . '</td>';
    echo '<td><i class="far fa-thumbs-up"> est ouverte</i></td>';
    echo '<td>' . $eqA . ' vs ' . $eqB . '</td>';
    echo '</tr>';

    echo '</tbody>';
    echo '</table>';
    echo '</div>';
}
?>
    <div class="container text-center">
        <a class="btn btn-outline-secondary" href="affectBuv.php">Retour</a>
    </div>
<?php
$content = ob_get_clean();
include "layouts/base.php";
?>