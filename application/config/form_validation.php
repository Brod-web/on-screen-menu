<?
$config = array(
    'login/connexion' => array(
        array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required|valid_email'
        ),
        array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required'
        )
    ),

    'signin/inscription' => array(
        array(
                'field' => 'pseudo',
                'label' => 'Pseudo',
                'rules' => 'trim|required'
        ),
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|required|valid_email'
        ),
        array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required'
        )
    ),

    'back/restaurant' => array(
        array(
            'field' => 'name',
            'label' => 'Name',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'web_url',
            'label' => 'Web_url',
            'rules' => 'trim|required|valid_url'
        ),
        array(
            'field' => 'phone',
            'label' => 'Phone',
            'rules' => 'trim|required|numeric'
        ),
        array(
            'field' => 'adresse',
            'label' => 'Adresse',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'CP',
            'label' => 'CP',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'ville',
            'label' => 'Ville',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'photo_url',
            'label' => 'Photo_url',
            'rules' => 'trim'
        )
    ),

    'customs/index' => array(
        array(
            'field' => 'facebook',
            'label' => 'Facebook',
            'rules' => 'trim'
        ),
        array(
            'field' => 'instagram',
            'label' => 'Instagram',
            'rules' => 'trim'
        ),
        array(
            'field' => 'twitter',
            'label' => 'Twitter',
            'rules' => 'trim'
        ),
        array(
            'field' => 'phrase',
            'label' => 'Phrase',
            'rules' => 'trim'
        ),
        array(
            'field' => 'QR_code',
            'label' => 'QR_code',
            'rules' => 'trim'
        ),
        array(
            'field' => 'logo_url',
            'label' => 'Logo_url',
            'rules' => 'trim'
        ),
        array(
            'field' => 'fond_url',
            'label' => 'Fond_url',
            'rules' => 'trim'
        )
    ),

    'customs/modes_sel' => array(
        array(
            'field' => 'switch1',
            'label' => 'Switch1',
            'rules' => 'trim'
        ),
        array(
            'field' => 'switch2',
            'label' => 'Switch2',
            'rules' => 'trim'
        )
    ),

    'back/add_category' => array(
        array(
            'field' => 'name',
            'label' => 'Name',
            'rules' => 'required'
        ),
        array(
            'field' => 'description',
            'label' => 'Description',
            'rules' => 'required'
        ),
    ),

    'back/mod_category' => array(
        array(
            'field' => 'name',
            'label' => 'Name',
            'rules' => 'required'
        ),
        array(
            'field' => 'description',
            'label' => 'Description',
            'rules' => 'required'
        ),
    ),

    'back/add_product' => array(
        array(
            'field' => 'name',
            'label' => 'Name',
            'rules' => 'required'
        ),
        array(
            'field' => 'description',
            'label' => 'Description',
            'rules' => 'required'
        ),
        array(
            'field' => 'price',
            'label' => 'Price',
            'rules' => 'required'
        ),
        /*array(
            'field' => 'photo_url',
            'label' => 'Photo_url',
            'rules' => 'trim'
        ),*/
        array(
            'field' => 'cat_product_id',
            'label' => 'cat_product_id',
            'rules' => 'required'
        )
    ),

    'back/mod_product' => array(
        array(
            'field' => 'name',
            'label' => 'Name',
            'rules' => 'required'
        ),
        array(
            'field' => 'description',
            'label' => 'Description',
            'rules' => 'required'
        ),
        array(
            'field' => 'price',
            'label' => 'Price',
            'rules' => 'required'
        ),
        /*array(
            'field' => 'photo_url',
            'label' => 'Photo_url',
            'rules' => 'trim'
        ),*/
        array(
            'field' => 'cat_product_id',
            'label' => 'cat_product_id',
            'rules' => 'required'
        )
    ),

    'back/add_menu' => array(
        array(
            'field' => 'name',
            'label' => 'Name',
            'rules' => 'required'
        ),
        array(
            'field' => 'description',
            'label' => 'Description',
            'rules' => 'required'
        ),
        array(
            'field' => 'price',
            'label' => 'Price',
            'rules' => 'required'
        ),
        /*array(
            'field' => 'show_order',
            'label' => 'Show_order',
            'rules' => 'trim'
        )*/
    ),

    'back/mod_menu' => array(
        array(
            'field' => 'name',
            'label' => 'Name',
            'rules' => 'required'
        ),
        array(
            'field' => 'description',
            'label' => 'Description',
            'rules' => 'required'
        ),
        array(
            'field' => 'price',
            'label' => 'Price',
            'rules' => 'required'
        ),
        /*array(
            'field' => 'show_order',
            'label' => 'Show_order',
            'rules' => 'trim'
        )*/
    ),

    'back/add_menu' => array(
        array(
            'field' => 'name',
            'label' => 'Name',
            'rules' => 'required'
        ),
        array(
            'field' => 'description',
            'label' => 'Description',
            'rules' => 'required'
        ),
        array(
            'field' => 'price',
            'label' => 'Price',
            'rules' => 'required'
        ),
        /*array(
            'field' => 'show_order',
            'label' => 'Show_order',
            'rules' => 'trim'
        )*/
    ),
);
?>