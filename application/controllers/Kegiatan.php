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

        $data['survei'] = $this->db->get_where('kegiatan', ['jenis_kegiatan' => '1'])->result_array();


        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('start', 'Start', 'required|trim');
        $this->form_validation->set_rules('finish', 'Finish', 'required|trim');
        $this->form_validation->set_rules('k_pengawas', 'Kuota Pengawas', 'required|trim');
        $this->form_validation->set_rules('k_pencacah', 'Kuota Pencacah', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('kegiatan/survei', $data);
            $this->load->view('template/footer');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'start' => strtotime($this->input->post('start')),
                'finish' => strtotime($this->input->post('finish')),
                'k_pengawas' => $this->input->post('k_pengawas'),
                'k_pencacah' => $this->input->post('k_pencacah'),
                'jenis_kegiatan' => '1'
            ];
            $this->db->insert('kegiatan', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New survei added!</div>');
            redirect('kegiatan/survei');
        }
    }

    public function sensus()
    {
        $data['title'] = 'Sensus';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['sensus'] = $this->db->get_where('kegiatan', ['jenis_kegiatan' => '2'])->result_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('start', 'Start', 'required|trim');
        $this->form_validation->set_rules('finish', 'Finish', 'required|trim');
        $this->form_validation->set_rules('k_pengawas', 'Kuota Pengawas', 'required|trim');
        $this->form_validation->set_rules('k_pencacah', 'Kuota Pencacah', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('kegiatan/sensus', $data);
            $this->load->view('template/footer');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'start' => strtotime($this->input->post('start')),
                'finish' => strtotime($this->input->post('finish')),
                'k_pengawas' => $this->input->post('k_pengawas'),
                'k_pencacah' => $this->input->post('k_pencacah'),
                'jenis_kegiatan' => '2'
            ];
            $this->db->insert('kegiatan', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New sensus added!</div>');
            redirect('kegiatan/sensus');
        }
    }

    public function editsurvei($id)
    {
        $data['title'] = 'Edit Survei';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['survei'] = $this->db->get_where('kegiatan', ['id' => $id])->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('start', 'Start', 'required|trim');
        $this->form_validation->set_rules('finish', 'Finish', 'required|trim');
        $this->form_validation->set_rules('k_pengawas', 'Kuota Pengawas', 'required|trim');
        $this->form_validation->set_rules('k_pencacah', 'Kuota Pencacah', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('kegiatan/edit-survei', $data);
            $this->load->view('template/footer');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'start' => strtotime($this->input->post('start')),
                'finish' => strtotime($this->input->post('finish')),
                'k_pengawas' => $this->input->post('k_pengawas'),
                'k_pencacah' => $this->input->post('k_pencacah'),
            ];

            $this->db->set($data);
            $this->db->where('id', $id);
            $this->db->update('kegiatan');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Survei has been updated!</div>');
            redirect('kegiatan/survei');
        }
    }

    public function editsensus($id)
    {
        $data['title'] = 'Edit Sensus';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sensus'] = $this->db->get_where('kegiatan', ['id' => $id])->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('start', 'Start', 'required|trim');
        $this->form_validation->set_rules('finish', 'Finish', 'required|trim');
        $this->form_validation->set_rules('k_pengawas', 'Kuota Pengawas', 'required|trim');
        $this->form_validation->set_rules('k_pencacah', 'Kuota Pencacah', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('kegiatan/edit-sensus', $data);
            $this->load->view('template/footer');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'start' => strtotime($this->input->post('start')),
                'finish' => strtotime($this->input->post('finish')),
                'k_pengawas' => $this->input->post('k_pengawas'),
                'k_pencacah' => $this->input->post('k_pencacah'),
            ];

            $this->db->set($data);
            $this->db->where('id', $id);
            $this->db->update('kegiatan');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Survei has been updated!</div>');
            redirect('kegiatan/sensus');
        }
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

    function tambah_pencacah_survei($id)
    {
        $data['title'] = 'Survei';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $sql = "SELECT id, nama, start, finish, k_pengawas, k_pencacah, jenis_kegiatan, ID_mitra, nama_lengkap, alamat, kompetensi, avg(nilai) as nilai  FROM all_survei GROUP BY ID_mitra ";
        $data['pencacah'] = $this->db->query($sql)->result_array();
        $data['kegiatan'] = $this->db->get_where('kegiatan', ['id' => $id])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('kegiatan/tambah-pencacah', $data);
        $this->load->view('template/footer');
    }
}
