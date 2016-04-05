<?php

require_once 'config/bdd.inc.php';
require_once 'config/deconnexion.inc.php';

//affichage de message de déconnexion
$_SESSION ['msg_confirm'] = "Vous êtes déconnecté";
echo $_SESSION ['msg_confirm'];

setcookie('sid',"$sid",-3600);

header("Location: index.php"); //redirection vers la page d'accueil 

include_once 'include/menuconnexion.inc.php';
include_once 'include/footer.inc.php';

?> 

