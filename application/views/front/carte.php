<div class="container-fluid">
    <div class="alert alert-success mt-3" role="alert">
        <?$msg = "Bienvenue sur cette page démo. Elle permet de vous faire une idée du rendu client de votre carte sur smartphone";
        echo $msg;?>
    </div>
    <div class="d-flex justify-content-around">
        <div class="fond-phone mt-4">
            <div class="phone text-center">
            <h1><?=$resto->name?></h1>
            <h3>Bienvenue</h3>

            <h4>Nos menus</h4>
            <ul>
                <?foreach($menus as $menu){?>
                    <li>
                        <?=$menu->name?>
                        <?=$menu->price?>
                    </li>
                <?}?>
            </ul>

            <h4>Nous contactez</h4>
            <p><?=$resto->phone?></p>
            <p><?=$resto->web_url?></p>

            </div>
        </div>
        <div class="fond-phone mt-4">
            <div class="phone text-center">
                <h1><?=$resto->name?></h1>
                <h3>Bienvenue</h3>

                <h4>Nos menus</h4>
                <ul>
                    <?foreach($menus as $menu){?>
                        <li>
                            <?=$menu->name?>
                            <?=$menu->price?>
                        </li>
                    <?}?>
                </ul>

                <h4>Nous contactez</h4>
                <p><?=$resto->phone?></p>
                <p><?=$resto->web_url?></p>

            </div>
        </div>
    </div>
</div>


