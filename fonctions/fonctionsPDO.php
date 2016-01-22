<?php

/**
 * @defgroup fonctionsConnexion
 *
 * Page contenant les fonctions liées à la base de données
 * @{
 */

/**
* Fonction permettant de se connecter à la base de données de l'application
* 
* @return PDO Un objet représentant la connexion à la base
*/
function connexion() {
    $instance = "mysql:dbname=atp;host=127.0.0.1";
    $login = "root";
    $password = "";

    try {
        $bdd = new PDO($instance, $login, $password);
    } catch (Exception $ex) {
        die("Erreur critique ( La connexion à la base n'a pas pu être établie ) : " . $ex->getMessage());
    }

    return $bdd;
}

/**
* Fonction permettant d'executer une requête SQL dans une base de données
* 
* @param PDO $bdd La connexion vers la base de données
* @param string $req La requête à executer
* @param array $args Les arguments de la requête
* @return mixed Le résultat de la requête
*/

function executerRequete($bdd, $req, $args) {
    $reqPret = $bdd->prepare($req);
    $reqPret->execute($args);

    $i = 0;
    $resultat = Array();

    while ($ligne = $reqPret->fetch(PDO::FETCH_ASSOC))
        $resultat[$i++] = $ligne;

    return $resultat;
}

/**
* }@
*/
