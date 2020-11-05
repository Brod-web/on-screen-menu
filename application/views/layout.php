<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?=$title?></title>
    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/bb539bd9a1.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Leckerli+One&family=Roboto+Slab&display=swap" rel="stylesheet">

</head>

<body>
<div class="container-fluid fond-grey">
    <h1 class="ml-3 siteName orange text-center">On-Screen Menu <span class="white"><small>... Votre carte sur le web</small></span></h1>
    <div class="row mx-auto justify-content-between border-top border-dark">
        <div class="col-lg-3 d-flex flex-column justify-content-between fond-dashboard" style="height: 580px;" >
            <small class="mt-3 siteName white fond-grey text-center">Bienvenue <?=$this->session->pseudo?></small>
            <ul class="ml-3">
                
                <?$restoId = $this->session->restoId?>
                <li><a class="btn btn-info mb-2 mt-2 menu" 
                href="<? echo base_url('back')?>">Tableau de bord</a></li>

                <li><a class="btn btn-info mb-2 menu" 
                href="<? echo base_url('back/restaurant')?>">Restaurant</a></li>

                <li><a  class="btn btn-info mb-2 menu" 
                href="<? echo base_url('customs')?>">Personnalisation</a></li>

                <li><a class="btn btn-info mb-2 menu" 
                href="<? echo base_url('back/menus')?>"> Menus & formules</a></li>

                <li><a class="btn btn-info mb-2 menu" 
                href="<? echo base_url("back/categories")?>">Catégories</a></li>

                <li><a class="btn btn-info mb-2 menu" 
                href="<? echo base_url("back/choose_categorie/$restoId")?>">Produits</a></li>

                <?if($options->quantity > 0){?>
                    <div id="quantity" style="visibility: visible; height: auto">
                <?} else {?>
                    <div id="quantity" style="visibility: hidden; height: 0">
                <?}?>
                    <li><a class="btn btn-info mb-2 menu" 
                    href="">Gestion quantités</a></li>
                </div>

                <li><a class="btn btn-info mb-5 menu" 
                href="<? echo base_url("login/deconnexion")?>">Déconnexion</a></li>

                <?if($options->maintenance > 0){?>
                    <div id="maintenance" style="visibility: visible;">
                <?} else {?>
                    <div id="maintenance" style="visibility: hidden;">
                <?}?>
                    <li><a class="btn btn-danger" style="width: 190px;">En maintenance</a></li>
                    <div class="position-relative">
                        <div class="bulle">
                            <span><i class="fas fa-wrench"></i></span>
                        </div>
                    </div>
                </div>
            </ul>
            <div>
                <footer class="text-center orange fond-grey"><strong>On-Screen Menu | &copy; Brod-web <?=date('Y')?></strong></footer>
            </div>
        </div>
        <div class="col-lg-9">

            <?=$output?>

        </div>
    </div>
</div>

</body>
</html>

<script>
/*$('.menu').on('click', function(){
    $('.menu').removeClass('btn-info','btn-success');
    $(this).addClass('btn-success');
});*/
</script>