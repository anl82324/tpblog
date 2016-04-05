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
include_once 'include/menudeconnexion.inc.php';
include_once 'include/footer.inc.php';


