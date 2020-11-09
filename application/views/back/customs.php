<div class="container-fluid">
  <?php echo validation_errors(); ?>
  <?=form_open('customs/index')?>
    <div class="d-flex justify-content-between mt-3">
      <div class="card-deck">

        <div class="card" style="width: 35rem;">
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
            <input class="form-control mb-4" type="text" name="phrase" value="<?=$resto->phrase?>" placeholder="Une phrase d'accroche, quelques mots sur votre restaurant..."/>

            <h5>QR code:</h5> 
            <input class="form-control mb-4" type="text" name="QR_code" value="<?=$resto->QR_code?>" placeholder="Générer votre QR code..."/>
            
          </div>
          <div class="card-footer text-center">
            <input class="btn btn-info" type="submit" name="submit" value="Enregistrer les modifications"/>
          </div>
        </div>

        <div class="card" style="width: 35rem;">
          <div class="card-header">
            <h4 class="card-title text-center my-1">Graphismes</h4>
          </div>
          <div class="card-body">
            
            <div class="form-group">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Logo</span>
                </div>
                <input type="text" class="form-control" placeholder="Choisissez votre logo d'entête">
              </div>
              <input type="file" class="form-control-file mb-4" name="logo_url" value="<?=$resto->logo_url?>">
            </div>
            <select class="custom-select mb-4" name="fond">
              <option selected>Choisissez votre fond de carte</option>
              <option value="1">Fond 1</option>
              <option value="2">Fond 2</option>
              <option value="3">Fond 3</option>
              <option value="4">Fond 4</option>
              <option value="5">Fond 5</option>
              <option value="6">Fond personnel</option>
            </select>
            
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

            <input type="file" class="form-control-file mt-3" name="fond_perso" value="<?=$resto->fond_url?>">
          </div>
        </div>
      <div>
    <div>
  </form>
</div>
            
        