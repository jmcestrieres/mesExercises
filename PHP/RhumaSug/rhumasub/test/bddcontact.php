<?php

$dsn= new PDO("mysql:host=localhost;dbname=projet_rhum;charset=utf8", "jean-marc", "floride64");
    $test = $dsn->prepare("INSERT INTO contact (nom, prenom, email, msg) VALUES (:nom, :prenom, :email, :msg)");
    $test->bindParam(":prenom", $_POST["prenom"]);
    $test->bindParam(":nom", $_POST["nom"]);
    $test->bindParam(":email", $_POST["email"]);
    $test->bindParam(":msg", $_POST["msg"]);
    
    
    
    $lala = $test->execute();
    var_dump($lala);
    var_dump("ok fait");

?>    