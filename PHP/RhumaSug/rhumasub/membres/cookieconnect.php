<?php


if(!isset($_SESSION['id']) AND isset($_COOKIE['email'],$_COOKIE['mdp']) AND !empty($_COOKIE['mdp'])){

    $requser = $bdd->prepare("SELECT * FROM Client WHERE email = ? AND mdp = ?");
    $requser->execute(array($_COOKIE['email'], $_COOKIE['mdp']));
    $userExist = $requser->rowCount();
    if ($userExist == 1) {
        $userinfo = $requser->fetch();
        $_SESSION['id'] = $userinfo['id'];
        $_SESSION['nom'] = $userinfo['nom'];
        $_SESSION['email'] = $userinfo['email'];
        
    }
}
