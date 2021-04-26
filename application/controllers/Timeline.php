<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Timeline extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Timeline_model');
    }

    public function index()
    {
        $data['title'] = 'Timeline';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $role_id = $data['user']['role_id'];
        $now = time();
        $nama = $data['user']['nama'];

        if ($role_id == 5) {

            $sql_id_mitra = "SELECT id_mitra FROM mitra WHERE nama_lengkap LIKE '$nama'";
            $id_mitra = implode($this->db->query($sql_id_mitra)->row_array());
            $sql_kegiatan = "SELECT kegiatan.* FROM kegiatan JOIN all_kegiatan ON all_kegiatan.kegiatan_id = kegiatan.id WHERE all_kegiatan.id_mitra = $id_mitra AND ((kegiatan.start <= $now AND kegiatan.finish >= $now) OR (kegiatan.start > $now)) ORDER BY kegiatan.start";
            $data['kegiatan'] = $this->db->query($sql_kegiatan)->result_array();
        } elseif ($role_id == 4) {
            $sql_nip = "SELECT nip FROM pegawai WHERE nama LIKE '$nama'";
            $nip = implode($this->db->query($sql_nip)->row_array());
            $sql_kegiatan = "SELECT kegiatan.* FROM kegiatan JOIN all_kegiatan_pengawas ON all_kegiatan_pengawas.kegiatan_id = kegiatan.id WHERE all_kegiatan_pengawas.id_pengawas = $nip AND ((kegiatan.start <= $now AND kegiatan.finish >= $now) OR (kegiatan.start > $now))ORDER BY kegiatan.start";
            $data['kegiatan'] = $this->db->query($sql_kegiatan)->result_array();
        } else {
            $seksi_id = $data['user']['seksi_id'];
            $sql_kegiatan = "SELECT * FROM kegiatan WHERE seksi_id = $seksi_id AND ((start <= $now AND finish >= $now) OR (start > $now)) ORDER BY kegiatan.start";
            $data['kegiatan'] = $this->db->query($sql_kegiatan)->result_array();
        }

        // var_dump($data['kegiatan']);
        // die;



        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('timeline/index', $data);
        $this->load->view('template/footer');
    }
}
