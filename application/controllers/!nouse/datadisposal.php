<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datadisposal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        // if (!is_admin()) {
        //     redirect('dashboard');
        // }

        $this->load->model('Admin_model', 'admin');
        $this->load->library('form_validation');
    }

    public function semuadisposal()
    {
        $data['title'] = "All Data Disposal";
        $role = $this->session->userdata('login_session')['role'];


        $data['datadisposal'] = $this->admin->get("tb_disposal");

        $this->template->load('templates/dashboard', 'alldatadisposal/data', $data);
    }

    public function index()
    {
        $data['title'] = "Data Disposal Aset";
        $role = $this->session->userdata('login_session')['role'];

        if (is_admin() == true) {
            $lokasi = 'Kantor Yayasan Diannanda';
            $keyword = $this->input->get('lokasi');
            if ($keyword) {
                $lokasi = $keyword;
            }
            $data['lokasi'] = $this->admin->getlokasi();
            $data['datadisposal'] = $this->admin->get("tb_disposal", null, ['lokasi' => $lokasi]);
        } else {
            $data['lokasi'] = $this->admin->getlokasi();
            $data['datadisposal'] = $this->admin->get("tb_disposal");
        }
        $this->template->load('templates/dashboard', 'datadisposal/data', $data);
    }

    private function _validasi($mode)
    {
        $this->form_validation->set_rules('nama_aset', 'nama_aset', 'required');

        if ($mode == 'add') {
            $this->form_validation->set_rules('nama_aset', 'nama_aset', 'required');
        } else {

            $db = $this->admin->get('tb_disposal', ['nama_aset' => $this->input->post('nama_aset', true)]);
            $nama_aset = $this->input->post('nama_aset', true);
        }
    }

    public function add()
    {
        $this->_validasi('add');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Tambah Data Disposal Aset";
            $data['merk'] = $this->admin->getmerk();
            $data['kategori'] = $this->admin->getkategori();
            $data['lokasi'] = $this->admin->getlokasi();
            $data['ruang'] = $this->admin->getruang();

            $this->template->load('templates/dashboard', 'datadisposal/add', $data);
        } else {
            $input = $this->input->post(null, true);
            $input_data = [
                'tgl_disposal'          => $input['tgl_disposal'],
                'jenis_aset'          => $input['jenis_aset'],
                'nama_aset'          => $input['nama_aset'],
                'jumlah_unit'          => $input['jumlah_unit'],
                'merk'      => $input['merk'],
                'no_seri'         => $input['no_seri'],
                'lokasi'       => $input['lokasi'],
                'ruang'       => $input['ruang'],
                'kategori'       => $input['kategori'],
                'keterangan'       => $input['keterangan'],
            ];

            if ($this->admin->insert('tb_disposal', $input_data)) {
                set_pesan('data berhasil disimpan.');
                redirect('datadisposal');
            } else {
                set_pesan('data gagal disimpan', false);
                redirect('datadisposal/add');
            }
        }
    }

    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi('edit');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Edit Data Disposal Aset";
            $data['merk'] = $this->admin->getmerk();
            $data['kategori'] = $this->admin->getkategori();
            $data['lokasi'] = $this->admin->getlokasi();
            $data['ruang'] = $this->admin->getruang();
            $data['datadisposal'] = $this->admin->get('tb_disposal', ['id' => $id]);
            $this->template->load('templates/dashboard', 'datadisposal/edit', $data);
        } else {
            $input = $this->input->post(null, true);
            $input_data = [
                'tgl_disposal'          => $input['tgl_disposal'],
                'jenis_aset'          => $input['jenis_aset'],
                'nama_aset'          => $input['nama_aset'],
                'jumlah_unit'          => $input['jumlah_unit'],
                'merk'      => $input['merk'],
                'no_seri'         => $input['no_seri'],
                'lokasi'       => $input['lokasi'],
                'ruang'       => $input['ruang'],
                'kategori'       => $input['kategori'],
                'keterangan'       => $input['keterangan'],
            ];

            // var_dump($input_data);
            // die();

            if ($this->admin->update('tb_disposal', 'id', $id, $input_data)) {
                set_pesan('data berhasil diubah.');
                redirect('datadisposal');
            } else {
                set_pesan('data gagal diubah.', false);
                redirect('datadisposal/edit/' . $id);
            }
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('tb_disposal', 'id', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('datadisposal');
    }
}
