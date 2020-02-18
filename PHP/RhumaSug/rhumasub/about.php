    <?php include "template/menu.php";
        // session_start();
        
        
        
    ?>

<body>

   

    <!-- First Container -->
    <div class="container-fluid bg-3 text-center">
        <h3 class="margin">Qui sommes nous?</h3>
        <img src="<?= img?>/distillerie.jpg" class="img-responsive img-circle margin" style="display:inline" alt="Bird" width="350" height="350">
        <h3>I'm an adventurer</h3>
    </div>

    <!-- Second Container -->
    <div class="container-fluid bg-4 text-center">
        <h3 class="margin">Qui sommes nous?</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
            aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        </p>
        <a href="#" class="btn btn-default btn-lg">
            <span class="glyphicon glyphicon-search"></span> Search
        </a>
    </div>

    <!-- Third Container (Grid) -->
    <div class="container-fluid bg-3 text-center ">
        <h3 class="margin">Comment nous trouver</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
            magna aliqua.</p>
        <br>
        <div class="col-md-12 col-md-offset-1">
            <div class="col-sm-5 ">
                
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d11611.052666312238!2d-0.3741843302246093!3d43.31921699999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfr!2sfr!4v1580291550457!5m2!1sfr!2sfr" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            </div>
            <div class="col-sm-4">
                <img src="<?= img?>/carte.jpg" class="img-responsive margin" style="width:100%" alt="Image">
            </div>
            
        </div>
    </div>

    <?php
include "template/footer.php";
?>

</body>

</html>