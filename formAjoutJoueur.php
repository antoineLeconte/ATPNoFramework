<?php
    include_once "fonctions/fonctionsAffichage.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Classement ATP : Ajout d'un joueur</title>
    <link rel="stylesheet" type="text/css" href="formAjoutJoueur.css"/>
</head>
<body>
    <h1>Ajouter un joueur</h1>
    <form>
        <label for="nom">Nom : </label>
        <input type="text" name="nom"/><br/>

        <label for="prenom">Prenom : </label>
        <input type="text" name="prenom"/><br/>

        <label for="codePays">Pays : </label>
        <select>
            <?php
                afficherListeDeroulanteSimple($listePays);
            ?>
        </select><br/>

        <input type="submit" value="Ajouter"/>
    </form>
</body>
</html>