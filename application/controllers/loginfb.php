<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Loginfb extends CI_Controller {

    public function Loginfb(){
        parent::__construct();
        parse_str( $_SERVER['QUERY_STRING'], $_REQUEST );
        $CI = & get_instance();
		$CI->config->load("facebook",TRUE);
		$config = $CI->config->item('facebook');
		$this->load->library('Facebook', $config);
		$CI->load->model('Taikhoan','taikhoan_model');	
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

        $this->load_page('loginfb', FALSE);
    }

    public function facebook_process(){
	if(!isset($_SESSION)){
		session_start();
	}
		$return_url='http://aio.is-best.net/index.php/loginfb';

		if(isset($_POST["connect"]) && $_POST["connect"]==1)
		{ 
			$fbuser = $this->facebook->getUser();
			if ($fbuser) {
				try {
					// Proceed knowing you have a logged in user who's authenticated.
					$me = $this->facebook->api('/me'); //user
					$uid = $this->facebook->getUser();
				}
				catch (FacebookApiException $e) 
				{
					//echo error_log($e);
					$fbuser = null;
				}
			}	

			// redirect user to facebook login page if empty data or fresh login requires
			if (!$fbuser){
				$loginUrl = $this->facebook->getLoginUrl(array('redirect_uri'=>$return_url, false));
				header('Location: '.$loginUrl);
			}
	

			//user details
			if($this->taikhoan_model->exist_user($uid))
			{
				$fullname = $me['first_name'].' '.$me['last_name'];
				$this->login_user(true,$uid,$fullname);
				echo 'user exist';
			}
			else
			{
				$fullname = $me['first_name'].' '.$me['last_name'];
				$email = $me['email'];
				$username = $me['username'];
				$this->login_user(true,$uid,$fullname);

                echo '<ul>';
                echo '<li>';
                echo '<h2>Thông tin tài khoản</h2>';
                echo '<span class="required_notification">* Trường bắt buộc</span>';
                echo '</li>';
                echo '<li><label for="name">ID:</label>';
                echo '<input type="text" name=\'fb_id\' placeholder="aioshop" value="'.$uid.'" readonly /></li>';				
                echo '<li><label for="name">Tên đăng nhập:</label>';
                echo '<input type="text" name=\'fb_username\' placeholder="aioshop" value="'.$username.'" readonly /></li>';
				echo '<li><label for="name">Email:</label>';
                echo '<input type="text" name=\'fb_email\' placeholder="aioshop" value="'.$email.'" readonly /></li>';
				echo '<li><label for="name">Tên Facebook:</label>';
                echo '<input type="text" name=\'fb_fullname\' placeholder="aioshop" value="'.$fullname.'" readonly /></li>';
                echo '</ul>';

                echo '<ul>';
                echo '<li>';
                echo '<h2>Thông tin khách hàng</h2>';
                echo '<span class="required_notification">* Trường bắt buộc</span>';
                echo '</li>';
                echo '<li><label for="name">Họ và tên đệm:</label>';
                echo '<input type="text" name=\'ho_tendem\' placeholder="Nguyễn Văn" required/></li>';
				echo '<li><label for="name">Tên:</label>';
                echo '<input type="text" name=\'ten\' placeholder="Thanh" required/></li>';
                echo '<li><label for="name">Số nhà - Tên đường:</label>';
                echo '<input type="text" name=\'sonha_tenduong\' placeholder="Số 01 - Đường 52" required/></li>';
                echo '<li><label for="name">Phường / Xã:</label>';
                echo '<input type="text" name=\'phuong_xa\' placeholder="Bình Trưng Đông" required/></li>';
                echo '<li><label for="name">Quận / Huyện:</label>';
                echo '<input type="text" name=\'quan_huyen\' placeholder="Quận 2" required/></li>';
                echo '<li><label for="name">Tỉnh / TP:</label>';
                echo '<input type="text" name=\'tinh_tp\' placeholder="TP Hồ Chí Minh" required/></li>';
                echo '<li><label for="name">Mã bưu chính:</label>';
                echo '<input type="text" name=\'ma_buuchinh\' placeholder="08" required/></li>';
                echo '<li><label for="name">Số điện thoại:</label>';
                echo '<input type="text" name=\'sdt\' placeholder="01657990165" required/></li>';	
				echo '<li>';
				echo '<button class="submit" type="submit">Đăng ký</button>';
				echo '</li>';
                echo '</ul>';				
				
			}
		

		}
	}

	public function inser_userfb()
	{
		if(!isset($_SESSION)){
		session_start();
		}
		if($this->taikhoan_model->insert_user())
		{
			echo 'Đăng ký tài khoản thành công!';
		}
		else
		{
			echo 'Đăng ký thất bại!';
			$this->session->sess_destroy();
		}

	}
	
	public function login_user($loggedin,$fbid,$full_name)
	{
	    $data = array(
			'fbid' => $fbid,
            'email' => $full_name,
            'is_logged_in' => true
        );
        $this->session->set_userdata($data);
		
	}

}
?>