<?php

/**
 *
 */
class Sanpham  extends CI_Model {
    private $masp;
    private $Status_masp;
    private $tensp;
    private $Status_tensp;
    private $mota;
    private $Status_mota;
    private $duongdan;
    private $Status_duongdan;
    private $giaban;
    private $Status_giaban;
    private $giacu;
    private $Status_giacu;
    private $soluong;
    private $Status_soluong;
    private $sldamua;
    private $Status_sldamua;
    private $kichthuoc;
    private $Status_kichthuoc;
    private $loaisp;
    private $Status_loaisp;

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->Oncreate();
   }

    private function Oncreate() {
        $this->masp = "";
        $this->Status_masp = 0;
        $this->tensp = "";
        $this->Status_tensp = 0;
        $this->mota = "";
        $this->Status_mota = 0;
        $this->duongdan = "";
        $this->Status_duongdan = 0;
        $this->giaban = 0;
        $this->Status_giaban = 0;
        $this->giacu = 0;
        $this->Status_giacu = 0;
        $this->soluong = 0;
        $this->Status_soluong = 0;
        $this->sldamua = 0;
        $this->Status_sldamua = 0;
        $this->kichthuoc = 1;
        $this->Status_kichthuoc = 0;
        $this->loaisp = 1;
        $this->Status_loaisp = 0;
    }

    public function set_masp($data) {
        $this->masp = $data;
        $this->Status_masp = 1;
    }

    public function set_tensp($data) {
        $this->tensp = $data;
        $this->Status_tensp = 1;
    }

    public function set_mota($data) {
        $this->mota = $data;
        $this->Status_mota = 1;
    }

    public function set_duongdan($data) {
        $this->duongdan = $data;
        $this->Status_duongdan = 1;
    }

    public function set_giaban($data) {
        $this->giaban = $data;
        $this->Status_giaban = 1;
    }

    public function set_giacu($data) {
        $this->giacu = $data;
        $this->Status_giacu = 1;
    }

    public function set_soluong($data) {
        $this->soluong = $data;
        $this->Status_soluong = 1;
    }

    public function set_sldamua($data) {
        $this->sldamua = $data;
        $this->Status_sldamua = 1;
    }

    public function set_kichthuoc($data) {
        $this->kichthuoc = $data;
        $this->Status_kichthuoc = 1;
    }

    public function set_loaisp($data) {
        $this->loaisp = $data;
        $this->Status_loaisp = 1;
    }

    public function get_masp() {
        return $this->masp;
    }

    public function get_tensp() {
        return $this->tensp;
    }

    public function get_mota() {
        return $this->mota;
    }

    public function get_duongdan() {
        return $this->duongdan;
    }

    public function get_giaban() {
        return $this->giaban;
    }

    public function get_giacu() {
        return $this->giacu;
    }

    public function get_soluong() {
        return $this->soluong;
    }

    public function get_sldamua() {
        return $this->sldamua;
    }

    public function get_kichthuoc() {
        return $this->kichthuoc;
    }

    public function get_loaisp() {
        return $this->loaisp;
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
        $query = $this->db->get("sanpham");
        $ar = $query->row_array();
        if (!empty($ar)) {
            $this->masp = $ar["masp"];
            $this->tensp = $ar["tensp"];
            $this->mota = $ar["mota"];
            $this->duongdan = $ar["duongdan"];
            $this->giaban = $ar["giaban"];
            $this->giacu = $ar["giacu"];
            $this->soluong = $ar["soluong"];
            $this->sldamua = $ar["sldamua"];
            $this->kichthuoc = $ar["kichthuoc"];
            $this->loaisp = $ar["loaisp"];
        }
    }

    /**
     *
     * Insert Object into database
     *
     */
    public function Save() {
        $data = array("masp" => $this->masp,"tensp" => $this->tensp,"mota" => $this->mota,"duongdan" => $this->duongdan,"giaban" => $this->giaban,"giacu" => $this->giacu,"soluong" => $this->soluong,"sldamua" => $this->sldamua,"kichthuoc" => $this->kichthuoc,"loaisp" => $this->loaisp);
        $this->db->insert("sanpham", $data);
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
        if ($this->Status_masp == 1)
            $arr["masp"] = $this->masp;
        if ($this->Status_tensp == 1)
            $arr["tensp"] = $this->tensp;
        if ($this->Status_mota == 1)
            $arr["mota"] = $this->mota;
        if ($this->Status_duongdan == 1)
            $arr["duongdan"] = $this->duongdan;
        if ($this->Status_giaban == 1)
            $arr["giaban"] = $this->giaban;
        if ($this->Status_giacu == 1)
            $arr["giacu"] = $this->giacu;
        if ($this->Status_soluong == 1)
            $arr["soluong"] = $this->soluong;
        if ($this->Status_sldamua == 1)
            $arr["sldamua"] = $this->sldamua;
        if ($this->Status_kichthuoc == 1)
            $arr["kichthuoc"] = $this->kichthuoc;
        if ($this->Status_loaisp == 1)
            $arr["loaisp"] = $this->loaisp;
        if (!empty($strWhere)) {
         $this->db->where($strWhere, NULL, FALSE);
        }
        $this->db->update("sanpham", $arr);
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
           echo $ob->sanphamname;
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
        $query = $this->db->get("sanpham");
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
            $this->db->delete("sanpham");
        }        
       else $this->db->empty_table('sanpham');
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
        $query = $this->db->get('sanpham');
        $ob = $query->row_array();
        return $ob[$strFieldName];
    }

}

?>