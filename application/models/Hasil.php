<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hasil extends GLOBAL_Model{
    public function __construct()
    {
        parent::__construct();
    }
    public function get_hasil(){
        $this->db->select('*');
        $this->db->from('cat_hasil');
        $this->db->join('cat_ujian','cat_ujian.ujian_id = cat_hasil.hasil_ujian_id');
        $this->db->join('cat_user','cat_user.user_id = cat_hasil.hasil_user_id');
        $this->db->order_by('hasil_date_created','DESC');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function create_hasil($data){
        return parent::insert_data('cat_hasil',$data);
    }
}
