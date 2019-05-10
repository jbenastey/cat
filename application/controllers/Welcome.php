<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends GLOBAL_Controller {
    public function __construct()
    {
        parent::__construct();
        if (!parent::hasLogin())
        {
            redirect(base_url('login'));
        }else
        {
            $model = array('Soal','Ujian');
            $this->load->model($model);
        }
    }
	public function index()
	{
        $data['title'] = 'Computer Assisted Test';
        $data['page_title'] = '';
        $data['menu'] = '';
        parent::template('backend/dashboard',$data);
	}
}
