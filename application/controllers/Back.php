<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Back extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Menu_Model');
		$this->load->model('Category_Model');
		$this->load->model('Product_Model');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
	}
	
	function index()
	{
		$userId = $this->session->id;

		if($this->Resto_Model->checkRestoExist($userId)) {
            // Resto déjà créé
			$data['resto'] = $this->Resto_Model->getResto($userId);
			$this->session->restoId = $data['resto']->id;
			
			$this->load->model('Menu_Model');
			$this->load->model('Category_Model');
			$this->load->model('Product_Model');

			$data['options'] = $this->Resto_Model->getOptions($data['resto']->id);
			$data['countMenus'] = $this->Menu_Model->countMenus($data['resto']->id);
			$data['countCategories'] = $this->Category_Model->countCategories($data['resto']->id);
			$data['countProducts'] = $this->Product_Model->countProducts($data['resto']->id);
			//$this->MY_Model->debug($data);

			$this->layout->set_title('Dashboard');
			$this->layout->view('back/dashboard',$data);
			
	    } else {
			// Création resto vide (juste user_id)
			$data = array(
				'user_id' => $userId
			);
			$this->Resto_Model->addResto($data);
			$data['resto'] = $this->Resto_Model->getResto($userId);
			$this->session->restoId = $data['resto']->id;

			// Création options pour ce resto
			$options = array(
				'maintenance' => '1',
				'quantity' => '0',
				'QR_code' => '0',
				'geoloc' => '0',
				'restaurant_id' => $data['resto']->id
			);
			$this->Resto_Model->addOptions($options);
			$data['options'] = $this->Resto_Model->getOptions($data['resto']->id);

			// Création répertoire sous uploads
			mkdir("./uploads/".$data['resto']->id);
			
			$this->layout->set_title('Restaurant');
			$this->layout->view('back/restaurant',$data);
		}
	}
	
	// RESTAURANT //
	function restaurant()
	{
		$userId = $this->session->id;
		$restoId = $this->session->restoId;
		$data['resto'] = $this->Resto_Model->getResto($userId);
		$data['options'] = $this->Resto_Model->getOptions($restoId);
		//$this->MY_Model->debug($data);

		if ($this->form_validation->run() == FALSE){
			$this->layout->set_title('Restaurant');
			$this->layout->view('back/restaurant',$data);
			
			$error = $this->session->set_flashdata('error', validation_errors());
			echo $error;
		} else {
			$data = array(
				'name' => $this->input->post('name'),
				'carte_link' => $this->input->post('carte_link'),
        		'web_url' => $this->input->post('web_url'),
        		'phone' => $this->input->post('phone'),
        		'adresse' => $this->input->post('adresse'),
        		'CP' => $this->input->post('CP'),
        		'ville' => $this->input->post('ville'),
        		'photo_url' => $this->input->post('photo_url')
			);
			$this->Resto_Model->modifResto($restoId, $data);
			redirect('back/index');
		}
	}
	
	// CATEGORIE //
	function categories()
	{
		$restoId = $this->session->restoId;
		$data['options'] = $this->Resto_Model->getOptions($restoId);
		$data['categories'] = $this->Category_Model->getCatAll($restoId);
		
		foreach($data['categories'] as $cat){
			$data['count'][$cat->id] = $this->Product_Model->countProductsByCat($restoId,$cat->id);
		}
		
		$this->layout->set_title('Catégories');
		$this->layout->view('back/categories',$data);
		
	}

	function add_category()
	{
		$restoId = $this->session->restoId;
		$data['options'] = $this->Resto_Model->getOptions($restoId);
		$data['icons'] = $this->Category_Model->getIcons();

		if ($this->form_validation->run() == FALSE){
			$this->layout->set_title('Catégories');
			$this->layout->view('back/category_add',$data);
			$error = $this->session->set_flashdata('error', validation_errors());
			echo $error;
		} else {
			$data = array(
				'name' => $this->input->post('name'),
        		'description' => $this->input->post('description'),
        		'icon_file' => $this->input->post('icon'),
        		'restaurant_id' => $restoId
			);
			$this->Category_Model->addCat($data);

			$catId = $this->db->insert_id();
			$data = array(
			'show_order' => $catId
			);
			$this->Category_Model->modifCat($catId, $data);
			redirect('back/categories');
		}
	}

	function mod_category($catId)
	{
		$restoId = $this->session->restoId;
		$data['options'] = $this->Resto_Model->getOptions($restoId);
		$data['cat'] = $this->Category_Model->getCat($catId);
		$data['icons'] = $this->Category_Model->getIcons();

		if ($this->form_validation->run() === FALSE){
			$this->layout->set_title('Catégories');
			$this->layout->view('back/category_mod',$data);
			$error = $this->session->set_flashdata('error', validation_errors());
			echo $error;
		} else {
			$data = array(
				'name' => $this->input->post('name'),
        		'description' => $this->input->post('description'),
        		'icon_file' => $this->input->post('icon'),
        		'restaurant_id' => $restoId
			);
			$this->Category_Model->modifCat($catId, $data);
			redirect('back/categories');
		}
	}

	function del_category($catId)
	{
		$this->Category_Model->delCatLinks($catId);
		$this->Category_Model->delCat($catId);
		redirect("back/categories");
	}

	function order_category($catId)
	{
		$order = $this->Category_Model->orderCat($catId)->show_order;

		if($this->input->post('order') === '+'){
			$order += 1;
			$data = array(
        		'show_order' => $order,
			);
			$this->Category_Model->modifCat($catId, $data);
			redirect('back/categories');
		}

		if($this->input->post('order') === '-'){
			$order -= 1;
			$data = array(
        		'show_order' => $order,
			);
			$this->Category_Model->modifCat($catId, $data);
			redirect('back/categories');
		}
	}

	function Choose_categorie($restoId)
	{
		$data['options'] = $this->Resto_Model->getOptions($restoId);
		$data['catList'] = $this->Category_Model->getCatAll($restoId);

		$this->layout->set_title('Produits');
		$this->layout->view('back/products',$data);
	}

	// PRODUIT //
	function products_by_cat($catId)
	{
		$restoId = $this->session->restoId;
		$data['options'] = $this->Resto_Model->getOptions($restoId);
		$data['products'] = $this->Product_Model->getProductByCat($catId);

		$this->layout->set_title('Produits');
		$this->layout->view('back/products_by_cat',$data);
	}

	function add_product()
	{
		$restoId = $this->session->restoId;
		$data['options'] = $this->Resto_Model->getOptions($restoId);
		$data['catList'] = $this->Category_Model->getCatAll($restoId);

		if ($this->form_validation->run() == FALSE){
			$this->layout->set_title('Produits');
			$this->layout->view('back/product_add',$data);
			$error = $this->session->set_flashdata('error', validation_errors());
			echo $error;
		} else {
			$data = array(
				'name' => $this->input->post('name'),
        		'description' => $this->input->post('description'),
        		'price' => $this->input->post('price'),
        		'photo_url' => $this->input->post('photo_url'),
        		'cat_product_id' => $this->input->post('cat_product_id')
			);
			$this->Product_Model->addProduct($data);
			redirect('back/add_product');
		}
	}

	function mod_product($productId)
	{
		$restoId = $this->session->restoId;
		$data['options'] = $this->Resto_Model->getOptions($restoId);
		$data['catList'] = $this->Category_Model->getCatAll($restoId);
		$data['product'] = $this->Product_Model->getProduct($productId);

		if ($this->form_validation->run() == FALSE){
			$this->layout->set_title('Produits');
			$this->layout->view('back/product_mod',$data);
			$error = $this->session->set_flashdata('error', validation_errors());
			echo $error;
		} else {
			$catId = $this->input->post('cat_product_id');
			$data = array(
				'name' => $this->input->post('name'),
        		'description' => $this->input->post('description'),
        		'price' => $this->input->post('price'),
        		'photo_url' => $this->input->post('photo_url'),
        		'cat_product_id' => $catId
			);
			$this->Product_Model->modifProduct($productId, $data);
			redirect("back/products_by_cat/$catId");
		}
	}

	function del_product($productId)
	{
		$catId = $this->Product_Model->getProduct($productId)->cat_product_id;

		$this->Product_Model->delProductLinks($productId);
		$this->Product_Model->delProduct($productId);
		redirect("back/products_by_cat/$catId");
	}

	function order_product($productId)
	{
		$order = $this->Product_Model->orderProduct($productId)->show_order;
		$catId = $this->Product_Model->orderProduct($productId)->cat_product_id;

		if($this->input->post('order') === '+'){
			$order += 1;
			$data = array(
        		'show_order' => $order,
			);
			$this->Product_Model->modifProduct($productId, $data);
			redirect("back/products_by_cat/$catId");
		}

		if($this->input->post('order') === '-'){
			$order -= 1;
			$data = array(
        		'show_order' => $order,
			);
			$this->Product_Model->modifProduct($productId, $data);
			redirect("back/products_by_cat/$catId");
		}
	}

	// MENU //
	function menus()
	{
		$restoId = $this->session->restoId;
		$data['options'] = $this->Resto_Model->getOptions($restoId);
		$data['menus'] = $this->Menu_Model->getMenuAll($restoId);
		
		foreach($data['menus'] as $menu){
			$data['countCats'][$menu->id] = $this->Menu_Model->countMenusCats($menu->id);
			$data['countProducts'][$menu->id] = $this->Menu_Model->countMenusProducts($menu->id);
		}
		$this->layout->set_title('Menus');
		$this->layout->view('back/menus',$data);
		
	}

	function add_menu()
	{
		$restoId = $this->session->restoId;
		$data['options'] = $this->Resto_Model->getOptions($restoId);
		$data['cats'] = $this->Category_Model->getCatAll($restoId);

		if ($this->form_validation->run() == FALSE){
			$this->layout->set_title('Menus');
			$this->layout->view('back/menu_add',$data);
			$error = $this->session->set_flashdata('error', validation_errors());
			echo $error;
		} else {
			$data = array(
				'name' => $this->input->post('name'),
				'description' => $this->input->post('description'),
				'price' => $this->input->post('price'),
        		'restaurant_id' => $restoId
			);
			$this->Menu_Model->addMenu($data);
			$menuId = $this->db->insert_id();

			if($this->input->post('menu_cats') !== NULL){
				foreach($this->input->post('menu_cats') as $menu_cat_id){
					$catSelect = array(
						'menu_id' => $menuId,
						'cat_product_id' => $menu_cat_id
					);
					$this->Menu_Model->addMenuCatSelection($catSelect);
				}
			}
			redirect('back/menus');
		}
		
	}

	function mod_menu($menuId)
	{
		$restoId = $this->session->restoId;
		$data['options'] = $this->Resto_Model->getOptions($restoId);
		$data['menu'] = $this->Menu_Model->getMenu($menuId);

		//gestion catégories
		$data['cats'] = $this->Category_Model->getCatAll($restoId);
		$data['cats_sel'] = [];
		$cats_sel = $this->Menu_Model->getMenuCatSelection($menuId);

		//gestion produits
		$data['products_sel'] = [];
		$products_sel = $this->Menu_Model->checkProducts($menuId);

		foreach($data['cats'] as $cat){
			foreach($cats_sel as $cat_sel){
				if($cat->id == $cat_sel->cat_product_id){
					array_push($data['cats_sel'],$cat->id);
					$products = $this->Product_Model->getProductByCat($cat->id);
					foreach($products as $product){
						foreach($products_sel as $product_sel){
							if($product->id == $product_sel->product_id){
								array_push($data['products_sel'],$product->id);
							}
						}
						
					}
				}
			}
		}
        
		if ($this->form_validation->run() == FALSE){
			$this->layout->set_title('Menus');
			$this->layout->view('back/menu_mod',$data);
			$error = $this->session->set_flashdata('error', validation_errors());
			echo $error;
		} else {
			$data = array(
				'name' => $this->input->post('name'),
				'description' => $this->input->post('description'),
				'price' => $this->input->post('price'),
        		'restaurant_id' => $restoId
			);
			$this->Menu_Model->modifMenu($menuId, $data);

			if($this->input->post('menu_cats') !== NULL){
				$this->Menu_Model->resetCats($menuId);
				foreach($this->input->post('menu_cats') as $menu_cat_id){
					$catSelect = array(
						'menu_id' => $menuId,
						'cat_product_id' => $menu_cat_id
					);
					$this->Menu_Model->addMenuCatSelection($catSelect);
				}
			}

			if($this->input->post('menu_products') !== NULL){
				$this->Menu_Model->resetProducts($menuId);
				foreach($this->input->post('menu_products') as $menu_product_id){
					$productSelect = array(
						'menu_id' => $menuId,
						'product_id' => $menu_product_id
					);
					$this->Menu_Model->addMenuProductSelection($productSelect);
				}
			}
			redirect("back/mod_menu/$menuId");
		}
	}

	function del_menu($menuId)
	{
		$data['menu'] = $this->Menu_Model->getMenu($menuId);

		$this->Menu_Model->delMenu($menuId);
		redirect('back/menus');
	}

	function order_menu($menuId)
	{
		$order = $this->Menu_Model->orderMenu($menuId)->show_order;

		if($this->input->post('order') === '+'){
			$order += 1;
			$data = array(
        		'show_order' => $order,
			);
			$this->Menu_Model->modifMenu($menuId, $data);
			redirect('back/menus');
		}

		if($this->input->post('order') === '-'){
			$order -= 1;
			$data = array(
        		'show_order' => $order,
			);
			$this->Menu_Model->modifMenu($menuId, $data);
			redirect('back/menus');
		}
	}

}