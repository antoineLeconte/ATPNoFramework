<?php

include "fonctions/fonctionsPDO.php";
include "fonctions/fonctionsAffichage.php";

$bdd = connexion();

$req = "(SELECT 'ID' as id, 'Prenom' as prenom, 'Nom' as nom, 'Pays' as pays, 'Points' as points, 'Matchs joués' as nbMatchs FROM dual)
        UNION (SELECT c.rang, j.prenom, j.nom, p.libelle, c.points, c.nbMatchs
        FROM joueur j
        JOIN pays p ON j.codePays = p.code JOIN classement c ON j.id = c.idJoueur)";
$listeJoueurs = executerRequete($bdd, $req, Array());

?>
<!doctype html>
<html>
    <head>
        <title>Classement ATP : Liste des joueurs</title>
        <link rel="stylesheet" type="text/css" href="css/listeJoueur.css" />
        <meta charset="utf-8" />
    </head>
    <body>
        <h1>Liste des joueurs</h1>
        <?php
            afficherTableau($listeJoueurs, 'tabJoueur');
        ?>
    </body>
</html>
