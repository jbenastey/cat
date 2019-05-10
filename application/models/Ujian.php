<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ujian extends GLOBAL_Model{
    public function __construct()
    {
        parent::__construct();
    }
    public function get_ujian(){
        return parent::get_array_of_table('ujian_date_created','cat_ujian');
    }
    public function get_ujian_siswa($idUser){
        $this->db->select('*');
        $this->db->from('cat_ujian');
        $this->db->join('cat_hasil','cat_hasil.hasil_ujian_id = cat_ujian.ujian_id');
        $this->db->where('hasil_user_id', $idUser);
        $this->db->order_by('hasil_date_created','DESC');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_ujian_siswa_row($idUjian,$idUser){
        $this->db->select('*');
        $this->db->from('cat_ujian');
        $this->db->join('cat_hasil','cat_hasil.hasil_ujian_id = cat_ujian.ujian_id');
        $this->db->where('hasil_user_id', $idUser);
        $this->db->where('hasil_ujian_id', $idUjian);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function get_ujian_guru_row($idUjian,$idUser){
        $this->db->select('*');
        $this->db->from('cat_ujian');
        $this->db->join('cat_hasil','cat_hasil.hasil_ujian_id = cat_ujian.ujian_id');
        $this->db->where('ujian_guru_id', $idUser);
        $this->db->where('hasil_ujian_id', $idUjian);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function get_soal_siswa($idUjian,$idUser){
        $this->db->select('*');
        $this->db->from('cat_soal');
        $this->db->join('cat_ujian','cat_ujian.ujian_id = cat_soal.soal_ujian_id');
        $this->db->join('cat_hasil','cat_hasil.hasil_ujian_id = cat_ujian.ujian_id');
        $this->db->where('hasil_user_id', $idUser);
        $this->db->where('ujian_id', $idUjian);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function create_ujian($data){
        return parent::insert_data('cat_ujian',$data);
    }
    public function update_ujian($id,$data){
        return parent::update_table('cat_ujian','ujian_id',$id,$data);
    }
    public function view_ujian($id)
    {
        $data = array(
            'ujian_id' => $id
        );
        return parent::get_array_of_row('cat_ujian', $data);
    }
    public function view_ajax_ujian($kode){
        $data = array(
            'ujian_kode' => $kode
        );
        return parent::get_array_of_row('cat_ujian', $data);
    }
    public function finish_ujian($ujianId,$userId,$data){
        $this->db->where('hasil_ujian_id',$ujianId);
        $this->db->where('hasil_user_id',$userId);
        $this->db->update('cat_hasil',$data);
        return $this->db->affected_rows();
    }
}
