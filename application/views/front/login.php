<div class="container ">
    <h1 class="text-center">Connexion / Inscription</h1>
    <hr>
    <div class="row mx-auto justify-content-around" style="width: 1100px">
        <div class="col-lg-5">
            <?=form_open('login/connexion')?>
                <h4 class="text-center">Connectez-vous</h4>     
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
        <div class="col-lg-5">
            <?=form_open('signin/inscription')?>
                <h4 class="text-center">Pas encore inscrit ?</h4>
                <p class="text-center">Merci de remplir ce formulaire</p>     
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
            