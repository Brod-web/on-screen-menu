<div class="container-fluid">
    <div class="alert alert-success mt-3" role="alert">
        <?$msg = "Renseignez, modifiez les informations de base de votre restaurant. Le lien permettant l'accès à votre carte est primordiale.";
        echo $msg;?>
    </div>
    <?php echo validation_errors(); ?>
    <?=form_open('back/restaurant')?>
    
        <div class="form-group">
            <h5>Nom de l'établissement :</h5> 
            <input class="form-control mb-3" type="text" name="name" value="<?=$resto->name?>"/>
            <h5>Lien vers votre carte :</h5> 
            <input class="form-control mb-5" type="text" name="carte_link" value="<?=$resto->carte_link?>" placeholder="votre lien.alwaysdata.net"/>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Adresse</span>
                </div>
                <input type="text" class="form-control" name="adresse" value="<?=$resto->adresse?>">
            </div>      
            <div class="d-flex justify-content-between">
                <div class="input-group mb-5">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Code postal</span>
                    </div>
                    <input type="text" class="form-control" name="CP" value="<?=$resto->CP?>">
                </div>
                <div class="input-group mb-5 ml-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Ville</span>
                    </div>
                    <input type="text" class="form-control" name="ville" value="<?=$resto->ville?>">
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Web</span>
                    </div>
                    <input type="text" class="form-control" name="web_url" value="<?=$resto->web_url?>" placeholder="www.votre site.com">
                </div>
                <div class="input-group mb-3 ml-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Phone</span>
                    </div>
                    <input type="text" class="form-control" name="phone" value="<?=$resto->phone?>">
                </div>
            </div>
            
            <input class="btn btn-info" type="submit" name="submit" value="Enregistrer les modifications"/>
        </div>
    </form>
</div>