<div class="container-fluid">
    <div class="alert alert-success mt-3" role="alert">
        <?$msg = "Cette page démo vous permet de se faire une idée du rendu client de votre carte sur smartphone";
        echo $msg;?>
    </div>
    <div class="d-flex justify-content-around">
        <div class="fond-phone mt-4">
            <div class="phone text-center">
                <div style="height:598px; overflow-y:auto">
                    <img src="<? echo base_url().'uploads/'.$resto->id.'/'.$resto->logo_url?>" width="100%" alt="logo">
                    <h1 class="mt-3"><?=$resto->name?></h1>
                    <p><?=$resto->phrase?></p>

                    <img src="<? echo base_url().'uploads/'.$resto->id.'/'.$resto->photo_url?>" width="100%" alt="photo">

                    <div class="d-flex justify-content-center mt-3">
                        <h4>Contacts : <i class="fas fa-phone-square-alt mr-2"></i></h4>
                        <p class="mt-1"><?=$resto->phone?></p>
                    </div>
                    <div class="d-flex justify-content-center">
                        <h4 class="mr-1"><a href="<?=$resto->facebook?>"><i class="fab fa-facebook-square mr-2"></i></a></h4>
                        <h4 class="mr-1"><a href="<?=$resto->instagram?>"><i class="fab fa-instagram-square mr-2"></i></a></h4>
                        <h4 class="mr-1"><a href="<?=$resto->twitter?>"><i class="fab fa-twitter-square mr-2"></i></a></h4>
                        <h5><a href="#"><i class="fas fa-globe mr-2"></i></h5>
                        <a href="$resto->web_url"><?=$resto->web_url?></a>
                    </div>

                    <div class="d-flex justify-content-center">
                        
                    </div>

                    <a class="btn btn-success mb-2 mt-2" href="<? echo base_url('front')?>" style="width: 150px;">Retour</a>
                    <p class="orange"><strong>with On-Screen Menu</strong></p>
                </div>
            </div>
        </div>
    </div>
</div>


