<div class="container-fluid">
  <div class="alert alert-success mt-3" role="alert">
      <?$msg = "Créez votre menu ou formule et choisissez les catégories et produits à faire apparaître à votre carte.";
      echo $msg;?>
  </div>
  <?php echo validation_errors(); ?>
  <?=form_open("back/add_menu")?>
    <div class="row">
      <div class="col-lg-4">
        <div class="form-group">
          <label>Nom du menu ou formule</label>
          <input class="form-control" type="text" name="name">
        </div>
      </div>
      <div class="col-lg-8">
        <div class="form-group">
          <label>Description</label>
          <input class="form-control" type="text" name="description">  
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-4">
        <div class="form-group">
          <label>Prix</label>
          <input class="form-control" type="text" name="price">
        </div>
      </div>
      <div class="col-lg-8">
        <div class="form-group">
          <label>Catégories à sélectionner</label>
          <div class="d-flex flex-inline">
            <?foreach($cats as $cat){?>
              <div class="form-check mr-3">
                <input class="form-check-input" type="checkbox" name="menu_cats[]" value="<?=$cat->id?>">
                <label class="form-check-label"><?=$cat->name?></label>
              </div>
            <?}?>
          </div>
        </div>
      </div>
    </div>

    <hr>
    <div class="d-flex justify-content-end">
      <input class="btn btn-info mb-3" type="submit" name="submit" value="Ajouter ce menu / formule"/>
    </div>
  </form> 
</div>  