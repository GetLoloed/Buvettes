<?php
// Fichier permettant d'établir une connexion à la base de données.
// todo : Try / catch pour bien vérifier la connexion.
$dbh = new PDO('mysql:host=localhost;dbname=buvettes', 'root', '');
?>
