<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ranking extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Ranking_model');
    }

    public function index()
    {
        $data['title'] = 'Ranking';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('ranking/index', $data);
        $this->load->view('template/footer');
    }


    public function kriteria()
    {
        $data['title'] = 'Data Kriteria';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $sql_kriteria = "SELECT * FROM kriteria ORDER BY prioritas ASC";
        $data['kriteria'] = $this->db->query($sql_kriteria)->result_array();

        $data['jumlahkriteria'] = $this->db->get('kriteria')->num_rows();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('prioritas', 'Prioritas', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('ranking/kriteria', $data);
            $this->load->view('template/footer');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'prioritas' => $this->input->post('prioritas'),
                'bobot' => 1
            ];


            $this->db->insert('kriteria', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New kriteria added!</div>');
            redirect('ranking/kriteria');
        }
    }

    public function editkriteria($id)
    {
        $data['title'] = 'Edit Kriteria';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kriteria'] = $this->db->get_where('kriteria', ['id' => $id])->row_array();

        $data['jumlahkriteria'] = $this->db->get('kriteria')->num_rows();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('prioritas', 'Prioritas', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('ranking/edit-kriteria', $data);
            $this->load->view('template/footer');
        } else {


            $nama = $this->input->post('nama');
            $prioritas = $this->input->post('prioritas');

            $this->db->set('nama', $nama);
            $this->db->set('prioritas', $prioritas);
            $this->db->where('id', $id);
            $this->db->update('kriteria');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kriteria has been updated!</div>');
            redirect('ranking/kriteria');
        }
    }

    function deletekriteria($id)
    {
        $this->Ranking_model->deletekriteria($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kriteria has been deleted!</div>');
        redirect('ranking/kriteria');
    }

    function hitung_bobot_kriteria($prioritas)
    {

        $jumlah_kriteria = $this->db->get('kriteria')->num_rows();
        $a = 0;
        for ($i = $prioritas; $i <= $jumlah_kriteria; $i++) {
            $a = $a + 1 / $i;
        }

        $bobot = $a / $jumlah_kriteria;

        $this->db->set('bobot', $bobot);
        $this->db->where('prioritas', $prioritas);
        $this->db->update('kriteria');

        redirect('ranking/kriteria');
    }

    function subkriteria()
    {
        $data['title'] = 'Data Subkriteria';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $sql_subkriteria = "SELECT * FROM subkriteria ORDER BY prioritas ASC";
        $data['subkriteria'] = $this->db->query($sql_subkriteria)->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('ranking/subkriteria', $data);
        $this->load->view('template/footer');
    }

    function hitung_bobot_subkriteria($prioritas)
    {

        $jumlah_subkriteria = $this->db->get('subkriteria')->num_rows();
        $a = 0;
        for ($i = $prioritas; $i <= $jumlah_subkriteria; $i++) {
            $a = $a + 1 / $i;
        }

        $bobot = $a / $jumlah_subkriteria;

        $this->db->set('bobot', $bobot);
        $this->db->where('prioritas', $prioritas);
        $this->db->update('subkriteria');

        redirect('ranking/subkriteria');
    }

    function pilih_kegiatan()
    {
        $data['title'] = 'Pilih Kegiatan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $sql = "SELECT * FROM kegiatan";

        $data['kegiatan'] = $this->db->query($sql)->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('ranking/pilih-kegiatan', $data);
        $this->load->view('template/footer');
    }

    function hitung($kegiatan_id)
    {
        $data['title'] = 'Perhitungan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $k_pencacah = "SELECT k_pencacah FROM kegiatan WHERE id = $kegiatan_id";
        $result_k_pencacah = implode($this->db->query($k_pencacah)->row_array());

        $jumlah_penilaian = ((int) $result_k_pencacah) * 10;

        $jumlah_penilaian_sementara = $this->db->get_where('all_penilaian', ['kegiatan_id' => $kegiatan_id])->num_rows();

        if ($jumlah_penilaian_sementara == $jumlah_penilaian) {

            // Normalisasi bobot

            $sql_norm_bobot = "SELECT * FROM kriteria";
            $data['bobot'] = $this->db->query($sql_norm_bobot)->result_array();

            $sql_jumlah_bobot = "SELECT sum(bobot) as sumbobot FROM kriteria";
            $data['sumbobot'] = implode($this->db->query($sql_jumlah_bobot)->row_array());

            // $sql_all_penilaian = "SELECT id FROM all_kegiatan WHERE kegiatan_id = $id";
            // $all_penilaian = $this->db->query($sql_all_penilaian)->result_array();

            // Data penilaian tiap kegiatan

            $data['kriteria'] = $this->db->get('kriteria')->result_array();

            $sql_nama = "SELECT mitra.nama_lengkap FROM mitra JOIN all_kegiatan ON all_kegiatan.id_mitra = mitra.id_mitra WHERE all_kegiatan.kegiatan_id = $kegiatan_id GROUP BY all_kegiatan.id_mitra";
            $data['nama'] = $this->db->query($sql_nama)->result_array();

            // var_dump($data['nama']);
            // die;

            $sql_mitra_nilai = "SELECT * FROM all_penilaian WHERE kegiatan_id = $kegiatan_id";
            $data['mitra_nilai'] = $this->db->query($sql_mitra_nilai)->result_array();





            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('ranking/perhitungan', $data);
            $this->load->view('template/footer');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Selesaikan penilaian terlebih dahulu!</div>');
            redirect('ranking/pilih_kegiatan');
        }
    }
}
