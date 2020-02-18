<?php include "template/menu.php";?>


<div class="container-fluid bg-2" style="height:100vh">
  <h3 class="margin text-center">VOTRE PANIER</h3>
        <div class="container">
          
          
          <table class="table table-bordered bg-3">
            <thead class="thead-dark">
              <tr>
                <th>Photo</th>
                <th>Désignation</th>
                <th>Prix Unitaire</th>
                <th>Quantité</th>
              </tr>
            </thead>
            
            <tr>
              <td><img src="<?= img ?>/agricole.jpg" width="40%" ></td>
              <td>Rhum agricole</td>
              <td>34 €</td>
              <td>1</td>
            </tr>
            
            
          </table>
          

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Payer</button>
</div>

       
    </div>

<!-- Modal -->
<div style="color:black" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"style="color:black">Validation du panier</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Commande validée !
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary"data-dismiss="modal">Ok</button>
      </div>
    </div>
  </div>
</div>



<?php include "template/footer.php";?>



