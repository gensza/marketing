<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Company extends CI_Controller
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
        $data['title'] = "Company";

        $this->db->from('tb_company');
        $this->db->where('is_active_c', 1);
        $this->db->order_by('id_company', 'DESC');
        $data['company'] = $this->db->get()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('company/index', $data);
        $this->load->view('templates/footer');
    }

    public function addCompany()
    {
        $data = [
            'company_name' => htmlspecialchars($this->input->post('company_name', true)),
            'alias_name_c' => htmlspecialchars($this->input->post('alias_name_c', true)),
            'address_c' => htmlspecialchars($this->input->post('address_c', true)),
            'npwp_company' => htmlspecialchars($this->input->post('npwp_company', true)),
            'norek_company' => htmlspecialchars($this->input->post('norek_company', true)),
            'an_rek_c' => htmlspecialchars($this->input->post('an_rek_c', true)),
            'bank_name_c' => htmlspecialchars($this->input->post('bank_name_c', true)),
            'ttd_c' => htmlspecialchars($this->input->post('ttd_c', true)),
            'is_active_c' => 1,
            'date_created_c' => date("Y-m-d")
        ];
        $this->db->insert('tb_company', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Company added!</div>');
        redirect('Company');
    }

    public function editCompany()
    {
        $data = [
            'id_company' => htmlspecialchars($this->input->post('id_company', true)),
            'company_name' => htmlspecialchars($this->input->post('company_name', true)),
            'alias_name_c' => htmlspecialchars($this->input->post('alias_name_c', true)),
            'address_c' => htmlspecialchars($this->input->post('address_c', true)),
            'npwp_company' => htmlspecialchars($this->input->post('npwp_company', true)),
            'norek_company' => htmlspecialchars($this->input->post('norek_company', true)),
            'an_rek_c' => htmlspecialchars($this->input->post('an_rek_c', true)),
            'bank_name_c' => htmlspecialchars($this->input->post('bank_name_c', true)),
            'ttd_c' => htmlspecialchars($this->input->post('ttd_c', true)),
        ];
        $this->db->set('company_name', $data['company_name']);
        $this->db->set('alias_name_c', $data['alias_name_c']);
        $this->db->set('address_c', $data['address_c']);
        $this->db->set('npwp_company', $data['npwp_company']);
        $this->db->set('norek_company', $data['norek_company']);
        $this->db->set('an_rek_c', $data['an_rek_c']);
        $this->db->set('bank_name_c', $data['bank_name_c']);
        $this->db->set('ttd_c', $data['ttd_c']);
        $this->db->where('id_company', $data['id_company']);
        $this->db->update('tb_company');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Company has been updated successfully!</div>');
        redirect('Company');
    }

    public function deleteCompany($id_company)
    {
        $this->db->set('is_active_c', 0);
        $this->db->where('id_company', $id_company);
        $this->db->update('tb_company');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Company has been Deleted successfully!</div>');
        redirect('Company');
    }
}