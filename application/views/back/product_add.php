<div class="container-fluid">
  <div class="alert alert-success mt-3" role="alert">
    <?$msg = "Cette page vous permet d'ajouter un produit à votre carte. N'oubliez pas de l'associer à une de vos catégories.";
    echo $msg;?>
  </div>
  <?php echo validation_errors(); ?>
  <?=form_open('back/add_product')?>
    <div class="row">
      <div class="col-lg-4">
        <div class="form-group">
          <label>Nom du produit</label>
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
          <label>Catégorie</label>
          <select class="form-control" name="cat_product_id">
            <?foreach($catList as $catItem){?>
              <option value="<?=$catItem->id?>"><?=$catItem->name?></option>
            <?}?>
          </select>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="form-group">
          <label>Prix</label>
          <input class="form-control" type="text" name="price">
        </div>
      </div>
      <div class="col-lg-4">
        <div class="form-group">
          <label>Photo</label>
          <input type="file" class="form-control-file" name="photo_url">
        </div>
      </div>
    </div>
    <hr>
    <div class="d-flex justify-content-end">
      <? $restoId = $this->session->restoId; ?>
      <input class="btn btn-info mr-2" type="submit" value="Ajouter ce produit">
      <a class="btn btn-info" href="<? echo base_url("back/choose_categorie/$restoId")?>">Retour</a>
    </div>
  </form>
</div>  


  
      
  