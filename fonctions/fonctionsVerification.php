<?php

/**
 * Fonction vérifiant les infos liées à un joueur
 *
 * @param $bdd PDO
 * @param $tabInfos Array
 * @return int Code de retour
 */

function verifJoueur($bdd, $tabInfos){
    $codeRetour = 1;

    if(empty($tabInfos['nom']))
        $codeRetour = -1;

    if(empty($tabInfos['prenom']))
        $codeRetour = -2;

    if(empty($tabInfos['codePays']))
        $codeRetour = -3;

    $reqCodePresent = "SELECT count(*) as nbPays FROM pays WHERE code = ?";
    $nbPays = executerRequete($bdd, $reqCodePresent, Array($tabInfos['codePays']));

    if($nbPays[0]['nbPays'] == 0)
        $codeRetour = -4;

    return $codeRetour;
}