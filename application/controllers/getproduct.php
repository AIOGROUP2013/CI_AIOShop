<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Getproduct extends CI_Controller {

 function  __construct() 
    {
        parent::__construct();
        $this->load->helper(array("url"));
        $this->load->model("SANPHAM");
      
    }
	
	public function index()
	{
            $id=$_POST['id'];
            $sp= new Sanpham();
         $a=   $sp->getListObject("*", "masp=".$id);
         echo json_encode($a);
	}
        
     
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */