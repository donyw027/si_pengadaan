<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
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

        $data['title'] = "kategori";
        $role = $this->session->userdata('login_session')['role'];

        if (is_admin() == true) {
            $data['kategori'] = $this->admin->get('tb_kategori');

            $this->template->load('templates/dashboard', 'kategori/data', $data);
        }
    }



    private function _validasi($mode)
    {
        $this->form_validation->set_rules('kategori', 'kategori', 'required|trim');

        if ($mode == 'add') {
            $this->form_validation->set_rules('kategori', 'kategori', 'required|trim');
        } else {
            $db = $this->admin->get('tb_kategori', ['kategori' => $this->input->post('kategori', true)]);
            $kategori = $this->input->post('kategori', true);
        }
    }

    public function add()
    {
        $this->_validasi('add');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Tambah kategori";
            $this->template->load('templates/dashboard', 'kategori/add', $data);
        } else {
            $input = $this->input->post(null, true);
            $input_data = [
                'kategori'       => $input['kategori']

            ];

            if ($this->admin->insert('tb_kategori', $input_data)) {
                set_pesan('data berhasil disimpan.');
                redirect('kategori');
            } else {
                set_pesan('data gagal disimpan', false);
                redirect('kategori/add');
            }
        }
    }

    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi('edit');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Edit kategori";
            $data['kategori'] = $this->admin->get('tb_kategori', ['id' => $id]);
            $this->template->load('templates/dashboard', 'kategori/edit', $data);
        } else {
            $input = $this->input->post(null, true);
            $input_data = [
                'kategori'       => $input['kategori']

            ];

            if ($this->admin->update('tb_kategori', 'id', $id, $input_data)) {
                set_pesan('data berhasil diubah.');
                redirect('kategori');
            } else {
                set_pesan('data gagal diubah.', false);
                redirect('kategori/edit/' . $id);
            }
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('tb_kategori', 'id', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('kategori');
    }
}
