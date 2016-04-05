<?php

session_start();

require_once 'config/bdd.inc.php';//Chargement du fichier de connexion à la base de données
require_once 'config/connexion.inc.php';
require_once 'config/deconnexion.inc.php';


/***Smarty***/
require_once 'libs/Smarty.class.php'; //appel a la librairie Smarty
$smarty = new Smarty (); //creation de l'objet smarty
$smarty->setTemplateDir ('template/'); //emplacement du fichier tpl associe
/***Smarty***/


if (isset($_POST['envoyer'])) { //Si le bouton envoyé est posté, je traite les données
//instructions------------
//    print_r($_POST);
//    print_r($_FILES);
    $titre = addcslashes($_POST['titre'], "'%_"); //Sécurisation des variables
    $texte = addcslashes($_POST['texte'], "'%_");
//    print_r($_POST);    
    $publie = (!empty($_POST['publie']) ? $_POST['publie'] : 0); //Definition de la valeur publie

    $date = date("Y-m-d"); //Reprise de la date du systeme
// echo $titre . '&' . $texte . '&' . $publie . '&' . $date;

    $req_insertion = "INSERT INTO articles (titre, texte, date, publie) VALUES ('$titre', '$texte', '$date', $publie)"; //Execution des requetes d'enregistrements des champs dans la base article
    //print_r($_FILES);
    $erreur_image = $_FILES['image']['error']; //Le code erreur correspondant à la présence d'une image est affecté à la variable erreur_image
    // echo $erreur_image;
    
    if ($erreur_image != 0) {//Si la variable erreur_image est différente de 0
        $_SESSION ['msg_error'] = "Une erreur est survenue lors du chargement de votre image."; //Mise en session de la variable 'msg_error'
        header("location: article.php"); //Redirection vers la page article.php
        //echo 'Une erreur est survenue lors du chargement de votre image.'; -Affichage du résultat
    } 
    else {//Sinon on continue
        mysql_query($req_insertion); //Execution de la requête SQL
        $id_article = mysql_insert_id(); //Définition de l'id de l'article
        move_uploaded_file($_FILES['image']['tmp_name'], dirname(__FILE__) . "/img/$id_article.jpg"); //Déplacement et renommage de l'image
        //echo 'Insertion de l\'article Ok';--Affichage du résultat
        $_SESSION ['msg_confirm'] = "Votre article a bien été inséré."; //Mise en session de la variable 'msg_confirm'
        header("location: index.php"); //Redirection vers la page index.php    
    }

// echo $req_insertion;
} else {//On continue

    include_once 'include/header.inc.php'; //insertion du header HTML de la page

    //test de connexion pour afficher article si on est connecte ou connexion si on est deconnecte
    if (isset($_SESSION['connect'])) {
        $smarty->display('connexion.tpl');  
        include_once 'include/menuconnexion.inc.php';
        header("location: connexion.php");
    } else {
        $smarty->display('article.tpl'); 
        include_once 'include/menudeconnexion.inc.php';
    }
    
    if (isset($_SESSION['msg_error'])) {//Test si msg_error est different de nul
        ?><div class="alert alert-error" id="notif"><?php echo $_SESSION ['msg_error']; ?></div><?php //Affichage du message d'erreur
        unset($_SESSION['msg_error']); //Destruction de la session
    }
}    

$smarty->debugging = FALSE;    

include_once 'include/footer.inc.php';

?>

