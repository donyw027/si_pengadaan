<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function get($table, $data = null, $where = null)
    {
        if ($data != null) {
            return $this->db->get_where($table, $data)->row_array();
        } else {
            return $this->db->get_where($table, $where)->result_array();
        }
    }

    public function insert_note($data)
    {
        return $this->db->insert('catatan', $data);
    }

    public function get_where($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    public function log_desc()
    {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('log_s');
        return $query->result_array();
    }

    public function update($table, $pk, $id, $data)
    {
        $this->db->where($pk, $id);
        return $this->db->update($table, $data);
    }

    public function insert($table, $data, $batch = false)
    {
        return $batch ? $this->db->insert_batch($table, $data) : $this->db->insert($table, $data);
    }

    public function delete($table, $pk, $id)
    {
        return $this->db->delete($table, [$pk => $id]);
    }

    public function get_notes_with_details($unit = null)
    {
        $this->db->select('catatan.*, request.unit, user.nama');
        $this->db->from('catatan');
        $this->db->join('request', 'catatan.request_id = request.request_id', 'left');
        $this->db->join('user', 'catatan.user_id = user.id_user', 'left');

        // Jika unit disediakan, tambahkan filter untuk unit tersebut
        if ($unit !== null) {
            $this->db->where('request.unit', $unit);
        }

        $query = $this->db->get();
        return $query->result();
    }




    public function get_all_payrolls()
    {
        $this->db->select('*');
        $this->db->from('payroll');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_all_workingdays()
    {
        $this->db->select('*');
        $this->db->from('workingdays');
        $query = $this->db->get();
        return $query->result();
    }

    public function insert_batch($data)
    {
        $this->db->insert_batch('payroll', $data);
    }

    public function insert_batch1($data)
    {
        $this->db->insert_batch('workingdays', $data);
    }

    function get_payroll_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('payroll');
        return $query->row(); // Mengambil satu baris hasil
    }

    function get_workingdays_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('workingdays');
        return $query->row(); // Mengambil satu baris hasil
    }

    public function get_payroll_by_employee_id($employee_id)
    {
        $this->db->select('*');
        $this->db->from('payroll');
        $this->db->where('nik', $employee_id);
        $query = $this->db->get();
        return $query->row();
    }

    public function get_workingdays_by_employee_id($employee_id)
    {
        $this->db->select('*');
        $this->db->from('workingdays');
        $this->db->where('nik', $employee_id);
        $query = $this->db->get();
        return $query->row();
    }

    public function getUsers($id)
    {
        /**
         * ID disini adalah untuk data yang tidak ingin ditampilkan. 
         * Maksud saya disini adalah 
         * tidak ingin menampilkan data user yang digunakan, 
         * pada managemen data user
         */
        $this->db->where('id_user !=', $id);
        return $this->db->get('user')->result_array();
    }

    public function count($table)
    {
        return $this->db->count_all($table);
    }


    public function laporan($table, $mulai, $akhir)
    {
        $tgl = $table == 'barang_masuk' ? 'tanggal_masuk' : 'tanggal_keluar';
        $this->db->where($tgl . ' >=', $mulai);
        $this->db->where($tgl . ' <=', $akhir);
        return $this->db->get($table)->result_array();
    }

    public function getcoa()
    {
        $role = $this->session->userdata('login_session')['role'];

        if (Is_admin() == true) {
            return $this->db->get('coa')->result();
        } else {
            return $this->db->query("SELECT * FROM coa where BAGIAN='$role'")->result();
        }
    }

    public function getcoauntukrealisasi()
    {
        $role = $this->session->userdata('login_session')['role'];

        if (Is_admin() == true) {
            return $this->db->get('coa')->result();
        } else {
            return $this->db->query("SELECT * FROM input_saldo_$role")->result();
        }
    }

    public function get_keyword($keyword = "SMP 2")
    {
        $this->db->select('*');
        $this->db->from('tb_aset');

        return $this->db->get()->result();
    }


    public function getmerk()
    {
        $role = $this->session->userdata('login_session')['role'];

        if (Is_admin() == true) {
            return $this->db->get('tb_merk')->result();
        }
    }

    public function getlokasi()
    {
        $role = $this->session->userdata('login_session')['role'];

        if (Is_admin() == true) {
            return $this->db->get('tb_lokasi')->result();
        }
    }

    public function getruang()
    {
        $role = $this->session->userdata('login_session')['role'];

        if (Is_admin() == true) {
            return $this->db->get('tb_ruang')->result();
        }
    }
    public function getkategori()
    {
        $role = $this->session->userdata('login_session')['role'];

        if (Is_admin() == true) {
            return $this->db->get('tb_kategori')->result();
        }
    }

    function get_autofill_mod($NO_COA)
    {
        $role = $this->session->userdata('login_session')['role'];

        $hsl = $this->db->query("SELECT * FROM input_saldo_.$role WHERE NO_COA='$NO_COA'");
        if ($hsl->num_rows() > 0) {
            foreach ($hsl->result() as $data) {
                $hasil = array(
                    'NO_COA' => $data->NO_COA,
                    'NAMA_PERKIRAAN' => $data->NAMA_PERKIRAAN,
                    'SALDO_AWAL' => $data->SALDO_AWAL,
                );
            }
        }
        return $hasil;
    }

    public function getNamaHrd()
    {
        $query = $this->db->query("SELECT nama_hrd FROM pkwt");
        return $query->result();
    }
}
