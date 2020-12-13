<?php
$title = 'Statistiques';
$stats = 'active';
ob_start();
?>
<div class="container text-center">
    <hr>
    <h1><i class="fas fa-info"></i> Statistiques</h1>
    <hr>
</div>
<form method="post" action="statsRes.php">
    <div class="container">
        <table class="table">
            <tr>
                <td><input type="radio" name="choix" value="0" checked/></td>
                <td> Les 5 volontaires les plus présents</td>
            </tr>
            <tr>
                <td><input type="radio" name="choix" value="1"/></td>
                <td> Les 5 buvettes ayant le plus de volontaires</td>
            </tr>
            <tr>
                <td><input type="radio" name="choix" value="3"/></td>
                <td> Les buvettes ouvertes pour le match :</td>
                <td>
                    <div class="form-group">
                        <select class="form-control" name="buvOpen">
                            <?php
                            include_once 'config/connect.php';
                            $sql = 'SELECT idM, e1.pays AS p1, e2.pays AS p2 FROM Matchs, Equipe AS e1, Equipe AS e2 WHERE Matchs.eqA = e1.idE AND Matchs.eqB = e2.idE;';
                            $sth = $dbh->query($sql);
                            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($result as $row) {
                                echo '<option value="' . $row['idM'] . '">';
                                echo $row['p1'];
                                echo ' VS ';
                                echo $row['p2'];
                                echo '</option>';
                            }
                            ?>
                </td>
            </tr>
        </table>
    </div>
    <div class="container text-center">
        <button type="submit" class="btn btn-outline-primary mb-2"><i class="far fa-check-circle"></i> Validation
        </button>
    </div>
    <?php
    $content = ob_get_clean();
    include './layouts/base.php';
    ?>

