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
            <small class="mt-3 siteName white fond-grey text-center">Bienvenue <?=$this->session->pseudo?></small>
            <div>
                <footer class="text-center orange fond-grey mb-3"><strong>On-Screen Menu | &copy; Brod-web <?=date('Y')?></strong></footer>
            </div>
        </div>
        <div class="col-lg-9 col-md-12 col-sm-12">
            <div class="container-fluid">
                <div class="alert alert-info mt-3 text-center" role="alert">
                    <?$msg = "Vous êtes restaurateur, tenez un petit snack, un fast-food... <strong>On Screen Menu est fait pour vous.</strong></br>Cette application vous permez de créer et gérer vos cartes.</br>Vos clients accédent à celles-ci via un lien ou QR code sur leur portable. <strong>Testez</strong> ... Ils apprécieront le service.</br></br>
                    <strong>Alors ... Connectez-vous</strong> ou inscrivez-vous si c'est votre première visite. <strong>Merci à vous.</strong>";
                    echo $msg;?>
                </div>
        
                <div class="row mx-auto justify-content-around">
                    <div class="col-lg-5 mt-3">
                        <?=form_open('login/connexion')?>
                            <h4 class="text-center">Connection</h4>     
                            <div class="form-group">
                                <h5>Email</h5> 
                                <input class="form-control" type="text" name="email"/><br />

                                <h5>Password</h5>
                                <input class="form-control" type="password" name="password"/>

                                <input class="btn btn-info mt-2 mb-3" type="submit" name="submit" value="Connexion" />
                            </div>
                        </form>
                        <p><a href="#">Mot de passe oublié ?</a></p>
                    </div>
                    <div class="col-lg-5 mt-3">
                        <?=form_open('signin/inscription')?>
                            <h4 class="text-center">Inscription</h4>     
                            <div class="form-group">
                                <h5>User</h5> 
                                <input class="form-control" type="text" name="pseudo"/><br />

                                <h5>Email</h5> 
                                <input class="form-control" type="text" name="email"/><br />

                                <h5>Password</h5>
                                <input class="form-control" type="password" name="password"/>

                                <input class="btn btn-info mt-2 mb-3" type="submit" name="submit" value="Inscription" />
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

            