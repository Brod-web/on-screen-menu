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
        $restoId = $this->session->restoId;

        $config['upload_path']          = "./uploads/$restoId/";
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 200;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);
        
        if ($this->upload->do_upload('photoFile')) {
            //Upload taille origine
            $data = array('upload_data' => $this->upload->data());
            $photo_name = $data['upload_data']['file_name'];
            $this->load->view('upload_form', array('photo_name' => $photo_name));

            //Resize image (pour affichage mode démo)
            $config['image_library'] = 'gd2';
            $config['source_image'] = "./uploads/$restoId/$photo_name";
            $config['create_thumb'] = FALSE;
            $config['maintain_ratio'] = TRUE;
            $config['width']         = 340;
            $config['height']       = 340;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            
            //Sauvegarde nom fichier dans DB
            $resto = array('photo_url' => $photo_name);
            $this->Resto_Model->modifResto($restoId, $resto);
        } else {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('upload_form', $error);
        }
        
    }

    public function upload_logo()
    {
        $restoId = $this->session->restoId;

        $config['upload_path']          = "./uploads/$restoId/";
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 200;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('logoFile')) {
            //Upload taille origine
            $data = array('upload_data' => $this->upload->data());
            $logo_name = $data['upload_data']['file_name'];
            $this->load->view('upload_form', array('logo_name' => $logo_name));

            //Resize image (pour affichage mode démo)
            $config['image_library'] = 'gd2';
            $config['source_image'] = "./uploads/$restoId/$logo_name";
            $config['create_thumb'] = FALSE;
            $config['maintain_ratio'] = TRUE;
            $config['width']         = 340;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            //Sauvegarde nom fichier dans DB
            $resto = array('logo_url' => $logo_name);
            $this->Resto_Model->modifResto($restoId, $resto);
        } else {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('upload_form', $error);
        }
        
    }

    public function upload_fond()
    {
        $restoId = $this->session->restoId;

        $config['upload_path']          = "./uploads/$restoId/";
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 200;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('fondFile')) {
            //Upload taille origine
            $data = array('upload_data' => $this->upload->data());
            $fond_name = $data['upload_data']['file_name'];
            $this->load->view('upload_form', array('fond_name' => $fond_name));

            //Resize image (nota : sans conserver ratio origine)
            $config['image_library'] = 'gd2';
            $config['source_image'] = "./uploads/$restoId/$fond_name";
            $config['create_thumb'] = FALSE;
            $config['maintain_ratio'] = FALSE;
            $config['width']         = 340;
            $config['height']       = 600;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();

            //Sauvegarde nom fichier dans DB
            $resto = array('fond_url' => $fond_name);
            $this->Resto_Model->modifResto($restoId, $resto);
        } else {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('upload_form', $error);
        }
        
    }

    /*public function upload_photoProduct()
    {
        $restoId = $this->session->restoId;

        $config['upload_path']          = "./uploads/$restoId/";
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 200;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);
        
        if ($this->upload->do_upload('photoProductFile')) {
            //Upload taille origine
            $data = array('upload_data' => $this->upload->data());
            $photoProduct_name = $data['upload_data']['file_name'];
            $this->load->view('upload_form', array('photo_name' => $photoProduct_name));

            //Création thumbnail (pour affichage mode démo)
            $config['image_library'] = 'gd2';
            $config['source_image'] = "./uploads/$restoId/$photoProduct_name";
            $config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = FALSE;
            $config['width']         = 128;
            $config['height']       = 128;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
        } else {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('upload_form', $error);
        }
        
    }*/
}
?>