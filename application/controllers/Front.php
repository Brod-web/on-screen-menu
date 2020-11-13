<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Menu_Model');
	}
	
	public function index()
	{
		$userId = $this->session->id;
		$restoId = $this->session->restoId;
		$data['resto'] = $this->Resto_Model->getResto($userId);
		$data['options'] = $this->Resto_Model->getOptions($restoId);
		$data['menus'] = $this->Menu_Model->getMenuAll($restoId);

		$this->layout->set_title('Démo');
		$this->layout->view('front/demo_accueil',$data);
	}

	public function demo_resto()
	{
		$userId = $this->session->id;
		$restoId = $this->session->restoId;
		$data['resto'] = $this->Resto_Model->getResto($userId);
		$data['options'] = $this->Resto_Model->getOptions($restoId);
		$data['menus'] = $this->Menu_Model->getMenuAll($restoId);

		$this->layout->set_title('Démo');
		$this->layout->view('front/demo_resto',$data);
	}

	public function demo_menus()
	{
		$userId = $this->session->id;
		$restoId = $this->session->restoId;
		$data['resto'] = $this->Resto_Model->getResto($userId);
		$data['options'] = $this->Resto_Model->getOptions($restoId);
		$data['menus'] = $this->Menu_Model->getMenuAll($restoId);
		
		$this->layout->set_title('Démo');
		$this->layout->view('front/demo_menus',$data);
	}

	public function demo_carte()
	{
		$userId = $this->session->id;
		$restoId = $this->session->restoId;
		$data['resto'] = $this->Resto_Model->getResto($userId);
		$data['options'] = $this->Resto_Model->getOptions($restoId);
		$data['menus'] = $this->Menu_Model->getMenuAll($restoId);
		
		$this->load->model('Category_Model');
		$this->load->model('Product_Model');
		$data['cats'] = $this->Category_Model->getCatAll($restoId);

		$this->layout->set_title('Démo');
		$this->layout->view('front/demo_carte',$data);
	}

	public function demo_menu($menuId)
	{
		$userId = $this->session->id;
		$restoId = $this->session->restoId;
		$data['resto'] = $this->Resto_Model->getResto($userId);
		$data['options'] = $this->Resto_Model->getOptions($restoId);
		$data['menu'] = $this->Menu_Model->getMenu($menuId);
		
		$this->load->model('Category_Model');
		$this->load->model('Product_Model');
		
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

		$this->layout->set_title('Démo');
		$this->layout->view('front/demo_menu',$data);
	}
}