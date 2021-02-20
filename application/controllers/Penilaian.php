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

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('penilaian/isi', $data);
        $this->load->view('template/footer');
    }

    public function daftar_pencacah($kegiatan_id)
    {
        $data['title'] = 'Daftar Pencacah';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $sqldaftarpencacah = "SELECT all_kegiatan.*, mitra.nama_lengkap FROM all_kegiatan INNER JOIN mitra ON all_kegiatan.ID_mitra = mitra.ID_mitra WHERE all_kegiatan.kegiatan_id = $kegiatan_id";
        $data['kegiatan'] = $this->db->query($sqldaftarpencacah)->result_array();

        $data['nama_kegiatan'] = $this->db->get_where('kegiatan', ['id' => $kegiatan_id])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('penilaian/daftar-pencacah', $data);
        $this->load->view('template/footer');
    }

    public function isi_nilai($kegiatan_id, $ID_mitra)
    {
        $data['title'] = 'Isi Nilai';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();



        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('penilaian/index', $data);
        $this->load->view('template/footer');
    }
}
