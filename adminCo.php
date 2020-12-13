<?php
$title = 'Administration';
$admin = 'active';
ob_start();

// Affichage des options en fonction de l'id choisi
switch ($_POST['choix']) {
    case 1:
        ?>
        <input type="hidden" name="choix" value=1>
        <?php
        include_once 'config/connect.php';
        $req = 'SELECT MAX(idV) as idV from Volontaire';
        $exec = $dbh->query($req);
        $result = $exec->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $item) {
            $max = $item['idV'];
        }
        $max++;
        echo '<br>';
        echo '<div class="container text-center">';
        ?>
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Age</th>
                <th>Action</th>
            </tr>
            </thead>
            <?php
            include_once 'config/connect.php';
            $req = 'SELECT * FROM Volontaire';
            $exec = $dbh->query($req);
            $result = $exec->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $item) {
                echo '<tbody>';
                echo '<tr>';
                echo '<td>';
                echo $item['idV'];
                echo '</td>';
                echo '<td>';
                echo $item['nomV'];
                echo '</td>';
                echo '<td>';
                echo $item['age'];
                echo '</td>';
            }
            ?>
            <form action="adminExec.php" method="post">
                <input type="hidden" name="choix" value="1">
                </tr>
            </form>
            <tr>
                <td>
                    <?php
                    echo '<input type=text class="form-control" value="' . $max . '"readonly>';
                    ?>
                </td>
                <form action="adminExec.php">
                    <input type="hidden" name="mod" value="Inserer">
                    <td>
                        <input type="text" class="form-control" name="nomV" required>
                    </td>
                    <td>
                        <input type="number" class="form-control" name="age" required>
                    </td>
                    <td colspan="2">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Ajouter</button>
                    </td>
                </form>
            </tr>
            </tbody>
        </table>
        </div>
        <?php
        break;
    case 2:
        ?>
        <input type="hidden" name="choix" value=2>
        <?php
        include_once 'config/connect.php';
        $req = 'SELECT MAX(idM) as idM from Matchs';
        $exec = $dbh->query($req);
        $result = $exec->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $item) {
            $max = $item['idM'];
        }
        $max++;
        echo '<br>';
        echo '<div class="container text-center">';
        ?>
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th> idM</th>
                <th> dateM</th>
                <th> eqA</th>
                <th> eqB</th>
                <th> scoreA</th>
                <th> scoreB</th>
                <th></th>
            </tr>
            </thead>
            <?php
            include_once 'config/connect.php';
            $req = 'SELECT idM, dateM,  e1.pays AS eqA, e2.pays AS eqB, scoreA, scoreB FROM Matchs, Equipe AS e1, Equipe AS e2 WHERE Matchs.eqA = e1.idE AND Matchs.eqB = e2.idE;';
            $exec = $dbh->query($req);
            $result = $exec->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $item) {
                echo '<tbody>';
                echo '<tr>';
                echo '<td>';
                echo $item['idM'];
                echo '</td>';
                echo '<td>';
                echo $item['dateM'];
                echo '</td>';
                echo '<td>';
                echo $item['eqA'];
                echo '</td>';
                echo '<td>';
                echo $item['eqB'];
                echo ' </td>';
                echo '
        <td>';
                echo $item['scoreA'];
                echo '</td>';
                echo '<td>';
                echo $item['scoreB'];
                echo '</td>';
                echo '<td>';
                echo '<form action="AdminModif.php" method="post">';
                echo '<input type=hidden name="choix" value=2>';
                echo '<button type="submit" name="idM" value="' . $item['idM'] . '"
                    class="btn btn-primary mb-2">Modifier</button>';
                echo '</form>';
                echo '</td>';
            }
            ?>
            <form action="adminExec.php" method="post">
                <input type="hidden" name="choix" value="2">
                </tr>
            </form>
            <tr>
                <td>
                    <?php
                    echo '<input type=text class="form-control" value="' . $max . '"readonly>';
                    ?>
                </td>
                <form action="adminExec.php">
                    <input type="hidden" name="mod" value="Inserer">
                    <td>
                        <input type="date" class="form-control" name="dateM" required>
                    </td>
                    <td>
                        <div class="form-group">
                            <select class="form-control" name="eqA">
                                <?php
                                include_once 'config/connect.php';
                                $req = 'SELECT idE, pays FROM Equipe;';
                                $exec = $dbh->query($req);
                                $result = $exec->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($result as $item) {
                                    echo '<option value="' . $item['idE'] . '">';
                                    echo $item['pays'];
                                    echo '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <select class="form-control" name="eqB">
                                <?php
                                include_once 'config/connect.php';
                                $req = 'SELECT idE, pays FROM Equipe;';
                                $exec = $dbh->query($req);
                                $result = $exec->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($result as $item) {
                                    echo '<option value="' . $item['idE'] . '">';
                                    echo $item['pays'];
                                    echo '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </td>
                    <td>
                        <input type="number" class="form-control" name="scoreA">
                    </td>
                    <td>
                        <input type="number" class="form-control" name="scoreB">
                    </td>
                    <td colspan="2">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Ajouter</button>
                    </td>
                </form>
            </tr>
            </tbody>
        </table>
        </div>
        <?php
        break;
    case 3:
        ?>
        <input type="hidden" name="choix" value=3>
        <?php
        include_once 'config/connect.php';
        $req = 'SELECT MAX(idB) as idB from Buvette';
        $exec = $dbh->query($req);
        $result = $exec->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $item) {
            $max = $item['idB'];
        }
        $max++;
        echo '<br>';
        echo '<div class="container text-center">';
        ?>
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th> idB</th>
                <th> nomB</th>
                <th> emplacement</th>
                <th> responsable</th>
                <th></th>
            </tr>
            </thead>
            <?php
            include_once 'config/connect.php';
            $req = 'SELECT idB, nomB, emplacement, responsable, nomV FROM Buvette, Volontaire WHERE Buvette.Responsable = Volontaire.idV;';
            $exec = $dbh->query($req);
            $result = $exec->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $item) {
                echo '<tbody>';
                echo '<tr>';
                echo '<td>';
                echo $item['idB'];
                echo '</td>';
                echo '<td>';
                echo $item['nomB'];
                echo '</td>';
                echo '<td>';
                echo $item['emplacement'];
                echo '</td>';
                echo '<td>';
                echo $item['nomV'];
                echo '</td>';
            }
            ?>
            <form action="adminExec.php" method="post">
                <input type="hidden" name="choix" value=3>
                </tr>
            </form>
            <tr>
                <td>
                    <?php
                    echo '<input type=text class="form-control" value="' . $max . '"readonly>';
                    ?>
                </td>
                <form action="adminExec.php">
                    <input type="hidden" name="mod" value="Inserer">
                    <td>
                        <input type="text" class="form-control" name="nomB" required>
                    </td>
                    <td>
                        <input type="text" class="form-control" name="emplacement" required>
                    </td>
                    <td>
                        <?php
                        echo '<select class="form-control" name="responsable">';
                        $req = 'SELECT idV, nomV FROM Volontaire;';
                        $exec = $dbh->query($req);
                        $result = $exec->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($result as $item) {
                            echo '<option value="' . $item['idV'] . '">';
                            echo $item['nomV'];
                            echo "</option>";
                        }
                        ?>
                    </td>
                    <td colspan="2">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Ajouter</button>
                    </td>
                </form>
            </tr>
            </tbody>
        </table>
        </div>
        <?php
        break;
    default:
        ?>
        <form action="admin.php" method="post">
            <input type="hidden" name="pass" value="admins">
            <script>
                setTimeout("document.forms['admin'].submit()", 0);
            </script>
        </form>
        <?php
        break;
}
?>
    </form>
<?php
$content = ob_get_clean();
include './layouts/base.php';
?>