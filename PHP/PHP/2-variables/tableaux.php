<?php
//deux methodes pour creer un tableau
$tab = array(15,22);
$tabCrochets = [15,22];

var_dump($tab);
var_dump($tabCrochets);

$jours = array("Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi");
array_push($jours,'Dimanche');//ajouter un jour au tableau
var_dump($jours);//afficher la variable
echo $jours[5];//parcourir le tableau
array_pop($jours);//supprime le dernier element du tableau
unset($jours[0]);//supprime le jours selectionné, a savoir [0] donc le lundi
var_dump($jours);//le dimanche et le lundi ont été supprimés
array_shift($jours);//supprime le 1er element du tableau
var_dump($jours);//mardi a été supprimé
array_splice($jours, 2);//affiche les 2 premiers éléments du tableau
var_dump($jours);//vu que ici c'est 2 ca affiche mercredi et jeudi
var_dump(array_slice($jours, 1));

?>