<?php

/**
 *
 */
class Khachhang  extends CI_Model {
    private $id;
    private $Status_id;
    private $username;
    private $Status_username;
    private $email;
    private $Status_email;
    private $ho_tendem;
    private $Status_ho_tendem;
    private $ten;
    private $Status_ten;
    private $sonha_tenduong;
    private $Status_sonha_tenduong;
    private $phuong_xa;
    private $Status_phuong_xa;
    private $quan_huyen;
    private $Status_quan_huyen;
    private $tinh_tp;
    private $Status_tinh_tp;
    private $ma_buuchinh;
    private $Status_ma_buuchinh;
    private $sdt;
    private $Status_sdt;

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
        $this->ho_tendem = "";
        $this->Status_ho_tendem = 0;
        $this->ten = "";
        $this->Status_ten = 0;
        $this->sonha_tenduong = "";
        $this->Status_sonha_tenduong = 0;
        $this->phuong_xa = "";
        $this->Status_phuong_xa = 0;
        $this->quan_huyen = "";
        $this->Status_quan_huyen = 0;
        $this->tinh_tp = "";
        $this->Status_tinh_tp = 0;
        $this->ma_buuchinh = "";
        $this->Status_ma_buuchinh = 0;
        $this->sdt = "";
        $this->Status_sdt = 0;
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

    public function set_ho_tendem($data) {
        $this->ho_tendem = $data;
        $this->Status_ho_tendem = 1;
    }

    public function set_ten($data) {
        $this->ten = $data;
        $this->Status_ten = 1;
    }

    public function set_sonha_tenduong($data) {
        $this->sonha_tenduong = $data;
        $this->Status_sonha_tenduong = 1;
    }

    public function set_phuong_xa($data) {
        $this->phuong_xa = $data;
        $this->Status_phuong_xa = 1;
    }

    public function set_quan_huyen($data) {
        $this->quan_huyen = $data;
        $this->Status_quan_huyen = 1;
    }

    public function set_tinh_tp($data) {
        $this->tinh_tp = $data;
        $this->Status_tinh_tp = 1;
    }

    public function set_ma_buuchinh($data) {
        $this->ma_buuchinh = $data;
        $this->Status_ma_buuchinh = 1;
    }

    public function set_sdt($data) {
        $this->sdt = $data;
        $this->Status_sdt = 1;
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

    public function get_ho_tendem() {
        return $this->ho_tendem;
    }

    public function get_ten() {
        return $this->ten;
    }

    public function get_sonha_tenduong() {
        return $this->sonha_tenduong;
    }

    public function get_phuong_xa() {
        return $this->phuong_xa;
    }

    public function get_quan_huyen() {
        return $this->quan_huyen;
    }

    public function get_tinh_tp() {
        return $this->tinh_tp;
    }

    public function get_ma_buuchinh() {
        return $this->ma_buuchinh;
    }

    public function get_sdt() {
        return $this->sdt;
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
        $query = $this->db->get("khachhang");
        $ar = $query->row_array();
        if (!empty($ar)) {
            $this->id = $ar["id"];
            $this->username = $ar["username"];
            $this->email = $ar["email"];
            $this->ho_tendem = $ar["ho_tendem"];
            $this->ten = $ar["ten"];
            $this->sonha_tenduong = $ar["sonha_tenduong"];
            $this->phuong_xa = $ar["phuong_xa"];
            $this->quan_huyen = $ar["quan_huyen"];
            $this->tinh_tp = $ar["tinh_tp"];
            $this->ma_buuchinh = $ar["ma_buuchinh"];
            $this->sdt = $ar["sdt"];
        }
    }

    /**
     *
     * Insert Object into database
     *
     */
    public function Save() {
        $data = array("id" => $this->id,"username" => $this->username,"email" => $this->email,"ho_tendem" => $this->ho_tendem,"ten" => $this->ten,"sonha_tenduong" => $this->sonha_tenduong,"phuong_xa" => $this->phuong_xa,"quan_huyen" => $this->quan_huyen,"tinh_tp" => $this->tinh_tp,"ma_buuchinh" => $this->ma_buuchinh,"sdt" => $this->sdt);
        $this->db->insert("khachhang", $data);
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
        if ($this->Status_ho_tendem == 1)
            $arr["ho_tendem"] = $this->ho_tendem;
        if ($this->Status_ten == 1)
            $arr["ten"] = $this->ten;
        if ($this->Status_sonha_tenduong == 1)
            $arr["sonha_tenduong"] = $this->sonha_tenduong;
        if ($this->Status_phuong_xa == 1)
            $arr["phuong_xa"] = $this->phuong_xa;
        if ($this->Status_quan_huyen == 1)
            $arr["quan_huyen"] = $this->quan_huyen;
        if ($this->Status_tinh_tp == 1)
            $arr["tinh_tp"] = $this->tinh_tp;
        if ($this->Status_ma_buuchinh == 1)
            $arr["ma_buuchinh"] = $this->ma_buuchinh;
        if ($this->Status_sdt == 1)
            $arr["sdt"] = $this->sdt;
        if (!empty($strWhere)) {
         $this->db->where($strWhere, NULL, FALSE);
        }
        $this->db->update("khachhang", $arr);
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
           echo $ob->khachhangname;
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
        $query = $this->db->get("khachhang");
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
            $this->db->delete("khachhang");
        }        
       else $this->db->empty_table('khachhang');
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
        $query = $this->db->get('khachhang');
        $ob = $query->row_array();
        return $ob[$strFieldName];
    }

}

