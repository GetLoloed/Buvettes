<?php
$title = 'Rechercher un membre';
$admin = 'active';

ob_start();
switch ($_POST['choix']) {
    case 1:
        echo '<form action="adminCo.php" method="post">';
        echo '<ul class="nav">';
        echo '<li class="nav-item">';
        echo '<button type="submit" name="choix" value="1" class="btn btn-outline-primary">Retour</button>';
        echo '</li>';
        echo '</ul>';
        echo '</form>';
        if ($_POST['mod'] == "Inserer") {

            include 'config/connect.php';
            $sql = 'SELECT MAX(idV) as idV FROM Volontaire;';
            $sth = $dbh->query($sql);
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $row) {
                $max = $row['idV'];
            }

            $max = $max + 1;
            $sql = 'Insert Into Volontaire (idV, nomV, age) Values (' . $max . ',"' . $_POST['nomV'] . '","' . $_POST['age'] . '");';
            $sth = $dbh->query($sql);
            echo '</div>';
        }
        ?>
        <form name="admin2" action="adminCo.php" method="post">
            <input type="hidden" name="choix" value=1>
            <script>
                setTimeout("document.forms['admin2'].submit()", 0);
            </script>
        </form>
        <?php
        break;
    case 2:
        echo '<form action="adminCo.php" method="post">';
        echo '<ul class="nav">';
        echo '<li class="nav-item">';
        echo '<button type="submit" name="choix" value="2" class="btn btn-outline-primary">Retour</button>';
        echo '</li>';
        echo '</ul>';
        echo '</form>';
        if ($_POST['mod'] == "Inserer") {

            include 'config/connect.php';
            $sql = 'SELECT MAX(idM) as idM FROM Matchs;';
            $sth = $dbh->query($sql);
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $row) {
                $max = $row['idM'];
            }

            $max = $max + 1;
            $scoreA = $_POST['scoreA'];
            $scoreB = $_POST['scoreB'];
            if ($scoreA == null) {
                $scoreA = "NULL";
            }
            if ($scoreB == null) {
                $scoreB = "NULL";
            }

            include 'config/connect.php';
            $sql = 'Insert Into Matchs (idM, dateM, eqA, eqB, scoreA, scoreB) Values (' . $max . ',"' . $_POST['dateM'] . '","' . $_POST['eqA'] . '","' . $_POST['eqB'] . '",' . $scoreA . ',' . $scoreB . ');';
            $sth = $dbh->query($sql);
            echo '</div>';
        } else if ($_POST['mod'] == "Modifier") {
            $i = 0;
            include 'config/connect.php';
            $scoreA = $_POST['scoreA'];
            $scoreB = $_POST['scoreB'];
            if ($scoreA == null) {
                $scoreA = "NULL";
            }
            if ($scoreB == null) {
                $scoreB = "NULL";
            }

            include 'config/connect.php';
            $sql = 'SELECT idE FROM Equipe WHERE pays = "' . $_POST['eqA'] . '"';
            $sth = $dbh->query($sql);
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $row) {
                $eqA = $row['idE'];
            }

            include 'config/connect.php';
            $sql = 'SELECT idE FROM Equipe WHERE pays = "' . $_POST['eqB'] . '"';
            $sth = $dbh->query($sql);
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $row) {
                $eqB = $row['idE'];
            }

            include 'config/connect.php';
            $sql = 'UPDATE Matchs SET dateM = "' . $_POST['dateM'] . '", eqA = "' . $eqA . '", eqB = "' . $eqB . '", scoreA = ' . $scoreA . ', scoreB = ' . $scoreB . ' WHERE idM = ' . $_POST['idM'];
            $sth = $dbh->query($sql);
            echo '</div>';

        }
        ?>
        <form name="admin2" action="adminCo.php" method="post">
            <input type="hidden" name="choix" value=2>
            <script>
                setTimeout("document.forms['admin2'].submit()", 0);
            </script>
        </form>
        <?php
        break;
    case 3:
        echo '<form action="adminCo.php" method="post">';
        echo '<ul class="nav">';
        echo '<li class="nav-item">';
        echo '<button type="submit" name="choix" value="2" class="btn btn-outline-primary">Retour</button>';
        echo '</li>';
        echo '</ul>';
        echo '</form>';
        if ($_POST['mod'] == "Inserer") {

            include 'config/connect.php';
            $sql = 'SELECT MAX(idB) as idB from Buvette';
            $sth = $dbh->query($sql);
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $row) {
                $max = $row['idB'];
            }

            $max = $max + 1;
            $sql = 'Insert Into Buvette (idB, nomB, emplacement, responsable ) Values (' . $max . ',"' . $_POST['nomB'] . '","' . $_POST['emplacement'] . '",' . $_POST['responsable'] . ')';
            $sth = $dbh->query($sql);
            echo '</div>';
        }
        ?>
        <form name="admin2" action="adminCo.php" method="post">
            <input type="hidden" name="choix" value=3>
            <script>
                setTimeout("document.forms['admin2'].submit()", 0);
            </script>
        </form>
        <?php
        break;
    default:
        ?>
        <form action="admin.php" method="post">
            <input type="hidden" name="pass" value="admins">
            <script>
                setTimeout("document.forms['admin.php'].submit()", 0);
            </script>
        </form>
        <?php
        break;
}


$content = ob_get_clean();
include "layouts/base.php";
?>
