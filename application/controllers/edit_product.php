<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Edit_product extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array("url"));
        $this->load->model("SANPHAM");
        $this->load->helper(array('form', 'url'));
        //Lấy đường dẫn url của thư mục chứa hình ảnh được upload
        $this->_gallery_url = base_url() . "public/images_product/";
        //Lấy đường dẫn vật lý của thư mục chứa hình ảnh đươc upload
        $this->_gallery_path = realpath(APPPATH . "../public/images_product");
        $this->load->helper("file");
    }

    public function index() {

        $sp = new Sanpham();
        $file_name = "";
        $masp = $this->input->post('masp');
        $tenanh = "";
        $tennf = "";
        if ($masp != "") {
            $tenanh = $sp->getListObject("duongdan", "masp=" . $masp);

            $tennf = $tenanh[0]->duongdan;
        }
        if (!$_FILES['file']['error'] > UPLOAD_ERR_OK) {
            if ($masp != "" && file_exists('public/images_product/' . $tennf)) {
                if ($tennf != "")
                    unlink('public/images_product/' . $tennf);
            }

            $config = array('upload_path' => $this->_gallery_path,
                'allowed_types' => 'gif|jpg|png',
                'max_size' => '200000');
            $this->load->library("upload", $config);

            if (!$this->upload->do_upload("file")) {
                $error = array($this->upload->display_errors());
                echo 'Loi upload ảnh';
            } else {
                $upload_data = $this->upload->data();
                $file_name = $upload_data['file_name'];
            }
        }
        if ($masp != "") {
            $sp->set_duongdan($file_name);
            $sp->set_giaban($this->input->post('giaban'));
            $sp->set_giacu($this->input->post('giacu'));
            $sp->set_mota($this->input->post('mota'));
            $sp->set_tensp($this->input->post('tensp'));
            $sp->UpdateField("masp=" . $masp);
        } else {
            $sp = new Sanpham();
            $sp->set_duongdan($file_name);
            $sp->set_giaban($this->input->post('giaban'));
            $sp->set_giacu($this->input->post('giacu'));
            $sp->set_mota($this->input->post('mota'));
            $sp->set_tensp($this->input->post('tensp'));
            $sp->set_loaisp(2);
            $ma = $sp->Max("masp");
            $sp->set_masp(++$ma);
            $sp->Save();
        }
    }
    
    public function Delete() {
       $sp= new Sanpham();
       $sp->Delete('masp='.$this->input->post('masp'));   
       echo $this->input->post('masp');
    }

}

/* End of file welcome.php */
    /* Location: ./application/controllers/welcome.php */