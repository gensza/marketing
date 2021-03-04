<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Adendum extends CI_Controller
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
        $data['title'] = "ADENDUM";

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('adendum/index', $data);
        $this->load->view('templates/footer');
    }
}