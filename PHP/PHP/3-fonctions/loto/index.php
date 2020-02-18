<?php
    //creer un script qui remplit un tableau de 1 a 49
    $tableau = array();
    for($i=0; $i<49; $i++){
        array_push($tableau, $i+1);
        echo $tableau[$i];
        echo "<br>";
    };
    var_dump($tableau);
    
    //creer une fonction qui renvoi un tableau rempli
    
    echo "<h1>creer une fonction qui renvoi un tableau rempli</h1>";
    function tableau(){
        $creerTableau = array();

        for($l=1; $l<=49; $l++){
            array_push($creerTableau, $l);
        }
        var_dump($creerTableau);
    };
    tableau();

    //Loto
    echo "<h1>boucle for pour 5 nom aleatoires entre 1 et 49</h1>";
    $loto = array();
    for ($i=0; $i < 5; $i++) { 
        array_push($loto, rand(1, 49));
    }
    var_dump($loto);

    echo "<h1>boucle while pour 5 nom aleatoires entre 1 et 49</h1>";
    $loto = array();
    while ($i <= 5) {
        
    }
?>