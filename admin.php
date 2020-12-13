<?php
$title = 'Administration';
$admin = 'active';

ob_start();
?>
<br> <br>
<?php
if (!empty($_POST['pass']) and $_POST['pass'] == "admins")  { // Mdp en dur todo : voir pour créer une table admin ?
    ?>
    <div class="container text-center">
        <h4><strong> Bienvenue sur la page d'administration </strong></h4> <br>
        <h4><strong> Que voulez vous faire ? </strong></h4> <br>
        <form action="adminCo.php" method="post">
            <button type="submit" name="choix" value="1" class="btn btn-outline-primary">Nouveau volontaire</button>
            <button type="submit" name="choix" value="2" class="btn btn-outline-primary">Nouveau match</button>
            <button type="submit" name="choix" value="3" class="btn btn-outline-primary">Nouvelle buvette</button>
        </form>
    </div>
    <?php
} else {
    echo '<Script> alert("Mot de passe incorrect") </Script>';
    echo '<meta http-equiv="refresh" content="0; url=login.php">';
}

$content = ob_get_clean();
include "layouts/base.php";
?>
