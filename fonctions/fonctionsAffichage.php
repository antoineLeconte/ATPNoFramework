<?php
/**
 * @defgroup fonctionsAffichage
 *
 * Page contenant les fonctions liées à l'affichage de données
 *
 * @{
 */


/**
* Fonction ajoutant les personnes données dans le tableau dans une liste déroulante
*
* @param $tab Array La liste des personnes à ajouter dans la liste déroulante
*/

function afficherListeDeroulantePersonne($tab){
    foreach($tab as $osef => $infosPersonne){
        echo '<option value="' . $infosPersonne['Num_personne'] . '">' . $infosPersonne['Nom_personne']
               . ' ' .  $infosPersonne['Prenom_personne'] . '</option>';
    }
}

/**
* Fonction ajoutant les valeurs données dans le tableau dans une liste déroulante
*
* @param $tab Array La liste des valeurs à ajouter dans la liste déroulante
*/
function afficherListeDeroulanteSimple($tab){
    foreach($tab as $infos){
        echo '<option value="' . $infos['val'] . '">' . $infos['label'] . '</option>';
    }
}

/**
* Fonction affichant le contenu d'un Array dans un tableau
 *
 * @param $tab Array Le tableau à afficher
 * @param $nomTab String L'id du tableau pour le CSS
*/

function afficherTableau($tab, $nomTab){
    echo "<table id=\"$nomTab\"><thead><tr>";

    // Affichage entête du tableau
    foreach($tab[0] as $nomColonne){
        echo "<th>$nomColonne</th>";
    }
    echo '</tr></thead><tbody>';

    // Affichage corps du tableau
    for($i = 1; $i < count($tab); $i++){
        echo '<tr>';
        foreach($tab[$i] as $element){
            echo "<td>$element</td>";
        }
        echo '</tr>';
    }

    echo '</tbody></table>';
}

/**
* }@
*/