<?php
session_start();
setcookie('email','',time()-3600);
setcookie('mdp','',time()-3600);
$_SESSION = array();
session_destroy();
header("Location: connexion.php");
?>