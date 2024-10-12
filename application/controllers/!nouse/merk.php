<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Merk extends CI_Controller
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

        $data['title'] = "merk";
        $role = $this->session->userdata('login_session')['role'];

        if (is_admin() == true) {
            $data['merk'] = $this->admin->get('tb_merk');

            $this->template->load('templates/dashboard', 'merk/data', $data);
        }
    }



    private function _validasi($mode)
    {
        $this->form_validation->set_rules('merk', 'merk', 'required|trim');

        if ($mode == 'add') {
            $this->form_validation->set_rules('merk', 'merk', 'required|trim');
        } else {
            $db = $this->admin->get('tb_merk', ['merk' => $this->input->post('merk', true)]);
            $merk = $this->input->post('merk', true);
        }
    }

    public function add()
    {
        $this->_validasi('add');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Tambah merk";
            $this->template->load('templates/dashboard', 'merk/add', $data);
        } else {
            $input = $this->input->post(null, true);
            $input_data = [
                'merk'       => $input['merk']

            ];

            if ($this->admin->insert('tb_merk', $input_data)) {
                set_pesan('data berhasil disimpan.');
                redirect('merk');
            } else {
                set_pesan('data gagal disimpan', false);
                redirect('merk/add');
            }
        }
    }

    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi('edit');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Edit merk";
            $data['merk'] = $this->admin->get('tb_merk', ['id' => $id]);
            $this->template->load('templates/dashboard', 'merk/edit', $data);
        } else {
            $input = $this->input->post(null, true);
            $input_data = [
                'merk'       => $input['merk']

            ];

            if ($this->admin->update('tb_merk', 'id', $id, $input_data)) {
                set_pesan('data berhasil diubah.');
                redirect('merk');
            } else {
                set_pesan('data gagal diubah.', false);
                redirect('merk/edit/' . $id);
            }
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('tb_merk', 'id', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('merk');
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
