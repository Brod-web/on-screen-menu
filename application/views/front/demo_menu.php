<div class="container-fluid">
    <div class="alert alert-success mt-3" role="alert">
        <?$msg = "Cette page démo vous permet de se faire une idée du rendu client de votre carte sur smartphone";
        echo $msg;?>
    </div>
    <div class="d-flex justify-content-around">
        <div class="fond-phone mt-4">
            <div class="phone text-center" style="background-image: url(../uploads/<?=$resto->fond_url?>);">
                <div style="height:598px; overflow-y:auto" class="lowOpacity">
                    <h4 class="mb-3 mt-3"><?=$menu->name?></h4>
                    <?// Affiche si produits selectionnés ou non (uniquement catégorie sel)
                    foreach($cats as $cat){?>
                        <?if(in_array($cat->id,$cats_sel)){?>
                            <h5 class="bg-success mb-1 mt-1"><?=$cat->name?></h5>

                            <?$products = $this->Product_Model->getProductByCat($cat->id);
                            foreach($products as $product){?>
                                <?if(in_array($product->id,$products_sel)){?>
                                    <div>
                                        <p><?=$product->name?> | <?=$product->description?> | <?=$product->price?> €</p>
                                    </div>
                                <?}?>
                            <?}
                        }
                    }?>
                    <a class="btn btn-success mb-2 mt-2" href="<? echo base_url('front/demo_menus')?>" style="width: 150px;">Retour</a>
                    <p class="orange"><strong>with On-Screen Menu</strong></p>
                </div>  
            </div>
        </div>
    </div>
</div>


