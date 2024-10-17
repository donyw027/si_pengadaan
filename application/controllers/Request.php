<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Request extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();

        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('Admin_model', 'admin');
        $this->load->library('form_validation');
    }

    public function index()
    {

        $data['title'] = "Request Pengadaan";
        $this->_validasi('add');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Request Pengadaan";
            $this->template->load('templates/dashboard', 'request/data', $data);
        } else {
            $input = $this->input->post(null, true);
            $unit = $this->session->userdata('login_session')['no_telp'];
            $request_id = strtotime('now');

            $total_estimasi_harga = 0;

            // Simpan data ke tabel 'request'
            $input_data_request = [
                'request_id'            => $input['request_id'],
                'unit'                  => $unit,
                'tgl_pengajuan'         => $input['tgl_pengajuan'],
                'status'                => 'Pending Kepsek',
                // Simpan total_estimasi_biaya di sini setelah dihitung di loop
            ];

            // Simpan data ke tabel 'request_item'
            $kategori           = $input['kategori'];
            $items              = $input['item'];
            $spesifikasi        = $input['spesifikasi'];
            $qty                = $input['qty'];
            $estimasi_harga     = $input['estimasi_harga'];
            $alasan_permintaan  = $input['alasan_permintaan'];

            for ($i = 0; $i < count($kategori); $i++) {
                // Menghitung sub_estimasi_biaya
                $sub_estimasi_harga = $qty[$i] * $estimasi_harga[$i];

                // Tambahkan sub_estimasi_harga ke total_estimasi_biaya
                $total_estimasi_harga += $sub_estimasi_harga;

                // Membuat array untuk menyimpan data per item
                $input_request_item = [
                    'request_id'        => $input['request_id'],
                    'kategori'          => $kategori[$i],
                    'nama_item'              => $items[$i],
                    'spesifikasi'       => $spesifikasi[$i],
                    'qty'               => $qty[$i],
                    'estimasi_harga'    => $estimasi_harga[$i],
                    'sub_estimasi_harga' => $sub_estimasi_harga, // Menyimpan hasil perhitungan
                    'alasan_permintaan' => $alasan_permintaan[$i]
                ];

                // Simpan ke tabel request_item
                $this->admin->insert('request_item', $input_request_item);
            }

            // Simpan total_estimasi_biaya setelah loop
            $input_data_request['total_estimasi_harga'] = $total_estimasi_harga;

            // Simpan ke tabel request
            $this->admin->insert('request', $input_data_request);


            $yang_login = $this->session->userdata('login_session')['nama'];
            $tgl = date('d M Y | H:i');
            $data_log = [
                'tanggal'       => $tgl,
                'aksi'       => 'Add Data Request ( No Request : ' . $input['request_id'] . ')',
                'aktor'       => $yang_login
            ];

            // var_dump($data_log);die();


            if ($this->admin->insert('log_s', $data_log)) {

                set_pesan('data berhasil disimpan.');
                redirect('dpermintaan');
            } else {
                set_pesan('data gagal disimpan', false);
                redirect('dpermintaan');
            }
        }
    }


    private function _validasi($mode)
    {
        $this->form_validation->set_rules('tgl_pengajuan', 'tgl_pengajuan', 'required|trim');


        if ($mode == 'add') {
            $this->form_validation->set_rules('tgl_pengajuan', 'tgl_pengajuan', 'required|trim');
        } else {
            $db = $this->admin->get('request', ['tgl_pengajuan' => $this->input->post('tgl_pengajuan', true)]);
            $tgl_pengajuan = $this->input->post('tgl_pengajuan', true);
        }
    }

    public function detail_permintaan()
    {
        $request_id = $this->uri->segment('3');
        // var_dump($no_surat);die();

        $data['title'] = "Detail Permintaan";
        $role = $this->session->userdata('login_session')['role'];

        $data['request'] = $this->db->query("SELECT * FROM `request` WHERE request_id = '$request_id'")->row();
        $data['request_item'] = $this->db->query("SELECT * FROM `request_item` WHERE request_id = '$request_id'")->row();

        $data['request_item'] = $this->db->query("SELECT * FROM `request_item` WHERE request_id = '$request_id'")->result();

        $this->template->load('templates/dashboard', 'request/detail', $data);
    }




    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        $coa = $this->admin->get('coa', ['id' => $id]);
        $no_coa = $coa['no_coa'];
        $nama = $coa['nama'];


        $yang_login = $this->session->userdata('login_session')['nama'];
        $tgl = date('d M Y | H:i');
        $data_log = [
            'tanggal'       => $tgl,
            'aksi'       => 'Delete Data Coa ( No Coa : ' . $no_coa . ', Nama : ' . $nama . ')',
            'aktor'       => $yang_login
        ];

        // var_dump($data_log);die();


        if ($this->admin->delete('coa', 'id', $id) and  $this->admin->insert('log_s', $data_log)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('coa');
    }
}
