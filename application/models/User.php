<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends GLOBAL_Model{
    public function __construct()
    {
        parent::__construct();
    }
    public function get_user(){
        return parent::get_array_of_table('user_date_created','cat_user');
    }
    public function get_user_account($data){
        return parent::get_array_of_row('cat_user',$data);
    }
    public function save_user($data){
        return parent::insert_with_status('cat_user',$data);
    }
}