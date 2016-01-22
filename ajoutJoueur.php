<?php
/**
 * Created by PhpStorm.
 * User: KoopaAilay
 * Date: 22/01/2016
 * Time: 11:21
 */

include_once "fonctions/fonctionsPDO.php";
include_once "fonctions/fonctionsVerification.php";

$bdd = connexion();

if(!empty($_POST)){

}

$reqListePays = "SELECT code as val, libelle as label FROM pays ORDER BY label";
$listePays = executerRequete($bdd, $reqListePays, Array());

include_once "formAjoutJoueur.php";
