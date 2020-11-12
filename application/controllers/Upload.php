<?php

class Upload extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        $this->load->view('upload_form');
    }

    public function upload_photo()
    {
        $config['upload_path']          = "./uploads/";
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 200;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);
        $restoId = $this->session->restoId;
        
        if ($this->upload->do_upload('photoFile')) {
            $data = array('upload_data' => $this->upload->data());
            $photo_name = array('photo_name' => $data['upload_data']['file_name']);
            $this->load->view('upload_form', $photo_name);
            
            $resto = array('photo_url' => $data['upload_data']['file_name']);
            $this->Resto_Model->modifResto($restoId, $resto);
        } else {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('upload_form', $error);
        }
        
    }

    public function upload_logo()
    {
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 200;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);
        $restoId = $this->session->restoId;

        if ($this->upload->do_upload('logoFile')) {
            $data = array('upload_data' => $this->upload->data());
            $logo_name = array('logo_name' => $data['upload_data']['file_name']);
            $this->load->view('upload_form', $logo_name);
            
            $resto = array('logo_url' => $data['upload_data']['file_name']);
            $this->Resto_Model->modifResto($restoId, $resto);
        } else {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('upload_form', $error);
        }
        
    }

    public function upload_fond()
    {
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 200;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);
        $restoId = $this->session->restoId;

        if ($this->upload->do_upload('fondFile')) {
            $data = array('upload_data' => $this->upload->data());
            $fond_name = array('fond_name' => $data['upload_data']['file_name']);
            $this->load->view('upload_form', $fond_name);

            $resto = array('fond_url' => $data['upload_data']['file_name']);
            $this->Resto_Model->modifResto($restoId, $resto);
        } else {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('upload_form', $error);
        }
        
    }
}
?>