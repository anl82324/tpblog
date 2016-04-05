<?php

session_start();

require_once 'config/bdd.inc.php';

/***Smarty***/
require_once 'libs/Smarty.class.php'; //appel a la librairie Smarty
$smarty = new Smarty (); //creation de l'objet smarty
$smarty->setTemplateDir ('template/'); //emplacement du fichier tpl associe
/***Smarty***/

if (isset($_POST['membre'])) { //Si le bouton Devenir membre est posté, je traite les données
    //securisation des variables
    $nom = addcslashes($_POST['nom'], "'%_");
    $prenom = addcslashes($_POST['prenom'], "'%_");
    $email = addcslashes($_POST['email'], "'%_"); 
    $login = addcslashes($_POST['login'], "'%_");
    $mdp = addcslashes($_POST['mdp'], "'%_"); 
     
    $selectall = 'SELECT * FROM utilisateurs' ; //Requete SQL de sélection de tous les champs dans la table utilisateur
    $request = mysql_query($selectall);//On place dans une variable, l'exécution de la requête SQL
    $compare = mysql_fetch_array($request);  
          
    if ($email==$compare['email'] AND $nom==$compare['nom'] AND $prenom==$compare['prenom'] AND $login==$compare['login']) {
        $_SESSION ['msg_confirm'] = "Vous êtes déjà inscrit";//Mise en session de la variable 'msg_confirm'
        header("location: index.php");
    } else {
        $update = 'UPDATE utilisateurs SET (nom="' .$nom. '" AND prenom="' .$prenom. '" AND email="' .$email. '" AND login="' .$login. '" AND mdp="' .$mdp. '")'; //maj base utilisateurs      //maj de la base utilisateurs     
        mysql_query ($update);
    }  
        header("location: index.php");
        $smarty->assign('membre',$_SESSION['membre']);
    }
    
    include_once 'include/header.inc.php';
           
    $smarty->debugging = FALSE;
    $smarty->display('inscription.tpl'); 
    unset($_SESSION['membre'])  ; 
    
    include_once 'include/menuconnexion.inc.php';
    include_once 'include/footer.inc.php';

?>
