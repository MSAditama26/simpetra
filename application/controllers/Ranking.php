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
        $data['kriteria'] = $this->db->get('kriteria')->result_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('bobot', 'Bobot', 'required|trim');
        $this->form_validation->set_rules('type', 'Type', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('ranking/kriteria', $data);
            $this->load->view('template/footer');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'bobot' => $this->input->post('bobot'),
                'type' => $this->input->post('type')
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

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('bobot', 'Bobot', 'required|trim');
        $this->form_validation->set_rules('type', 'Type', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('ranking/edit-kriteria', $data);
            $this->load->view('template/footer');
        } else {


            $nama = $this->input->post('nama');
            $bobot = $this->input->post('bobot');
            $type = $this->input->post('type');

            $this->db->set('nama', $nama);
            $this->db->set('bobot', $bobot);
            $this->db->set('type', $type);
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

    function hitung($id)
    {
        $data['title'] = 'Perhitungan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $sql_norm_bobot = "SELECT * FROM kriteria";
        $data['norm_bobot'] = $this->db->query($sql_norm_bobot)->result_array();

        $sql_jumlah_bobot = "SELECT sum(bobot) as sumbobot FROM kriteria";
        $data['sumbobot'] = implode($this->db->query($sql_jumlah_bobot)->row_array());

        $sql_all_penilaian = "SELECT id FROM all_kegiatan WHERE kegiatan_id = $id";
        $all_penilaian = $this->db->query($sql_all_penilaian)->result_array();

        // var_dump($data['sumbobot']);
        // die;


        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('ranking/perhitungan', $data);
        $this->load->view('template/footer');
    }
}
