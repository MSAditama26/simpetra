<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penilaian extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in_user();
        $this->load->model('Penilaian_model');
    }

    public function index()
    {
        $data['title'] = 'Penilaian';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $nama = $data['user']['nama'];

        $sql_nip = "SELECT nip FROM pegawai WHERE nama = '$nama'";
        $nip = implode($this->db->query($sql_nip)->row_array());

        // var_dump($nip);
        // die;

        $sqlkegiatan = "SELECT all_kegiatan_pengawas.*, kegiatan.* FROM all_kegiatan_pengawas INNER JOIN kegiatan ON all_kegiatan_pengawas.kegiatan_id = kegiatan.id WHERE all_kegiatan_pengawas.id_pengawas = $nip";
        $data['kegiatan'] = $this->db->query($sqlkegiatan)->result_array();

        // $data['pengawas'] = $nama;

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('penilaian/index', $data);
        $this->load->view('template/footer');
    }

    public function daftar_pencacah($kegiatan_id)
    {
        $data['title'] = 'Daftar Pencacah';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $sqldaftarpencacah = "SELECT all_kegiatan.*, mitra.nama_lengkap FROM all_kegiatan INNER JOIN mitra ON all_kegiatan.id_mitra = mitra.id_mitra WHERE all_kegiatan.kegiatan_id = $kegiatan_id";
        $data['kegiatan'] = $this->db->query($sqldaftarpencacah)->result_array();

        $data['nama_kegiatan'] = $this->db->get_where('kegiatan', ['id' => $kegiatan_id])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('penilaian/daftar-pencacah', $data);
        $this->load->view('template/footer');
    }

    public function isi_nilai($kegiatan_id, $id_mitra)
    {
        $data['title'] = 'Isi Nilai';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['kegiatan'] = $this->db->get_where('kegiatan', ['id' => $kegiatan_id])->row_array();

        $data['mitra'] = $this->db->get_where('mitra', ['id_mitra' => $id_mitra])->row_array();

        $sql_kriteria = "SELECT * FROM kriteria ORDER BY id ASC";
        $data['kriteria'] = $this->db->query($sql_kriteria)->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('penilaian/isi-nilai', $data);
        $this->load->view('template/footer');
    }

    public function changenilai()
    {
        $kegiatan_id = $this->input->post('kegiatanId');
        $id_mitra = $this->input->post('mitraId');
        $kriteria_id = $this->input->post('kriteriaId');
        $nilai = $this->input->post('nilaiId');

        $data = [
            'kegiatan_id' => $kegiatan_id,
            'id_mitra' => $id_mitra,
            'kriteria_id' => $kriteria_id,
            'nilai' => $nilai
        ];

        $data2 = [
            'kegiatan_id' => $kegiatan_id,
            'id_mitra' => $id_mitra,
            'kriteria_id' => $kriteria_id
        ];

        $result = $this->db->get_where('all_penilaian', $data2);

        if ($result->num_rows() < 1) {
            $this->db->insert('all_penilaian', $data);
        } else {
            $query = "UPDATE all_penilaian SET nilai = $nilai WHERE kegiatan_id = $kegiatan_id AND id_mitra = $id_mitra AND kriteria_id = $kriteria_id";
            $this->db->query($query);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Nilai changed!</div>');
    }

    public function pilihkegiatan()
    {
        $data['title'] = 'Cetak Hasil Penilaian';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        if ($data['user']['role_id'] == 5) {

            $mitra = $this->db->get_where('mitra', ['email' => $this->session->userdata('email')])->row_array();

            $id_mitra = $mitra['id_mitra'];

            $data['id_mitra'] = $id_mitra;

            $sql = "SELECT kegiatan.* FROM kegiatan JOIN all_kegiatan ON kegiatan.id = all_kegiatan.kegiatan_id WHERE all_kegiatan.id_mitra = $id_mitra";
            $data['kegiatan'] = $this->db->query($sql)->result_array();

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('penilaian/cetak-mitra', $data);
            $this->load->view('template/footer');
        } else {
            $data['kegiatan'] = $this->db->get('kegiatan')->result_array();

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('penilaian/cetak-pilih-kegiatan', $data);
            $this->load->view('template/footer');
        }
    }

    public function pilihmitra($kegiatan_id)
    {
        $data['title'] = 'Cetak Hasil Penilaian';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $sql = "SELECT mitra.* FROM all_kegiatan JOIN mitra ON all_kegiatan.id_mitra = mitra.id_mitra WHERE all_kegiatan.kegiatan_id = $kegiatan_id";

        $data['mitra'] = $this->db->query($sql)->result_array();

        $data['kegiatan'] = $this->db->get_where('kegiatan', ['id' => $kegiatan_id])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('penilaian/cetak-pilih-mitra', $data);
        $this->load->view('template/footer');
    }

    public function download($kegiatan_id, $id_mitra)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $sqlpenilaian = "SELECT all_penilaian.*, kriteria.nama as kriterianama FROM all_penilaian LEFT JOIN kriteria ON all_penilaian.kriteria_id = kriteria.id WHERE all_penilaian.kegiatan_id = $kegiatan_id AND all_penilaian.id_mitra = $id_mitra ORDER BY kriteria_id ASC";

        $data['penilaian'] = $this->db->query($sqlpenilaian)->result_array();

        $data['kegiatan'] = $this->db->get_where('kegiatan', ['id' => $kegiatan_id])->row_array();
        $data['mitra'] = $this->db->get_where('mitra', ['id_mitra' => $id_mitra])->row_array();

        $sqlrow = "SELECT count(*) FROM all_penilaian WHERE kegiatan_id = $kegiatan_id AND id_mitra = $id_mitra";
        $row = implode($this->db->query($sqlrow)->row_array());

        if ($row < 10) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Penilaian belum lengkap!</div>');
            redirect('penilaian/pilihmitra/' . $kegiatan_id);
        } else {
            $this->load->view('penilaian/laporan', $data);
        }
    }

    public function arsip()
    {
        $data['title'] = 'Daftar mitra';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $sql = "SELECT * FROM mitra WHERE is_active = 0";
        $data['mitra'] = $this->db->query($sql)->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('penilaian/arsip', $data);
        $this->load->view('template/footer');
    }

    public function arsip_pilihkegiatan($id_mitra)
    {
        $data['title'] = 'Daftar kegiatan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $sql = "SELECT kegiatan.* FROM kegiatan JOIN all_kegiatan ON kegiatan.id = all_kegiatan.kegiatan_id WHERE all_kegiatan.id_mitra = $id_mitra";
        $data['kegiatan'] = $this->db->query($sql)->result_array();

        $data['id_mitra'] = $id_mitra;

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('penilaian/arsip-pilihkegiatan', $data);
        $this->load->view('template/footer');
    }
}
