<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        // menjalankan method ketika class Auth dijalankan
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('Auth');
        }
    }
    
    public function index()
    {
        $data['title'] = "Dashboard";

        $this->db->from('tb_ltc');
        $this->db->where('is_active_ltc', 1);
        $data['ltc'] = $this->db->count_all_results();

        $this->db->from('tb_stc');
        $this->db->where('stc_status', 1);
        $data['stc'] = $this->db->count_all_results();

        $this->db->from('tb_spot');
        $this->db->where('is_active_spot', 1);
        $data['spot'] = $this->db->count_all_results();

        $this->db->from('tb_invoice');
        $this->db->where('status', 1);
        $data['invoice'] = $this->db->count_all_results();

        $this->db->from('tb_product');
        $data['product'] = $this->db->count_all_results();

        $this->db->from('tb_company');
        $this->db->where('is_active_c', 1);
        $data['company'] = $this->db->count_all_results();

        $this->db->from('tb_mitra');
        $this->db->where('is_active_m', 1);
        $data['mitra'] = $this->db->count_all_results();
 
        $this->db->select('tb_ltc.ltc_date,tb_ltc.ltc_number,tb_ltc.initial_quantity, tb_ltc.quantity, COUNT(tb_stc.id_ltc) AS total');
        $this->db->from('tb_stc');
        $this->db->join('tb_ltc', 'tb_ltc.id_ltc = tb_stc.id_ltc');
        $this->db->group_by('tb_stc.id_ltc');
        $data['count_stc'] = $this->db->get()->result_array();
        // var_dump($data['count_stc']);
        // die;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/index', $data);
        $this->load->view('templates/footer');
    }
}