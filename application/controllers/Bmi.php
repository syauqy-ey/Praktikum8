<?php

class Bmi extends CI_Controller{
    public function index() {
        $this->load->model('pasien_model','pasien1');
        $this->pasien1->id=1;
        $this->pasien1->kode='001227';
        $this->pasien1->nama='Syauqi Musyaffa Khairullah';
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

        $this->load->model('bmipasien_model', 'bmipasien1');
        $this->bmipasien1->id=1;
        $this->bmipasien1->tanggal='2021-01-15';
        $this->bmipasien1->pasien='Syauqi Musyaffa Khairullah';
        $this->bmipasien1->bmi='';

        $this->load->model('bmipasien_model', 'bmipasien2');
        $this->bmipasien2->id=2;
        $this->bmipasien2->tanggal='2021-02-15';
        $this->bmipasien2->pasien='Sania Athaeni';
        $this->bmipasien2->bmi='';

        $this->load->model('bmipasien_model', 'bmipasien3');
        $this->bmipasien3->id=3;
        $this->bmipasien3->tanggal='2021-03-15';
        $this->bmipasien3->pasien='Muhammad Ikrar';
        $this->bmipasien3->bmi='';

        $this->load->model('bmi_model', 'bmi1');
        $this->bmi1->berat=64.2;
        $this->bmi1->tinggi=169;
        $this->bmi1->nilaiBMI(); // sebenernya cukup ini aja gausa kasih di bmi2 3
        $this->bmi1->statusBMI(); // ini

        $this->load->model('bmi_model', 'bmi2');
        $this->bmi2->berat=40.2;
        $this->bmi2->tinggi=152;
        // $this->bmi1->nilaiBMI(); 
        // $this->bmi1->statusBMI();
        
        $this->load->model('bmi_model', 'bmi3');
        $this->bmi3->berat=43;
        $this->bmi3->tinggi=154;
        // $this->bmi1->nilaiBMI(); 
        // $this->bmi1->statusBMI();

        $list_pasien = [$this->pasien1, $this->pasien2, $this->pasien3];
        $data['list_pasien'] = $list_pasien;

        $list_bmi = [$this->bmi1, $this->bmi2, $this->bmi3];
        $data['list_bmi'] = $list_bmi;

        $list_bmipasien = [$this->bmipasien1, $this->bmipasien2, $this->bmipasien3];
        $data['list_bmipasien'] = $list_bmipasien;

        $this->load->view('layout/header');
        $this->load->view('bmi/index',$data);
        $this->load->view('layout/footer');
    }    
    public function list(){
        $this->load->model('bmi_pasien');

        $patiens = $this->bmi_pasien->getAll();
        $data['patiens'] = $patiens;

        $this->load->view('layout/header');
        $this->load->view('bmi/list', $data);
        $this->load->view('layout/footer');
    
    }
    public function detail($id){
        $this->load->model('bmi_pasien');
        $patien = $this->bmi_pasien->getById($id);
        if($patien == null){
            echo "data tidak ada";
        }
        else{
            $data['patien'] = $patien;

            $this->load->view('layout/header');
            $this->load->view('bmi/detail', $data);
            $this->load->view('layout/footer');
        }
    }
}

?>