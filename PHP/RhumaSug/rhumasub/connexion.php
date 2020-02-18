<?php include "template/menu.php"; ?>
<?php include_once "membres/cookieconnect.php"; ?>

<?php


$bdd = new PDO("mysql:host=localhost;dbname=projet_rhum;charset=utf8", "jean-marc", "floride64");


if (isset($_POST['connexion'])) {
    $mailConnect = htmlspecialchars($_POST['mailconnect']);
    $mdpConnect = sha1($_POST['mdpconnect']);

    if (!empty($mailConnect) and !empty($mdpConnect)) {
        $requser = $bdd->prepare("SELECT * FROM Client WHERE email = ? AND mdp = ?");
        $requser->execute(array($mailConnect, $mdpConnect));
        $userExist = $requser->rowCount();
        if ($userExist == 1) 
        {   
            if(isset($_POST['rememberme'])){
                setcookie('email', $mailConnect, time()+365*24*3600,null,null,false,true);
                setcookie('mdp', $mdpConnect, time()+365*24*3600,null,null,false,true);
            }
            $userinfo = $requser->fetch();
            $_SESSION['id'] = $userinfo['id'];
            $_SESSION['nom'] = $userinfo['nom'];
            $_SESSION['email'] = $userinfo['email'];
            header("Location: profil.php?id=" . $_SESSION['id']);
        } else {
            $erreur = "! Mauvais Email ou mot de passe";
        }
    } else {
        $erreur = "! Tous les champs doivent être complétés";
    }
}
?>

<body>

    <div class="container-fluid bg-2">
        <h3 class="margin text-center">CONNEXION</h3>
        <form action="" method='POST' class="col-md-6 col-md-offset-3">
            <?php
            if (isset($erreur)) {
                echo '<font color="red">' . $erreur . '</font>';
            }
            if (isset($cree)) {
                echo '<font color="green">' . $cree . '</font>';
            }
            ?>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="mailconnect" class="form-control" id="email" placeholder="Votre Email">
            </div>
            <div class="form-group">
                <label for="mdp">Mot de passe</label>
                <input type="password" name="mdpconnect" class="form-control" id="mdp" pattern="[A-Za-z0-9]+" minlength="8" placeholder="tapez votre mot de passe">
            </div>


            <button type="submit" name="connexion" class="btn btn-default mt-1">Connecter</button>

            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="rememberme" id="defaultUnchecked">
                <label class="custom-control-label" for="defaultUnchecked" >Se souvenir de moi</label>
            </div>

            <div class="form-group">

                <br>

                <p>Cliquez <a href="inscription.php">ici </a>si vous n'êtes pas encore inscrit</p>
                <p>Vous avez oublié votre mot de passe, cliquez<a href="recuperation.php"> ici </a></p>
        </form>
    </div>
    </div>
    

    <?php include "template/footer.php"; ?>