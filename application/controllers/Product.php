<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
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
        $data['title'] = "Product";

        $this->db->from('tb_product');
        $data['product'] = $this->db->get()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('product/index', $data);
        $this->load->view('templates/footer');
    }

    public function addProduct()
    {
        $data = [
            'product_name' => htmlspecialchars($this->input->post('product_name', true)),
            'date_created' => date("Y-m-d")
        ];

        $this->db->insert('tb_product', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Product added!</div>');
        redirect('Product');
    }

    public function editProduct()
    {
        $data = [
            'id_product' => htmlspecialchars($this->input->post('id_product', true)),
            'product_name' => htmlspecialchars($this->input->post('product_name', true))
        ];
        $this->db->set('product_name', $data['product_name']);
        $this->db->where('id_product', $data['id_product']);
        $this->db->update('tb_product');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Product has been updated successfully!</div>');
        redirect('Product');
    }
}