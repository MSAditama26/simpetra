<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penilaian extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Penilaian_model');
        $this->load->library('Pdf');
    }

    public function index()
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
        $this->load->view('penilaian/index', $data);
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

    public function isi_nilai($id)
    {
        $data['title'] = 'Isi Nilai';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['id'] = $this->db->get_where('all_kegiatan', ['id' => $id])->row_array();

        $data['kegiatan'] = $this->db->get_where('kegiatan', ['id' => $data['id']['kegiatan_id']])->row_array();

        $data['pencacah'] = $data['id']['ID_mitra'];

        // $sqlall_kegiatan = "SELECT id FROM all_kegiatan WHERE 'kegiatan_id' = $kegiatan_id AND 'ID_mitra' = $ID_mitra";
        // $data['all_kegiatan'] = $this->db->query($sqlall_kegiatan)->row_array();

        $data['kriteria'] = $this->db->get('kriteria')->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('penilaian/isi-nilai', $data);
        $this->load->view('template/footer');
    }

    public function changenilai()
    {
        $id = $this->input->post('Id');
        $kriteria_id = $this->input->post('kriteriaId');
        $nilai = $this->input->post('nilaiId');

        $data = [
            'all_kegiatan_id' => $id,
            'kriteria_id' => $kriteria_id,
            'nilai' => $nilai
        ];

        $data2 = [
            'all_kegiatan_id' => $id,
            'kriteria_id' => $kriteria_id
        ];

        $result = $this->db->get_where('all_penilaian', $data2);

        if ($result->num_rows() < 1) {
            $this->db->insert('all_penilaian', $data);
        } else {
            $query = "UPDATE all_penilaian SET nilai = $nilai WHERE all_kegiatan_id = $id AND kriteria_id = $kriteria_id";
            $this->db->query($query);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Nilai changed!</div>');
    }

    public function pilihmitra()
    {
        $data['title'] = 'Pilih Mitra';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $sql = "SELECT DISTINCT mitra.* FROM mitra JOIN all_kegiatan ON mitra.ID_mitra = all_kegiatan.ID_mitra ";
        $data['mitra'] = $this->db->query($sql)->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('penilaian/cetak-pilih-mitra', $data);
        $this->load->view('template/footer');
    }

    public function pilihkegiatan($ID_mitra)
    {
        $data['title'] = 'Pilih Kegiatan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $sql = "SELECT all_kegiatan.*, kegiatan.* FROM all_kegiatan INNER JOIN kegiatan ON all_kegiatan.kegiatan_id = kegiatan.id WHERE all_kegiatan.ID_mitra = $ID_mitra";

        $data['kegiatan'] = $this->db->query($sql)->result_array();

        $data['id_mitra'] = $this->db->get_where('mitra', ['ID_mitra' => $ID_mitra])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('penilaian/cetak-pilih-kegiatan', $data);
        $this->load->view('template/footer');
    }

    public function download($ID_mitra, $id)
    {

        $sqlkegiatan = "SELECT * FROM kegiatan WHERE id = $id";
        $kegiatan = $this->db->query($sqlkegiatan)->row_array();
        // var_dump($all_penilaian);
        // die;
        $namamitra = $this->db->get_where('mitra', ['ID_mitra' => $ID_mitra])->row_array();

        $pdf = new FPDF('L', 'mm', 'Letter');

        $pdf->AddPage();

        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 7, 'Hasil Penilaian Mitra', 0, 1, 'C');
        $pdf->Cell(10, 7, '', 0, 1);
        $pdf->Cell(10, 7, 'Nama         :' . ' ' . $namamitra['nama_lengkap'], 0, 1, 'L');
        $pdf->Cell(10, 7, 'Kegiatan    :' . ' ' . $kegiatan['nama'], 0, 1, 'L');

        $pdf->Cell(10, 7, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(50, 6, 'Kriteria', 1, 0, 'C');
        $pdf->Cell(50, 6, 'Nilai', 1, 1, 'C');

        $pdf->SetFont('Arial', '', 10);


        $sqlallkegiatan = "SELECT id FROM all_kegiatan WHERE ID_mitra = $ID_mitra AND kegiatan_id = $id";
        $all_kegiatan_id = IMPLODE($this->db->query($sqlallkegiatan)->row_array());

        $sqlallpenilaian = "SELECT all_penilaian.*, kriteria.nama as  kriterianama, subkriteria.nama as subkriterianama FROM all_penilaian LEFT JOIN kriteria ON all_penilaian.kriteria_id = kriteria.id LEFT JOIN subkriteria ON all_penilaian.nilai = subkriteria.id  WHERE all_penilaian.all_kegiatan_id = $all_kegiatan_id";

        $all_penilaian = $this->db->query($sqlallpenilaian)->result_array();

        foreach ($all_penilaian as $data) {

            $pdf->Cell(50, 6, $data['kriterianama'], 1, 0);
            $pdf->Cell(50, 6, $data['subkriterianama'], 1, 1);
        }
        $pdf->Output();
    }
}
