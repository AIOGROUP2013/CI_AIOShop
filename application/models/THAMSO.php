<?php

/**
 *
 */
class Thamso  extends CI_Model {
    private $tenthamso;
    private $Status_tenthamso;
    private $giatri;
    private $Status_giatri;

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->Oncreate();
   }

    private function Oncreate() {
        $this->tenthamso = "";
        $this->Status_tenthamso = 0;
        $this->giatri = "";
        $this->Status_giatri = 0;
    }

    public function set_tenthamso($data) {
        $this->tenthamso = $data;
        $this->Status_tenthamso = 1;
    }

    public function set_giatri($data) {
        $this->giatri = $data;
        $this->Status_giatri = 1;
    }

    public function get_tenthamso() {
        return $this->tenthamso;
    }

    public function get_giatri() {
        return $this->giatri;
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
        $query = $this->db->get("thamso");
        $ar = $query->row_array();
        if (!empty($ar)) {
            $this->tenthamso = $ar["tenthamso"];
            $this->giatri = $ar["giatri"];
        }
    }

    /**
     *
     * Insert Object into database
     *
     */
    public function Save() {
        $data = array("tenthamso" => $this->tenthamso,"giatri" => $this->giatri);
        $this->db->insert("thamso", $data);
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
        if ($this->Status_tenthamso == 1)
            $arr["tenthamso"] = $this->tenthamso;
        if ($this->Status_giatri == 1)
            $arr["giatri"] = $this->giatri;
        if (!empty($strWhere)) {
         $this->db->where($strWhere, NULL, FALSE);
        }
        $this->db->update("thamso", $arr);
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
           echo $ob->thamsoname;
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
        $query = $this->db->get("thamso");
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
            $this->db->delete("thamso");
        }        
       else $this->db->empty_table('thamso');
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
        $query = $this->db->get('thamso');
        $ob = $query->row_array();
        return $ob[$strFieldName];
    }

}

?>