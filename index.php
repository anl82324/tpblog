<?php

session_start();

require_once 'config/bdd.inc.php'; //Chargement du fichier de connexion à la base de données
require_once 'config/connexion.inc.php';//Chargement du fichier de connexion

include_once 'include/header.inc.php'; //Insertion du header html de la page

/***Smarty***/
require_once 'libs/Smarty.class.php'; //appel a la librairie Smarty
$smarty = new Smarty (); //creation de l'objet smarty
$smarty->setTemplateDir ('template/'); //emplacement du fichier tpl associe
/***Smarty***/

unset($_SESSION['connect']); //Destruction de la session 

//fonction pagination($i, $nbarticle, $nbarticleparpage){
  $result = mysql_query ("SELECT COUNT(*) as nbarticle FROM articles WHERE publie = 1"); //Comptage du nombre d'articles publié dans la base
  $nbarticle = mysql_fetch_array($result);
  $nbarticleparpage = 2;

  $page = (isset($_GET['page']) ? $_GET['page'] : 1); //Definition de la valeur de la page courante
  
  $nbpage = ceil($nbarticle['nbarticle']/$nbarticleparpage); // Retourne le nombre de page
  $indexdebut = (($page - 1)*$nbarticleparpage);

  $select_all_post = "SELECT id, titre, texte, DATE_FORMAT(date,'%d/%m/%Y')as date_fr FROM articles WHERE publie = 1 LIMIT $indexdebut, $nbarticleparpage;"; //Requete SQL de sélection dans la table article avec une condition sur le champ 'publie'
  $request = mysql_query($select_all_post);//On place dans une variable, l'exécution de la requête SQL

  //$result_request = mysql_fetch_array($request)- v1;

  while ($result_request = mysql_fetch_array($request)) {// On crée une variable dans laquelle on va pousser les résultat de la requete SQL $request
  // <img src="img/<?php echo $result_request['id'] ?php>... ;
  $tableauArticleSmarty[] = $result_request;
}

$smarty->assign('tableauArticleSmarty',$tableauArticleSmarty);

//variables utilisees pour la pagination
$smarty->assign('page',$page);
$smarty->assign('nbpage',$nbpage);

$smarty->debugging = FALSE;

$smarty->display('index.tpl');

include_once 'include/menuconnexion.inc.php'; //Insertion du menu HTML de la page
include_once 'include/footer.inc.php'; // Insertion du footer HTML de la page
?>
