<div class="container-fluid">
  <div class="alert alert-success mt-3" role="alert">
    <?$msg = "Gérez le profil de votre restaurant. Pour cela différentes options s'offrent à vous.";
    echo $msg;?>
  </div>
  <div class="d-flex justify-content-between">
    <div class="card-deck">

      <div class="card" style="width: 25rem;">
        <div class="card-header">
          <h4 class="card-title text-center my-1"><?=$resto->name?></h4>
        </div>
        <div class="card-body">
          <img src="<? echo base_url().$resto->photo_url?>" class="card-img" alt="resto">
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item "><?=$resto->adresse?>
          <br><?=$resto->CP?> <?=$resto->ville?></li>
          <li class="list-group-item">Téléphone : <?=$resto->phone?></li>
          <li class="list-group-item">Web link : <a class="text-center"><?=$resto->web_url?></a></li>
        </ul>
        <div class="card-footer text-center">
          <a href="<? echo base_url('back/restaurant')?>" class="btn btn-info">Modifier</a>
        </div>
      </div>

      <div class="card" style="width: 25rem;">
        <div class="card-header">
          <h4 class="card-title text-center my-1">Vos données</h4>
        </div>
        <div class="card-body text-center">
          <p class="mt-2 mb-4">Lien vers votre carte : <br><a href=""><?=$resto->carte_link?></a></p>

          <a href="<? echo base_url('back/menus')?>" class="btn btn-success mt-4" style="width: 220px;">Menus & formules</a>
          <p>Votre carte contient <?=$countMenus?> menu(s) <br><a href="">Ajouter un menu</a></p>
          
          <a href="<? echo base_url('back/categories')?>" class="btn btn-success mt-4" style="width: 220px;">Catégories</a>
          <p>Votre carte contient <?=$countCategories?> catégorie(s) <br><a href="<? echo base_url('back/add_category')?>">Ajouter une catégorie</a></p>
          
          <?$restoId = $this->session->restoId?>
          <a href="<? echo base_url("back/choose_categorie/$restoId")?>" class="btn btn-success mt-4" style="width: 220px;">Produits</a>
          <p>Votre carte contient <?=$countProducts?> produit(s) <br><a href="<? echo base_url('back/add_product')?>">Ajouter un produit</a></p>
        </div>
      </div>

      <div class="card" style="width: 25rem;">
        <?=form_open("customs/modes_sel/$restoId")?>
        <div class="card-header">
          <h4 class="card-title text-center my-1">Vos options</h4>
        </div>
        <div class="card-body">

        <div class="custom-control custom-switch my-2">
          <?if($options->maintenance > 0){?>
            <input type="checkbox" class="custom-control-input" id="switch1" name="switch1" value="1" onclick="switchMaintenance()" checked>
          <?} else {?>
            <input type="checkbox" class="custom-control-input" id="switch1" name="switch1" value="0" onclick="switchMaintenance()">
          <?}?>
          <label class="custom-control-label" for="switch1">Mode maintenance</label>
        </div>

        <div class="custom-control custom-switch my-2">
          <?if($options->quantity > 0){?>
            <input type="checkbox" class="custom-control-input" id="switch2" name="switch2" value="1" onclick="switchQuantity()" checked>
          <?} else {?>
            <input type="checkbox" class="custom-control-input" id="switch2" name="switch2" value="0" onclick="switchQuantity()">
          <?}?>
          <label class="custom-control-label" for="switch2">Gestion quantités</label>
        </div>
        <div class="custom-control custom-switch my-2">
          <input type="checkbox" class="custom-control-input" id="switch3" name="switch3">
          <label class="custom-control-label" for="switch3">QR code</label>
        </div>
        <!-- TODO after 
        <div class="custom-control custom-switch my-2">
          <input type="checkbox" class="custom-control-input" id="switch4" name="switch4">
          <label class="custom-control-label" for="switch4">Géolocalisation
        </div>-->
        <p class="mt-4 mb-4">Logo : <br><a href=""><?=$resto->name?></a></p>
        <p class="mt-2 mb-4">Réseaux sociaux : <br><a href=""><?=$resto->name?></a></p>
        <p class="mt-2 mb-4">Présentation : <br><a href=""><?=$resto->name?></a></p>
        <p class="mt-2 mb-4">Image de fond : <br><a href=""><?=$resto->name?></a></p>
      </div>
      <div class="card-footer text-center">
        <input class="btn btn-info" type="submit" name="submit" value="Modifier"/>
      </div>
      </form>
    <div>
</div>

<script>
function switchMaintenance() {
    if (!(document.getElementById('switch1').checked)) {
        document.getElementById('maintenance').style.visibility="hidden";
        $('#switch1').val(0);
        /*Si besoin par la suite
        $(".otherClass").prop("disabled",true);*/
    } else {
        document.getElementById('maintenance').style.visibility="visible";
        $('#switch1').val(1);
        /*Si besoin par la suite
        $(".otherClass").prop("disabled",false);*/
    }
}

function switchQuantity() {
    if (!(document.getElementById('switch2').checked)) {
        document.getElementById('quantity').style.visibility="hidden";
        document.getElementById('quantity').style.height = "0";
        $('#switch2').val(0);
        /* Si besoin par la suite
        $(".otherClass").prop("disabled",true);*/
    } else {
        document.getElementById('quantity').style.visibility="visible";
        document.getElementById('quantity').style.height = "auto";
        $('#switch2').val(1);
        /* Si besoin par la suite
        $(".otherClass").prop("disabled",false);*/
    }
}
</script>
            
        