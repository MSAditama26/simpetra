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

        $this->form_validation->set_rules('id_mitra', 'ID Mitra', 'required|trim');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('nama_panggilan', 'Nama Panggilan', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('no_hp', 'No. HP', 'required|trim');
        $this->form_validation->set_rules('no_wa', 'No. Whatsaap', 'required|trim');
        $this->form_validation->set_rules('no_tsel', 'No. Telkomsel', 'required|trim');
        $this->form_validation->set_rules('pekerjaan_utama', 'Pekerjaan Utama', 'required|trim');
        $this->form_validation->set_rules('kompetensi', 'Kompetensi', 'required|trim');
        $this->form_validation->set_rules('bahasa', 'Bahasa', 'required|trim');


        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('master/mitra', $data);
            $this->load->view('template/footer');
        } else {
            $data = [
                'id_mitra' => $this->input->post('id_mitra'),
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
                'nama' => $this->input->post('nama_lengkap'),
                'email' => $this->input->post('email'),
                'role_id' => '5',
                'date_created' => time()

            ];
            $this->db->insert('mitra', $data);
            $this->db->insert('user', $data2);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New mitra added!</div>');
            redirect('master/mitra');
        }
    }

    public function details_mitra($id_mitra)
    {
        $data['title'] = 'Details Mitra';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['mitra'] = $this->db->get_where('mitra', ['id_mitra' => $id_mitra])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('master/details-mitra', $data);
        $this->load->view('template/footer');
    }

    public function editmitra($id_mitra)
    {
        $data['title'] = 'Edit Pegawai';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['mitra'] = $this->db->get_where('mitra', ['id_mitra' => $id_mitra])->row_array();

        $this->form_validation->set_rules('id_mitra', 'ID Mitra', 'required|trim');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('nama_panggilan', 'Nama Panggilan', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('no_hp', 'No. HP', 'required|trim');
        $this->form_validation->set_rules('no_wa', 'No. Whatsaap', 'required|trim');
        $this->form_validation->set_rules('no_tsel', 'No. Telkomsel', 'required|trim');
        $this->form_validation->set_rules('pekerjaan_utama', 'Pekerjaan Utama', 'required|trim');
        $this->form_validation->set_rules('kompetensi', 'Kompetensi', 'required|trim');
        $this->form_validation->set_rules('bahasa', 'Bahasa', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('master/edit-mitra', $data);
            $this->load->view('template/footer');
        } else {
            $data = [
                'id_mitra' => $this->input->post('id_mitra'),
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

            $this->db->set($data);
            $this->db->where('id_mitra', $id_mitra);
            $this->db->update('mitra');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Mitra has been updated!</div>');
            redirect('master/mitra');
        }
    }

    function details_kegiatan_mitra($id_mitra)
    {
        $data['title'] = 'Details Kegiatan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $sql = "SELECT all_kegiatan.*, kegiatan.* FROM all_kegiatan INNER JOIN kegiatan ON all_kegiatan.kegiatan_id = kegiatan.id WHERE all_kegiatan.id_mitra = $id_mitra";

        $data['details'] = $this->db->query($sql)->result_array();
        $data['id_mitra'] = $id_mitra;

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('master/details-kegiatan-mitra', $data);
        $this->load->view('template/footer');
    }

    function deletemitra($id_mitra)
    {

        $query = "SELECT email FROM mitra WHERE id_mitra = $id_mitra";
        $email = IMPLODE($this->db->query($query)->row_array());
        $this->Master_model->deletemitrafromuser($email);

        $this->Master_model->deletemitra($id_mitra);

        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Mitra has been deleted!</div>');
        redirect('master/mitra');
    }

    public function deactivated($id_mitra)
    {
        $this->Master_model->deactivated($id_mitra);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Mitra has been deactivated!</div>');
        redirect('master/mitra');
    }

    public function activated($id_mitra)
    {
        $this->Master_model->activated($id_mitra);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Mitra has been activated!</div>');
        redirect('master/mitra');
    }

    public function pegawai()
    {
        $data['title'] = 'Data Pegawai';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pegawai'] = $this->db->get('pegawai')->result_array();

        $this->form_validation->set_rules('nip', 'NIP', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('master/pegawai', $data);
            $this->load->view('template/footer');
        } else {
            $data = [
                'nip' => $this->input->post('nip'),
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'jabatan' => $this->input->post('jabatan')
            ];

            $this->db->insert('pegawai', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New pegawai added!</div>');
            redirect('master/pegawai');
        }
    }

    public function editpegawai($nip)
    {
        $data['title'] = 'Edit Pegawai';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pegawai'] = $this->db->get_where('pegawai', ['nip' => $nip])->row_array();

        $this->form_validation->set_rules('nip', 'NIP', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('master/edit-pegawai', $data);
            $this->load->view('template/footer');
        } else {
            $data = [
                'nip' => $this->input->post('nip'),
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'jabatan' => $this->input->post('jabatan')
            ];

            $this->db->set($data);
            $this->db->where('nip', $nip);
            $this->db->update('pegawai');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pegawai has been updated!</div>');
            redirect('master/pegawai');
        }
    }

    function deletepegawai($nip)
    {
        $this->Master_model->deletepegawai($nip);

        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Pegawai has been deleted!</div>');
        redirect('master/pegawai');
    }
}
