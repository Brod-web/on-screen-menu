<div class="container-fluid">
    <div class="alert alert-success mt-3" role="alert">
        <?$msg = "Ajoutez, modifiez, supprimez vos produits classés par catégories";
        echo $msg;?>
    </div>
    <div>
        <?foreach($catList as $catItem){?>
        <a class="btn btn-success mb-3 mr-2" href="<? echo base_url('back/products_by_cat/'.$catItem->id)?>"><?=$catItem->name?></a>
        <?}?>
        <hr>
    </div>
    <div class="d-flex justify-content-end">
        <a class="btn btn-info mb-3 mr-2" href="<? echo base_url('back/add_category')?>">Ajouter une nouvelle categorie</a>
        <a class="btn btn-info mb-3" href="<? echo base_url('back/add_product')?>">Ajouter un produit</a>
    </div>
</div>