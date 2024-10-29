<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();

        $this->load->model('Admin_model', 'admin');
    }

    public function index()
    {
        $data['title'] = "Dashboard";


        $unit = $this->session->userdata('login_session')['no_telp'];

        $query_log = $this->db->query("SELECT tanggal, aksi ,aktor FROM log_s ORDER BY id DESC LIMIT 1");
        $data['log'] = $query_log->row();


        // $data['kategoriaset'] = $this->db->query("SELECT sum(tb_aset.jumlah_unit) AS totalaset,tb_kategori.kategori FROM tb_kategori left JOIN tb_aset on tb_kategori.kategori = tb_aset.kategori GROUP BY tb_kategori.kategori")->result_array();

        // $data['kategoridisposal'] = $this->db->query("SELECT sum(tb_disposal.jumlah_unit) AS totalaset,tb_kategori.kategori FROM tb_kategori left JOIN tb_disposal on tb_kategori.kategori = tb_disposal.kategori GROUP BY tb_kategori.kategori")->result_array();


        $data['pending_yayasan'] = $this->admin->hitung_data('request', ['status' => 'Pending Yayasan']);
        $data['reject_yayasan'] = $this->admin->hitung_data('request', ['status' => 'Rejected Yayasan']);
        $data['acc_yayasan'] = $this->admin->hitung_data('request', ['status' => ['ACC Yayasan', 'ACC Yayasan,Pengadaan Selesai']]);

        $data['pengadaan'] = $this->admin->hitung_data('pengadaan', ['status_pengadaan' => 'Proses Pengadaan']);


        $data['pending_kepsek'] = $this->admin->count_where_in_with_unit('request', 'status', ['Pending Kepsek'], $unit);
        $data['pending_kepsek_yys'] = $this->admin->count_where_in_with_unit('request', 'status', ['Pending Yayasan'], $unit);
        $data['reject_kepsek'] = $this->admin->count_where_in_with_unit('request', 'status', ['Rejected Kepsek'], $unit);
        $data['acc_kepsek'] = $this->admin->count_where_in_with_unit('request', 'status', ['Rejected Kepsek'], $unit);
        $data['total_permintaan'] = $this->admin->hitung_data('request', ['unit' => $unit]);
        $data['jumlah_pengadaan'] = $this->admin->count_konfirmasi_by_unit($unit);



        $data['pending_tu'] = $this->admin->count_where_in_with_unit('request', 'status', ['Pending Yayasan', 'Pending Kepsek'], $unit);
        $status_conditions = ['ACC Yayasan', 'ACC Yayasan,Pengadaan Selesai'];
        $data['acc_tu'] = $this->admin->hitung_data('request', ['status' => $status_conditions, 'unit' => $unit]);

        $data['reject_tu'] = $this->admin->count_where_in_with_unit('request', 'status', ['Rejected yayasan', 'Rejected kepsek'], $unit);
        $data['catatan_tu'] = $this->admin->count_catatan_with_request_id_like_unit('catatan', $unit);




        $data['user'] = $this->admin->count('user');

        if (is_admin() == true || is_yys() == true) {
            $this->template->load('templates/dashboard', 'dashboard', $data);
        } elseif (is_tu() == true) {
            $this->template->load('templates/dashboard', 'dashboard_tu', $data);
        } elseif (is_kepsek() == true) {
            $this->template->load('templates/dashboard', 'dashboard_kepsek', $data);
        }
    }
}
