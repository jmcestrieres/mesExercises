# Afficher une variable
Affichez la variable $hello.
Quel est son type ?

# Concaténer des variables avec du texte
A l'aide de l'opérateur de concaténation (le point en Php), afficher le texte "Hello, World !" en utilisant les variables $hello et $world.
Mettez tout ça dans une 3ème variable et affichez-là (l'affichage doit être le même ;-) ). 

# Variables numériques
Déclarez une variable $montantHt (observez la casse), et affectez-lui une valeur, par exemple 15.2.
Calculez le montant TTC correspondant, stockez-le dans une variable, et affichez-le (avec un peu de texte avant ;-) ).

# Tableaux
Le fichier tableaux.php montre 2 manières de déclarer un tableau en Php.<br>
L'instruction var_dump($tab) permet d'afficher le contenu de la variable $tab dans le navigateur.<br>
Pour un affichage confortable, installez x-debug => apt://php-xdebug. Puis configurez votre fichier php.ini (etc/php/apache2/php.ini) en modifiant la ligne suivante :<br>
display_errors = On.<br>Enfin, redémarrez apache : <b>sudo service apache2 restart</b><br>
Lisez et comprenez toutes les informations affichées par l'instruction var_dump.<br>
Ceci vous sera très utile pour afficher l'état de vos variables...<br>

<br>Affichez le contenu de la variable $jours

## Php contient un grand nombre de fonctions utilisables sur les tableaux => <a href="http://php.net/manual/fr/ref.array.php">Ici</a>

## Parcourir un tableau
Rappel : les éléments d'un tableau sont indicés à partir de 0 !
Entraînez-vous à sélectionner/afficher certains éléments du tableau $jours. Par exemple, pour obtenir l'élément d'indice 2 (le troisième donc), on utilisera la syntaxe suivante : $jours[2];<br>
## Ajouter un élément
Ajoutez l'élément "Dimanche" à la fin du tableau (plusieurs façons de faire).
## Supprimer un élément
Supprimez l'élément "Dimanche" du tableau (plusieurs façons de faire).
## Testez !
N'hésitez pas à tester d'autres fonctions de manipulation de tableaux comme array_shift(), array_slice(), array_splice(), sort() !..

# Tableaux Associatifs
Vous connaissez ? Il s'agit de tableaux dont les éléments sont des paires clé/valeur (jargon) ; il sont très utilisés en Php !<br>
On peut accéder à une valeur du tableau avec la syntaxe : $nom_du_tableau[clé].<br>
Observez le tableau associatif $activites du fichier tableaux_associatifs.php.<br>
Faites un var_dump().<br>
Modifiez l'activité de Dimanche (faut pas exagérer!..quoique des fois...).<br>
Il existe des fonctions pour rechercher un élément par sa clé, par sa valeur...<br>

## Deux dimensions...
Dans le fichier tableaux_associatifs.php, vous trouverez 3 tableaux nommés $pierre, $paul et $jacques. Ces tableaux représentent les langages préférés de Pierre, Paul et Jacques.<br>
Dans le tableau $preferences, ajoutez ces 3 tableaux, d'abord sans nommer les clés (indices), puis en nommant les clés (pierre,paul,jacques).<br>
Maintenant, cela serait bien de pouvoir compter le nombre d'occurences de chaque langage dans l'ensemble des tableaux. Essayer de le faire sans parcourir les tableaux à l'aide de boucles, juste avec des fonctions Php. Vous pouvez créer des tableaux intermédiaires si nécessaire. Affichez (avec var_dump()) le palmares des langages (le préféré en premier)<br>
