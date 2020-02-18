<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php



echo "<h1>boucle for pour 5 nom aleatoires entre 1 et 49</h1>";
$loto = array();
for ($i = 0; $i < 5; $i++) {
    array_push($loto, rand(1, 49));
}
var_dump($loto);



echo "<h1>boucle while pour 5 nom aleatoires entre 1 et 49</h1>";
$loto2 = array();
$a = 1;
while ($a <= 5) {
    $a++;
    if (in_array(rand(1, 49), $loto2)) {
        array_push($loto2, rand(1, 49));
    }else{

        array_push($loto2, rand(1, 49));
    }
}
var_dump($loto2);


?>
</body>
</html>