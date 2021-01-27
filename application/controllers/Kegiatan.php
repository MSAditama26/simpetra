<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Kegiatan_model');
    }

    public function index()
    {
        $data['title'] = 'Kegiatan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('kegiatan/index', $data);
        $this->load->view('template/footer');
    }

    public function survei()
    {
        $data['title'] = 'Survei';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['survei'] = $this->db->get('kegiatan')->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('kegiatan/survei', $data);
        $this->load->view('template/footer');
    }

    public function sensus()
    {
        $data['title'] = 'Sensus';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['sensus'] = $this->db->get('kegiatan')->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('kegiatan/sensus', $data);
        $this->load->view('template/footer');
    }

    function deletesurvei($id)
    {
        $this->Kegiatan_model->deletesurvei($id);
        redirect('kegiatan/survei');
    }

    function deletesensus($id)
    {
        $this->Kegiatan_model->deletesensus($id);
        redirect('kegiatan/sensus');
    }
}
