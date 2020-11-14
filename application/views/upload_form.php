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
<?$restoId = $this->session->restoId;?>
<div class="container-fluid fond-grey">
    <h1 class="ml-3 siteName orange text-center">On-Screen Menu <span class="white"><small>... Votre carte sur le web</small></span></h1>
    <div class="row mx-auto justify-content-between border-top border-dark">
        <div class="col-lg-3 col-md-3 col-sm-6 d-flex flex-column justify-content-between fond-dashboard">
            <small class="mt-3 siteName white fond-grey text-center"><?=$this->session->pseudo?></small>
            <div>
                <footer class="text-center orange fond-grey mb-3"><strong>On-Screen Menu | &copy; Brod-web <?=date('Y')?></strong></footer>
            </div>
        </div>
        <div class="col-lg-9 col-md-12 col-sm-12">
            <div class="d-flex mt-3 mb-4">
                <h4 class="mr-4">Gérer vos images</h4>
                <a class="btn btn-info" href="<? echo base_url("customs/index")?>">Retour</a>
            </div>
            <div class="container-fluid ml-4"> 
            <?echo isset($error)? $error : '';?>   
            <?echo form_open_multipart('upload/upload_photo');?>
                <div class="d-flex justify-content-start">
                    <div>
                        <div class="alert alert-info" role="alert">
                            <p><strong>Photo de restaurant :</strong> affichage final 340 x 340 (gif, jpg ou png ; max size : 200Ko)</p>
                            <?if(isset($photo_name)){?>
                                <p><strong>Photo chargé avec succés</strong></p>
                            <?}?>
                        </div>
                        <div class="mb-5">
                            <input type="file" name="photoFile" size="20"/>
                            <input type="submit" class="btn btn-success mr-2" value="Charger ce fichier"/>
                        </div>
                    </div>
                    <?if(isset($photo_name)){?>
                        <div class="text-center ml-5">
                            <img src="<? echo base_url().'uploads/'.$restoId.'/'.$photo_name?>" alt="photo" width="200px">
                            <p>Aperçu : <?=$photo_name?></p>
                        </div>
                    <?}?>
                </div>
            </form>
 
            <?echo form_open_multipart('upload/upload_logo');?>
                <div class="d-flex justify-content-start">
                    <div>
                        <div class="alert alert-info" role="alert">
                            <p><strong>Pour votre logo :</strong> affichage final 340 x 100 (gif, jpg ou png ; max size : 200Ko)</p>
                            <?if(isset($logo_name)){?>
                                <p><strong>Logo chargé avec succés</strong></p>
                            <?}?>
                        </div>
                        <div class="mb-5">
                            <input type="file" name="logoFile" size="20"/>
                            <input type="submit" class="btn btn-success mr-2" value="Charger ce fichier"/>
                        </div>
                    </div>
                    <?if(isset($logo_name)){?>
                        <div class="text-center ml-5">
                            <img src="<? echo base_url().'uploads/'.$restoId.'/'.$logo_name?>" alt="logo" width="200px">
                            <p>Aperçu : <?=$logo_name?></p>
                        </div>
                    <?}?>
                </div>
            </form>
 
            <?echo form_open_multipart('upload/upload_fond');?>
                <div class="d-flex justify-content-start">
                    <div>
                        <div class="alert alert-info" role="alert">
                            <p><strong>Pour votre fond :</strong> affichage final 340 x 600 (gif, jpg ou png ; max size : 200Ko)</p>
                            <?if(isset($fond_name)){?>
                                <p><strong>Fond chargé avec succés</strong></p>
                            <?}?> 
                        </div>
                        <div class="mb-5">
                            <input type="file" name="fondFile" size="20"/>
                            <input type="submit" class="btn btn-success mr-2" value="Charger ce fichier"/>
                        </div>
                    </div>
                    <?if(isset($fond_name)){?>
                        <div class="text-center ml-5">
                            <img src="<? echo base_url().'uploads/'.$restoId.'/'.$fond_name?>" alt="fond" width="200px">
                            <p>Aperçu : <?=$fond_name?></p>
                        </div>
                    <?}?>
                </div>
            </form>

                <!-- TODO : ajout chargement photos produits
                <?echo form_open_multipart('upload/upload_photoProduct');?>
                <div class="d-flex justify-content-start">
                    <div>
                        <div class="alert alert-info" role="alert">
                            <p><strong>Photo de produits :</strong> affichage final 128 x 128 (gif, jpg ou png ; max size : 200Ko)</p>
                            <?if(isset($photoProduct_name)){?>
                                <p><strong>Photo chargé avec succés</strong></p>
                            <?}?>
                        </div>
                        <div class="mb-5">
                            <input type="file" name="photoProductFile" size="20"/>
                            <input type="submit" class="btn btn-success mr-2" value="Charger ce fichier"/>
                            <a class="btn btn-info" href="<? echo base_url("customs/index")?>">Retour</a>
                        </div>
                    </div>
                    <?if(isset($photoProduct_name)){?>
                        <div class="text-center ml-5">
                            <img src="<? echo base_url().'uploads/'.$restoId.'/'.$photoProduct_name?>" alt="photo" width="200px">
                            <p>Aperçu : <?=$photoProduct_name?></p>
                        </div>
                    <?}?>
                </div>
            </form>-->
        </div>
    </div>
</body>
</html>