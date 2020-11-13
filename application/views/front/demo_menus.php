<div class="container-fluid">
    <div class="alert alert-success mt-3" role="alert">
        <?$msg = "Cette page démo vous permet de se faire une idée du rendu client de votre carte sur smartphone";
        echo $msg;?>
    </div>
    <div class="d-flex justify-content-around">
        <div class="fond-phone mt-4">
            <div class="phone text-center">
                <div style="height:598px; overflow-y:auto">
                    <img src="<? echo base_url().'uploads/'.$resto->logo_url?>" width="100%" alt="logo">
                    <h1 class="mt-1"><?=$resto->name?></h1>
                    <p><?=$resto->phrase?></p>

                    <h4>Nos menus</h4>
                    <?foreach($menus as $menu){?>
                        <div class="mb-2">
                            <a class="btn btn-success" style="width: 250px;" href="<? echo base_url("front/demo_menu/$menu->id")?>"><?=$menu->name?> | <?=$menu->price?> €</a>
                        </div>
                    <?}?>

                    <a class="btn btn-success mb-2 mt-2" href="<? echo base_url('front')?>" style="width: 150px;">Retour</a>
                    <p class="orange"><strong>with On-Screen Menu</strong></p>
                </div>
            </div>
        </div>
    </div>
</div>


