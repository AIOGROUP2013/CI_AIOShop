<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Type extends CI_Controller {

    var $data = array();

    function __construct() {
        parent::__construct();
        $this->load->helper(array("url"));
        $this->load->model("SANPHAM");

        $this->load->helper(array("url"));
    }

    public function load_page($namepage, $data) {
        if ($this->session->userdata('is_logged_in')) {
            $data['link'] = '';
            $data['link_logout'] = base_url() . 'index.php/welcome/dangxuat';
            $data['log_out'] = 'ĐĂNG XUẤT';
            $data['text_before'] = 'TÀI KHOẢN';
            $data['text_after'] = $this->session->userdata('email');
            $this->load->view($namepage, $data);
        } else {
            $data['link'] = base_url() . 'index.php/welcome/dangky';
            $data['link_logout'] = '';
            $data['log_out'] = '';
            $data['text_before'] = 'ĐĂNG NHẬP';
            $data['text_after'] = 'ĐĂNG KÝ';
            $this->load->view($namepage, $data);
        }
    }

    public function index() {
        $data['type'] = $this->input->get('type');
        if (isset($_POST['stt']))
            $data['stt'] = $_POST['stt'];
        else
            $data['stt'] = 0;
        $sp = new Sanpham();
       $data['max']=$sp->Max("masp", "loaisp=" . $data['type']);
        $data['type'] = $this->input->get('type');
        $data['data_nho'] = $sp->getListObject("*", "loaisp=" . $data['type'], "masp", "24",0);

        $this->load_page('seach', $data);
        // $this->load->view('default',$data);
    }

    public function ajax() {
        $sp = new Sanpham();
        $stt = $_POST['stt'];
        $type = $_POST['type'];


        $data['data_nho'] = $sp->getListObject("*", "loaisp=" .$type, "masp", "24", $stt);
        $this->load->view('ajaxproduct', $data);
    }

}