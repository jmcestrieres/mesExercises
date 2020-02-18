<?php include "template/menu.php";?>
       
<?php

$bdd= new PDO("mysql:host=localhost;dbname=rhuma_sug;charset=utf8", "jean-marc", "floride64");

if(isset($_POST['inscription']))
{
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $adresse = htmlspecialchars($_POST['adresse']);
    $ville = htmlspecialchars($_POST['id_ville']);
    $codepostal = htmlspecialchars($_POST['codepostal']);
    $tel = htmlspecialchars($_POST['tel']);
    $email = htmlspecialchars($_POST['email']);
    $email2 = htmlspecialchars($_POST['email2']);
    $mdp = sha1($_POST['mdp']);
    $mdp2 = sha1($_POST['mdp2']);
    
    if(!empty($_POST['nom'])        AND 
       !empty($_POST['prenom'])     AND 
       !empty($_POST['adresse'])    AND 
       !empty($_POST['id_ville'])   AND 
       !empty($_POST['codepostal']) AND 
       !empty($_POST['tel'])        AND 
       !empty($_POST['email'])      AND 
       !empty($_POST['email2'])     AND 
       !empty($_POST['mdp'])        AND 
       !empty($_POST['mdp2']))
    {

        $nomLength = strlen($nom);
        if($nomLength <= 50)
        {
            if($email == $email2)
            {
                if(filter_var($email, FILTER_VALIDATE_EMAIL))
                {
                   
                    $reqmail = $bdd->prepare("SELECT * FROM Client WHERE email = ?");
                    $reqmail->execute(array($mail));
                    $mailexist = $reqmail->rowCount();
                    if($mailexist == 0)
                    {

                    
                        if($mdp == $mdp2)
                        {
                            $test = $bdd->prepare("INSERT INTO Client (nom,prenom, adresse, id_ville, codepostal, tel, email, mdp) VALUES (:nom, :prenom, :adresse, :ville, :codepostal, :tel, :email, :mdp)");
                            $test->bindParam(":prenom", $nom);
                            $test->bindParam(":nom", $prenom);
                            $test->bindParam(":adresse", $adresse);
                            $test->bindParam(":ville", $ville);
                            $test->bindParam(":codepostal", $codepostal);
                            $test->bindParam(":tel", $tel);
                            $test->bindParam(":email", $email);
                            $test->bindParam(":mdp", $mdp);


                            $lala = $test->execute();
                            var_dump($lala);
                            var_dump("ok fait");
                            $cree = "Votre compte a bien été crée";
                        }         
                        }
                        else
                        {
                            $erreur = "! Vos mots de passe de sont pas identiques";
                        }
                    }
                    else
                    {
                        $erreur = "! Adresse mail déjà utilisée";
                    }
                }
                else
                {
                    $erreur = "! Votre adresse mail n'est pas valide";
                }

            }else
            {
                $erreur = "! Vos adresses mail ne correspondent pas";
            }

        }
        else
        {
            $erreur = "! Votre nom de doit pas dépasser 50 caractères maxi";
        }
    }
    else
    {
        $erreur = "! Tous les champs doivent être complétés";
    }

// $test = $bdd->prepare("INSERT INTO Client (nom,prenom, adresse, id_ville, codepostal, tel, email, mdp) VALUES (:nom, :prenom, :adresse, :ville, :codepostal, :tel, :email, :mdp)");
// $test->bindParam(":prenom", $_POST["prenom"]);
// $test->bindParam(":nom", $_POST["nom"]);
// $test->bindParam(":adresse", $_POST["adresse"]);
// $test->bindParam(":ville", $_POST["id_ville"]);
// $test->bindParam(":codepostal", $_POST["codepostal"]);
// $test->bindParam(":tel", $_POST["tel"]);
// $test->bindParam(":email", $_POST["email"]);
// $test->bindParam(":mdp", $_POST["mdp"]);


// $lala = $test->execute();
// var_dump($lala);
// var_dump("ok fait");


    

?>

      

<body>


    
    <div class="container-fluid bg-2">
        <h3 class="margin text-center">INSCRITPION</h3>
        <form action="inscription.php" method="POST" class="col-md-6 col-md-offset-3">
        
        <?php
        if(isset($erreur))
        {
            echo '<font color="red">'.$erreur.'</font>';
        }
        if(isset($cree))
        {
            echo '<font color="green">'.$cree.'</font>';
        }
        ?>
            
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" name="nom" class="form-control" id="nom" placeholder="Votre nom" value="<?php if(isset($nom)) {echo $nom; }?>">
            </div>
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" name="prenom" class="form-control" id="prenom" placeholder="Votre prénom" value="<?php if(isset($prenom)) {echo $prenom; }?>">
            </div>
            <div class="form-group">
                <label for="adresse">Adresse</label>
                <input type="text" name="adresse" class="form-control" id="adresse" placeholder="Votre Adresse" value="<?php if(isset($adresse)) {echo $adresse; }?>">
            </div>
            <div class="form-group">
                <label for="id_ville">Ville</label>
                <input type="text" name="id_ville" class="form-control" id="id_ville" placeholder="Votre Ville" value="<?php if(isset($ville)) {echo $ville; }?>">
            </div>
            <div class="form-group">
                <label for="codepostal">Code Postal</label>
                <input type="text" name="codepostal" class="form-control" id="codepostal" placeholder="Votre code postal" value="<?php if(isset($codepostal)) {echo $codepostal; }?>">
            </div>
            <div class="form-group">
                <label for="tel">Téléphone</label>
                <input type="tel" name="tel" class="form-control" id="tel" placeholder="Votre téléphone" value="<?php if(isset($tel)) {echo $tel; }?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Votre Email" value="<?php if(isset($email)) {echo $email; }?>">
            </div>
            <div class="form-group">
                <label for="email2">Confirmation Email</label>
                <input type="email" name="email2" class="form-control" id="email2" placeholder="Confirmez Email" value="<?php if(isset($email2)) {echo $email2; }?>">
            </div>
            <div class="form-group">
                <label for="mdp">Mot de passe</label>
                <input type="password" name="mdp" class="form-control" pattern="[A-Za-z0-9]+" minlength="8" id="mdp" placeholder="choisissez un mot de passe">
                <div class="help-block">Minimum de 8 caractères</div>
            </div>
            <div class="form-group">
                <label for="mdp2">Confirmation du Mot de passe</label>
                <input type="password" name="mdp2" class="form-control" pattern="[A-Za-z0-9]+" minlength="8" id="mdp2" placeholder="confirmez mot de passe">
            </div>
            
            <button type="submit" name="inscription" class="btn btn-default" value="Save">Je m'inscris</button>
        
        </form>
    </div>

<?php include "template/footer.php";?>
        
       
        
    

