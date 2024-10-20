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
                redirect('request/pending');
            } else {
                set_pesan('data gagal disimpan', false);
                redirect('request');
            }
        }
    }

    public function catatan()
    {
        $data['title'] = "Catatan";

        // var_dump($unit);
        // die();

        if (is_admin() == true || is_yys() == true) {
            $data['catatan'] = $this->admin->get_notes_with_details();
        } else {
            $unit = $this->session->userdata('login_session')['no_telp'];
            $data['catatan'] = $this->admin->get_notes_with_details($unit);
        }


        $this->template->load('templates/dashboard', 'catatan/data', $data);
    }

    public function AccYayasan()
    {
        $data['title'] = "ACC Yayasan";
        $unit = $this->session->userdata('login_session')['no_telp'];

        // Ambil data request dengan status 'acc request yayasan'
        $this->db->select('*');
        $this->db->from('request');
        $this->db->where('status', 'Acc Yayasan');

        // // Jika perlu, tambahkan filter berdasarkan unit
        // $this->db->where('unit', $unit);

        $query = $this->db->get();
        $data['requests'] = $query->result();

        $this->template->load('templates/dashboard', 'dpermintaan/accyys', $data);
    }

    public function pending()
    {
        $data['title'] = "Pending Request";
        $unit = $this->session->userdata('login_session')['no_telp'];

        // Ambil data request dengan status 'acc request yayasan'
        $this->db->select('*');
        $this->db->from('request');
        if (is_tu() == true) {
            $this->db->where('status', 'Pending Kepsek');
            $this->db->or_where('status', 'Pending Yayasan');
        } elseif (is_kepsek() == true) {
            $this->db->where('status', 'Pending yayasan');
        }

        // // Jika perlu, tambahkan filter berdasarkan unit
        $this->db->where('unit', $unit);

        $query = $this->db->get();
        $data['requests'] = $query->result();

        $this->template->load('templates/dashboard', 'dpermintaan/pending', $data);
    }

    public function decision_log()
    {
        $data['title'] = 'Approval Log';

        // Ambil unit dari session login
        $unit = $this->session->userdata('login_session')['no_telp'];


        // Jika admin atau yayasan, tampilkan semua data
        if (is_admin() || is_yys()) {
            $data['decision_logs'] = $this->admin->get_decision_logs();
        } else {
            // Jika user kepsek, hanya tampilkan data sesuai unit
            $data['decision_logs'] = $this->admin->get_decision_logs($unit);
        }

        // Load view untuk menampilkan data
        $this->template->load('templates/dashboard', 'decision_log/data', $data);
    }

    public function RejectYayasan()
    {
        $data['title'] = "Reject Yayasan";
        $unit = $this->session->userdata('login_session')['no_telp'];

        // Ambil data request dengan status 'acc request yayasan'
        $this->db->select('*');
        $this->db->from('request');
        $this->db->where('status', 'Rejected Yayasan');

        // // Jika perlu, tambahkan filter berdasarkan unit
        // $this->db->where('unit', $unit);

        $query = $this->db->get();
        $data['requests'] = $query->result();

        $this->template->load('templates/dashboard', 'dpermintaan/rejectyys', $data);
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

    public function approve_pengadaan($request_id)
    {
        $status = 'ACC Yayasan';

        // Update status request di database
        $this->db->where('request_id', $request_id);
        $this->db->update('request', ['status' => $status]);

        // Insert log into decision_log
        $data_log = [
            'request_id' => $request_id,
            'status' => $status,
            'user_id' => $this->session->userdata('login_session')['user'], // Nama user yang approve
            'tgl' => date('Y-m-d | H:i:s'), // Waktu saat ini
        ];

        // Insert ke tabel decision_log
        $this->db->insert('decision_log', $data_log);

        // Insert data ke tabel pengadaan
        $data_pengadaan = [
            'request_id' => $request_id,
            'tgl_pengadaan' => date('Y-m-d'), // Tanggal pengadaan saat ini
            'status_pengadaan' => 'Proses Pengadaan', // Status awal pengadaan
            // 'tgl_diterima' => null // Tanggal diterima, akan diisi nanti saat barang diterima
        ];
        $this->db->insert('pengadaan', $data_pengadaan);


        // Redirect kembali ke halaman approval dengan pesan sukses
        $this->session->set_flashdata('pesan', 'Permintaan berhasil di-approve.');

        redirect('dpermintaan/approve_permintaan');
    }

    public function pengadaan_list()
    {
        $data['title'] = 'Daftar Pengadaan';

        // Ambil unit dari session
        $unit = $this->session->userdata('login_session')['no_telp'];

        // Panggil fungsi model dengan filter unit
        if (is_admin() == true || is_yys() == true) {
            $data['pengadaan'] = $this->admin->get_pengadaan_with_details();
        } else {
            $data['pengadaan'] = $this->admin->get_pengadaan_with_details($unit);
        }

        $this->template->load('templates/dashboard', 'pengadaan/data', $data);
    }

    public function approve($request_id)
    {


        // Ubah status request berdasarkan role user
        if (is_kepsek() == true) {
            $status = 'Pending Yayasan';
        } else if (is_yys() == true || is_admin() == true) {
            $status = 'ACC Yayasan';
        }

        // Update status request di database
        $this->db->where('request_id', $request_id);
        $this->db->update('request', ['status' => $status]);

        // Insert log into decision_log
        $data_log = [
            'request_id' => $request_id,
            'status' => $status,
            'user_id' => $this->session->userdata('login_session')['user'], // Nama user yang approve
            'tgl' => date('Y-m-d | H:i:s'), // Waktu saat ini
        ];

        // Insert ke tabel decision_log
        $this->db->insert('decision_log', $data_log);


        // Redirect kembali ke halaman approval dengan pesan sukses
        $this->session->set_flashdata('pesan', 'Permintaan berhasil di-approve.');

        redirect('dpermintaan/approve_permintaan');
    }

    public function reject()
    {

        // Ambil data dari form reject modal
        $request_id = $this->input->post('request_id');
        $note = $this->input->post('note');
        $user_id = $this->session->userdata('login_session')['user'];
        // var_dump($user_id);
        // die();

        // Data untuk tabel catatan
        $data_note = [
            'request_id' => $request_id,
            'tgl_note' => date('Y-m-d | H:i:s'),
            'note' => $note,
            'user_id' => $user_id
        ];

        // Simpan catatan ke database
        $this->db->insert('catatan', $data_note);

        // Update status request menjadi 'rejected'
        $this->db->where('request_id', $request_id);
        if (is_kepsek() == true) {
            $status = 'Rejected Kepsek';
            $this->db->update('request', ['status' => $status]);
        } elseif (is_yys() == true || is_admin() == true) {
            $status = 'Rejected Yayasan';
            $this->db->update('request', ['status' => $status]);
        }

        $data_log = [
            'request_id' => $request_id,
            'status' => $status,
            'user_id' => $this->session->userdata('login_session')['user'], // Nama user yang approve
            'tgl' => date('Y-m-d | H:i:s'), // Waktu saat ini
        ];

        // Insert ke tabel decision_log
        $this->db->insert('decision_log', $data_log);


        // Redirect kembali dengan pesan
        $this->session->set_flashdata('pesan', 'Permintaan ditolak.');
        redirect('dpermintaan/approve_permintaan');
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
