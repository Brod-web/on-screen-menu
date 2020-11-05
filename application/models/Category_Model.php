<?
class Category_Model extends MY_Model {

    public function getCat($catId)
	{
        $this->db->from('cat_product');
        $this->db->where('id', $catId);
        $query = $this->db->get();
        return $query->row();
    }

    public function getCatAll($restoId)
	{
        $this->db->from('cat_product');
        $this->db->where('restaurant_id', $restoId);
        $this->db->order_by('show_order', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function addCat($data)
    {
        return $this->db->insert('cat_product', $data);
    }

    public function modifCat($catId, $data)
    {
        $this->db->where('id', $catId);
        return $this->db->update('cat_product', $data);
    }

    public function delCatLinks($catId)
    {
        $this->db->where('cat_product_id', $catId);
        return $this->db->delete('menu_cats');
    }

    public function delCat($catId)
    {
        $this->db->where('id', $catId);
        return $this->db->delete('cat_product');
    }

    public function countCategories($restoId)
	{
        $query = $this->db->query("SELECT * FROM cat_product WHERE restaurant_id = $restoId");
        return $query->num_rows();
    }

    public function orderCat($catId)
    {
        $this->db->from('cat_product');
        $this->db->select('show_order');
        $this->db->where('id', $catId);
        $query = $this->db->get();
        return $query->row();
    }

    public function getIcons()
    {
        $this->db->from('cat_icon');
        $query = $this->db->get();
        return $query->result();
    }
}
