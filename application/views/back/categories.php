<div class="container-fluid">
    <div class="alert alert-success mt-3" role="alert">
        <?$msg = "Ajoutez, modifiez, supprimez vos catégories. Elle permettent un classement ordonné de vos produits.";
        echo $msg;?>
    </div>
<div class="tile">
  <table class="table table-responsive table-bordered">
    <thead>
      <tr class="table-success">
        <th class="text-center">Icône</th>
        <th class="text-center">Ordre</th>
        <th class="col-5">Catégorie de produits</th>
        <th class="col-2"></th>
        <th class="col-2"></th>
      </tr>
    </thead>
    <tbody>
      <?foreach($categories as $cat){?>
        <tr class="selectionable">
          <?=form_open('back/order_category/'.$cat->id)?>
          <td>
            <?if($cat->icon_file != 0){?>
              <img src="<? echo base_url().'/assets/img/'.$cat->icon_file?>" alt="icon" class="icon mr-1 mb-2">
            <?}?>
          </td>
          <td>
            <div class="d-flex flex-inline">
            <input class="btn" type="submit" name="order" value="-"> 
            <!--<div class="mt-2"><?=$cat->show_order?></div>-->
            <input class="btn" type="submit" name="order" value="+">
            </div>
          </td>
          <td>
            <?=$cat->name?> > <span style="color: blue;"><?=$count[$cat->id]?> produit(s)</span>
            <br><?=$cat->description?>
          </td>
          </form>
          <!-- Boutons Modifier / Supprimer -->
          <td><a class="btn btn-info" 
          href="<? echo base_url('back/mod_category/'.$cat->id)?>">Modifier</a></td>
          <td><button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal-<?=$cat->id?>">Supprimer</button></td>
          <!-- Fenetre modal Confirmation suppression, data-target personnalisé -->
          <div class="modal fade" id="deleteModal-<?=$cat->id?>" tabindex="-1" role="dialog" aria-hidden="true">
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
                      <?if($count[$cat->id] == 1){
                        echo $count[$cat->id]." produit est lié à cette catégorie.</br>
                        Veuillez supprimer ce produit avant la catégorie.";
                      } elseif($count[$cat->id] > 1) {
                        echo $count[$cat->id]." produits sont liés à cette catégorie.</br>
                        Veuillez supprimer ces produits avant la catégorie.";
                      } else {  
                        echo "Tous les liens vers cette catégorie seront aussi supprimer.
                        </br>Confirmez-vous la suppression de : $cat->name ?";?>
                      <?}?>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                  <?if($count[$cat->id] == 0){?>
                    <a class="btn btn-danger" href="<? echo base_url('back/del_category/'.$cat->id)?>">Supprimer</a>
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
      <a class="btn btn-info mb-3" href="<? echo base_url("back/add_category")?>">Ajouter une categorie</a>
  </div>
</div>