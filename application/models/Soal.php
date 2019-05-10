<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Soal extends GLOBAL_Model{
    public function __construct()
    {
        parent::__construct();
    }
    public function get_soal(){
        return parent::get_array_of_table('soal_date_created','cat_soal');
    }
    public function create_soal($data){
        return parent::insert_data('cat_soal',$data);
    }
    public function get_soal_by_id($id)
    {
        $data = array(
            'soal_id' => $id
        );
        return parent::get_array_of_row('cat_soal',$data);
    }
    public function get_soal_ujian($id){
        $data = array(
            'soal_ujian_id' => $id
        );
        return parent::get_result_array_of_row('cat_soal',$data);
    }
    public function edit_soal($id,$data){
        return parent::update_table('cat_soal','soal_id',$id,$data);
    }
}
