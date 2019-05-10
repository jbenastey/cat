<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SoalController extends GLOBAL_Controller{
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
    public function index(){
        $data['title'] = 'Data Soal';
        $data['page_title'] = 'Data Soal';
        $data['menu'] = '';
        $data['soal'] = $this->Soal->get_soal();
        parent::template('backend/soal/index',$data);
    }
    public function create($id){
        $data['title'] = 'Tambah Soal';
        $data['page_title'] = 'Tambah Soal';
        $data['menu'] = '';
        $data['ujian'] = $this->Ujian->view_ujian($id);
        if (isset($_POST['simpan'])){
            $soal = parent::post('soal');
            $a = parent::post('jawabana');
            $b = parent::post('jawabanb');
            $c = parent::post('jawabanc');
            $d = parent::post('jawaband');
            $e = parent::post('jawabane');
            $jawab = array(
                'a' => $a,
                'b' => $b,
                'c' => $c,
                'd' => $d,
                'e' => $e
            );
            $jawaban = json_encode($jawab);
            $kunci = parent::post('kuncijawaban');
            $dataSoal = array(
                'soal_ujian_id' => $id,
                'soal_isi' => $soal,
                'soal_jawaban' => $jawaban,
                'soal_kunci_jawaban' => $kunci
            );
            $this->Soal->create_soal($dataSoal);
            $this->session->set_flashdata('alert', 'create_soal');
            redirect('ujian/view/'.$id);
        }
        parent::template('backend/soal/create',$data);
    }
    public function view($id){
        $data['title'] = 'Kelola Soal';
        $data['page_title'] = 'Kelola Soal';
        $data['menu'] = '';
        $data['soal'] = $this->Soal->get_soal_by_id($id);
        parent::template('backend/soal/view',$data);
    }
    public function edit($id){
        $data['title'] = 'Edit Soal';
        $data['page_title'] = 'Edit Soal';
        $data['menu'] = '';
        $data['soal'] = $this->Soal->get_soal_by_id($id);
        if (isset($_POST['simpan'])){
            $soal = parent::post('soal');
            $a = parent::post('jawabana');
            $b = parent::post('jawabanb');
            $c = parent::post('jawabanc');
            $d = parent::post('jawaband');
            $e = parent::post('jawabane');
            $jawab = array(
                'a' => $a,
                'b' => $b,
                'c' => $c,
                'd' => $d,
                'e' => $e
            );
            $jawaban = json_encode($jawab);
            $kunci = parent::post('kuncijawaban');
            $dataSoal = array(
                'soal_isi' => $soal,
                'soal_jawaban' => $jawaban,
                'soal_kunci_jawaban' => $kunci
            );
            $this->Soal->edit_soal($id,$dataSoal);
            $this->session->set_flashdata('alert', 'edit_soal');
            redirect('soal/view/'.$id);
        }
        parent::template('backend/soal/edit',$data);
    }
}
