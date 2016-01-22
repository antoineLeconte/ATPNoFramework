<?php

include_once "fonctions/fonctionsPDO.php";
include_once "fonctions/fonctionsVerification.php";

$bdd = connexion();

if(!empty($_POST)){

    $codeRetour = verifJoueur($bdd, $_POST);

    if($codeRetour == 1){
        $req = "INSERT INTO joueur(nom, prenom, codePays) VALUES(?, ?, ?)";
        executerRequete($bdd, $req, Array($_POST['nom'], $_POST['prenom'], $_POST['codePays']));

        $reqNumJoueur = "SELECT id FROM joueur WHERE nom = ? AND prenom = ? AND codePays = ?";
        $numJoueur = executerRequete($bdd, $reqNumJoueur, Array($_POST['nom'], $_POST['prenom'], $_POST['codePays']));
        $numJoueur = $numJoueur[0]['id'];

        $reqAjoutClassement = "INSERT INTO classement VALUES(?, YEAR(NOW()), nvl(max(rang), 1) + 1, 0, 0, 0)";
        executerRequete($bdd, $reqAjoutClassement, Array($numJoueur));
    }

    switch($codeRetour){
        case 1:
            $message = '<p class="confirmation">Le joueur a été ajouté à la base</p>';
            break;
        case -1:
            $message = '<p class="erreur">Erreur : le nom est manquant</p>';
            break;
        case -2:
            $message = '<p class="erreur">Erreur : le prénom est manquant</p>';
            break;
        case -3:
            $message = '<p class="erreur">Erreur : le pays n\'est pas renseigné</p>';
            break;
        case -4:
            $message = '<p class="erreur">Erreur : le pays choisi n\'est pas dans la base</p>';
            break;
    }
}

$reqListePays = "SELECT code as val, libelle as label FROM pays ORDER BY label";
$listePays = executerRequete($bdd, $reqListePays, Array());

include_once "formAjoutJoueur.php";
