<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporaninput extends CI_Controller
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
        // $this->form_validation->set_rules('transaksi', 'Transaksi', 'required|in_list[barang_masuk,barang_keluar]');
        // $this->form_validation->set_rules('tanggal', 'Periode Tanggal', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Reporting Hasil Input Saldo";
            $this->template->load('templates/dashboard', 'laporaninput/form', $data);
        } else {
            $input = $this->input->post(null, true);
            $table = $input['BAGIAN'];
            $tanggal = $input['tanggal'];
            $pecah = explode(' - ', $tanggal);
            $mulai = date('Y-m-d', strtotime($pecah[0]));
            $akhir = date('Y-m-d', strtotime(end($pecah)));

            $query = '';
            if ($table == 'input_saldo_sarpras') {
                $query = $this->admin->getInputSaldo(null, null, ['mulai' => $mulai, 'akhir' => $akhir]);
            } 

            $this->template->load('templates/dashboard', 'laporaninput/form', $data);
        }
    }

    private function _cetak($data, $table_, $tanggal)
    {
        $this->load->library('CustomPDF');
        $table = $table_ == 'input_saldo_sarpas' ? 'Input Saldo Sarpras' : 'Input Saldo Sarpras';

        $pdf = new FPDF();
        $pdf->AddPage('P', 'Letter');
        $pdf->SetFont('Times', 'B', 16);
        $pdf->Cell(190, 7, 'Laporan ' . $table, 0, 1, 'C');
        $pdf->SetFont('Times', '', 10);
        $pdf->Cell(190, 4, 'Tanggal : ' . $tanggal, 0, 1, 'C');
        $pdf->Ln(10);

        $pdf->SetFont('Arial', 'B', 10);

        if ($table_ == 'input_saldo_sarpras') :
            $pdf->Cell(10, 7, 'No.', 1, 0, 'C');
            $pdf->Cell(25, 7, 'INDUK_COA', 1, 0, 'C');
            $pdf->Cell(35, 7, 'NAMA_PERKIRAAN', 1, 0, 'C');
            $pdf->Cell(55, 7, 'BAGIAN', 1, 0, 'C');
            $pdf->Cell(40, 7, 'SALDO_AWAL', 1, 0, 'C');
            $pdf->Cell(30, 7, 'TOTAL_SALDO', 1, 0, 'C');
            $pdf->Cell(30, 7, 'TGL_INPUT', 1, 0, 'C');

            $pdf->Ln();

            $no = 1;
            foreach ($data as $d) {
                $pdf->SetFont('Arial', '', 10);
                $pdf->Cell(10, 7, $no++ . '.', 1, 0, 'C');
                $pdf->Cell(25, 7, $d['INDUK_COA'], 1, 0, 'C');
                $pdf->Cell(35, 7, $d['NAMA_PERKIRAAN'], 1, 0, 'C');
                $pdf->Cell(55, 7, $d['BAGIAN'], 1, 0, 'L');
                $pdf->Cell(40, 7, $d['SALDO_AWAL'], 1, 0, 'L');
                $pdf->Cell(40, 7, $d['TOTAL_SALDO'], 1, 0, 'L');
                $pdf->Cell(40, 7, $d['TGL_INPUT'], 1, 0, 'L');
                $pdf->Ln();
            } else :
                $pdf->Cell(10, 7, 'No.', 1, 0, 'C');
                $pdf->Cell(25, 7, 'INDUK_COA', 1, 0, 'C');
                $pdf->Cell(35, 7, 'NAMA_PERKIRAAN', 1, 0, 'C');
                $pdf->Cell(55, 7, 'BAGIAN', 1, 0, 'C');
                $pdf->Cell(40, 7, 'SALDO_AWAL', 1, 0, 'C');
                $pdf->Cell(30, 7, 'TOTAL_SALDO', 1, 0, 'C');
                $pdf->Cell(30, 7, 'TGL_INPUT', 1, 0, 'C');
    
            $pdf->Ln();

            $no = 1;
            foreach ($data as $d) {
                $pdf->SetFont('Arial', '', 10);
                $pdf->Cell(10, 7, $no++ . '.', 1, 0, 'C');
                $pdf->Cell(25, 7, $d['INDUK_COA'], 1, 0, 'C');
                $pdf->Cell(35, 7, $d['NAMA_PERKIRAAN'], 1, 0, 'C');
                $pdf->Cell(55, 7, $d['BAGIAN'], 1, 0, 'L');
                $pdf->Cell(40, 7, $d['SALDO_AWAL'], 1, 0, 'L');
                $pdf->Cell(40, 7, $d['TOTAL_SALDO'], 1, 0, 'L');
                $pdf->Cell(40, 7, $d['TGL_INPUT'], 1, 0, 'L');
                $pdf->Ln();
            }
        endif;

        $file_name = $table . ' ' . $tanggal;
        $pdf->Output('I', $file_name);
    }
}
