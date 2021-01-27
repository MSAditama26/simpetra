<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Master_model');
    }

    public function index()
    {
        $data['title'] = 'Master';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('master/index', $data);
        $this->load->view('template/footer');
    }

    public function mitra()
    {
        $data['title'] = 'Data Mitra';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('master/mitra', $data);
        $this->load->view('template/footer');
    }
}
