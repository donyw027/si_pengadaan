<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporanrealisasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();

        $this->load->model('Admin_model', 'admin');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->form_validation->run() == false) {
            $data['title'] = " Reporting Hasil Realisasi";
            $this->template->load('templates/dashboard', 'laporanrealisasi/form', $data);
        } 
        $BAGIAN = $this->input->post('BAGIAN');
        $tanggal = $this->input->post('tanggal');
        $pecah = explode(' - ', $tanggal);
        $mulai = date('Y-m-d', strtotime($pecah[0]));
        $akhir = date('Y-m-d', strtotime(end($pecah)));

            // var_dump($BAGIAN);
            // // var_dump($tanggal);

            // // print_r($pecah);
            // print_r($mulai);
            // print_r($akhir);

            // // die();

        
    }

    function print() {

        $data['title'] = " Reporting Hasil Realisasi";
        $BAGIAN = $this->input->post('BAGIAN');
        //$tanggal = $this->input->post('tanggal');
        $t_mulai = $this->input->post('t_mulai');
        $t_akhir = $this->input->post('t_akhir');

        // $pecah = explode(' - ', $tanggal);
        // $mulai = date('Y-m-d', strtotime($pecah[0]));
        // $akhir = date('Y-m-d', strtotime(end($pecah)));

        $data['dataprint'] = $this->db->query("SELECT * FROM realisasi_$BAGIAN WHERE TGL_INPUT BETWEEN '$t_mulai' and '$t_akhir'")->result();

            // var_dump($BAGIAN);
            // var_dump($tanggal);

            // print_r($pecah);
            // print_r($mulai);
            // print_r($akhir);
            // print_r($data['dataprint']);

            // die();

        $this->template->load('templates/dashboard', 'laporanrealisasi/formprint' , $data);


        
    }

    
}
