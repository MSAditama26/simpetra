<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penilaian extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Penilaian_model');
    }

    public function index()
    {
        $data['title'] = 'Penilaian';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('penilaian/index', $data);
        $this->load->view('template/footer');
    }

    public function isi()
    {
        $data['title'] = 'Penilaian';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $id = $data['user']['id'];

        $sqlkegiatan = "SELECT all_kegiatan_pengawas.*, kegiatan.* FROM all_kegiatan_pengawas INNER JOIN kegiatan ON all_kegiatan_pengawas.kegiatan_id = kegiatan.id WHERE all_kegiatan_pengawas.id_pengawas = $id";
        $data['kegiatan'] = $this->db->query($sqlkegiatan)->result_array();

        $id = $data['user']['id'];
        $data['pengawas'] = $id;

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('penilaian/isi', $data);
        $this->load->view('template/footer');
    }

    public function daftar_pencacah($pengawas, $kegiatan_id)
    {
        $data['title'] = 'Daftar Pencacah';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $sqldaftarpencacah = "SELECT all_kegiatan.*, mitra.nama_lengkap FROM all_kegiatan INNER JOIN mitra ON all_kegiatan.ID_mitra = mitra.ID_mitra WHERE all_kegiatan.kegiatan_id = $kegiatan_id";
        $data['kegiatan'] = $this->db->query($sqldaftarpencacah)->result_array();

        $data['nama_kegiatan'] = $this->db->get_where('kegiatan', ['id' => $kegiatan_id])->row_array();

        $data['pengawas'] = $pengawas;

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('penilaian/daftar-pencacah', $data);
        $this->load->view('template/footer');
    }

    public function isi_nilai($pengawas, $kegiatan_id, $ID_mitra)
    {
        $data['title'] = 'Isi Nilai';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['kegiatan'] = $this->db->get_where('kegiatan', ['id' => $kegiatan_id])->row_array();

        $data['pengawas'] = $pengawas;

        $data['pencacah'] = $ID_mitra;

        $sqlall_kegiatan = "SELECT id FROM all_kegiatan WHERE 'kegiatan_id' = $kegiatan_id AND 'ID_mitra' = $ID_mitra";
        $data['all_kegiatan'] = $this->db->query($sqlall_kegiatan)->row_array();

        $data['kriteria'] = $this->db->get('kriteria')->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('penilaian/isi-nilai', $data);
        $this->load->view('template/footer');
    }

    public function changenilai()
    {
        $pengawas_id = $this->input->post('pengawasId');
        $kegiatan_id = $this->input->post('kegiatanId');
        $ID_mitra = $this->input->post('pencacahId');
        $kriteria_id = $this->input->post('kriteriaId');
        $nilai = $this->input->post('nilaiId');

        $data = [
            'pengawas_id' => $pengawas_id,
            'kegiatan_id' => $kegiatan_id,
            'ID_mitra' => $ID_mitra,
            'kriteria_id' => $kriteria_id,
            'nilai' => $nilai
        ];


        $result = $this->db->get_where('all_kegiatan_pengawas', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('all_penilaian', $data);
        } else {
            $this->db->delete('all_penilaian', $data);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Nilai changed!</div>');
    }
}
