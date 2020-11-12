<div class="container-fluid">
  <?php echo validation_errors(); ?>
  <?=form_open('customs/index')?>
    <div class="d-flex justify-content-between mt-3">
      <div class="card-deck">

        <!-- PRESENTATION -->
        <div class="card" style="width: 33rem;">
          <div class="card-header">
            <h4 class="card-title text-center my-1">Présentation</h4>
          </div>
          <div class="card-body">
            <div class="input-group mb-3 mr-sm-2">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fab fa-facebook-square"></i></div>
              </div>
              <input type="text" class="form-control" name="facebook" value="<?=$resto->facebook?>" placeholder="Lien Facebook">
            </div>
            <div class="input-group mb-3 mr-sm-2">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fab fa-instagram-square"></i></div>
              </div>
              <input type="text" class="form-control" name="instagram" value="<?=$resto->instagram?>"placeholder="Lien Instagram">
            </div>
            <div class="input-group mb-4 mr-sm-2">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fab fa-twitter-square"></i></div>
              </div>
              <input type="text" class="form-control" name="twitter" value="<?=$resto->twitter?>" placeholder="Lien Twitter">
            </div>

            <h5>Phrase d'accroche :</h5> 
            <input class="form-control" type="text" name="phrase" value="<?=$resto->phrase?>" placeholder="Une phrase d'accroche, quelques mots sur votre restaurant..."/>

            <div class="text-center mt-4 mb-4">
              <input class="btn btn-info" type="submit" name="submit" value="Enregistrer ces liens et la phrase"/>
            </div>
  </form>

  <!-- PHOTO -->
  <?php echo validation_errors(); ?>
  <?=form_open("customs/del_photo/$resto->photo_url")?>
            <div class="d-flex">
              <div class="mr-3">
                <h5>Photo du restaurant :</h5>
              </div>
              <?if($resto->photo_url !== ''){?>
                <div>
                  <p><?=$resto->photo_url?></p>
                </div>
              <?} else {?>
                <div>
                  <p>non défini</p>
                </div>
              <?}?>
            </div>
            <div class="d-flex">
              <div>
                <a class="btn btn-info mb-2" href="<? echo base_url('upload')?>" style="width: 100px;">Modifier</a>
                <?if($resto->photo_url !== ''){?>
                  <input class="btn btn-danger" type="submit" name="submit" value="Supprimer" style="width: 100px;">
                <?}?>
              </div>
              <?if($resto->photo_url !== ''){?>
              <div class="text-right mb-3">
                <img src="<? echo base_url().'/uploads/'.$resto->photo_url?>" width="90%" alt="photo">
              </div>
              <?}?>
            </div>  
  </form>

  <!-- LOGO -->
  <?php echo validation_errors(); ?>
  <?=form_open("customs/del_logo/$resto->logo_url")?>
            <div class="d-flex">
              <div class="mr-3">
                <h5>Logo personnel :</h5>
              </div>
              <?if($resto->logo_url !== ''){?>
                <div>
                  <p><?=$resto->logo_url?></p>
                </div>
              <?} else {?>
                <div>
                  <p>non défini</p>
                </div>
              <?}?>
            </div>
            <div class="d-flex">
              <div>
                <a class="btn btn-info mb-2" href="<? echo base_url('upload')?>" style="width: 100px;">Modifier</a>
                <?if($resto->logo_url !== ''){?>
                  <input class="btn btn-danger" type="submit" name="submit" value="Supprimer" style="width: 100px;">
                <?}?>
              </div>
              <?if($resto->logo_url !== ''){?>
              <div class="text-right mb-3">
                <img src="<? echo base_url().'/uploads/'.$resto->logo_url?>" width="90%" alt="logo">
              </div>
              <?}?>
            </div>  
  </form>

  <!-- QR CODE -->
            <div class="d-flex mt-3">
              <div class="mr-3">
                <h5>QR code :</h5>
              </div>
              <?if($resto->QR_code !== ''){?>
                <div>
                  <p><?=$resto->QR_code?></p>
                </div>
              <?} else {?>
                <div>
                  <p>non défini</p>
                </div>
              <?}?>
              <div>
                <a class="ml-3" href="<? echo base_url('upload')?>">Modifier</a>
              </div>
            </div>
          </div>
        </div>


  <!-- FOND -->
        <div class="card" style="width: 33rem;">
          <div class="card-header">
            <h4 class="card-title text-center my-1">Fond de carte</h4>
          </div>
          
          <div class="card-body">
            <div class="alert alert-success" role="alert">
              <?$msg = "Vous avez le choix entre l'un de nos fonds ou le votre.";
              echo $msg;?>
            </div>

            <?=form_open('customs/choose_background')?>
            <div class="d-flex flex-wrap justify-content-start">
              <div>
                <select class="custom-select mb-4" name="fond">
                  <?if($options->fond == '0'){?>
                    <option value="0" selected>Aucun fond sélectionné</option>
                  <?} else {?>
                    <option value="0">Aucun fond sélectionné</option>
                  <?}?>
                  <?for($i=1 ; $i < 6 ; $i++){?>
                    <?if($options->fond == $i){?>
                      <option value="<?=$i?>" selected>Fond <?=$i?></option>
                    <?} else {?>
                      <option value="<?=$i?>">Fond <?=$i?></option>
                    <?}?>
                  <?}?>
                  <?if($options->fond == '6'){?>
                    <option value="6" selected>Fond personnel</option>
                  <?} else {?>
                    <option value="6">Fond personnel</option>
                  <?}?>
                </select>
              </div>
              <div class="text-center">
                <input class="btn btn-info ml-3" type="submit" name="submit" value="Sélectionner">
              </div>
            </div>
            </form>
           
            <h5>Fonds proposés :</h5>
            
            <!--Carousel Wrapper-->
            <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

            <!--Controls-->
              <a class="carousel-control-prev text-info" href="#multi-item-example" role="button" data-slide="prev">
              <i class="fas fa-chevron-circle-left"></i></a>
              <a class="carousel-control-next text-info" href="#multi-item-example" role="button" data-slide="next">
              <i class="fas fa-chevron-circle-right"></i></a>
            <!--/.Controls-->

            <!--Indicators-->
            <ol class="carousel-indicators">
              <li data-target="#multi-item-example" data-slide-to="0" class="text-info active"></li>
              <li data-target="#multi-item-example" data-slide-to="1" class="text-info"></li>
              <li data-target="#multi-item-example" data-slide-to="2" class="text-info"></li>
            </ol>
            <!--/.Indicators-->

            <!--Slides-->
            <div class="carousel-inner" role="listbox">

              <!--First slide-->
              <div class="carousel-item active">

                <div>
                  <div class="card mb-2">
                    <img class="card-img-top"
                      src="<? echo base_url().'/assets/img/custom1.jpg'?>" alt="Fond 1">
                      <div class="carousel-caption d-none d-md-block">
                        <h3 class="orange">Fond 1</h3>
                      </div>
                  </div>
                </div>
              </div>
              <!--/.First slide-->

              <!--Second slide-->
              <div class="carousel-item">

                <div>
                  <div class="card mb-2">
                    <img class="card-img-top"
                      src="<? echo base_url().'/assets/img/custom2.jpg'?>" alt="Fond 2">
                      <div class="carousel-caption d-none d-md-block">
                        <h3 class="orange">Fond 2</h3>
                      </div>
                  </div>
                </div>
              </div>
              <!--/.Second slide-->

              <!--Third slide-->
              <div class="carousel-item">

                <div>
                  <div class="card mb-2">
                    <img class="card-img-top"
                      src="<? echo base_url().'/assets/img/custom3.jpg'?>" alt="Fond 3">
                      <div class="carousel-caption d-none d-md-block">
                        <h3 class="orange">Fond 3</h3>
                      </div>
                  </div>
                </div>
              </div>
              <!--/.Third slide-->

              <!--Fourth slide-->
              <div class="carousel-item">

                <div>
                  <div class="card mb-2">
                    <img class="card-img-top"
                      src="<? echo base_url().'/assets/img/custom4.jpg'?>" alt="Fond 4">
                      <div class="carousel-caption d-none d-md-block">
                        <h3 class="orange">Fond 4</h3>
                      </div>
                  </div>
                </div>
              </div>
              <!--/.Fourth slide-->

              <!--Fifth slide-->
              <div class="carousel-item">

                <div>
                  <div class="card mb-2">
                    <img class="card-img-top"
                      src="<? echo base_url().'/assets/img/custom5.jpg'?>" alt="Fond 5">
                      <div class="carousel-caption d-none d-md-block">
                        <h3 class="orange">Fond 5</h3>
                      </div>
                  </div>
                </div>
              </div>
              <!--/.Fifth slide-->

            </div>
            <!--/.Slides-->

            </div>
            <!--/.Carousel Wrapper-->

  <!-- FOND PERSO -->
  <?php echo validation_errors(); ?>
  <?=form_open("customs/del_fond/$resto->fond_url")?>
            <div class="d-flex mt-3">
              <div class="mr-3">
                <h5>Fond personnel :</h5>
              </div>
              <?if($resto->fond_url !== ''){?>
                <div>
                  <p><?=$resto->fond_url?></p>
                </div>
              <?} else {?>
                <div>
                  <p>non défini</p>
                </div>
              <?}?>
              </div>
            <div class="d-flex">
              <div>
                <a class="btn btn-info mb-2" href="<? echo base_url('upload')?>" style="width: 100px;">Modifier</a>
                <?if($resto->fond_url !== ''){?>
                  <input class="btn btn-danger" type="submit" name="submit" value="Supprimer" style="width: 100px;">
                <?}?>
              </div>
              <?if($resto->fond_url !== ''){?>
              <div class="text-right mb-3">
                <img src="<? echo base_url().'/uploads/'.$resto->fond_url?>" width="90%" alt="fond">
              </div>
              <?}?>
            </div>  
  </form>
        </div>
      </div>
    <div>
  <div>
</div>
            
        