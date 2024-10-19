<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Coa extends CI_Controller
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

        $data['title'] = "Coa";
        $role = $this->session->userdata('login_session')['role'];

        if (is_admin() == true || is_yys() == true) {
            $data['coa'] = $this->admin->get('coa');

            $this->template->load('templates/dashboard', 'coa/data', $data);
        }
    }


    private function _validasi($mode)
    {
        $this->form_validation->set_rules('nama', 'nama', 'required|trim');


        if ($mode == 'add') {
            $this->form_validation->set_rules('nama', 'nama', 'required|trim');
        } else {
            $db = $this->admin->get('coa', ['nama' => $this->input->post('nama', true)]);
            $nama = $this->input->post('nama', true);
        }
    }

    public function add()
    {
        $this->_validasi('add');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Tambah Coa";
            $this->template->load('templates/dashboard', 'coa/add', $data);
        } else {
            $input = $this->input->post(null, true);

            $input_data = [
                'no_coa'       => $input['no_coa'],
                'nama'       => $input['nama']
            ];

            $yang_login = $this->session->userdata('login_session')['nama'];
            $tgl = date('d M Y | H:i');
            $data_log = [
                'tanggal'       => $tgl,
                'aksi'       => 'Add Data Coa ( No Coa : ' . $input['no_coa'] . ', Nama : ' . $input['nama'] . ')',
                'aktor'       => $yang_login
            ];

            // var_dump($data_log);die();


            if ($this->admin->insert('coa', $input_data) and $this->admin->insert('log_s', $data_log)) {
                set_pesan('data berhasil disimpan.');
                redirect('coa');
            } else {
                set_pesan('data gagal disimpan', false);
                redirect('coa/add');
            }
        }
    }

    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi('edit');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Edit Coa";
            $data['coa'] = $this->admin->get('coa', ['id' => $id]);
            $this->template->load('templates/dashboard', 'coa/edit', $data);
        } else {
            $input = $this->input->post(null, true);

            $input_data = [
                'no_coa'       => $input['no_coa'],
                'nama'       => $input['nama'],
            ];

            $yang_login = $this->session->userdata('login_session')['nama'];
            $tgl = date('d M Y | H:i');
            $data_log = [
                'tanggal'       => $tgl,
                'aksi'       => 'Edit Data Coa ( Nn Coa : ' . $input['no_coa'] . ', Nama : ' . $input['nama'] . ')',
                'aktor'       => $yang_login
            ];



            if ($this->admin->update('coa', 'id', $id, $input_data) and  $this->admin->insert('log_s', $data_log)) {
                set_pesan('data berhasil diubah.');
                redirect('coa');
            } else {
                set_pesan('data gagal diubah.', false);
                redirect('coa/edit/' . $id);
            }
        }
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
