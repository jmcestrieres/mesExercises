<?php

$activites = array("Lundi"=>"Php","Mardi"=>"Javascript", "Mercredi"=>"Typescript","Jeudi"=>"Angular","Vendredi"=>"SQL","Samedi"=>"Python","Dimanche"=>"Tout");
asort($activites["Dimanche"] = "repos");//modifier dimanche en "repos"
var_dump($activites);//Dimanche est bien en "repos"
$activites["Dimanche"] = "travail";//deuxieme methode pour modifier
var_dump($activites);

//deux dimensions
$pierre = array("1"=>"Php","2"=>"Javascript","3"=>"Python");
$paul = array("1"=>"Javascript","2"=>"Css","3"=>"Php");
$jacques = array("1"=>"Java","2"=>"Php","3"=>"Javascript");

$preferences = array_merge($pierre,$paul,$jacques);//regroupe tt les tableaux en 1 seul
var_dump($preferences);

$associationpreferences = ["Pierre" => $pierre, "Paul" => $paul, "Jacques" => $jacques];
var_dump($associationpreferences);

$occurence = array_count_values($preferences);//compte les occurences du tableau
var_dump($occurence);// affiche php=3, js=3, python=1, etc...

?>