<?php include "template/menu.php";?>
        
       
        
    
<?php

$dsn= new PDO("mysql:host=localhost;dbname=projet_rhum;charset=utf8", "jean-marc", "floride64");
    $test = $dsn->prepare("INSERT INTO contact (nom, prenom, email, msg) VALUES (:nom, :prenom, :email, :msg)");
    $test->bindParam(":prenom", $_POST["prenom"]);
    $test->bindParam(":nom", $_POST["nom"]);
    $test->bindParam(":email", $_POST["email"]);
    $test->bindParam(":msg", $_POST["msg"]);
    
    
    
    $lala = $test->execute();
    // var_dump($lala);
    // var_dump("ok fait");

?>

<body>

    

    <!-- First Container -->
    <div class="container-fluid bg-2">
        <h3 class="margin text-center">Contactez-nous</h3>
        <form action='' method='POST' class="col-md-6 col-md-offset-3">
            <div class="form-group">
                <label for="exampleInputEmail1">Nom</label>
                <input type="text" name="nom" class="form-control" id="exampleInputEmail1" placeholder="Votre nom">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Prénom</label>
                <input type="text" name="prenom"class="form-control" id="exampleInputEmail1" placeholder="Votre prénom">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" name="email"class="form-control" id="exampleInputEmail1" placeholder="Votre Email">
            </div>
            <div class="form-group">
                <label for="comment">Message</label>
                <textarea class="form-control" name="msg" rows="5" id="message" placeholder="Votre message"></textarea>
            </div>
            <button type="submit" class="btn btn-default">Envoyer</button>
        </form>
    </div>

    <!-- Footer -->
    <?php
        include "template/footer.php";
       
        
    ?>

</body>

</html>