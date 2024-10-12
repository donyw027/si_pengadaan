<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dataaset extends CI_Controller
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

        $this->load->library('ciqrcode');
    }

    public function semuaaset()
    {


        $data['title'] = "All Data Aset";
        $role = $this->session->userdata('login_session')['role'];


        $data['dataaset'] = $this->admin->get("tb_aset");

        $this->template->load('templates/dashboard', 'alldataaset/data', $data);
    }

    public function index()
    {
        $data['title'] = "Data Aset";
        $role = $this->session->userdata('login_session')['role'];

        if (is_admin() == true) {
            $lokasi = 'Kantor Yayasan Diannanda';
            $keyword = $this->input->get('lokasi');
            if ($keyword) {
                $lokasi = $keyword;
            }
            $data['lokasi'] = $this->admin->getlokasi();
            $data['dataaset'] = $this->admin->get("tb_aset", null, ['lokasi' => $lokasi]);
        } else {
            $data['lokasi'] = $this->admin->getlokasi();
            $data['dataaset'] = $this->admin->get("tb_aset");
        }
        $this->template->load('templates/dashboard', 'dataaset/data', $data);
    }

    private function _validasi($mode)
    {
        $this->form_validation->set_rules('nama_aset', 'nama_aset', 'required');

        if ($mode == 'add') {
            $this->form_validation->set_rules('nama_aset', 'nama_aset', 'required');
        } else {

            $db = $this->admin->get('tb_aset', ['nama_aset' => $this->input->post('nama_aset', true)]);
            $nama_aset = $this->input->post('nama_aset', true);
        }
    }

    public function add()
    {
        $this->_validasi('add');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Tambah Data Aset";
            $data['merk'] = $this->admin->getmerk();
            $data['kategori'] = $this->admin->getkategori();
            $data['lokasi'] = $this->admin->getlokasi();
            $data['ruang'] = $this->admin->getruang();

            $this->template->load('templates/dashboard', 'dataaset/add', $data);
        } else {
            $input = $this->input->post(null, true);
            $input_data = [
                'jenis_aset'          => $input['jenis_aset'],
                'no_barcode'          => $input['no_barcode'],
                'nama_aset'          => $input['nama_aset'],
                'jumlah_unit'          => $input['jumlah_unit'],
                'merk'      => $input['merk'],
                'tgl_perolehan'         => $input['tgl_perolehan'],
                'kondisi'       => $input['kondisi'],
                'lokasi'       => $input['lokasi'],
                'ruang'       => $input['ruang'],
                'kategori'       => $input['kategori'],
                'keterangan'       => $input['keterangan'],
            ];

            if ($this->admin->insert('tb_aset', $input_data)) {
                set_pesan('data berhasil disimpan.');
                redirect('dataaset');
            } else {
                set_pesan('data gagal disimpan', false);
                redirect('dataaset/add');
            }
        }
    }

    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi('edit');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Edit Data Aset";
            $data['merk'] = $this->admin->getmerk();
            $data['kategori'] = $this->admin->getkategori();
            $data['lokasi'] = $this->admin->getlokasi();
            $data['ruang'] = $this->admin->getruang();
            $data['dataaset'] = $this->admin->get('tb_aset', ['id' => $id]);
            $this->template->load('templates/dashboard', 'dataaset/edit', $data);
        } else {
            $input = $this->input->post(null, true);
            $input_data = [
                'jenis_aset'          => $input['jenis_aset'],
                'no_barcode'          => $input['no_barcode'],
                'nama_aset'          => $input['nama_aset'],
                'jumlah_unit'          => $input['jumlah_unit'],
                'merk'      => $input['merk'],
                'tgl_perolehan'         => $input['tgl_perolehan'],
                'kondisi'       => $input['kondisi'],
                'lokasi'       => $input['lokasi'],
                'ruang'       => $input['ruang'],
                'kategori'       => $input['kategori'],
                'keterangan'       => $input['keterangan'],
            ];

            if ($this->admin->update('tb_aset', 'id', $id, $input_data)) {
                set_pesan('data berhasil diubah.');
                redirect('dataaset');
            } else {
                set_pesan('data gagal diubah.', false);
                redirect('dataaset/edit/' . $id);
            }
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('tb_aset', 'id', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('dataaset');
    }

    function qrcode($kodenya = null)
    {

        // ob_start();
        $returnData = qrcode::png(
            urldecode($kodenya),
            $outfiles = false,
            $level = QR_ECLEVEL_H,
            $size = 6,
            $margin = 1
        );
        // $imageString = base64_encode(ob_get_contents());
        // ob_end_clean();
        // $str = "data:image/png;base64," . $imageString;

        // print_r('test');
        // die();
    }

    function printqrcode($kodenya = null)
    {
        $urlgenerateqrcode = base_url('dataaset/qrcode/' . $kodenya);
        $this->load->view('dataaset/barcode', [
            'urlqrcode' => $urlgenerateqrcode
        ]);
    }
}
