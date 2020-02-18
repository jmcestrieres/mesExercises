<?php include "template/menu.php"; ?>

<?php
// session_start();


if (isset($_POST['recup_submit'], $_POST['recup_email'])) {
    if (!empty($_POST['recup_email'])) {
        $recup_email = htmlspecialchars($_POST['recup_email']);
        if (filter_var($recup_email, FILTER_VALIDATE_EMAIL)) {
            $emailexist = $bdd->prepare('SELECT id,nom FROM Client WHERE email = ?');
            $emailexist->execute(array($recup_email));
            $emailexist_count = $emailexist->rowCount();
            if ($emailexist_count == 1) {
                $nom = $emailexist->fetch();
                $nom = $nom['nom'];

                $_SESSION['recup_email'] = $recup_email;
                $recup_code = "";
                for ($i = 0; $i < 8; $i++) {
                    $recup_code .= mt_rand(0, 9);
                }
                $email_recup_exist = $bdd->prepare('SELECT id FROM recuperation WHERE email = ?');
                $email_recup_exist->execute(array($recup_email));
                $email_recup_exist = $email_recup_exist->rowCount();
                if ($email_recup_exist == 1) {
                    $recup_insert = $bdd->prepare('UPDATE recuperation SET code = ? WHERE email = ?');
                    $recup_insert->execute(array($recup_code, $recup_email));
                } else {
                    $recup_insert = $bdd->prepare('INSERT INTO recuperation(email,code) VALUES (?, ?)');
                    $recup_insert->execute(array($recup_email, $recup_code));
                }
                $header = "MIME-Version: 1.0\r\n";
                $header .= 'From:"[Rhuma Sug]"<strobo94@gmail.com>' . "\n";
                $header .= 'Content-Type:text/html; charset="utf-8"' . "\n";
                $header .= 'Content-Transfer-Encoding: 8bit';
                $message = '
         <html>
         <head>
           <title>Récupération de mot de passe - Rhuma Sug</title>
           <meta charset="utf-8" />
         </head>
         <body>
           <font color="#303030";>
             <div align="center">
               <table width="600px">
                 <tr>
                   <td>
                     
                     <div align="center">Bonjour <b>' . $nom . '</b>,</div>
                     Voici votre code de récupération: <b>' . $recup_code . '</b>
                     A bientôt sur <a href="#">rhumasug.com</a> !
                     
                   </td>
                 </tr>
                 <tr>
                   <td align="center">
                     <font size="2">
                       Ceci est un email automatique, merci de ne pas y répondre
                     </font>
                   </td>
                 </tr>
               </table>
             </div>
           </font>
         </body>
         </html>
         ';
                mail($recup_email, "Récupération de mot de passe - Rhuma Sug", $message, $header);
                header("Location:http://localhost:3000/rhumasub/oublimdp.php?section=code");
            } else {
                $error = "Cette adresse mail n'est pas enregistrée";
            }
        } else {
            $error = "Adresse mail invalide";
        }
    } else {
        $error = "Veuillez entrer votre adresse mail";
    }
}
if (isset($_POST['verif_submit'], $_POST['verif_code'])) {
    if (!empty($_POST['verif_code'])) {
        $verif_code = htmlspecialchars($_POST['verif_code']);
        $verif_req = $bdd->prepare('SELECT id FROM recuperation WHERE email = ? AND code = ?');
        $verif_req->execute(array($_SESSION['recup_email'], $verif_code));
        $verif_req = $verif_req->rowCount();
        if ($verif_req == 1) {
            $up_req = $bdd->prepare('UPDATE recuperation SET confirme = 1 WHERE email = ?');
            $up_req->execute(array($_SESSION['recup_email']));
            header('Location:http://localhost:3000/rhumasub/oublimdp.php?section=change_mdp');
        } else {
            $error = "Code invalide";
        }
    } else {
        $error = "Veuillez entrer votre code de confirmation";
    }
}
if (isset($_POST['change_submit'])) {
    if (isset($_POST['change_mdp'], $_POST['change_mdpc'])) {
        $verif_confirme = $bdd->prepare('SELECT confirme FROM recuperation WHERE email = ?');
        $verif_confirme->execute(array($_SESSION['recup_email']));
        $verif_confirme = $verif_confirme->fetch();
        $verif_confirme = $verif_confirme['confirme'];
        if ($verif_confirme == 1) {
            $mdp = htmlspecialchars($_POST['change_mdp']);
            $mdpc = htmlspecialchars($_POST['change_mdpc']);
            if (!empty($mdp) and !empty($mdpc)) {
                if ($mdp == $mdpc) {
                    $mdp = sha1($mdp);
                    $ins_mdp = $bdd->prepare('UPDATE Client SET mdp = ? WHERE email = ?');
                    $ins_mdp->execute(array($mdp, $_SESSION['recup_email']));
                    $del_req = $bdd->prepare('DELETE FROM recuperation WHERE email = ?');
                    $del_req->execute(array($_SESSION['recup_email']));
                    header('Location:http://localhost:3000/rhumasub/connexion.php?page=connexion');
                } else {
                    $error = "Vos mots de passes ne correspondent pas";
                }
            } else {
                $error = "Veuillez remplir tous les champs";
            }
        } else {
            $error = "Veuillez valider votre mail grâce au code de vérification qui vous a été envoyé par mail";
        }
    } else {
        $error = "Veuillez remplir tous les champs";
    }
}
?>



<body>

    <div class="container-fluid bg-2">
    <h3 class="margin text-center">RECUPERATION DU MOT DE PASSE</h3>
    <form method='POST' class="col-md-6 col-md-offset-3">
        <?php if ($section == 'code') { ?>
            Un code de vérification vous a été envoyé par mail: <?= $_SESSION['recup_email'] ?>
            <div class="form-group">

                <input type="text" class="form-control" placeholder="Code de vérification" name="verif_code" />
            </div>
            <button type="submit" name="verif_submit" class="btn btn-default mt-1">Valider</button>
    </form>
<?php } elseif ($section == "change_mdp") { ?>
    Nouveau mot de passe pour <?= $_SESSION['recup_email'] ?>
    <form method="post">
        <input type="password" class="form-control" placeholder="Nouveau mot de passe" name="change_mdp" /><br />
        <input type="password" class="form-control" placeholder="Confirmation du mot de passe" name="change_mdpc" /><br />
        <button type="submit" name="change_submit" class="btn btn-default mt-1">Valider</button>
    </form>
<?php } else { ?>
    <form method="post">
        <input type="email" class="form-control" placeholder="Votre adresse mail" name="recup_email" /><br />
        <button type="submit" name="recup_submit" class="btn btn-default mt-1">Valider</button>
    </form>
<?php } ?>
<?php if (isset($error)) {
    echo '<span style="color:red">' . $error . '</span>';
} else {
    echo "";
} ?>
</div>


<?php include "template/footer.php"; ?>