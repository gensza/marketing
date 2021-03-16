<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Spot extends CI_Controller
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
        $data['title'] = "SPOT";
        $data['filtered'] = 'no filter detected ..';

        $data['company'] = $this->db->get_where('tb_company', ['is_active_c' => '1'])->result_array();
        $data['mitra'] = $this->db->get_where('tb_mitra', ['is_active_m' => '1'])->result_array();
        $data['produk'] = $this->db->get('tb_product')->result_array();

        if ($this->input->post('filter') == 0) {
            $this->db->select('*');
            $this->db->from('tb_spot');
            $this->db->join('tb_product', 'tb_product.id_product = tb_spot.id_product');
            $this->db->join('tb_company', 'tb_company.id_company = tb_spot.id_company');
            $this->db->join('tb_mitra', 'tb_mitra.id_mitra = tb_spot.id_mitra');
            $this->db->where('is_active_spot', 1);
            $this->db->order_by('id_spot', 'DESC');
            $data['spot'] = $this->db->get()->result_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('spot/index', $data);
            $this->load->view('templates/footer');
        } else {
            $id = $this->input->post('filter');
            $data['filter'] = $this->db->get_where('tb_company', ['id_company' => $id])->row_array();
            $data['filtered'] = $data['filter']['company_name'];

            $this->db->select('*');
            $this->db->from('tb_spot');
            $this->db->join('tb_product', 'tb_product.id_product = tb_spot.id_product');
            $this->db->join('tb_company', 'tb_company.id_company = tb_spot.id_company');
            $this->db->join('tb_mitra', 'tb_mitra.id_mitra = tb_spot.id_mitra');
            $this->db->where(['tb_company.id_company' => $id, 'is_active_spot' => 1]);

            $this->db->order_by('id_spot', 'DESC');
            $data['spot'] = $this->db->get()->result_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('spot/index', $data);
            $this->load->view('templates/footer');
        }
    }

    public function addSpot()
    {
        $data = [
            'id_company' => $this->input->post('id_company'),
            'id_mitra' => $this->input->post('id_mitra'),
            'spot_date' => $this->input->post('spot_date'),
            'id_product' => $this->input->post('id_product'),
            'quantity' => $this->input->post('quantity'),
            'unit' => $this->input->post('unit'),
            'unit_price' => $this->input->post('unit_price'),
            'ppn' => $this->input->post('ppn')
        ];

        $data['company'] = $this->db->get_where('tb_company', ['id_company' => $data['id_company']])->row_array();
        $data['mitra_name'] = $this->db->get_where('tb_mitra', ['id_mitra' => $data['id_mitra']])->row_array();
        $data['product_type'] = $this->db->get_where('tb_product', ['id_product' => $data['id_product']])->row_array();

        if ($data['id_company'] == NULL or $data['id_mitra'] == NULL or $data['spot_date'] == NULL or $data['id_product'] == NULL or $data['quantity'] == NULL or $data['unit'] == NULL or $data['unit_price'] == NULL) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">All fields in this form are Required!</div>');
            redirect('Spot');
        } else {

            if ($data['id_product'] == 1) {

                $data['title'] = "Add SPOT CPO";
                $this->load->view('templates/header', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('spot/add_spot_cpo', $data);
                $this->load->view('templates/footer');
            } elseif ($data['id_product'] == 2) {

                $data['title'] = "Add SPOT CGK";
                $this->load->view('templates/header', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('spot/add_spot_cgk', $data);
                $this->load->view('templates/footer');
            } elseif ($data['id_product'] == 3) {

                $data['title'] = "Add SPOT PK";
                $this->load->view('templates/header', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('spot/add_spot_pk', $data);
                $this->load->view('templates/footer');
            } else {
                redirect('Spot');
            }
        }
    }

    public function saveSpot()
    {
        $product = $this->db->get_where('tb_product', ['id_product' => $this->input->post('id_product')])->row_array();
        $seller = $this->db->get_where('tb_company', ['id_company' => $this->input->post('id_company')])->row_array();
        $buyer = $this->db->get_where('tb_mitra', ['id_mitra' => $this->input->post('id_mitra')])->row_array();
        $month = $this->getRomawi(date('n', strtotime($this->input->post('spot_date'))));
        $years = date('Y', strtotime($this->input->post('spot_date')));
        $this->db->select_max('id_spot');
        $query = $this->db->get('tb_spot');
        $max_id = $query->row()->id_spot;
        $numb = $max_id + 1;
        $kode =  sprintf("%03s", $numb);
        $spot_number =  $kode . '/SPOT/' . $product['product_name'] . '/' . $seller['alias_name_c'] . '-' . $buyer['alias_name_m'] . '/' . $month . '/' . $years;

        if ($this->input->post('id_product') == 1) {
            $data_cpo = [
                'spot_number' => $spot_number,
                'id_company' => $this->input->post('id_company'),
                'id_mitra' => $this->input->post('id_mitra'),
                'id_product' => $this->input->post('id_product'),
                'spot_date' => $this->input->post('spot_date'),
                'initial_quantity' => $this->input->post('quantity'),
                'quantity' => $this->input->post('quantity'),
                'unit_price' => $this->input->post('unit_price'),
                'unit' => $this->input->post('unit'),
                'ppn' => $this->input->post('ppn'),
                'leki_date' => $this->input->post('leki_date'),
                'lekf_date' => $this->input->post('lekf_date'),
                'sp_notes' => $this->input->post('sp_notes'),
                'cp_dp' => $this->input->post('cp_dp'),
                'cp_dp_date' => $this->input->post('cp_dp_date'),
                'cp_notes' => $this->input->post('cp_notes'),
                'k_dirt_level' => 0,
                'k_water_level' => 0,
                'k_rendemen' => 0,
                'k_ffa_max' => $this->input->post('k_ffa_max'),
                'k_mi_max' => $this->input->post('k_mi_max'),
                'k_dobi_min' => $this->input->post('k_dobi_min'),
                'k_notes' => $this->input->post('k_notes'),
                'pfp_ffa1' => $this->input->post('pfp_ffa1'),
                'pfp_min1' => $this->input->post('pfp_min1'),
                'pfp_rp1' => $this->input->post('pfp_rp1'),
                'pfp_ppn1' => $this->input->post('pfp_ppn1'),
                'pfp_ffa2' => $this->input->post('pfp_ffa2'),
                'pfp_min2' => $this->input->post('pfp_min2'),
                'pfp_rp2' => $this->input->post('pfp_rp2'),
                'pfp_ppn2' => $this->input->post('pfp_ppn2'),
                'pfp_ffa3' => $this->input->post('pfp_ffa3'),
                'pdb_md1' => $this->input->post('pdb_md1'),
                'pdb_min1' => $this->input->post('pdb_min1'),
                'pdb_rp1' => $this->input->post('pdb_rp1'),
                'pdb_ppn1' => $this->input->post('pdb_ppn1'),
                'pdb_md2' => $this->input->post('pdb_md2'),
                'pdb_min2' => $this->input->post('pdb_min2'),
                'pdb_rp2' => $this->input->post('pdb_rp2'),
                'pdb_ppn2' => $this->input->post('pdb_ppn2'),
                'pdb_md3' => $this->input->post('pdb_md3'),
                'pdb_min3' => $this->input->post('pdb_min3'),
                'pdb_rp3' => $this->input->post('pdb_rp3'),
                'pdb_ppn3' => $this->input->post('pdb_ppn3'),
                'mip_notes' => $this->input->post('mip_notes'),
                'mip_lainya' => $this->input->post('mip_lainya'),
                'spot_status' => 2,
                'invoice_spot' => 0,
                'is_active_spot' => 1,
                'date_created' => date("Y-m-d")
            ];
            $this->db->insert('tb_spot', $data_cpo);
        } elseif ($this->input->post('id_product') == 2) {
            $data_cgk = [
                'spot_number' => $spot_number,
                'id_company' => $this->input->post('id_company'),
                'id_mitra' => $this->input->post('id_mitra'),
                'id_product' => $this->input->post('id_product'),
                'spot_date' => $this->input->post('spot_date'),
                'initial_quantity' => $this->input->post('quantity'),
                'quantity' => $this->input->post('quantity'),
                'unit_price' => $this->input->post('unit_price'),
                'unit' => $this->input->post('unit'),
                'ppn' => $this->input->post('ppn'),
                'leki_date' => $this->input->post('leki_date'),
                'lekf_date' => $this->input->post('lekf_date'),
                'sp_notes' => $this->input->post('sp_notes'),
                'cp_dp' => $this->input->post('cp_dp'),
                'cp_dp_date' => $this->input->post('cp_dp_date'),
                'cp_notes' => $this->input->post('cp_notes'),
                'k_dirt_level' => $this->input->post('k_dirt_level'),
                'k_water_level' => $this->input->post('k_water_level'),
                'k_rendemen' => $this->input->post('k_rendemen'),
                'k_ffa_max' => $this->input->post('k_ffa_max'),
                'k_mi_max' => 0,
                'k_dobi_min' => 0,
                'k_notes' => $this->input->post('k_notes'),
                'pfp_ffa1' => 0,
                'pfp_min1' => 0,
                'pfp_rp1' => 0,
                'pfp_ppn1' => NULL,
                'pfp_ffa2' => 0,
                'pfp_min2' => 0,
                'pfp_rp2' => 0,
                'pfp_ppn2' => NULL,
                'pfp_ffa3' => 0,
                'pdb_md1' => 0,
                'pdb_min1' => 0,
                'pdb_rp1' => 0,
                'pdb_ppn1' => NULL,
                'pdb_md2' => 0,
                'pdb_min2' => 0,
                'pdb_rp2' => 0,
                'pdb_ppn2' => NULL,
                'pdb_md3' => 0,
                'pdb_min3' => 0,
                'pdb_rp3' => 0,
                'pdb_ppn3' => NULL,
                'mip_notes' => 0,
                'mip_lainya' => 0,
                'spot_status' => 2,
                'invoice_spot' => 0,
                'is_active_spot' => 1,
                'date_created' => date("Y-m-d")
            ];
            $this->db->insert('tb_spot', $data_cgk);
        } elseif ($this->input->post('id_product') == 3) {
            $data_pk = [
                'spot_number' => $spot_number,
                'id_company' => $this->input->post('id_company'),
                'id_mitra' => $this->input->post('id_mitra'),
                'id_product' => $this->input->post('id_product'),
                'spot_date' => $this->input->post('spot_date'),
                'initial_quantity' => $this->input->post('quantity'),
                'quantity' => $this->input->post('quantity'),
                'unit_price' => $this->input->post('unit_price'),
                'unit' => $this->input->post('unit'),
                'ppn' => $this->input->post('ppn'),
                'leki_date' => $this->input->post('leki_date'),
                'lekf_date' => $this->input->post('lekf_date'),
                'sp_notes' => $this->input->post('sp_notes'),
                'cp_dp' => $this->input->post('cp_dp'),
                'cp_dp_date' => $this->input->post('cp_dp_date'),
                'cp_notes' => $this->input->post('cp_notes'),
                'k_dirt_level' => $this->input->post('k_dirt_level'),
                'k_water_level' => $this->input->post('k_water_level'),
                'k_rendemen' => 0,
                'k_ffa_max' => $this->input->post('k_ffa_max'),
                'k_mi_max' => 0,
                'k_dobi_min' => 0,
                'k_notes' => $this->input->post('k_notes'),
                'pfp_ffa1' => 0,
                'pfp_min1' => 0,
                'pfp_rp1' => 0,
                'pfp_ppn1' => NULL,
                'pfp_ffa2' => 0,
                'pfp_min2' => 0,
                'pfp_rp2' => 0,
                'pfp_ppn2' => NULL,
                'pfp_ffa3' => 0,
                'pdb_md1' => 0,
                'pdb_min1' => 0,
                'pdb_rp1' => 0,
                'pdb_ppn1' => NULL,
                'pdb_md2' => 0,
                'pdb_min2' => 0,
                'pdb_rp2' => 0,
                'pdb_ppn2' => NULL,
                'pdb_md3' => 0,
                'pdb_min3' => 0,
                'pdb_rp3' => 0,
                'pdb_ppn3' => NULL,
                'mip_notes' => 0,
                'mip_lainya' => 0,
                'spot_status' => 2,
                'invoice_spot' => 0,
                'is_active_spot' => 1,
                'date_created' => date("Y-m-d")
            ];
            $this->db->insert('tb_spot', $data_pk);
        } else {
            redirect('index');
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New SPOT has been added successfully!</div>');
        redirect('Spot');
    }

    public function editSpot($id_spot, $id_product)
    {
        $data['company'] = $this->db->get('tb_company')->result_array();
        $data['mitra'] = $this->db->get('tb_mitra')->result_array();
        $data['produk'] = $this->db->get('tb_product')->result_array();

        $this->db->select('*');
        $this->db->from('tb_spot');
        $this->db->join('tb_product', 'tb_product.id_product = tb_spot.id_product');
        $this->db->join('tb_company', 'tb_company.id_company = tb_spot.id_company');
        $this->db->join('tb_mitra', 'tb_mitra.id_mitra = tb_spot.id_mitra');
        $this->db->where('id_spot', $id_spot);
        $data['spot'] = $this->db->get()->row_array();

        if ($id_product == 1) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('spot/edit_spot_cpo', $data);
            $this->load->view('templates/footer');
        } else if ($id_product == 2) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('spot/edit_spot_cgk', $data);
            $this->load->view('templates/footer');
        } else if ($id_product == 3) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('spot/edit_spot_pk', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('Spot');
        }
    }

    public function updateSpot()
    {
        $data['spot'] = [
            'id_spot' => $this->input->post('id_spot'),
            'id_product' => $this->input->post('id_product')
        ];

        if ($data['spot']['id_product'] == 1) {

            $this->db->set('id_company', $this->input->post('id_company'));
            $this->db->set('id_mitra', $this->input->post('id_mitra'));
            $this->db->set('quantity', $this->input->post('quantity'));
            $this->db->set('spot_date', $this->input->post('spot_date'));
            $this->db->set('unit_price', $this->input->post('unit_price'));
            $this->db->set('unit', $this->input->post('unit'));
            $this->db->set('ppn', $this->input->post('ppn'));
            $this->db->set('leki_date', $this->input->post('leki_date'));
            $this->db->set('lekf_date', $this->input->post('lekf_date'));
            $this->db->set('sp_notes', $this->input->post('sp_notes'));
            $this->db->set('cp_dp', $this->input->post('cp_dp'));
            $this->db->set('cp_dp_date', $this->input->post('cp_dp_date'));
            $this->db->set('cp_notes', $this->input->post('cp_notes'));
            $this->db->set('k_ffa_max', $this->input->post('k_ffa_max'));
            $this->db->set('k_mi_max', $this->input->post('k_mi_max'));
            $this->db->set('k_dobi_min', $this->input->post('k_dobi_min'));
            $this->db->set('k_notes', $this->input->post('k_notes'));
            $this->db->set('pfp_ffa1', $this->input->post('pfp_ffa1'));
            $this->db->set('pfp_min1', $this->input->post('pfp_min1'));
            $this->db->set('pfp_rp1', $this->input->post('pfp_rp1'));
            $this->db->set('pfp_ppn1', $this->input->post('pfp_ppn1'));
            $this->db->set('pfp_ffa2', $this->input->post('pfp_ffa2'));
            $this->db->set('pfp_min2', $this->input->post('pfp_min2'));
            $this->db->set('pfp_rp2', $this->input->post('pfp_rp2'));
            $this->db->set('pfp_ppn2', $this->input->post('pfp_ppn2'));
            $this->db->set('pfp_ffa3', $this->input->post('pfp_ffa3'));
            $this->db->set('pdb_md1', $this->input->post('pdb_md1'));
            $this->db->set('pdb_min1', $this->input->post('pdb_min1'));
            $this->db->set('pdb_rp1', $this->input->post('pdb_rp1'));
            $this->db->set('pdb_ppn1', $this->input->post('pdb_ppn1'));
            $this->db->set('pdb_md2', $this->input->post('pdb_md2'));
            $this->db->set('pdb_min2', $this->input->post('pdb_min2'));
            $this->db->set('pdb_rp2', $this->input->post('pdb_rp2'));
            $this->db->set('pdb_ppn2', $this->input->post('pdb_ppn2'));
            $this->db->set('pdb_md3', $this->input->post('pdb_md3'));
            $this->db->set('pdb_min3', $this->input->post('pdb_min3'));
            $this->db->set('pdb_rp3', $this->input->post('pdb_rp3'));
            $this->db->set('pdb_ppn3', $this->input->post('pdb_ppn3'));
            $this->db->set('mip_notes', $this->input->post('mip_notes'));
            $this->db->set('mip_lainya', $this->input->post('mip_lainya'));
            $this->db->where('id_spot', $data['spot']['id_spot']);
            $this->db->update('tb_spot');
        } else if ($data['spot']['id_product'] == 2) {

            $this->db->set('id_company', $this->input->post('id_company'));
            $this->db->set('id_mitra', $this->input->post('id_mitra'));
            $this->db->set('quantity', $this->input->post('quantity'));
            $this->db->set('spot_date', $this->input->post('spot_date'));
            $this->db->set('unit_price', $this->input->post('unit_price'));
            $this->db->set('unit', $this->input->post('unit'));
            $this->db->set('ppn', $this->input->post('ppn'));
            $this->db->set('leki_date', $this->input->post('leki_date'));
            $this->db->set('lekf_date', $this->input->post('lekf_date'));
            $this->db->set('sp_notes', $this->input->post('sp_notes'));
            $this->db->set('cp_dp', $this->input->post('cp_dp'));
            $this->db->set('cp_dp_date', $this->input->post('cp_dp_date'));
            $this->db->set('cp_notes', $this->input->post('cp_notes'));
            $this->db->set('k_dirt_level', $this->input->post('k_dirt_level'));
            $this->db->set('k_water_level', $this->input->post('k_water_level'));
            $this->db->set('k_rendemen', $this->input->post('k_rendemen'));
            $this->db->set('k_ffa_max', $this->input->post('k_ffa_max'));
            $this->db->set('k_notes', $this->input->post('k_notes'));
            $this->db->where('id_spot', $data['spot']['id_spot']);
            $this->db->update('tb_spot');
        } else if ($data['spot']['id_product'] == 3) {

            $this->db->set('id_company', $this->input->post('id_company'));
            $this->db->set('id_mitra', $this->input->post('id_mitra'));
            $this->db->set('quantity', $this->input->post('quantity'));
            $this->db->set('spot_date', $this->input->post('spot_date'));
            $this->db->set('unit_price', $this->input->post('unit_price'));
            $this->db->set('unit', $this->input->post('unit'));
            $this->db->set('ppn', $this->input->post('ppn'));
            $this->db->set('leki_date', $this->input->post('leki_date'));
            $this->db->set('lekf_date', $this->input->post('lekf_date'));
            $this->db->set('sp_notes', $this->input->post('sp_notes'));
            $this->db->set('cp_dp', $this->input->post('cp_dp'));
            $this->db->set('cp_dp_date', $this->input->post('cp_dp_date'));
            $this->db->set('cp_notes', $this->input->post('cp_notes'));
            $this->db->set('k_dirt_level', $this->input->post('k_dirt_level'));
            $this->db->set('k_water_level', $this->input->post('k_water_level'));
            $this->db->set('k_ffa_max', $this->input->post('k_ffa_max'));
            $this->db->set('k_notes', $this->input->post('k_notes'));
            $this->db->where('id_spot', $data['spot']['id_spot']);
            $this->db->update('tb_spot');
        } else {
            redirect('Spot');
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Spot has been Updated successfully!</div>');
        redirect('Spot');
    }

    public function deleteSpot($id_spot)
    {
        $this->db->set('is_active_spot', 0);
        $this->db->where('id_spot', $id_spot);
        $this->db->update('tb_spot');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Spot has been Deleted successfully!</div>');
        redirect('Spot');
    }

    public function getRomawi($month)
    {
        switch ($month) {
            case 1:
                return "I";
                break;
            case 2:
                return "II";
                break;
            case 3:
                return "III";
                break;
            case 4:
                return "IV";
                break;
            case 5:
                return "V";
                break;
            case 6:
                return "VI";
                break;
            case 7:
                return "VII";
                break;
            case 8:
                return "VIII";
                break;
            case 9:
                return "IX";
                break;
            case 10:
                return "X";
                break;
            case 11:
                return "XI";
                break;
            case 12:
                return "XII";
                break;
        }
    }
}
