<?php

session_start();

require_once 'config/bdd.inc.php';
require_once 'config/connexion.inc.php';

/***Smarty***/
require_once 'libs/Smarty.class.php'; //appel a la librairie Smarty
$smarty = new Smarty (); //creation de l'objet smarty
$smarty->setTemplateDir ('template/'); //emplacement du fichier tpl associe
/***Smarty***/

include_once 'include/header.inc.php';

 /*---- Sur toutes les pages protegees---*/   
//tester la valeur de la variable $connect grâce à une condition
// redirige l'utilisateur vers la page de connexion
//on affiche la page

if (isset($_POST['connect'])) { //Si le bouton Se connecter est posté, je traite les données
    $email = addcslashes($_POST['email'], "'%_"); //Sécurisation des variables
    $mdp = addcslashes($_POST['mdp'], "'%_"); 
   
    $selectall = 'SELECT * FROM utilisateurs WHERE (email="' .$email. '" AND mdp="' .$mdp. '")'; //Requete SQL de sélection dans la table utilisateur avec conditions sur les champs email et motdepasse
    $request = mysql_query($selectall);//On place dans une variable, l'exécution de la requête SQL
    $compare = mysql_fetch_array($request);  
    $id =$compare['id']; 
    $sid = md5($email . time()); 
    $update = 'UPDATE utilisateurs SET sid="' .$sid. '" WHERE id="' .$id. '"'; //maj base
    mysql_query ($update);
    setcookie('sid', "$sid", time() + (30*60)); // creation du cookie, en seconde ajoute 30minutes
        
    if (($email==$compare['email']) AND ($mdp==$compare['mdp'])) {
        $_SESSION ['msg_confirm'] = "Vous êtes authentifié";//Mise en session de la variable 'msg_confirm'
        print_r($_SESSION['msg_confirm']);
        $connect = TRUE;
        header("location: index.php");
       
    } else {
        $_SESSION ['msg_confirm'] = "Merci de vous authentifier";//Mise en session de la variable 'msg_confirm'
        print_r($_SESSION['msg_confirm']);
        $connect = FALSE;
        header("location: connexion.php");
        
    }  
} else {
    if (isset($_SESSION['connect'])) {
        $_SESSION ['msg_confirm'] = "Merci de vous authentifier"; //Mise en session de la variable 'msg_confirm'
        print_r($_SESSION['msg_confirm']);  
        $connect = FALSE ;
        $smarty->assign('connect',$_SESSION['connect']);
    }

$smarty->debugging = FALSE;
$smarty->display('connexion.tpl'); 

}

unset($_SESSION['connect'])  ; 

include_once 'include/menuconnexion.inc.php';
include_once 'include/footer.inc.php';

?>

