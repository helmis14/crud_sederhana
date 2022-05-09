<?php
require_once "database.php";
class Mahasiswa
{
    function __construct()
    {
        $this->db = new Database();
    }
    function tampilData($table, $where = null)
    {
        return $this->db->select($table, $where);
    }
    function tambahData($table,$rows){
        $this->db->insert($table,$rows);
    }
    function editData($table, $field, $where)
    {
        $this->db->update($table, $field, $where);
    }
    function hapusData($table, $where)
    {
        $this->db->delete($table, $where);
    }

}
?>