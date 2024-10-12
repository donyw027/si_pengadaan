<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lokasi extends CI_Controller
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

        $data['title'] = "lokasi";
        $role = $this->session->userdata('login_session')['role'];

        if (is_admin() == true) {
            $data['lokasi'] = $this->admin->get('tb_lokasi');

            $this->template->load('templates/dashboard', 'lokasi/data', $data);
        }
    }



    private function _validasi($mode)
    {
        $this->form_validation->set_rules('lokasi', 'lokasi', 'required|trim');

        if ($mode == 'add') {
            $this->form_validation->set_rules('lokasi', 'lokasi', 'required|trim');
        } else {
            $db = $this->admin->get('tb_lokasi', ['lokasi' => $this->input->post('lokasi', true)]);
            $lokasi = $this->input->post('lokasi', true);
        }
    }

    public function add()
    {
        $this->_validasi('add');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Tambah lokasi";
            $this->template->load('templates/dashboard', 'lokasi/add', $data);
        } else {
            $input = $this->input->post(null, true);
            $input_data = [
                'lokasi'       => $input['lokasi']

            ];

            if ($this->admin->insert('tb_lokasi', $input_data)) {
                set_pesan('data berhasil disimpan.');
                redirect('lokasi');
            } else {
                set_pesan('data gagal disimpan', false);
                redirect('lokasi/add');
            }
        }
    }

    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi('edit');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Edit lokasi";
            $data['lokasi'] = $this->admin->get('tb_lokasi', ['id' => $id]);
            $this->template->load('templates/dashboard', 'lokasi/edit', $data);
        } else {
            $input = $this->input->post(null, true);
            $input_data = [
                'lokasi'       => $input['lokasi']

            ];

            if ($this->admin->update('tb_lokasi', 'id', $id, $input_data)) {
                set_pesan('data berhasil diubah.');
                redirect('lokasi');
            } else {
                set_pesan('data gagal diubah.', false);
                redirect('lokasi/edit/' . $id);
            }
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('tb_lokasi', 'id', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('lokasi');
    }

    // public function toggle($getId)
    // {
    //     $id = encode_php_tags($getId);
    //     $status = $this->admin->get('user', ['id_user' => $id])['is_active'];
    //     $toggle = $status ? 0 : 1; //Jika user aktif maka nonaktifkan, begitu pula sebaliknya
    //     $pesan = $toggle ? 'user diaktifkan.' : 'user dinonaktifkan.';

    //     if ($this->admin->update('user', 'id_user', $id, ['is_active' => $toggle])) {
    //         set_pesan($pesan);
    //     }
    //     redirect('user');
    // }
}
