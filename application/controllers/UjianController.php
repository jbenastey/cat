<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UjianController extends GLOBAL_Controller{
    public function __construct()
    {
        parent::__construct();
        if (!parent::hasLogin())
        {
            redirect(base_url('login'));
        }else
        {
            $model = array('Soal','Ujian','Hasil');
            $this->load->model($model);
        }
    }
    public function index(){
        $data['title'] = 'Data Ujian';
        $data['page_title'] = 'Data Ujian';
        $data['menu'] = '';
        $data['ujian'] = $this->Ujian->get_ujian();
        $data['ujianSiswa'] = $this->Ujian->get_ujian_siswa($this->userID);
        parent::template('backend/ujian/index',$data);
    }
    public function create(){
        if (isset($_POST['simpan'])){
            $kode = 'CAT-'.substr(time(),5);
            $kelas = parent::post('kelas');
            $jurusan = parent::post('jurusan');
            $matpel = parent::post('matpel');
            $durasi = parent::post('durasi');
            $minimal = parent::post('minimal');
            $data = array(
                'ujian_guru_id' => $this->session->userdata('session_id'),
                'ujian_kode' => $kode,
                'ujian_kelas' => $kelas,
                'ujian_jurusan' => $jurusan,
                'ujian_matpel' => $matpel,
                'ujian_durasi' => $durasi,
                'ujian_nilai_minimal' => $minimal
            );
            $this->Ujian->create_ujian($data);
            redirect('ujian');
        }
    }
    public function view($id){
        $idSiswa = $this->userID;
        $data['title'] = 'Data Ujian';
        $data['page_title'] = 'Data Ujian';
        $data['menu'] = '';
        $data['ujian'] = $this->Ujian->view_ujian($id);
        $data['soal'] = $this->Soal->get_soal_ujian($id);
        $data['hasil'] = $this->Ujian->get_ujian_siswa_row($id,$idSiswa);
        parent::template('backend/ujian/view',$data);
    }
    public function edit($id){
        $data['title'] = 'Data Ujian';
        $data['page_title'] = 'Data Ujian';
        $data['menu'] = '';
        $data['ujian'] = $this->Ujian->view_ujian($id);

        if (isset($_POST['update'])){
            $kelas = parent::post('kelas');
            $jurusan = parent::post('jurusan');
            $matpel = parent::post('matpel');
            $durasi = parent::post('durasi');
            $minimal = parent::post('minimal');
            $dataUjian = array(
                'ujian_kelas' => $kelas,
                'ujian_jurusan' => $jurusan,
                'ujian_matpel' => $matpel,
                'ujian_durasi' => $durasi,
                'ujian_nilai_minimal' => $minimal
            );
            $this->Ujian->update_ujian($id,$dataUjian);
            redirect('ujian/view/'.$id);
        }

        parent::template('backend/ujian/edit',$data);
    }
    public function ajaxKode($kode){
        $data = $this->Ujian->view_ajax_ujian($kode);
        echo json_encode($data);
    }
    public function ikut(){
        if (isset($_POST['ikut'])){
            $ujianId = parent::post('ujianId');
            $siswaId = $this->userID;
            $dataUjian = array(
                'hasil_ujian_id' => $ujianId,
                'hasil_user_id' => $siswaId
            );
            $this->Hasil->create_hasil($dataUjian);
            redirect('ujian');
        }
    }
    public function mulai($id){
        $idSiswa = $this->userID;
        $data['title'] = 'Soal Ujian';
        $data['page_title'] = 'Soal Ujian';
        $data['menu'] = '';
        $data['ujian'] = $this->Ujian->view_ujian($id);
        $data['soal'] = $this->Ujian->get_soal_siswa($id, $idSiswa);
        if (isset($_POST['selesai'])){
            $jawaban = array();
            $kunciJawaban = array();
            $nilaiBenar = 0;
            $nilaiDetail = array();
            for ($i = 0; $i < count($data['soal']); $i++){
                $jawaban[$i] = parent::post('jawaban-'.$i);
                $kunciJawaban[$i] = strtoupper($data['soal'][$i]['soal_kunci_jawaban']);
                if ($kunciJawaban[$i] == $jawaban[$i]){
                    $nilaiDetail[$i] = 'benar';
                    $nilaiBenar = $nilaiBenar+1;
                }
                else{
                    $nilaiDetail[$i] = 'salah';
                }
            }
            $nilai = ($nilaiBenar/count($jawaban))*100;
            $dataNilai = array(
                'hasil_nilai' => $nilai,
                'hasil_jawaban_detail' => json_encode($jawaban),
                'hasil_nilai_detail' => json_encode($nilaiDetail)
            );
            $save = $this->Ujian->finish_ujian($id,$idSiswa,$dataNilai);
            if ($save > 0){
                redirect('ujian/view/'.$id);
            }
            else{
                echo 'gagal';
            }
        }
        parent::template('backend/ujian/mulai',$data);
    }
    public function hasil(){
        $data['title'] = 'Hasil Ujian';
        $data['page_title'] = 'Hasil Ujian';
        $data['menu'] = '';
        $data['hasil'] = $this->Hasil->get_hasil();
        parent::template('backend/ujian/hasil',$data);
    }
    public function lihatHasil($id){
        $idGuru = $this->userID;
        $data['title'] = 'Hasil Ujian';
        $data['page_title'] = 'Hasil Ujian';
        $data['menu'] = '';
        $data['ujian'] = $this->Ujian->view_ujian($id);
        $data['soal'] = $this->Soal->get_soal_ujian($id);
        $data['hasil'] = $this->Ujian->get_ujian_guru_row($id,$idGuru);
        parent::template('backend/ujian/lihatHasil',$data);
    }
}
