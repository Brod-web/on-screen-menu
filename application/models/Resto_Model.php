<?
class Resto_Model extends MY_Model {

    public function getResto($userId)
	{
        $this->db->from('restaurant');
        $this->db->where('user_id', $userId);
        $query = $this->db->get();
        return $query->row();
    }

    public function checkRestoExist($userId)
	{
        $this->db->from('restaurant');
        $this->db->where('user_id', $userId);
        $query = $this->db->get();

        if($query->num_rows() != 0){
            // resto déjà existant
            return TRUE;
        } else {
            // resto à créer
            return FALSE;
        }
	}

    public function addResto($data)
    {
        return $this->db->insert('restaurant', $data);
    }

    public function modifResto($restoId, $data)
    {
        $this->db->where('id', $restoId);
        return $this->db->update('restaurant', $data);
    }

    public function delResto($restoId)
    {
        return $this->db->delete('restaurant', $restoId);
    }

    public function getOptions($restoId)
	{
        $this->db->from('options');
        $this->db->where('restaurant_id', $restoId);
        $query = $this->db->get();
        return $query->row();
    }


    public function modifOptions($restoId, $data)
    {
        $this->db->where('id', $restoId);
        return $this->db->update('options', $data);
    }
}