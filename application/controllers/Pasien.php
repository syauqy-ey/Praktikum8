<?php

class Pasien extends CI_Controller{
    public function index(){
        $this->load->model('pasien_model','pasien1');
        $this->pasien1->id=1;
        $this->pasien1->kode='001227';
        $this->pasien1->nama='Syauqi Musyaffa';
        $this->pasien1->tmp_lahir='Tangerang';
        $this->pasien1->tgl_lahir='13 November 2001';
        $this->pasien1->gender='L';
        
        $this->load->model('pasien_model','pasien2');
        $this->pasien2->id=2;
        $this->pasien2->kode='001232';
        $this->pasien2->nama='Sania Athaeni';
        $this->pasien2->tmp_lahir='Bogor';
        $this->pasien2->tgl_lahir='15 Februari 2002';
        $this->pasien2->gender='P';

        $this->load->model('pasien_model','pasien3');
        $this->pasien3->id=3;
        $this->pasien3->kode='001245';
        $this->pasien3->nama='Muhammad Ikrar';
        $this->pasien3->tmp_lahir='Jakarta';
        $this->pasien3->tgl_lahir='30 Oktober 2002';
        $this->pasien3->gender='L';

        $list_pasien = [$this->pasien1, $this->pasien2, $this->pasien3];
        $data['list_pasien'] = $list_pasien;

        $this->load->view('layout/header');
        $this->load->view('pasien/index',$data);
        $this->load->view('layout/footer');
    }

    public function list(){
        $this->load->model('pasien_model');

        $patiens = $this->pasien_model->getAll();
        $data['patiens'] = $patiens;

        $this->load->view('layout/header');
        $this->load->view('pasien/list', $data);
        $this->load->view('layout/footer');
    }

    public function detail($id){
        $this->load->model('pasien_model');
        $patien = $this->pasien_model->getById($id);
        if($patien == null){
            echo "data tidak ada";
        }
        else{
            $data['patien'] = $patien;

            $this->load->view('layout/header');
            $this->load->view('pasien/detail', $data);
            $this->load->view('layout/footer');
        }
    }

}

?>