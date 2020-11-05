<div class="tile mt-3">
  <table class="table table-responsive table-bordered">
    <thead>
      <tr class="table-success">
        <th class="text-center">Photo</th>
        <th class="text-center">Ordre</th>
        <th class="col-5">produit</th>
        <th>prix</th>
        <th class="col-2"></th>
        <th class="col-2"></th>
      </tr>
    </thead>
    <tbody>
      <?foreach($products as $product){?>
        <tr class="selectionable">
          <?=form_open('back/order_product/'.$product->id)?>
            <td><?=$product->photo_url?></td>
            <td>
              <div class="d-flex flex-inline">
              <input class="btn" type="submit" name="order" value="-"> 
              <!--<div class="mt-2"><?=$product->show_order?></div> Affiche order-->
              <input class="btn" type="submit" name="order" value="+">
              </div>
            </td>
            <td><?=$product->name?><br><?=$product->description?></td>
            <td><?=$product->price?> €</td>
          </form>
          <!-- Boutons Modifier / Supprimer -->
          <td><a class="btn btn-info" 
          href="<? echo base_url('back/mod_product/'.$product->id)?>">Modifier</a></td>
          <td><button class="btn btn-danger delete" data-toggle="modal" value="<?=$product->id?>" data-target="#deleteModal-<?=$product->id?>">Supprimer</button></td>
          <!-- Fenetre modal Confirmation suppression, data-target personnalisé -->
          <div class="modal fade" id="deleteModal-<?=$product->id?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Supprimer</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="alert alert-danger mt-3 text-center" role="alert">
                      <? echo "Tous les liens vers ce produit seront aussi supprimer.
                      </br>Confirmez-vous la suppression de $product->name ?"?>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                  <a class="btn btn-danger" href="<? echo base_url('back/del_product/'.$product->id)?>">Supprimer</a>
                </div>
              </div>
            </div>
          </div>
        </tr>
      <?}?>
    </tbody>
  </table>
  <div>
      <a class="btn btn-info mb-3" href="<? echo base_url('back/add_product')?>">Ajouter un produit</a>
  </div>
</div>

<script>
/* Pour mémoire
$('.delete').click(function(){
  let deleteId = $(this).val();
  console.log(deleteId);
}); */
</script>