<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ruang extends CI_Controller
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

        $data['title'] = "ruang";
        $role = $this->session->userdata('login_session')['role'];

        if (is_admin() == true) {
            $data['ruang'] = $this->admin->get('tb_ruang');

            $this->template->load('templates/dashboard', 'ruang/data', $data);
        }
    }



    private function _validasi($mode)
    {
        $this->form_validation->set_rules('ruang', 'ruang', 'required|trim');

        if ($mode == 'add') {
            $this->form_validation->set_rules('ruang', 'ruang', 'required|trim');
        } else {
            $db = $this->admin->get('tb_ruang', ['ruang' => $this->input->post('ruang', true)]);
            $ruang = $this->input->post('ruang', true);
        }
    }

    public function add()
    {
        $this->_validasi('add');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Tambah ruang";
            $this->template->load('templates/dashboard', 'ruang/add', $data);
        } else {
            $input = $this->input->post(null, true);
            $input_data = [
                'ruang'       => $input['ruang']

            ];

            if ($this->admin->insert('tb_ruang', $input_data)) {
                set_pesan('data berhasil disimpan.');
                redirect('ruang');
            } else {
                set_pesan('data gagal disimpan', false);
                redirect('ruang/add');
            }
        }
    }

    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi('edit');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Edit ruang";
            $data['ruang'] = $this->admin->get('tb_ruang', ['id' => $id]);
            $this->template->load('templates/dashboard', 'ruang/edit', $data);
        } else {
            $input = $this->input->post(null, true);
            $input_data = [
                'ruang'       => $input['ruang']

            ];

            if ($this->admin->update('tb_ruang', 'id', $id, $input_data)) {
                set_pesan('data berhasil diubah.');
                redirect('ruang');
            } else {
                set_pesan('data gagal diubah.', false);
                redirect('ruang/edit/' . $id);
            }
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('tb_ruang', 'id', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('ruang');
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
