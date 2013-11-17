<?php

/**
 *
 */
class Taikhoan  extends CI_Model {
    private $id;
    private $Status_id;
    private $username;
    private $Status_username;
    private $email;
    private $Status_email;
    private $password;
    private $Status_password;

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->Oncreate();
   }

    private function Oncreate() {
        $this->id = "";
        $this->Status_id = 0;
        $this->username = "";
        $this->Status_username = 0;
        $this->email = "";
        $this->Status_email = 0;
        $this->password = "";
        $this->Status_password = 0;
    }

    public function set_id($data) {
        $this->id = $data;
        $this->Status_id = 1;
    }

    public function set_username($data) {
        $this->username = $data;
        $this->Status_username = 1;
    }

    public function set_email($data) {
        $this->email = $data;
        $this->Status_email = 1;
    }

    public function set_password($data) {
        $this->password = $data;
        $this->Status_password = 1;
    }

    public function get_id() {
        return $this->id;
    }

    public function get_username() {
        return $this->username;
    }

    public function get_email() {
        return $this->email;
    }

    public function get_password() {
        return $this->password;
    }

    /**
     *
     * Get  Oject
     *
     * @strWhere    Mệnh đề where
     * @return     no return. đưa các giá trị vào object gọi hàm()
     *
     */
    public function getObject($strWhere) {
        $this->Oncreate();
        $this->db->where($strWhere, NULL, FALSE);
        $query = $this->db->get("taikhoan");
        $ar = $query->row_array();
        if (!empty($ar)) {
            $this->id = $ar["id"];
            $this->username = $ar["username"];
            $this->email = $ar["email"];
            $this->password = $ar["password"];
        }
    }

    /**
     *
     * Insert Object into database
     *
     */
    public function Save() {
        $data = array("id" => $this->id,"username" => $this->username,"email" => $this->email,"password" => $this->password);
        $this->db->insert("taikhoan", $data);
    }

    /**
     *
     * Update Object có các field sử dụng hàm set_()
     *
     * @strWhere=null update tất cả các row trong database
     *
     */
    public function UpdateField($strWhere = NULL) {
        $arr = array();
        if ($this->Status_id == 1)
            $arr["id"] = $this->id;
        if ($this->Status_username == 1)
            $arr["username"] = $this->username;
        if ($this->Status_email == 1)
            $arr["email"] = $this->email;
        if ($this->Status_password == 1)
            $arr["password"] = $this->password;
        if (!empty($strWhere)) {
         $this->db->where($strWhere, NULL, FALSE);
        }
        $this->db->update("taikhoan", $arr);
    }

    /**
     *
     * Get list Oject
     *
     * @strFieldName         Các field cần lấy dữ liệu
     * @strWhere             Mệnh đề where
     * @strOrderby           Ex: 'title desc, name asc'
     * @Limit_Number_Row     Số dòng dữ liệu cần lấy ra
     * @Limit_Start_Index    Vị trí bắt đầu lấy dữ liệu
     *     foreach ($t as $value) {
           $ob=(object)($value);
           echo $ob->taikhoanname;
           echo $ob->pass;
       }
     * @return               result_object();
     *
     */
    public function getListObject($strFieldName = NULL, $strWhere = NULL, $strOrderby = NULL, $Limit_Number_Row = NULL, $Limit_Start_Index = NULL) {
        if (!is_null($strWhere)) {
            $this->db->where($strWhere, NULL, FALSE);
        }
        if (!is_null($strFieldName)) {
            $this->db->select($strFieldName);
        }
        if (!is_null($strOrderby)) {
            $this->db->order_by($strOrderby);
        }
        if (!is_null($Limit_Number_Row)) {
            if (!is_null($Limit_Start_Index))
                $this->db->limit($Limit_Number_Row, $Limit_Start_Index);
            else {
                $this->db->limit($Limit_Number_Row);
            }
        }
        $query = $this->db->get("taikhoan");
        return $query->result_object();
    }

    /**
     *
     * Get list Oject
     *
     * @strWhere    Mệnh đề where. Null sẽ xóa hết dữ liệu của table
     * @return      no
     *
     */
    public function Delete($strWhere = NULL) {
        if (!is_null($strWhere)) {
            $this->db->where($strWhere, NULL, FALSE);
            $this->db->delete("taikhoan");
        }        
       else $this->db->empty_table('taikhoan');
    }

    /**
     *
     * Lây max giá trị kiểu int của 1 trường dữ liệu
     *
     * @strFieldName    Trường dữ liệu cần lấy max(1 trường duy nhất)
     * @strWhere        Mệnh đề where
     * @return          1 giá trị kiểu string
     *
     */
    public function Max($strFieldName, $strWhere = NULL) {
        if (!is_null($strWhere))
            $this->db->where($strWhere, NULL, FALSE);
        $this->db->select_max($strFieldName);
        $query = $this->db->get('taikhoan');
        $ob = $query->row_array();
        return $ob[$strFieldName];
    }
    
    
    
        //Thêm tài khoản tạm với key phát sinh
	public function them_taikhoan_tam($key) {
        $data = array(
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password')),
			'permission' => 1,
            'key' => $key
        );

         //Lấy thông tin khách hàng
        $customer = array(
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'ho_tendem' => $this->input->post('ho_tendem'),
            'ten' => $this->input->post('ten'),
            'sonha_tenduong' => $this->input->post('sonha_tenduong'),
            'phuong_xa' => $this->input->post('phuong_xa'),
            'quan_huyen' => $this->input->post('quan_huyen'),
            'tinh_tp' => $this->input->post('tinh_tp'),
            'ma_buuchinh' => $this->input->post('ma_buuchinh'),
            'sdt' => $this->input->post('sdt'),
            'key' => $key
        );
            
        $query = $this->db->insert('taikhoan_tam', $data) && $this->db->insert('khachhang_tam', $customer);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    //Kiểm tra key hợp lệ hay không trước khi thêm chính thức
    public function key_hople($key) {
        $this->db->where('key', $key);
        $query = $this->db->get('taikhoan_tam');

        if ($query->num_rows() == 1) {
            return true;
        }
        else
            return false;
    }

    //Thêm tài khoản chính thức với key
    public function them_taikhoan_key($key) {
        
        //Lấy thông tin tài khoản từ bảng tạm
        $this->db->where('key', $key);
        $taikhoan_tam = $this->db->get('taikhoan_tam');
        if ($taikhoan_tam) {
            $tk = $taikhoan_tam->row();
            $data = array(
                'username' => $tk->username,
                'email' => $tk->email,
                'password' => $tk->password,
				'permission' => $tk->permission
            );  
        }

        //Lấy thông tin khách hàng từ bảng tạm
        $khachhang_tam = $this->db->get('khachhang_tam');
        if ($khachhang_tam) {
            $kh = $khachhang_tam->row();
            
            $cus = array(
                'username' => $kh->username,
                'email' => $kh->email,
                'ho_tendem' => $kh->ho_tendem,
                'ten' => $kh->ten,
                'sonha_tenduong' => $kh->sonha_tenduong,
                'phuong_xa' => $kh->phuong_xa,
                'quan_huyen' => $kh->quan_huyen,
                'tinh_tp' => $kh->tinh_tp,
                'ma_buuchinh' => $kh->ma_buuchinh,
                'sdt' => $kh->sdt
            );

        }

        $did_add_user = $this->db->insert('taikhoan', $data) && $this->db->insert('khachhang', $cus);

        if ($did_add_user) {
            $this->db->where('key', $key);
            $this->db->delete('taikhoan_tam');
			$this->db->where('key', $key);
            $this->db->delete('khachhang_tam');
        }
    }
    
        //Thêm tài khoản không cần key - không kích hoạt email
	public function them_taikhoan() {
        $data = array(
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password')),
			'permission' => 1
        );

        $customer = array(
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'ho_tendem' => $this->input->post('ho_tendem'),
            'ten' => $this->input->post('ten'),
            'sonha_tenduong' => $this->input->post('sonha_tenduong'),
            'phuong_xa' => $this->input->post('phuong_xa'),
            'quan_huyen' => $this->input->post('quan_huyen'),
            'tinh_tp' => $this->input->post('tinh_tp'),
            'ma_buuchinh' => $this->input->post('ma_buuchinh'),
            'sdt' => $this->input->post('sdt')
        );
            
        $query = $this->db->insert('taikhoan', $data) && $this->db->insert('khachhang', $customer);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }    
    
    //Kiểm tra đúng email và password hay không để đăng nhập
    public function dangnhap()
    {
        $this->db->where('email',  $this->input->post('email_login'));
        $this->db->where('password', md5($this->input->post('pass_login')));
        $query = $this->db->get('taikhoan');
        
        if($query->num_rows() == 1){
            return true;
        }
        else return FALSE;            
    }  
    
    //Kiểm tra tồn tại ID Facebook hay chưa
    public function exist_user($uid)
    {
        $this->db->where('fbid',$uid);
        $query = $this->db->get('taikhoan');
        
        if($query->num_rows() == 1){
            return true;
        }
        else return FALSE;            
    }

    //Thêm tài khoản từ tài khoản facebook
    public function insert_user()
    {
            $user = array(
                'fbid' => $this->input->post('fb_id'),
                'fullname' => $this->input->post('fb_fullname'),
                'email' => $this->input->post('fb_email'),
				'permission' => 1				
					
            );
	        $customer = array(
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'ho_tendem' => $this->input->post('ho_tendem'),
            'ten' => $this->input->post('ten'),
            'sonha_tenduong' => $this->input->post('sonha_tenduong'),
            'phuong_xa' => $this->input->post('phuong_xa'),
            'quan_huyen' => $this->input->post('quan_huyen'),
            'tinh_tp' => $this->input->post('tinh_tp'),
            'ma_buuchinh' => $this->input->post('ma_buuchinh'),
            'sdt' => $this->input->post('sdt')
        );
            
        $query = $this->db->insert('taikhoan', $user) && $this->db->insert('khachhang', $customer);
        if ($query) {
            return true;
        } else {
            return false;
        }         
    }

}

