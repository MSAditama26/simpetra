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
        $data['title'] = 'Isi Penilaian';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('penilaian/isi', $data);
        $this->load->view('template/footer');
    }

    public function getSurveiTerkini()
    {
        $survei = $this->penilaian_model->getSurvei();
        echo json_encode($survei);
    }
}
