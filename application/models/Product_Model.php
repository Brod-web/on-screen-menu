<?
class Product_Model extends MY_Model {

    public function getProduct($productId)
	{
        $this->db->from('product');
        $this->db->where('id', $productId);
        $query = $this->db->get();
        return $query->row();
    }

    public function getProductByCat($catId)
	{
        $this->db->from('product');
        $this->db->where('cat_product_id', $catId);
        $this->db->order_by('show_order', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function addProduct($data)
    {
        return $this->db->insert('product', $data);
    }

    public function modifProduct($productId, $data)
    {
        $this->db->where('id', $productId);
        return $this->db->update('product', $data);
    }

    public function delProductLinks($productId)
    {
        $this->db->where('product_id', $productId);
        return $this->db->delete('menu_products');
    }

    public function delProduct($productId)
    {
        $this->db->where('id', $productId);
        return $this->db->delete('product');
    }

    public function countProducts($restoId)
	{
        $query = $this->db->query("SELECT * FROM product,cat_product WHERE product.cat_product_id = cat_product.id AND cat_product.restaurant_id = $restoId");
        return $query->num_rows();
    }

    public function countProductsByCat($restoId,$catId)
	{
        $query = $this->db->query("SELECT * FROM product,cat_product WHERE product.cat_product_id = cat_product.id AND cat_product.restaurant_id = $restoId AND product.cat_product_id = $catId");
        return $query->num_rows();
    }

    public function orderProduct($productId)
    {
        $this->db->from('product');
        $this->db->select('show_order, cat_product_id');
        $this->db->where('id', $productId);
        $query = $this->db->get();
        return $query->row();
    }
}
