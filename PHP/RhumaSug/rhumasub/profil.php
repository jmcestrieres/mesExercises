<?php include "template/menu.php"; ?>

<?php
// session_start();

$bdd = new PDO("mysql:host=localhost;dbname=projet_rhum;charset=utf8", "jean-marc", "floride64");

include_once "membres/cookieconnect.php";


if (isset($_GET['id']) and $_GET['id'] > 0) {

    $getid = intval($_GET['id']); //sécurise la variable
    $requser = $bdd->prepare('SELECT * FROM Client WHERE id = ?');
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();
?>
    <div class="container-fluid bg-3">
        <h3 class="margin text-center">PROFIL</h3>
    </div>
    <main>
        <header>
            <span class="entete">
                <?php
                if (isset($_SESSION['id']) and $userinfo['id'] == $_SESSION['id']) {
                ?>
                    <h2><?php echo ucwords($userinfo['prenom']), ' ', ucwords($userinfo['nom']) ?></h2>
                    <a href="deconnexion.php">Se déconnecter</a>

                <?php
                }
                ?>
            </span>
            <?php
            if(!empty($userinfo['photoprofil']))
            {
            ?>
            <img src="membres/photoprofil/<?= $userinfo['photoprofil'];?>" class="img-circle" width="90vh" alt="">
            <?php
            }
            else
            {
            ?>
                <img src="https://mgl.skyrock.net/big.137599580.jpg?77728486" class="img-circle" width="90vh" alt="">  
            <?php
            }
            ?>
        </header>


        <section id="moi">



            <article class="container">
                <div>
                    <?php
                    if (isset($_SESSION['id']) and $userinfo['id'] == $_SESSION['id']) {
                    ?>

                        <a href="editionprofil.php">Modifier mon profil</a>
                        <a href="">Historique commandes</a>
                    <?php
                    }
                    ?>
                </div>
                <?php
                if (isset($_SESSION['id']) and $userinfo['id'] == $_SESSION['id']) {
                ?>
                    <h3>Nom : <?php echo ucwords($userinfo['nom']) ?></h3>
                    <h3>Prénom : <?php echo ucwords($userinfo['prenom']) ?></h3>
                    <h3>Email : <?php echo strtolower($userinfo['email']) ?></h3>
                    <h3>Téléphone : <?php echo wordwrap($userinfo['tel'], 2, ' ', true); ?></h3>
                <?php
                }
                ?>



            </article>
            <article>
            </article>
        </section>


    </main>



    <?php include "template/footer.php"; ?>

<?php
}
?>