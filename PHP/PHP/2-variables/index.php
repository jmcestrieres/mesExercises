<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php 
//# Afficher une variable
        $hello = "Hello"; 
        //Afficher la variable $hello//
        echo $hello;
        ?>
<br>
    <?php

        $world = "World";
        //faire une concatenation et afficher hello world
//# Concaténer des variables avec du texte
        $hw = $hello." ".$world;
        echo $hw;
        echo "mante";
    ?>
<br>
    <?php

//# Variables numériques

        $montantHt = 15.2;
        $tva = 1.196;
        $montantTtc = $montantHt * $tva;
        echo "avec une tva de 19.6% le montant TTC est de ".$montantTtc."€";

    ?>
<br>
    <?php
    
    
    
    ?>

</body>
</html>