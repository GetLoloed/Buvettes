<?php
$title = 'Affectation d\'un volontaire';
$affect = 'active';
ob_start();
?>
    <br>
    <div class="container text-center">
        <form action="<?php //todo lien vers l'ajout d'un volontaire ?>" method="post">
            <div class="container text-center"><h1>Nouveau Volontaire</h1></div>
            <br> <br>
            <table class="table table-borderless table-responsive">
                <tr>
                    <th scope="col"> Match :</th>
                    <td>
                        <div class="form-group">
                            <select class="form-control" name="idM">
                                <?php
                                include_once 'config/connect.php';
                                $sql = 'SELECT idM, e1.pays AS p1, e2.pays AS p2 FROM Matchs, Equipe AS e1, Equipe AS e2 WHERE Matchs.eqA = e1.idE AND Matchs.eqB = e2.idE;';
                                $sth = $dbh->query($sql);
                                $result = $sth->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($result as $row) {
                                    echo '<option value="' . $row['idM'] . '">';
                                    echo $row['p1'];
                                    echo ' vs ';
                                    echo $row['p2'];
                                    echo '</option>';
                                }
                                ?>
                        </div>
                    </td>
                </tr>
            </table>
    </div>
    <div class="container text-center">
        <button type="submit" class="btn btn-outline-primary">Validation</button>
    </div>
    </form><br>
    <div class="container text-center">
        <a class="btn btn-outline-secondary" href="affect.php">Retour</a>
    </div>
<?php
$content = ob_get_clean();
include "layouts/base.php";
?>