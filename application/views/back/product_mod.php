<div class="container-fluid">
  <div class="alert alert-success mt-3" role="alert">
    <?$msg = "Cette page vous permet de modifier un produit à votre carte. N'oubliez pas de l'associer à une de vos catégories.";
    echo $msg;?>
  </div>
  <?php echo validation_errors(); ?>
  <?=form_open("back/mod_product/$product->id")?>
    <div class="row">
      <div class="col-lg-4">
        <div class="form-group">
          <label>Nom du produit</label>
          <input class="form-control" type="text" name="name" value="<?=$product->name?>">
        </div>
      </div>
      <div class="col-lg-8">
        <div class="form-group">
          <label>Description</label>
          <input class="form-control" type="text" name="description" value="<?=$product->description?>">  
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4">
        <div class="form-group">
          <label>Catégorie</label>
          <select class="form-control" name="cat_product_id">
            <?foreach($catList as $catItem){
              if($catItem->id == $product->cat_product_id){?>
                <option value="<?=$catItem->id?>" selected><?=$catItem->name?></option>
              <?} else {?>
              <option value="<?=$catItem->id?>"><?=$catItem->name?></option>
              <?}
            }?>
          </select>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="form-group">
          <label>Prix</label>
          <input class="form-control" type="text" name="price" value="<?=$product->price?>">
        </div>
      </div>
      <div class="col-lg-4">
        <div class="form-group">
          <label>Photo</label>
          <input type="file" class="form-control-file" name="photo_url" value="<?=$product->photo_url?>">
        </div>
      </div>
    </div>
    <hr>
    <div class="d-flex justify-content-end">
      <input class="btn btn-info mb-3" type="submit" value="Modifier ce produit">
    </div>
  </form>
</div>