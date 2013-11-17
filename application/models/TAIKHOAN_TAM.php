<?php

/**
 *
 */
class Taikhoan_tam  extends CI_Model {
    private $id;
    private $Status_id;
    private $username;
    private $Status_username;
    private $email;
    private $Status_email;
    private $password;
    private $Status_password;
    private $key;
    private $Status_key;

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
        $this->key = "";
        $this->Status_key = 0;
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

    public function set_key($data) {
        $this->key = $data;
        $this->Status_key = 1;
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

    public function get_key() {
        return $this->key;
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
        $query = $this->db->get("taikhoan_tam");
        $ar = $query->row_array();
        if (!empty($ar)) {
            $this->id = $ar["id"];
            $this->username = $ar["username"];
            $this->email = $ar["email"];
            $this->password = $ar["password"];
            $this->key = $ar["key"];
        }
    }

    /**
     *
     * Insert Object into database
     *
     */
    public function Save() {
        $data = array("id" => $this->id,"username" => $this->username,"email" => $this->email,"password" => $this->password,"key" => $this->key);
        $this->db->insert("taikhoan_tam", $data);
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
        if ($this->Status_key == 1)
            $arr["key"] = $this->key;
        if (!empty($strWhere)) {
         $this->db->where($strWhere, NULL, FALSE);
        }
        $this->db->update("taikhoan_tam", $arr);
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
           echo $ob->taikhoan_tamname;
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
        $query = $this->db->get("taikhoan_tam");
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
            $this->db->delete("taikhoan_tam");
        }        
       else $this->db->empty_table('taikhoan_tam');
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
        $query = $this->db->get('taikhoan_tam');
        $ob = $query->row_array();
        return $ob[$strFieldName];
    }

}

?>