<?
class Menu_Model extends MY_Model {

    public function getMenu($menuId)
	{
        $this->db->from('menu');
        $this->db->where('id', $menuId);
        $query = $this->db->get();
        return $query->row();
    }

    public function getMenuAll($restoId)
	{
        $this->db->from('menu');
        $this->db->where('restaurant_id', $restoId);
        $this->db->order_by('show_order', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    // ajout catégories sélectionnées pour un menu
    public function addMenuCatSelection($catSelect)
	{
        return $this->db->insert('menu_cats', $catSelect);
    }

    // get catégories sélectionnées d'un menu
    public function getMenuCatSelection($menuId)
	{
        $this->db->from('menu_cats AS t1, cat_product AS t2');
        $this->db->select('t1.cat_product_id, t2.name');
        $this->db->where('t1.cat_product_id = t2.id');
        $this->db->where('t1.menu_id', $menuId);
        $query = $this->db->get();
        return $query->result();
    }

    /* liste produits d'une catégorie
    public function getMenuProducts($cat)
	{
        $this->db->from('product');
        $this->db->where('cat_product_id', $cat);
        $query = $this->db->get();
        return $query->result();
    }*/

    // ajout produits sélectionnées pour un menu
    public function addMenuProductSelection($productSelect)
	{
        return $this->db->insert('menu_products', $productSelect);
    }

    // check si produits sélectionnés dans un menu
    public function checkProducts($menuId)
    {
        $this->db->select('product_id');
        $this->db->from('menu_products');
        $this->db->where('menu_id', $menuId);
        $query = $this->db->get();
        return $query->result();
    }

    // reset liste catégories sélectionnées (avant MaJ)
    public function resetCats($menuId)
    {
        $this->db->where('menu_id', $menuId);
        return $this->db->delete('menu_cats');
    }

    // reset liste produits sélectionnés (avant MaJ)
    public function resetProducts($menuId)
    {
        $this->db->where('menu_id', $menuId);
        return $this->db->delete('menu_products');
    }

    public function addMenu($data)
    {
        return $this->db->insert('menu', $data);
    }

    public function modifMenu($menuId, $data)
    {
        $this->db->where('id', $menuId);
        return $this->db->update('menu', $data);
    }

    public function delMenu($menuId)
    {
        $this->db->where('id', $menuId);
        return $this->db->delete('menu');
    }

    public function countMenus($restoId)
	{
        $query = $this->db->query("SELECT * FROM menu WHERE restaurant_id = $restoId");
        return $query->num_rows();
    }

    public function countMenusCats($menuId)
	{
        $query = $this->db->query("SELECT * FROM menu_cats WHERE menu_id = $menuId");
        return $query->num_rows();
    }

    public function countMenusProducts($menuId)
	{
        $query = $this->db->query("SELECT * FROM menu_products WHERE menu_id = $menuId");
        return $query->num_rows();
    }

    public function orderMenu($menuId)
    {
        $this->db->from('menu');
        $this->db->select('show_order');
        $this->db->where('id', $menuId);
        $query = $this->db->get();
        return $query->row();
    }
}
