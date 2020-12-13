<?php
$title = "Affectation responsable";
$index = 'active';
ob_start();
?>

<div class="container text-center">
    <form action="affectResRes.php" method="post">
        <hr>
        <h1> Nouveau Responsable</h1>
        <hr>
        <table class="table table-borderless">

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
            <tr>
                <th scope="col"> Volontaire :</th>
                <td>
                    <div class="form-group">
                        <select class="form-control" name="idV">
                            <?php
                            include_once 'config/connect.php';
                            $sql = 'SELECT idV, nomV FROM Volontaire';
                            $sth = $dbh->query($sql);
                            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($result as $row) {
                                echo '<option value="' . $row['idV'] . '">';
                                echo $row['nomV'];
                                echo '</option>';
                            }
                            ?>
                    </div>
                </td>
            </tr>
            <tr>
                <th scope="col"> Match :</th>
                <td>
                    <div class="form-group">
                        <select class="form-control" name="idM">
                            <?php
                            include_once 'config/connect.php';
                            $sql = 'SELECT idM, eqA, eqB FROM Matchs';
                            $sth = $dbh->query($sql);
                            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($result as $row) {
                                echo '<option value="' . $row['idM'] . '">';
                                echo $row['eqA'];
                                echo ' vs ';
                                echo $row['eqB'];
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
