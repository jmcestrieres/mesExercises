    
    
    <?php
        include "template/menu.php";
        
        include 'template/rooter.php';
        $init = new Rooter('root', 'accueil.php');
        var_dump($_GET['page']);

        
        
        // include "template/firstcontainer.php";
        // include "template/secondcontainer.php";
        // include "template/thirdcontainer.php";
        include 'template/footer.php';

    ?>