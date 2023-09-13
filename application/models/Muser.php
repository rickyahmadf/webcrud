<?php
class Muser extends CI_Model
{
public $table = '20_warga';

    // Insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
        echo $this->db->last_query(); exit;

    }


    // mencocokan username
    function get_validasi($email, $kata_sandi)
    {
        $this->db->where('email', $email);
        $this->db->where('kata_sandi', $kata_sandi);
       $total = $this->db->count_all_results($this->table);
        if($total > 0){
            return true;
        } else {
            return false;
        }
    }
}

?>