<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penilaian_model extends CI_Model
{
    function getRapat()
    {
        $this->db->select('*');
        $this->db->where('id_pencacah', $this->session->userdata('email'));
        $this->db->from('all_survei');
        $this->db->order_by('start', 'asc');
        $this->db->order_by('finish', 'asc');
        $query = $this->db->get()->result();
        $j = 0;
        $input = array();

        for ($i = 0; $i < count($query); $i++) {
            $r[$i] = new DateTime($query[$i]->finish);
            $newdate[$i] = $r[$i]->format('Y-m-d');
            if ($newdate[$i] >= date('Y-m-d', time())) {
                $input[$j] = $query[$i];
                $j++;
            }
        }

        setlocale(LC_ALL, 'id_ID');
        for ($i = 0; $i < count($input); $i++) {
            $input[$i]->start = strftime("%A, %d %B %Y", strtotime($input[$i]->start));
            $input[$i]->finish = strftime("%A, %d %B %Y", strtotime($input[$i]->selesai));
        }

        return $input;
    }
}
