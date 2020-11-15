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
        <div class="col-lg-3 col-md-3 col-sm-6 d-flex flex-column justify-content-between fond-dashboard">
            <small class="mt-3 siteName white fond-grey text-center">Bienvenue</small>
            <div>
                <footer class="text-center orange fond-grey mb-3"><strong>On-Screen Menu | &copy; Brod-web <?=date('Y')?></strong></footer>
            </div>
        </div>
        <div class="col-lg-9 col-md-12 col-sm-12">
            <div class="container-fluid">
                <!-- Message accueil -->
                <div class="alert alert-info mt-3 text-center" role="alert">
                    <?$msg = "Tapez vos pseudo et email, ainsi qu'un nouveau mot de passe.</br>Le mot de passe sera changé si votre compte existe bien et avait été activé. ";
                    echo $msg;?>
                </div>
                <!-- Affichage erreurs formulaire -->
                <? echo validation_errors(); ?>
                <!-- Affichage info inscription -->
                <? if ($this->session->flashdata('info')){?>
                    <div class="alert alert-success mt-3" role="alert">
                        <? echo $this->session->flashdata('info');?>
                    </div>
                <?}?>
                <!-- Affichage inscription non valide -->
                <? if ($this->session->flashdata('notvalid')){?>
                    <div class="alert alert-danger mt-3" role="alert">
                        <? echo $this->session->flashdata('notvalid');?>
                    </div>
                <?}?>
        
                <div class="row mx-auto justify-content-around">
                    <div class="col-lg-5 mt-3">
                        <?=form_open('login/userChangePwd')?>
                            <h4 class="text-center mb-4">Changement de mot de passe</h4>     
                            <div class="form-group">
                                <h5>Pseudo</h5> 
                                <input class="form-control" type="text" name="pseudo"/><br />

                                <h5>Email</h5>
                                <input class="form-control" type="email" name="email"/><br />

                                <h5>Mot de passe</h5>
                                <input class="form-control" type="password" name="password"/>

                                <div class="d-flex mt-2">
                                    <input class="btn btn-info mr-2" type="submit" name="submit" value="Enregistrer" />
                                    <a class="btn btn-info" href="<? echo base_url("login")?>">Retour</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>

            