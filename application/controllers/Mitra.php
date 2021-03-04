<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mitra extends CI_Controller
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
        $data['title'] = "MITRA";

        $this->db->from('tb_mitra');
        $this->db->where('is_active_m', 1);
        $this->db->order_by('id_mitra', 'DESC');
        $data['mitra'] = $this->db->get()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('mitra/index', $data);
        $this->load->view('templates/footer');
    }

    public function addMitra()
    {
        $data = [
            'mitra_name' => htmlspecialchars($this->input->post('mitra_name', true)),
            'alias_name_m' => htmlspecialchars($this->input->post('alias_name_m', true)),
            'address_m' => htmlspecialchars($this->input->post('address_m', true)),
            'npwp_mitra' => htmlspecialchars($this->input->post('npwp_mitra', true)),
            'norek_mitra' => htmlspecialchars($this->input->post('norek_mitra', true)),
            'an_rek_m' => htmlspecialchars($this->input->post('an_rek_m', true)),
            'bank_name_m' => htmlspecialchars($this->input->post('bank_name_m', true)),
            'ttd_m' => htmlspecialchars($this->input->post('ttd_m', true)),
            'is_active_m' => 1,
            'date_created_m' => date("Y-m-d")
        ];
        $this->db->insert('tb_mitra', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Mitra added!</div>');
        redirect('Mitra');
    }

    public function editMitra()
    {
        $data = [
            'id_mitra' => htmlspecialchars($this->input->post('id_mitra', true)),
            'mitra_name' => htmlspecialchars($this->input->post('mitra_name', true)),
            'alias_name_m' => htmlspecialchars($this->input->post('alias_name_m', true)),
            'address_m' => htmlspecialchars($this->input->post('address_m', true)),
            'npwp_mitra' => htmlspecialchars($this->input->post('npwp_mitra', true)),
            'norek_mitra' => htmlspecialchars($this->input->post('norek_mitra', true)),
            'an_rek_m' => htmlspecialchars($this->input->post('an_rek_m', true)),
            'bank_name_m' => htmlspecialchars($this->input->post('bank_name_m', true)),
            'ttd_m' => htmlspecialchars($this->input->post('ttd_m', true)),
        ];
        $this->db->set('mitra_name', $data['mitra_name']);
        $this->db->set('alias_name_m', $data['alias_name_m']);
        $this->db->set('address_m', $data['address_m']);
        $this->db->set('npwp_mitra', $data['npwp_mitra']);
        $this->db->set('norek_mitra', $data['norek_mitra']);
        $this->db->set('an_rek_m', $data['an_rek_m']);
        $this->db->set('bank_name_m', $data['bank_name_m']);
        $this->db->set('ttd_m', $data['ttd_m']);
        $this->db->where('id_mitra', $data['id_mitra']);
        $this->db->update('tb_mitra');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Mitra has been updated successfully!</div>');
        redirect('Mitra');
    }

    public function deleteMitra($id_mitra)
    {
        $this->db->set('is_active_m', 0);
        $this->db->where('id_mitra', $id_mitra);
        $this->db->update('tb_mitra');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Mitra has been Deleted successfully!</div>');
        redirect('Mitra');
    }
}