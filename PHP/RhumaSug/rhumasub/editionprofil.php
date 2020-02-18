<?php include "template/menu.php";?>


<?php
// session_start();

$bdd= new PDO("mysql:host=localhost;dbname=projet_rhum;charset=utf8", "jean-marc", "floride64");

include_once "membres/cookieconnect.php";

if(isset($_SESSION['id']))

{
    $requser = $bdd->prepare("SELECT * FROM Client WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();
    if(isset($_POST['newadresse']) AND !empty($_POST['newadresse']) AND $_POST['newadresse'] != $user['adresse']) {
        $newadresse = htmlspecialchars($_POST['newadresse']);
        $insertadresse = $bdd->prepare("UPDATE Client SET adresse = ? WHERE id = ?");
        $insertadresse->execute(array($newadresse, $_SESSION['id']));
        $cree = "Vos profil a bien été mis a jour ! <button type=\"submit\" name=\"retourprofil\" class=\"btn btn-success\" value=\"Save\">Retour au profil</button>";
     }
     if(isset($_POST['newville']) AND !empty($_POST['newville']) AND $_POST['newville'] != $user['ville']) {
        $newville = htmlspecialchars($_POST['newville']);
        $insertville = $bdd->prepare("UPDATE Client SET ville = ? WHERE id = ?");
        $insertville->execute(array($newville, $_SESSION['id']));
        $cree = "Vos profil a bien été mis a jour ! <button type=\"submit\" name=\"retourprofil\" class=\"btn btn-success\" value=\"Save\">Retour au profil</button>";
     }
     if(isset($_POST['newcodepostal']) AND !empty($_POST['newcodepostal']) AND $_POST['newcodepostal'] != $user['codepostal']) {
        $newcodepostal = htmlspecialchars($_POST['newcodepostal']);
        $insertcodepostal = $bdd->prepare("UPDATE Client SET codepostal = ? WHERE id = ?");
        $insertcodepostal->execute(array($newcodepostal, $_SESSION['id']));
        $cree = "Vos profil a bien été mis a jour ! <button type=\"submit\" name=\"retourprofil\" class=\"btn btn-success\" value=\"Save\">Retour au profil</button>";
     }
     if(isset($_POST['newtel']) AND !empty($_POST['newtel']) AND $_POST['newtel'] != $user['tel']) {
        $newtel = htmlspecialchars($_POST['newtel']);
        $inserttel = $bdd->prepare("UPDATE Client SET tel = ? WHERE id = ?");
        $inserttel->execute(array($newtel, $_SESSION['id']));
        $cree = "Vos profil a bien été mis a jour ! <button type=\"submit\" name=\"retourprofil\" class=\"btn btn-success\" value=\"Save\">Retour au profil</button>";
     }
     if(isset($_POST['newemail']) AND !empty($_POST['newemail']) AND $_POST['newemail'] != $user['email']) {
        $newemail = htmlspecialchars($_POST['newemail']);
        $insertemail = $bdd->prepare("UPDATE Client SET email = ? WHERE id = ?");
        $insertemail->execute(array($newemail, $_SESSION['id']));
        $cree = "Vos profil a bien été mis a jour ! <button type=\"submit\" name=\"retourprofil\" class=\"btn btn-success\" value=\"Save\">Retour au profil</button>";
     }
     if(isset($_POST['newmdp']) AND !empty($_POST['newmdp']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2'])) {
        $mdp = sha1($_POST['newmdp']);
        $mdp2 = sha1($_POST['newmdp2']);
        if($mdp == $mdp2) {
           $insertmdp = $bdd->prepare("UPDATE Client SET mdp = ? WHERE id = ?");
           $insertmdp->execute(array($mdp, $_SESSION['id']));
           $cree = "Vos profil a bien été mis a jour ! <button type=\"submit\" name=\"retourprofil\" class=\"btn btn-link\" value=\"Save\">Retour au profil</button>";

    } else {
        $erreur = "Vos deux mdp ne correspondent pas !";
    }
}

if(isset($_FILES['photoprofil']) AND !empty($_FILES['photoprofil']['name']))
{
    $taillemax = 2097152;
    $extensionsvalides = array('jpg', 'jpeg', 'gif', 'png');
    if($_FILES['photoprofil']['size'] <= $taillemax)
    {
        $extensionupload = strtolower(substr(strrchr($_FILES['photoprofil']['name'],'.'),1));

        if(in_array($extensionupload, $extensionsvalides))
        {
            $chemin = "membres/photoprofil/".$_SESSION['id'].'.'.$extensionupload;
            $resultat = move_uploaded_file($_FILES['photoprofil']['tmp_name'],$chemin);
            if($resultat)
            {
                $updateavatar = $bdd->prepare('UPDATE Client SET photoprofil = :photoprofil WHERE id = :id');
                $updateavatar->execute(array(
                    'photoprofil' => $_SESSION['id'].".".$extensionupload,
                    'id' => $_SESSION['id']
                ));
                $cree = "Vos profil a bien été mis a jour ! <button type=\"submit\" name=\"retourprofil\" class=\"btn btn-link\" value=\"Save\">Retour au profil</button>";
            }
            else
            {
                $erreur = "Erreur durant l'importation de votre photo de profil";
            }
        }
        else
        {
            $erreur = "Votre photo de profil doit être au format jpg, jpeg, gif ou png";
        }
    }
    else
    {
        $erreur = "Votre photo de profil ne doit pas dépasser 2Mo";
    }
}

if(isset($_POST['retourprofil']))
{
    header('Location: profil.php?id='.$_SESSION['id']);
}
  ?>
    
<div class="container-fluid bg-7">
        <h3 class="margin text-center">MISE A JOUR DU PROFIL</h3>
        <form action="" method="POST" class="col-md-6 col-md-offset-3" enctype="multipart/form-data">
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
                <?php echo ucwords($user['prenom']);?>
                <?php echo ucwords($user['nom']);?>
                
            </div>
            <div class="form-group">
                    <label for="photoprofil">Photo de profil</label>
                    <input type="file" name="photoprofil" class="form-control" id="photoprofil" value="">
                </div>
            
            <div class="form-group">
                <label for="newadresse">Adresse</label>
                <input type="text" name="newadresse" class="form-control" id="newadresse" placeholder="Votre Adresse" value="<?php echo $user['adresse'];?>">
            </div>
            <div class="form-group">
                <label for="newville">Ville</label>
                <input type="text" name="newville" class="form-control" id="newville" placeholder="Votre Ville" value="<?php echo $user['ville'];?>">
            </div>
            <div class="form-group">
                <label for="newcodepostal">Code Postal</label>
                <input type="text" name="newcodepostal" class="form-control" id="newcodepostal" placeholder="Votre code postal" value="<?php echo $user['codepostal'];?>">
            </div>
            <div class="form-group">
                <label for="newtel">Téléphone</label>
                <input type="tel" name="newtel" class="form-control" id="newtel" placeholder="Votre téléphone" value="<?php echo $user['tel'];?>">
            </div>
            <div class="form-group">
                <label for="newemail">Email</label>
                <input type="email" name="newemail" class="form-control" id="newemail" placeholder="Votre Email" value="<?php echo $user['email'];?>">
            </div>
            <div class="form-group">
                <label for="newmdp">Nouveau mot de passe</label>
                <input type="password" name="newmdp" class="form-control " pattern="[A-Za-z0-9]+" minlength="8" id="newmdp" placeholder="confirmez mot de passe">
            </div>
            <div class="form-group">
                <label for="newmdp2">Confirmez nouveau mot de passe</label>
                <input type="password" name="newmdp2" class="form-control" pattern="[A-Za-z0-9]+" minlength="8" id="newmdp2" placeholder="confirmez mot de passe">
            </div>
            
            <button type="submit" name="miseajour" class="btn btn-success" value="Save">Mettre à jour</button>
            <button type="submit" name="retourprofil" class="btn btn-link" value="Save">Retour au profil</button>
        
        </form>
    </div>


<?php
}
else
{
    header("Location: connexion.php");
}
?>

<?php include "template/footer.php";?>
