<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

 var $data = array();
 function  __construct() 
    {
        parent::__construct();
        $this->load->helper(array("url"));
        $this->load->model("Sanpham");
    }
	
        public function load_page($namepage, $data){
            if ($this->session->userdata('is_logged_in')){
                $data['link']='';
                $data['link_logout']=base_url().'index.php/welcome/dangxuat';
                $data['log_out']='ĐĂNG XUẤT';
                $data['text_before']='TÀI KHOẢN';
                $data['text_after']= $this->session->userdata('email');
		$data['include'] = 'member.php';
                $this->load->view($namepage,$data);
            }
            else{
                $data['link']=base_url().'index.php/welcome/dangky';
                $data['link_logout']='';
                $data['log_out']='';                
                $data['text_before']='ĐĂNG NHẬP';
                $data['text_after']='ĐĂNG KÝ';
		$data['include'] = 'login.php';
                if ($namepage === 'trangchu' || $namepage === 'dangky') {
                $this->load->view($namepage, $data);
                    }
                else
                $this->load->view('error', $data);
        }            
        }


        public function index()
	{
            $sp= new Sanpham();
            $data['data']=$sp->getListObject("*", "kichthuoc=3", null, 1);
            $data['data_avg']=$sp->getListObject("*", "kichthuoc=1");
            $data['data_lon']=$sp->getListObject("*", "kichthuoc=2");
            $data['data_nho']=$sp->getListObject("*","kichthuoc=0");
            
            $this->load_page('trangchu', $data);
               
	}
        
	public function dangky()
        {
            $this->load_page('dangky', FALSE);
        }
		
	public function doimatkhau()
        {
            $this->load_page('changepass', FALSE);
        }
	public function capnhat()
        {
            $this->load->model("Khachhang");
            $kh = new Khachhang();
            $strWhere = "email = '".$this->session->userdata('email')."'";
            $data['khachhang'] = $kh->getListObject("*",$strWhere);

            $this->load_page('update_info', $data);
        }
               
        
        //Sử dụng ở Localhost khi send email được
        public function kiemtra_dangky_email() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'trim|xss_clean|is_unique[taikhoan.username]');
        $this->form_validation->set_rules('password', 'Password', 'trim');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|matches[password]');
        $this->form_validation->set_message('is_unique', 'Tên đăng nhập đã tồn tại!');

		if ($this->form_validation->run()) {
            $key = md5(uniqid());

            $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => 'ducphogroup@gmail.com',
                'smtp_pass' => 'ketnoilasucmanhnhat',
                'mailtype' => 'html',
                'charset' => 'iso-8859-1'
            );
            $this->load->model('Taikhoan','taikhoan');
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->from('info@aioshop.vn', 'AIO SHOP VN');
            $this->email->to('trongthaonh@gmail.com');
            $this->email->subject('Confirm your account');

            $message = "<p>Cam on ban da dang ky tai khoan tai AIO Shop VN!</p>";
            $message .="<p><a href='" . base_url() . "index.php/welcome/them_taikhoan_key/$key'>Nhan vao day</a>
                        de kich hoat tai khoan cua ban!</p>";
            $this->email->message($message);

            if ($this->taikhoan->them_taikhoan_tam($key)) {
                if ($this->email->send()) {
                    echo 'Một email yêu cầu xác nhận đăng ký tài khoản đã được gửi tới email của bạn!';
                }
                else
                    show_error($this->email->print_debugger());
            }
            else
                echo 'Có lỗi trong quá trình thêm tài khoản';
        }else {
            $this->load->view('dangky');
        }
    }
 
        //Sử dụng ở hosting online, khi không send email được
        public function kiemtra_dangky() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'trim|xss_clean|is_unique[taikhoan.username]');
        $this->form_validation->set_rules('password', 'Password', 'trim');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|matches[password]');
        $this->form_validation->set_message('is_unique', 'Tên đăng nhập đã tồn tại!');
    }
    
    
    public function them_taikhoan_key($key) {
        $this->load->model('Taikhoan','taikhoan');

        if ($this->taikhoan->key_hople($key)) {
            $this->taikhoan->them_taikhoan_key($key);
            echo 'Tài khoản của bạn đã được tạo thành công!';
        }
        else
            echo 'Key không hợp lệ!';
    }
    
    
    public function them_taikhoan() {
	    $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'trim|xss_clean|is_unique[taikhoan.username]');
        $this->form_validation->set_rules('password', 'Password', 'trim');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|matches[password]');
        $this->form_validation->set_message('is_unique', 'Tên đăng nhập đã tồn tại!');
        $this->load->model('Taikhoan','taikhoan');
        if($this->taikhoan->them_taikhoan())
            echo 'Tài khoản của bạn đã được tạo thành công!';
        else
            echo 'Không thể tạo tài khoản!';
    }
    
   //Kiểm tra đăng nhập
   public function kiemtra_dangnhap() {
		if(!isset($_SESSION)){
			session_start();
		}
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email_login', 'Email', 'required|trim|xss_clean|callback_xacnhan_dangnhap');
        $this->form_validation->set_rules('pass_login', 'Password', 'required|md5|trim');

        if ($this->form_validation->run()) {
            $data = array(
                'email' => $this->input->post('email_login'),
                'is_logged_in' => true
            );
            $this->session->set_userdata($data);
            redirect(base_url());
        } else {
            $this->load->view('dangky');
        }
    }

    public function xacnhan_dangnhap() {
        $this->load->model('Taikhoan','taikhoan');
        if ($this->taikhoan->dangnhap()) {
            return true;
        } else {
            $this->form_validation->set_message('xacnhan_dangnhap', 'Sai mật khẩu hoặc Password');
            return FALSE;
        }
    }

    public function dangxuat() {
        $this->session->sess_destroy();
        $this->index();
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */