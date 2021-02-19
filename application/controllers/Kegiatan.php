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

    function tambah_pencacah($id)
    {
        $data['title'] = 'Tambah Pencacah';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $sqlpencacah = "SELECT * FROM mitra GROUP BY ID_mitra";
        $data['pencacah'] = $this->db->query($sqlpencacah)->result_array();

        $sqlkuota = "SELECT count(kegiatan_id) as kegiatan_id FROM all_kegiatan WHERE kegiatan_id = $id";
        $data['kuota'] = $this->db->query($sqlkuota)->row_array();


        $data['kegiatan'] = $this->db->get_where('kegiatan', ['id' => $id])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('kegiatan/tambah-pencacah', $data);
        $this->load->view('template/footer');
    }

    function details_kegiatan_mitra($ID_mitra)
    {
        $data['title'] = 'Details Kegiatan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $sql = "SELECT all_kegiatan.*, kegiatan.* FROM all_kegiatan INNER JOIN kegiatan ON all_kegiatan.kegiatan_id = kegiatan.id WHERE all_kegiatan.ID_mitra = $ID_mitra";

        $data['details'] = $this->db->query($sql)->result_array();
        $data['id_mitra'] = $this->db->get_where('mitra', ['ID_mitra' => $ID_mitra])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('kegiatan/details-kegiatan-mitra', $data);
        $this->load->view('template/footer');
    }

    public function changepencacah()
    {
        $kegiatan_id = $this->input->post('kegiatanId');
        $ID_mitra = $this->input->post('mitraId');

        $kuota = $this->db->get_where('kegiatan', ['id' => $kegiatan_id])->row_array();
        $intkuota = (int) $kuota['k_pencacah'];


        $cek_kuota = $this->db->get_where('all_kegiatan', ['kegiatan_id' => $kegiatan_id])->num_rows();

        $data = [
            'kegiatan_id' => $kegiatan_id,
            'ID_mitra' => $ID_mitra
        ];


        $result = $this->db->get_where('all_kegiatan', $data);

        if ($result->num_rows() < 1) {
            if ($cek_kuota < $intkuota) {
                $this->db->insert('all_kegiatan', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pencacah changed!</div>');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kuota penuh!</div>');
            }
        } else {
            $this->db->delete('all_kegiatan', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pencacah changed!</div>');
        }
    }

    function tambah_pengawas($id)
    {
        $data['title'] = 'Tambah Pengawas';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $sqlpengawas = "SELECT * FROM user WHERE role_id = 4 ";
        $data['pengawas'] = $this->db->query($sqlpengawas)->result_array();

        $sqlkuota = "SELECT count(kegiatan_id) as kegiatan_id FROM all_kegiatan_pengawas WHERE kegiatan_id = $id";
        $data['kuota'] = $this->db->query($sqlkuota)->row_array();

        $data['kegiatan'] = $this->db->get_where('kegiatan', ['id' => $id])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('kegiatan/tambah-pengawas', $data);
        $this->load->view('template/footer');
    }

    public function changepengawas()
    {
        $kegiatan_id = $this->input->post('kegiatanId');
        $id = $this->input->post('id');

        $kuota = $this->db->get_where('kegiatan', ['id' => $kegiatan_id])->row_array();
        $intkuota = (int) $kuota['k_pengawas'];


        $cek_kuota = $this->db->get_where('all_kegiatan_pengawas', ['kegiatan_id' => $kegiatan_id])->num_rows();

        $data = [
            'kegiatan_id' => $kegiatan_id,
            'id' => $id
        ];


        $result = $this->db->get_where('all_kegiatan_pengawas', $data);

        if ($result->num_rows() < 1) {
            if ($cek_kuota < $intkuota) {
                $this->db->insert('all_kegiatan_pengawas', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pengawas changed!</div>');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kuota penuh!</div>');
            }
        } else {
            $this->db->delete('all_kegiatan_pengawas', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pengawas changed!</div>');
        }
    }

    function details_kegiatan_pengawas($id)
    {
        $data['title'] = 'Details Kegiatan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $sql = "SELECT all_kegiatan_pengawas.*, kegiatan.* FROM all_kegiatan_pengawas INNER JOIN kegiatan ON all_kegiatan_pengawas.kegiatan_id = kegiatan.id WHERE all_kegiatan_pengawas.id = $id";
        $data['details'] = $this->db->query($sql)->result_array();
        $data['pengawas'] = $this->db->get_where('user', ['id' => $id])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('kegiatan/details-kegiatan-pengawas', $data);
        $this->load->view('template/footer');
    }
}
