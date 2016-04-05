<?php

require_once ('libs/Smarty.class.php');

$smarty = new Smarty ();

$smarty ->setTemplateDir ('template/');

$maVariable = "Hello World !";

$smarty->assign ('maVariableSmarty', $maVariable);

$smarty->debugging = true;

$smarty->display('test.tpl');

?>