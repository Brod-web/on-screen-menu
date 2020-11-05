<div class="container-fluid">
    <div class="alert alert-success mt-3" role="alert">
        <?$msg = "Gérez ici vos menus ou formules. Choisissez les catégories et produits à faire apparaître à votre carte.";
        echo $msg;?>
    </div>
<div class="tile">
  <table class="table table-responsive table-bordered">
    <thead>
      <tr class="table-success">
        <th class="text-center">Ordre</th>
        <th class="col-5">Votre menu ou formule</th>
        <th>Prix</th>
        <th class="col-2"></th>
        <th class="col-2"></th>
      </tr>
    </thead>
    <tbody>
      <?foreach($menus as $menu){?>
        <tr class="selectionable">
          <?=form_open('back/order_menu/'.$menu->id)?>
          <td>
            <div class="d-flex flex-inline">
            <input class="btn" type="submit" name="order" value="-"> 
            <!--<div class="mt-2"><?=$menu->show_order?></div>-->
            <input class="btn" type="submit" name="order" value="+">
            </div>
          </td>
          <td>
            <?=$menu->name?> > <span style="color: blue;"><?=$countCats[$menu->id]?> catégorie(s) et <?=$countProducts[$menu->id]?> produit(s)</span>
            <br><?=$menu->description?>
          </td>
          <td><?=$menu->price?> €</td>
          </form>
          <!-- Boutons Modifier / Supprimer -->
          <td><a class="btn btn-info" 
          href="<? echo base_url('back/mod_menu/'.$menu->id)?>">Modifier</a></td>
          <td><button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal-<?=$menu->id?>">Supprimer</button></td>
          <!-- Fenetre modal Confirmation suppression, data-target personnalisé -->
          <div class="modal fade" id="deleteModal-<?=$menu->id?>" tabindex="-1" role="dialog" aria-hidden="true">
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
                      <?if($countCats[$menu->id] > 0){
                        echo "Ce menu n'est pas vide.</br>
                        Supprimez tout d'abord produit(s) et catégorie(s) associé(s).";
                      } else {  
                        echo "Tous les liens vers ce menu seront aussi supprimer.
                        </br>Confirmez-vous la suppression de : $menu->name ?";?>
                      <?}?>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                  <?if($countCats[$menu->id] == 0){?>
                    <a class="btn btn-danger" href="<? echo base_url('back/del_menu/'.$menu->id)?>">Supprimer</a>
                  <?}?>
                </div>
              </div>
            </div>
          </div>

        </tr>
      <?}?>
    </tbody>
  </table>
  <div>
      <a class="btn btn-info mb-3" href="<? echo base_url("back/add_menu")?>">Ajouter un menu / formule</a>
  </div>
</div>  