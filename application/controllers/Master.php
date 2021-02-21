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
        $data['mitra'] = $this->db->get('mitra')->result_array();

        $this->form_validation->set_rules('ID_mitra', 'ID Mitra');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('nama_panggilan', 'Nama Panggilan', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat');
        $this->form_validation->set_rules('no_hp', 'No. HP', 'required');
        $this->form_validation->set_rules('no_wa', 'No. Whatsaap', 'required');
        $this->form_validation->set_rules('no_tsel', 'No. Telkomsel', 'required');
        $this->form_validation->set_rules('pekerjaan_utama', 'Pekerjaan Utama');
        $this->form_validation->set_rules('kompetensi', 'Kompetensi');
        $this->form_validation->set_rules('bahasa', 'Bahasa', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('master/mitra', $data);
            $this->load->view('template/footer');
        } else {
            $data = [
                'ID_mitra' => $this->input->post('ID_mitra'),
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'nama_panggilan' => $this->input->post('nama_panggilan'),
                'email' => $this->input->post('email'),
                'alamat' => $this->input->post('alamat'),
                'no_hp' => $this->input->post('no_hp'),
                'no_wa' => $this->input->post('no_wa'),
                'no_tsel' => $this->input->post('no_tsel'),
                'pekerjaan_utama' => $this->input->post('pekerjaan_utama'),
                'kompetensi' => $this->input->post('kompetensi'),
                'bahasa' => $this->input->post('bahasa')
            ];

            $data2 = [
                'name' => $this->input->post('nama_lengkap'),
                'email' => $this->input->post('email'),
                'image' => 'default.jpg',
                'role_id' => '5',
                'is_active' => '1',
                'date_created' => time()

            ];
            $this->db->insert('mitra', $data);
            $this->db->insert('user', $data2);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New mitra added!</div>');
            redirect('master/mitra');
        }
    }

    public function details_mitra($id)
    {
        $data['title'] = 'Details Mitra';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $sql = "SELECT mitra.*, avg(nilai.nilai) as nilai  FROM mitra LEFT JOIN nilai ON mitra.ID_mitra = nilai.ID_mitra WHERE mitra.id = $id GROUP BY ID_mitra";
        $data['mitra'] = $this->db->query($sql)->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('master/details-mitra', $data);
        $this->load->view('template/footer');
    }

    function deletemitra($ID_mitra)
    {

        $query = "SELECT email FROM mitra WHERE ID_mitra = $ID_mitra";
        $email = IMPLODE($this->db->query($query)->row_array());
        $this->Master_model->deletemitrafromuser($email);

        $this->Master_model->deletemitra($ID_mitra);

        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Mitra has been deleted!</div>');
        redirect('master/mitra');
    }

    public function kriteria()
    {
        $data['title'] = 'Data Kriteria';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kriteria'] = $this->db->get('kriteria')->result_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('bobot', 'Bobot', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('master/kriteria', $data);
            $this->load->view('template/footer');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'bobot' => $this->input->post('bobot')
            ];


            $this->db->insert('kriteria', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New kriteria added!</div>');
            redirect('master/kriteria');
        }
    }

    public function editkriteria($id)
    {
        $data['title'] = 'Edit Kriteria';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kriteria'] = $this->db->get_where('kriteria', ['id' => $id])->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('bobot', 'Bobot', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('master/edit-kriteria', $data);
            $this->load->view('template/footer');
        } else {


            $nama = $this->input->post('nama');
            $bobot = $this->input->post('bobot');

            $this->db->set('nama', $nama);
            $this->db->set('bobot', $bobot);
            $this->db->where('id', $id);
            $this->db->update('kriteria');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kriteria has been updated!</div>');
            redirect('master/kriteria');
        }
    }

    function deletekriteria($id)
    {
        $this->Master_model->deletekriteria($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kriteria has been deleted!</div>');
        redirect('master/kriteria');
    }
}
