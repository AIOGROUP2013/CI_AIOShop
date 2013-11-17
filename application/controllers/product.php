<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {
 var $data = array();
 function  __construct() 
    {
        parent::__construct();
        $this->load->helper(array("url"));
        $this->load->model("SANPHAM");
          $this->load->model("THAMSO");
           $this->load->helper(array("url"));
  
    }
	   public function load_page($namepage, $data){
            if($this->session->userdata('is_logged_in')){
                $data['link']='';
                $data['link_logout']=base_url().'index.php/welcome/dangxuat';
                $data['log_out']='ĐĂNG XUẤT';
                $data['text_before']='TÀI KHOẢN';
                $data['text_after']= $this->session->userdata('email');
                $this->load->view($namepage,$data);
            }
            else{
                $data['link']=base_url().'index.php/welcome/dangky';
                $data['link_logout']='';
                $data['log_out']='';                
                $data['text_before']='ĐĂNG NHẬP';
                $data['text_after']='ĐĂNG KÝ';
                $this->load->view($namepage,$data);                
            }            
        }
	public function index()
	{
         
         $data['id']= $this->input->get('id');
        $this->load_page('default', $data);
        // $this->load->view('default',$data);
	}
        
     
}