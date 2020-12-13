<?php
$title = 'Rechercher un membre';
$admin = 'active';

ob_start();
?>
<center>
    <h4><strong> Connection Administration </strong></h4>
    <br> <br> <br>
    <div class="mx-auto" style="width: 200px;">

        <body class="text-center">
        <form class="form-signin" method="post" action="admin.php"/>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="pass" class="form-control" value="admins" placeholder="mot de passe"
               required>
        <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">se connecter</button>
    </div>
    <?php
    $content = ob_get_clean();
    include "layouts/base.php";
    ?>
