<?php

$dsn= new PDO("mysql:host=localhost;dbname=rhuma_sug;charset=utf8", "jean-marc", "floride64");

if(isset($_POST['inscription']))
{
    if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['adresse']) AND !empty($_POST['ville']) AND !empty($_POST['codepostal']) AND !empty($_POST['tel']) AND !empty($_POST['email']) AND !empty($_POST['email2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']))
    {

    }
    else
    {
        $erreur = "Tous les champs doivent être complétés";
    }
}
$test = $dsn->prepare("INSERT INTO Client (nom,prenom, adresse, id_ville, codepostal, tel, email, mdp) VALUES (:nom, :prenom, :adresse, :ville, :codepostal, :tel, :email, :mdp)");
$test->bindParam(":prenom", $_POST["prenom"]);
$test->bindParam(":nom", $_POST["nom"]);
$test->bindParam(":adresse", $_POST["adresse"]);
$test->bindParam(":ville", $_POST["id_ville"]);
$test->bindParam(":codepostal", $_POST["codepostal"]);
$test->bindParam(":tel", $_POST["tel"]);
$test->bindParam(":email", $_POST["email"]);
$test->bindParam(":mdp", $_POST["mdp"]);


$lala = $test->execute();
var_dump($lala);
var_dump("ok fait");


    

?>

