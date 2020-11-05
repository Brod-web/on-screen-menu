<div class="container-fluid">
  <div class="alert alert-success mt-3" role="alert">
    <?$msg = " : Choisissez les catégories et produits à faire apparaître à votre carte.";
    echo $menu->name.$msg;?>
  </div>
  <?php echo validation_errors(); ?>
  <?=form_open("back/mod_menu/$menu->id")?>
    <div class="row">
      <div class="col-lg-4">
        <div class="form-group">
          <label>Nom du menu ou formule</label>
          <input class="form-control" type="text" name="name" value="<?=$menu->name?>">
        </div>
      </div>
      <div class="col-lg-8">
        <div class="form-group">
          <label>Description</label>
          <input class="form-control" type="text" name="description" value="<?=$menu->description?>">  
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-4">
        <div class="form-group">
          <label>Prix</label>
          <input class="form-control" type="text" name="price" value="<?=$menu->price?>">
        </div>
      </div>
      <div class="col-lg-8">
        
        <div class="form-group">
          <label>Catégories sélectionnées :</label>
          <div class="d-flex flex-inline">
            <?// Affiche si catégories selectionnées ou non
            foreach($cats as $cat){?>
              <div class="form-check mr-3">
              <?if(in_array($cat->id,$cats_sel)){?>
                <input class="form-check-input" type="checkbox" name="menu_cats[]" value="<?=$cat->id?>" checked>
                <label class="form-check-label"><?=$cat->name?></label>
              <?} else {?>
                <input class="form-check-input" type="checkbox" name="menu_cats[]" value="<?=$cat->id?>">
                <label class="form-check-label"><?=$cat->name?></label>
              <?}?>
              </div>
            <?}?>
          </div>
        </div>

        <div class="alert alert-warning mt-3" role="alert">
          <?echo "Attention, pour supprimer totalement une catégorie :</br>Désélectionnez tous ses produits et la catégorie.";?>
        </div>

        <div class="form-group">
          <label>Produits sélectionnés :</label>
          <div>
            <?// Affiche si produits selectionnés ou non (uniquement catégorie sel)
            foreach($cats_sel as $cat_sel){?>
              <label>... par catégorie :</label>
              <?$products = $this->Product_Model->getProductByCat($cat_sel);

              foreach($products as $product){?>
                <div class="form-check mb-3 ml-5">
                <?if(in_array($product->id,$products_sel)){?>
                  <input class="form-check-input" type="checkbox" name="menu_products[]" value="<?=$product->id?>" checked>
                  <label class="form-check-label"><?=$product->name?></label>
                <?} else {?>
                  <input class="form-check-input" type="checkbox" name="menu_products[]" value="<?=$product->id?>">
                  <label class="form-check-label"><?=$product->name?></label>
                <?}?>
                </div>
              <?}

            }?>
          </div>
        </div>
      </div>
    </div>

    <hr>
    <div class="d-flex justify-content-end">
    <a class="btn btn-info mb-3 mr-3" href="<? echo base_url("back/menus")?>">Retour</a>
      <input class="btn btn-info mb-3" type="submit" name="submit" value="Modifier ce menu / formule"/>
    </div>
  </form> 
</div>  