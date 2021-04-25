<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in_user();
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

        $seksi_id = $data['user']['seksi_id'];
        $queryKegiatan = "SELECT * FROM kegiatan WHERE jenis_kegiatan = 1 AND (seksi_id = $seksi_id OR seksi_id = 0)";
        $role_id = $data['user']['role_id'];

        if ($role_id == 1) {
            $data['survei'] = $this->db->get_where('kegiatan', ['jenis_kegiatan' => 1])->result_array();
        } else {
            $data['survei'] = $this->db->query($queryKegiatan)->result_array();
        }

        $data['seksi'] = $this->db->get('seksi')->result_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('start', 'Start', 'required|trim');
        $this->form_validation->set_rules('finish', 'Finish', 'required|trim');
        $this->form_validation->set_rules('k_pengawas', 'Kuota Pengawas', 'required|trim');
        $this->form_validation->set_rules('k_pencacah', 'Kuota Pencacah', 'required|trim');
        $this->form_validation->set_rules('ob', 'OB', 'required|trim');

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
                'jenis_kegiatan' => '1',
                'seksi_id' => $seksi_id,
                'ob' => $this->input->post('ob')
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
        $this->form_validation->set_rules('ob', 'OB', 'required|trim');

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
                'jenis_kegiatan' => '2',
                'ob' => $this->input->post('ob')
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
        $this->form_validation->set_rules('k_pencacah', 'Kuota Pencacah');

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
                'ob' => $this->input->post('ob')
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
                'ob' => $this->input->post('ob')
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
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Survei has been deleted!</div>');
        redirect('kegiatan/survei');
    }

    function deletesensus($id)
    {
        $this->Kegiatan_model->deletesensus($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Sensus has been deleted!</div>');
        redirect('kegiatan/sensus');
    }

    function tambah_pencacah($id)
    {
        $data['title'] = 'Tambah Pencacah';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $sql_waktu = "SELECT kegiatan.start, kegiatan.finish FROM kegiatan WHERE kegiatan.id = $id";
        $waktu = $this->db->query($sql_waktu)->row();

        $sql_bentuk_kegiatan = "SELECT kegiatan.ob FROM kegiatan WHERE kegiatan.id = $id";
        $bentuk_kegiatan = implode($this->db->query($sql_bentuk_kegiatan)->row_array());

        if ($bentuk_kegiatan == 1) {
            //jika $id kegiatan ob
            $sql_id_kegiatan = "SELECT kegiatan.id FROM kegiatan WHERE ((kegiatan.start < $waktu->start AND kegiatan.finish < $waktu->start) OR (kegiatan.start > $waktu->finish AND kegiatan.finish > $waktu->finish)) AND kegiatan.id != $id  ";

            $sql_id_mitra = "SELECT mitra.id_mitra FROM mitra JOIN all_kegiatan ON all_kegiatan.id_mitra = mitra.id_mitra WHERE all_kegiatan.kegiatan_id NOT IN ($sql_id_kegiatan) AND mitra.is_active GROUP BY mitra.id_mitra ";

            $sql_pencacah = "SELECT mitra.* FROM mitra WHERE (mitra.id_mitra NOT IN ($sql_id_mitra)) AND mitra.is_active = 1 ";
        } else {
            //jika $id kegiatan non ob
            $sql_id_kegiatan = "SELECT kegiatan.id FROM kegiatan WHERE ((((kegiatan.start < $waktu->start AND kegiatan.finish < $waktu->start) OR (kegiatan.start > $waktu->finish AND kegiatan.finish > $waktu->finish)) AND kegiatan.ob = 1) OR kegiatan.ob != 1) AND kegiatan.id != $id  ";

            $sql_id_mitra = "SELECT mitra.id_mitra FROM mitra JOIN all_kegiatan ON all_kegiatan.id_mitra = mitra.id_mitra WHERE all_kegiatan.kegiatan_id NOT IN ($sql_id_kegiatan) AND mitra.is_active GROUP BY mitra.id_mitra ";

            $sql_pencacah = "SELECT mitra.* FROM mitra WHERE (mitra.id_mitra NOT IN ($sql_id_mitra)) AND mitra.is_active = 1 ";
        }

        $data['pencacah'] = $this->db->query($sql_pencacah)->result_array();

        $sqlkuota = "SELECT count(kegiatan_id) as kegiatan_id FROM all_kegiatan WHERE kegiatan_id = $id";
        $data['kuota'] = $this->db->query($sqlkuota)->row_array();


        $data['kegiatan'] = $this->db->get_where('kegiatan', ['id' => $id])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('kegiatan/tambah-pencacah', $data);
        $this->load->view('template/footer');
    }

    function mitraterpilih($id)
    {
        $data['title'] = 'Mitra Terpilih';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $sqlpencacah = "SELECT mitra.* FROM all_kegiatan JOIN mitra ON all_kegiatan.id_mitra = mitra.id_mitra WHERE all_kegiatan.kegiatan_id = $id";
        $data['pencacah'] = $this->db->query($sqlpencacah)->result_array();

        $sqlkuota = "SELECT count(kegiatan_id) as kegiatan_id FROM all_kegiatan WHERE kegiatan_id = $id";
        $data['kuota'] = $this->db->query($sqlkuota)->row_array();

        $data['kegiatan'] = $this->db->get_where('kegiatan', ['id' => $id])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('kegiatan/mitra-terpilih', $data);
        $this->load->view('template/footer');
    }

    function details_kegiatan_mitra($kegiatan_id, $id_mitra)
    {
        $data['title'] = 'Details Kegiatan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $now = time();

        $sql = "SELECT all_kegiatan.*, kegiatan.* FROM all_kegiatan INNER JOIN kegiatan ON all_kegiatan.kegiatan_id = kegiatan.id WHERE all_kegiatan.id_mitra = $id_mitra AND ((start <= $now AND finish >= $now) OR (start > $now))";

        $data['details'] = $this->db->query($sql)->result_array();
        $jumlahkegiatan = count($data['details']);

        if ($jumlahkegiatan > 0) {

            $data['id_mitra'] = $this->db->get_where('mitra', ['id_mitra' => $id_mitra])->row_array();

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('kegiatan/details-kegiatan-mitra', $data);
            $this->load->view('template/footer');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Mitra belum mengikuti kegiatan</div>');
            redirect('kegiatan/tambah_pencacah/' . $kegiatan_id);
        }
    }

    function details_mitra_kegiatan($id_mitra)
    {
        $data['title'] = 'Details Kegiatan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $sql = "SELECT kegiatan.* FROM all_kegiatan INNER JOIN kegiatan ON all_kegiatan.kegiatan_id = kegiatan.id WHERE all_kegiatan.id_mitra = $id_mitra";

        $data['id_mitra'] = $id_mitra;

        $data['details'] = $this->db->query($sql)->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('kegiatan/details-mitra-kegiatan', $data);
        $this->load->view('template/footer');
    }

    function details_nilai_perkegiatan($id_mitra, $kegiatan_id)
    {
        $data['title'] = 'Details Nilai Per Kegiatan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['id_mitra'] = $id_mitra;
        $data['kegiatan'] = $this->db->get_where('kegiatan', ['id' => $kegiatan_id])->row_array();
        $data['kriteria'] = $this->db->get('kriteria')->result_array();

        $sqlnilai = "SELECT all_penilaian.*, kriteria.nama FROM all_penilaian LEFT JOIN kriteria ON all_penilaian.kriteria_id = kriteria.id  WHERE kegiatan_id = $kegiatan_id AND id_mitra = $id_mitra";
        $data['nilai'] = $this->db->query($sqlnilai)->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('kegiatan/details-nilai-perkegiatan', $data);
        $this->load->view('template/footer');
    }

    public function changepencacah()
    {
        $kegiatan_id = $this->input->post('kegiatanId');
        $id_mitra = $this->input->post('mitraId');

        $kuota = $this->db->get_where('kegiatan', ['id' => $kegiatan_id])->row_array();
        $intkuota = (int) $kuota['k_pencacah'];


        $cek_kuota = $this->db->get_where('all_kegiatan', ['kegiatan_id' => $kegiatan_id])->num_rows();

        $data = [
            'kegiatan_id' => $kegiatan_id,
            'id_mitra' => $id_mitra
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

        $sqlpengawas = "SELECT * FROM pegawai";
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
        $nip = $this->input->post('nip');

        $kuota = $this->db->get_where('kegiatan', ['id' => $kegiatan_id])->row_array();
        $intkuota = (int) $kuota['k_pengawas'];


        $cek_kuota = $this->db->get_where('all_kegiatan_pengawas', ['kegiatan_id' => $kegiatan_id])->num_rows();

        $data = [
            'kegiatan_id' => $kegiatan_id,
            'id_pengawas' => $nip
        ];

        $result = $this->db->get_where('all_kegiatan_pengawas', $data);

        if ($result->num_rows() < 1) {
            if ($cek_kuota < $intkuota) {
                $this->db->insert('all_kegiatan_pengawas', $data);
                redirect('kegiatan/tambah_pengawas_ke_user/' . $nip);
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kuota penuh!</div>');
            }
        } else {
            $this->db->delete('all_kegiatan_pengawas', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pengawas changed!</div>');
        }
    }

    function tambah_pengawas_ke_user($nip)
    {
        $sqlnamapegawai = "SELECT nama FROM pegawai WHERE nip = $nip";
        $namapegawai = implode($this->db->query($sqlnamapegawai)->row_array());


        $sqlcekpegawai = "SELECT * FROM user WHERE nama = '$namapegawai' AND role_id = 4";
        $cekpegawai = $this->db->query($sqlcekpegawai);

        $pegawai = $this->db->get_where('pegawai', ['nip' => $nip])->row_array();

        $data2 = [
            'nama' => $pegawai['nama'],
            'email' => $pegawai['email'],
            'role_id' => '4',
            'date_created' => time()
        ];

        if ($cekpegawai->num_rows() < 1) {
            $this->db->insert('user', $data2);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pengawas changed!</div>');
    }

    function details_kegiatan_pengawas($id)
    {
        $data['title'] = 'Details Kegiatan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $sql = "SELECT all_kegiatan_pengawas.*, kegiatan.* FROM all_kegiatan_pengawas INNER JOIN kegiatan ON all_kegiatan_pengawas.kegiatan_id = kegiatan.id WHERE all_kegiatan_pengawas.id_pengawas = $id";
        $data['details'] = $this->db->query($sql)->result_array();
        $data['pengawas'] = $this->db->get_where('pegawai', ['nip' => $id])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('kegiatan/details-kegiatan-pengawas', $data);
        $this->load->view('template/footer');
    }
}
