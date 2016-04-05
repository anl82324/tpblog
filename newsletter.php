<?php

require_once 'config/bdd.inc.php';

if (isset($_POST['bouton'])) { //Si le bouton ok est posté, je traite les données
    
    $email = $_POST['email']; 
    
    $select = "SELECT email FROM newsletter";
    $requestselect = mysql_query($select);
    if (mysql_numrows($requestselect)>=1){
        echo"Deja abonne";   
    } else {
        $insert = "INSERT INTO newsletter VALUES ('$email')" ; //Requete SQL d'insertion 
        $requestinsert = mysql_query($insert);//On place dans une variable, l'exécution de la requête SQL
        if (mysql_numrows($requestinsert)=1) { 
            echo'Bien ajoute';
        }
    }     
}


    
   

    include_once 'include/header.inc.php';
    include_once 'include/menuconnexion.inc.php';
    include_once 'include/footer.inc.php';

