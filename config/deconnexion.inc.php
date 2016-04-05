<?php

//Creer une variable initialisée à true
$connect = TRUE;

//Verifier que le cookie existe dans le navigateur avec isset $_cookie
if (isset($_COOKIE['sid'])) { //tester la présence de $_cookie
    //supprime la session et le cookie
    unset ($_COOKIE['sid']);
    unset ($_SESSION['connect']);
    $connect=FALSE;  
}    

?>

