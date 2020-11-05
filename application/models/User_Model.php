<?
class User_Model extends MY_Model {

    public function getUsers()
	{
        $query = $this->db->query('SELECT * FROM user');
        return $query->result();
    }

    public function getUser($userId)
	{
        $this->db->from('user');
        $this->db->where('id', $userId);
        $query = $this->db->get();
        return $query->row();
    }
    
    public function checkUserExist($email,$pwd)
	{
        $auth = array('email' => $email, 'password' => $pwd);
        
        $this->db->from('user');
        $this->db->where($auth);
        $query = $this->db->get();
        $user = $query->row();

        if($query->num_rows() != 0){
            // user déjà existant
            return $user->id;
        } else {
            // user à créer
            return FALSE;
        } 
    }
    
    public function setSession($userId)
	{
		$user = $this->User_Model->getUser($userId);
		$this->session->email = $user->email;
		$this->session->pseudo = $user->pseudo;
		$this->session->id = $user->id;
    }

    public function addUser($data)
    {
        return $this->db->insert('user', $data);
    }

    public function modifUser()
    {
        
    }

    public function delUser()
    {
        
    }


}