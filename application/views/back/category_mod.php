<div class="container-fluid">
  <div class="alert alert-success mt-3" role="alert">
    <?$msg = "Les catégories de produits vous permettent de classer vos produits par groupes (ex : Entrées, Plats, Desserts...)";
    echo $msg;?>
  </div>
  <?php echo validation_errors(); ?>
  <?=form_open("back/mod_category/$cat->id")?>
    <div class="row">
      <div class="col-lg-4">
        <div class="form-group">
          <label>Nom de la catégorie</label>
          <input class="form-control" type="text" name="name" value="<?=$cat->name?>">
        </div>
      </div>
      <div class="col-lg-8">
        <div class="form-group">
          <label>Description</label>
          <input class="form-control" type="text" name="description" value="<?=$cat->description?>">  
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <div class="form-group">
          <label>Si vous le souhaitez, associez une image à votre catégorie :</label>
          <div class="d-flex flex-wrap">
            <?foreach($icons as $icon){
              $file = $icon->id.'-'.$icon->name.'.png';
              if($cat->icon_file == $file){?>
                <img src="<? echo base_url().'/assets/img/'.$file?>" alt="icon" class="icon mr-1 mb-2 selected" data-file="<?=$file?>">
              <?} else {?>
                <img src="<? echo base_url().'/assets/img/'.$file?>" alt="icon" class="icon mr-1 mb-2" data-file="<?=$file?>">
              <?}  
            }?>
            <input type="hidden" name="icon" id="icon">
          </div>
        </div>
      </div>
    </div>
    <hr>
    <div class="d-flex justify-content-end">
      <input class="btn btn-info mb-3" type="submit" name="submit" value="Modifier cette categorie"/>
    </div>
  </form> 
</div>

<script>
  $('.icon').on('click', function(){
        $('.icon').removeClass('selected');
        $(this).addClass('selected');
        $('#icon').val($(this).data('file'));
  });
</script>


  
      
  