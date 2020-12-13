<?php
$title = 'Consultation buvettes';
$affect = 'active';
ob_start();
?>
    <div class="container text-center">
        <form action="affectBuvRes.php" method="post">
            <div class="container text-center">
                <hr>
                <h1>Buvettes Ouvertes</h1>
                <hr>
            </div>
            <br> <br>
            <table class="table table-borderless">
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
                <tr>
                    <th scope="col"> Buvette :</th>

                    <td>
                        <div class="form-group">
                            <select class="form-control" name="idB">
                                <?php
                                include_once 'config/connect.php';
                                $sql = 'SELECT idB, nomB FROM Buvette';
                                $sth = $dbh->query($sql);
                                $result = $sth->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($result as $row) {
                                    echo '<option value="' . $row['idB'] . '">';
                                    echo $row['nomB'];
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
    </form>
    <br>
    <div class="container text-center"><a class="btn btn-outline-secondary" href="Affectation.php">Retour</a></div>
<?php
$content = ob_get_clean();
include "layouts/base.php";
?>