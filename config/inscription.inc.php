<?php

//Creer une variable initialisée à false
$membre = FALSE;

//Verifier que le cookie existe dans le navigateur avec isset $_cookie
if (isset($_SESSION['membre'])) { //tester la présence de $_cookie
// attribuer la valeur de sid à une variable
    $sidvalue = $_COOKIE['sid'];
//verification en bdd de la presence de la valeur : requete, execution et mise en tableau de la requete    
    $selectsid = 'SELECT * FROM utilisateurs WHERE sid="'.$sidvalue.'"'; //Requete SQL de sélection dans la table utilisateur 
    $request = mysql_query($selectsid);//On place dans une variable, l'exécution de la requête SQL
    $verif = mysql_fetch_array($request);
// si on a un resultat, on modifie la valeur de la variable de connexion pour lui donner la valeur true
    if ($verif['sid']){
        $connect=TRUE;
    }   
}    
?>
