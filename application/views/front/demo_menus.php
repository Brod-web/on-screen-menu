<div class="container-fluid">
    <div class="alert alert-success mt-3" role="alert">
        <?$msg = "Cette page démo vous permet de se faire une idée du rendu client de votre carte sur smartphone";
        echo $msg;?>
    </div>
    <div class="d-flex justify-content-around">
        <div class="fond-phone mt-4">
            <div class="phone text-center">
                <img src="<? echo base_url().'uploads/'.$resto->logo_url?>" width="100%" alt="logo">
                <h1 class="mt-5"><?=$resto->name?></h1>
                <p><?=$resto->phrase?></p>

                <h4>Nos menus</h4>
                <?foreach($menus as $menu){?>
                    <div class="mb-2">
                        <a class="btn btn-success mb-2" style="width: 250px;" href="<? echo base_url("front/demo_menu/$menu->id")?>"><?=$menu->name?> | <?=$menu->price?> €</a>
                    </div>
                <?}?>

                <a class="btn btn-success mb-2" href="<? echo base_url('front')?>" style="width: 150px;">Retour</a>
                <p>with On-Screen Menu</p>
            
            </div>
        </div>
        <div class="fond-phone mt-4">
            <div class="phone text-center" style="background-image: url(../uploads/<?=$resto->fond_url?>);">
            </div>
        </div>
    </div>
</div>


