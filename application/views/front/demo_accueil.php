<div class="container-fluid">
    <div class="alert alert-success mt-3" role="alert">
        <?$msg = "Cette page démo vous permet de se faire une idée du rendu client de votre carte sur smartphone";
        echo $msg;?>
    </div>
    <div class="d-flex justify-content-around">
        <div class="fond-phone mt-4">
            <div class="phone text-center">
                <div>
                <img src="<? echo base_url().'uploads/'.$resto->logo_url?>" width="100%" alt="logo">
                <h1 class="mt-5"><?=$resto->name?></h1>
                <p><?=$resto->phrase?></p>

                <div class="mt-5">
                    <a class="btn btn-success mb-2" href="<? echo base_url('front/demo_resto')?>" style="width: 250px;">Le restaurant</a>
                </div>
                <div>
                    <a class="btn btn-success mb-2" href="<? echo base_url('front/demo_carte')?>" style="width: 250px;">La carte</a>
                </div>
                <div>
                    <a class="btn btn-success mb-2" href="<? echo base_url('front/demo_menus')?>" style="width: 250px;">Les menus</a>
                </div>
                <p class="orange"><strong>with On-Screen Menu</strong></p>
                </div>
            </div>
        </div>
    </div>
</div>


