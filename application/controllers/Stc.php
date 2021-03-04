<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stc extends CI_Controller
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
        $data['title'] = 'STC';
        $data['filtered'] = 'no filter detected ..';
        $data['company'] = $this->db->get('tb_company')->result_array();

        if ($this->input->post('filter') == 0) {
            $this->db->select('*');
            $this->db->from('tb_stc');
            $this->db->join('tb_ltc', 'tb_ltc.id_ltc = tb_stc.id_ltc');
            $this->db->join('tb_product', 'tb_product.id_product = tb_stc.id_product');
            $this->db->join('tb_company', 'tb_company.id_company = tb_stc.id_company');
            $this->db->join('tb_mitra', 'tb_mitra.id_mitra = tb_stc.id_mitra');
            $this->db->where('stc_status', 1);
            $this->db->order_by('id_stc', 'DESC');
            $data['stc'] = $this->db->get()->result_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('stc/index', $data);
            $this->load->view('templates/footer');
        } else {
            $id = $this->input->post('filter');
            $data['filter'] = $this->db->get_where('tb_company', ['id_company' => $id])->row_array();
            $data['filtered'] = $data['filter']['company_name'];

            $this->db->select('*');
            $this->db->from('tb_stc');
            $this->db->join('tb_ltc', 'tb_ltc.id_ltc = tb_stc.id_ltc');
            $this->db->join('tb_product', 'tb_product.id_product = tb_stc.id_product');
            $this->db->join('tb_company', 'tb_company.id_company = tb_stc.id_company');
            $this->db->join('tb_mitra', 'tb_mitra.id_mitra = tb_stc.id_mitra');
            $this->db->where(['tb_company.id_company' => $id, 'stc_status' => 1]);
            $this->db->order_by('id_stc', 'DESC');
            $data['stc'] = $this->db->get()->result_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('stc/index', $data);
            $this->load->view('templates/footer');
        }
    }

    public function dataLtc()
    {
        $data['title'] = 'Data LTC';
        $data['filtered'] = 'no filter detected ..';
        $data['date_1'] = '';
        $data['date_2'] = '';

        $this->db->select('*');
        $this->db->from('tb_ltc');
        // $this->db->join('tb_product', 'tb_product.id_product = tb_ltc.id_product');
        // $this->db->join('tb_company', 'tb_company.id_company = tb_ltc.id_company');
        // $this->db->join('tb_mitra', 'tb_mitra.id_mitra = tb_ltc.id_mitra');
        $this->db->where(['is_active_ltc' => 1, 'ltc_status !=' => 2]);
        $this->db->order_by('id_ltc', 'DESC');
        $data['ltc_filter'] = $this->db->get()->result_array();

        if ($this->input->post('filter') == 0) {

            $this->db->select('*');
            $this->db->from('tb_ltc');
            $this->db->join('tb_product', 'tb_product.id_product = tb_ltc.id_product');
            $this->db->join('tb_company', 'tb_company.id_company = tb_ltc.id_company');
            $this->db->join('tb_mitra', 'tb_mitra.id_mitra = tb_ltc.id_mitra');
            $this->db->where(['is_active_ltc' => 1, 'ltc_status !=' => 2]);
            $this->db->order_by('id_ltc', 'DESC');
            $data['ltc'] = $this->db->get()->result_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('stc/data_ltc', $data);
            $this->load->view('templates/footer');
        } else {
            $id = $this->input->post('filter');
            $data['filter'] = $this->db->get_where('tb_ltc', ['id_ltc' => $id])->row_array();
            $data['filtered'] = $data['filter']['ltc_number'];

            $this->db->select('*');
            $this->db->from('tb_ltc');
            $this->db->join('tb_product', 'tb_product.id_product = tb_ltc.id_product');
            $this->db->join('tb_company', 'tb_company.id_company = tb_ltc.id_company');
            $this->db->join('tb_mitra', 'tb_mitra.id_mitra = tb_ltc.id_mitra');
            $this->db->where('tb_ltc.id_ltc', $id);
            $this->db->order_by('id_ltc', 'DESC');
            $data['ltc'] = $this->db->get()->result_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('stc/data_ltc', $data);
            $this->load->view('templates/footer');
        }
    }

    public function date_filter()
    {
        $data['title'] = 'Data LTC';
        $data = [
            'date_1' => $this->input->post('date_1'),
            'date_2' => $this->input->post('date_2')
        ];

        $this->db->select('*');
        $this->db->from('tb_ltc');
        // $this->db->join('tb_product', 'tb_product.id_product = tb_ltc.id_product');
        // $this->db->join('tb_company', 'tb_company.id_company = tb_ltc.id_company');
        // $this->db->join('tb_mitra', 'tb_mitra.id_mitra = tb_ltc.id_mitra');
        $this->db->where(['is_active_ltc' => 1, 'ltc_status !=' => 2]);
        $this->db->order_by('id_ltc', 'ASC');
        $data['ltc_filter'] = $this->db->get()->result_array();

        $data['filtered'] = 'no filter detected ..';

        $this->db->select('*');
        $this->db->from('tb_ltc');
        $this->db->join('tb_product', 'tb_product.id_product = tb_ltc.id_product');
        $this->db->join('tb_company', 'tb_company.id_company = tb_ltc.id_company');
        $this->db->join('tb_mitra', 'tb_mitra.id_mitra = tb_ltc.id_mitra');
        $this->db->where(['is_active_ltc' => 1, 'ltc_status !=' => 2, 'ltc_date >=' => $data['date_1'], 'ltc_date <=' => $data['date_2']]);
        $this->db->order_by('id_ltc', 'DESC');
        $data['ltc'] = $this->db->get()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('stc/data_ltc', $data);
        $this->load->view('templates/footer');
    }

    public function formStc($id_ltc)
    {
        $data['title'] = 'STC';

        $data['cari_ltc'] = $this->db->get_where('tb_ltc', ['id_ltc' => $id_ltc])->row_array();

        $product = $this->db->get_where('tb_product', ['id_product' => $data['cari_ltc']['id_product']])->row_array();
        $seller = $this->db->get_where('tb_company', ['id_company' => $data['cari_ltc']['id_company']])->row_array();
        $buyer = $this->db->get_where('tb_mitra', ['id_mitra' => $data['cari_ltc']['id_mitra']])->row_array();
        // $month = $this->getRomawi(date('n', strtotime($this->input->post('stc_date'))));
        // $years = date('Y', strtotime($this->input->post('stc_date')));
        $this->db->select_max('id_stc');
        $query = $this->db->get('tb_stc');
        $max_id = $query->row()->id_stc;
        $numb = $max_id + 1;
        $kode =  sprintf("%03s", $numb);
        $data['stc_number'] =  $kode . '/' . $product['product_name'] . '/' . $seller['alias_name_c'] . '-' . $buyer['alias_name_m'] . '/-/-';

        $this->db->select_sum('quantity_stc');
        $this->db->where('id_ltc', $id_ltc);
        $query = $this->db->get('tb_stc');
        $data['qty_stc'] = $query->row()->quantity_stc;

        $data['ltc_product'] = $this->db->get_where('tb_ltc', ['id_ltc' => $id_ltc])->row_array();

        $this->db->where('id_ltc', $id_ltc);
        $this->db->from('tb_stc');
        $count_stc = $this->db->count_all_results();

        $data['stc_ke'] = $count_stc + 1;
        $data['total_stc'] = $data['stc_ke'] - 1;

        $this->db->select('*');
        $this->db->from('tb_ltc');
        $this->db->join('tb_product', 'tb_product.id_product = tb_ltc.id_product');
        $this->db->join('tb_company', 'tb_company.id_company = tb_ltc.id_company');
        $this->db->join('tb_mitra', 'tb_mitra.id_mitra = tb_ltc.id_mitra');
        $this->db->where(['id_ltc' => $id_ltc]);
        $data['ltc'] = $this->db->get()->row_array();

        if ($data['ltc_product']['id_product'] == 1) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('stc/form_stc_cpo', $data);
            $this->load->view('templates/footer');
        } else if ($data['ltc_product']['id_product'] == 2) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('stc/form_stc_cgk', $data);
            $this->load->view('templates/footer');
        } else if ($data['ltc_product']['id_product'] == 3) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('stc/form_stc_pk', $data);
            $this->load->view('templates/footer');
        }
    }

    public function saveStc()
    {
        $product = $this->db->get_where('tb_product', ['id_product' => $this->input->post('id_product')])->row_array();
        $seller = $this->db->get_where('tb_company', ['id_company' => $this->input->post('id_company')])->row_array();
        $buyer = $this->db->get_where('tb_mitra', ['id_mitra' => $this->input->post('id_mitra')])->row_array();
        $month = $this->getRomawi(date('n', strtotime($this->input->post('stc_date'))));
        $years = date('Y', strtotime($this->input->post('stc_date')));
        $this->db->select_max('id_stc');
        $query = $this->db->get('tb_stc');
        $max_id = $query->row()->id_stc;
        $numb = $max_id + 1;
        $kode =  sprintf("%03s", $numb);
        $stc_number =  $kode . '/' . $product['product_name'] . '/' . $seller['alias_name_c'] . '-' . $buyer['alias_name_m'] . '/' . $month . '/' . $years;

        if ($this->input->post('id_product') == 1) {
            $data_cpo = [
                'stc_number' => $stc_number,
                'id_ltc' => $this->input->post('id_ltc'),
                'id_product' => $this->input->post('id_product'),
                'id_company' => $this->input->post('id_company'),
                'id_mitra' => $this->input->post('id_mitra'),
                'stc_date' => $this->input->post('stc_date'),
                'quantity_ltc' => $this->input->post('quantity_ltc'),
                'quantity_stc' => $this->input->post('quantity_stc'),
                'wp_1' => $this->input->post('wp_1'),
                'wp_2' => $this->input->post('wp_2'),
                'sp' => $this->input->post('sp'),
                'sp_stc' => $this->input->post('sp_stc'),
                'p_dp' => $this->input->post('p_dp'),
                'p_t_dp' => $this->input->post('p_t_dp'),
                'p_notes' => $this->input->post('p_notes'),
                's_ffa_max' => $this->input->post('s_ffa_max'),
                's_mi_max' => $this->input->post('s_mi_max'),
                's_dobi_min' => $this->input->post('s_dobi_min'),
                's_dirt_level' => 0,
                's_water_level' => 0,
                's_rendemen' => 0,
                's_notes' => $this->input->post('s_notes'),
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
                'stc_status' => 1,
                'invoice_stc' => 0,
                'date_created' => date("Y-m-d")
            ];
            $this->db->insert('tb_stc', $data_cpo);
        } elseif ($this->input->post('id_product') == 2) {
            $data_cgk = [
                'stc_number' => $stc_number,
                'id_ltc' => $this->input->post('id_ltc'),
                'id_product' => $this->input->post('id_product'),
                'id_company' => $this->input->post('id_company'),
                'id_mitra' => $this->input->post('id_mitra'),
                'stc_date' => $this->input->post('stc_date'),
                'quantity_ltc' => $this->input->post('quantity_ltc'),
                'quantity_stc' => $this->input->post('quantity_stc'),
                'wp_1' => $this->input->post('wp_1'),
                'wp_2' => $this->input->post('wp_2'),
                'sp' => $this->input->post('sp'),
                'sp_stc' => $this->input->post('sp_stc'),
                'p_dp' => $this->input->post('p_dp'),
                'p_t_dp' => $this->input->post('p_t_dp'),
                'p_notes' => $this->input->post('p_notes'),
                's_ffa_max' => $this->input->post('s_ffa_max'),
                's_mi_max' => 0,
                's_dobi_min' => 0,
                's_dirt_level' => $this->input->post('s_dirt_level'),
                's_water_level' => $this->input->post('s_water_level'),
                's_rendemen' => $this->input->post('s_rendemen'),
                's_notes' => $this->input->post('s_notes'),
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
                'stc_status' => 1,
                'invoice_stc' => 0,
                'date_created' => date("Y-m-d")
            ];
            $this->db->insert('tb_stc', $data_cgk);
        } elseif ($this->input->post('id_product') == 3) {
            $data_pk = [
                'stc_number' => $stc_number,
                'id_ltc' => $this->input->post('id_ltc'),
                'id_product' => $this->input->post('id_product'),
                'id_company' => $this->input->post('id_company'),
                'id_mitra' => $this->input->post('id_mitra'),
                'stc_date' => $this->input->post('stc_date'),
                'quantity_ltc' => $this->input->post('quantity_ltc'),
                'quantity_stc' => $this->input->post('quantity_stc'),
                'wp_1' => $this->input->post('wp_1'),
                'wp_2' => $this->input->post('wp_2'),
                'sp' => $this->input->post('sp'),
                'sp_stc' => $this->input->post('sp_stc'),
                'p_dp' => $this->input->post('p_dp'),
                'p_t_dp' => $this->input->post('p_t_dp'),
                'p_notes' => $this->input->post('p_notes'),
                's_ffa_max' => $this->input->post('s_ffa_max'),
                's_mi_max' => 0,
                's_dobi_min' => 0,
                's_dirt_level' => $this->input->post('s_dirt_level'),
                's_water_level' => $this->input->post('s_water_level'),
                's_rendemen' => 0,
                's_notes' => $this->input->post('s_notes'),
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
                'stc_status' => 1,
                'invoice_stc' => 0,
                'date_created' => date("Y-m-d")
            ];
            $this->db->insert('tb_stc', $data_pk);
        } else {
            redirect('Stc');
        }

        $saldo = $this->input->post('quantity_ltc') - $this->input->post('quantity_stc');

        if ($saldo == 0) {
            $this->db->set('ltc_status', 2);
            $this->db->set('quantity', $saldo);
            $this->db->where('id_ltc', $this->input->post('id_ltc'));
            $this->db->update('tb_ltc');
        } else {
            $this->db->set('ltc_status', 1);
            $this->db->set('quantity', $saldo);
            $this->db->where('id_ltc', $this->input->post('id_ltc'));
            $this->db->update('tb_ltc');
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New STC has been added successfully!</div>');
        redirect('Stc');
    }

    public function editStc($id_stc, $id_product)
    {

        $data['company'] = $this->db->get('tb_company')->result_array();
        $data['mitra'] = $this->db->get('tb_mitra')->result_array();
        $data['produk'] = $this->db->get('tb_product')->result_array();

        $this->db->select('*');
        $this->db->from('tb_stc');
        $this->db->join('tb_product', 'tb_product.id_product = tb_stc.id_product');
        $this->db->join('tb_company', 'tb_company.id_company = tb_stc.id_company');
        $this->db->join('tb_mitra', 'tb_mitra.id_mitra = tb_stc.id_mitra');
        $this->db->where('id_stc', $id_stc);
        $data['stc'] = $this->db->get()->row_array();

        $data['ltc'] = $this->db->get_where('tb_ltc', ['id_ltc' => $data['stc']['id_ltc']])->row_array();

        if ($id_product == 1) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('stc/edit_stc_cpo', $data);
            $this->load->view('templates/footer');
        } else if ($id_product == 2) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('stc/edit_stc_cgk', $data);
            $this->load->view('templates/footer');
        } else if ($id_product == 3) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('stc/edit_stc_pk', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('Stc');
        }
    }

    public function updateStc()
    {
        $data['stc'] = [
            'id_stc' => $this->input->post('id_stc'),
            'id_product' => $this->input->post('id_product'),
            'quantity_stc' => $this->input->post('quantity_stc')
        ];

        $stc = $this->db->get_where('tb_stc', ['id_stc' => $data['stc']['id_stc']])->row_array();
        $ltc = $this->db->get_where('tb_ltc', ['id_ltc' => $stc['id_ltc']])->row_array();

        if ($data['stc']['quantity_stc'] > $stc['quantity_stc']) {

            $tambah = $data['stc']['quantity_stc'] - $stc['quantity_stc'];

            $dikurangin = $ltc['quantity'] - $tambah;

            $this->db->set('quantity', $dikurangin);
            $this->db->where('id_ltc', $ltc['id_ltc']);
            $this->db->update('tb_ltc');
        } else if ($data['stc']['quantity_stc'] < $stc['quantity_stc']) {

            $kurang = $stc['quantity_stc'] - $data['stc']['quantity_stc'];

            $ditambahin = $ltc['quantity'] + $kurang;

            $this->db->set('quantity', $ditambahin);
            $this->db->where('id_ltc', $ltc['id_ltc']);
            $this->db->update('tb_ltc');
        } else {
            // echo "tidak di ubah";
        }

        if ($data['stc']['id_product'] == 1) {

            $this->db->set('stc_date', $this->input->post('stc_date'));
            $this->db->set('quantity_stc', $this->input->post('quantity_stc'));
            $this->db->set('wp_1', $this->input->post('wp_1'));
            $this->db->set('wp_2', $this->input->post('wp_2'));
            $this->db->set('sp', $this->input->post('sp'));
            $this->db->set('sp_stc', $this->input->post('sp_stc'));
            $this->db->set('p_dp', $this->input->post('p_dp'));
            $this->db->set('p_t_dp', $this->input->post('p_t_dp'));
            $this->db->set('p_notes', $this->input->post('p_notes'));
            $this->db->set('s_ffa_max', $this->input->post('s_ffa_max'));
            $this->db->set('s_mi_max', $this->input->post('s_mi_max'));
            $this->db->set('s_dobi_min', $this->input->post('s_dobi_min'));
            $this->db->set('s_notes', $this->input->post('s_notes'));
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
            $this->db->where('id_stc', $data['stc']['id_stc']);
            $this->db->update('tb_stc');
        } else if ($data['stc']['id_product'] == 2) {

            $this->db->set('stc_date', $this->input->post('stc_date'));
            $this->db->set('quantity_stc', $this->input->post('quantity_stc'));
            $this->db->set('wp_1', $this->input->post('wp_1'));
            $this->db->set('wp_2', $this->input->post('wp_2'));
            $this->db->set('sp', $this->input->post('sp'));
            $this->db->set('sp_stc', $this->input->post('sp_stc'));
            $this->db->set('p_dp', $this->input->post('p_dp'));
            $this->db->set('p_t_dp', $this->input->post('p_t_dp'));
            $this->db->set('p_notes', $this->input->post('p_notes'));
            $this->db->set('s_ffa_max', $this->input->post('s_ffa_max'));
            $this->db->set('s_dirt_level', $this->input->post('s_dirt_level'));
            $this->db->set('s_water_level', $this->input->post('s_water_level'));
            $this->db->set('s_rendemen', $this->input->post('s_rendemen'));
            $this->db->set('s_notes', $this->input->post('s_notes'));
            $this->db->where('id_stc', $data['stc']['id_stc']);
            $this->db->update('tb_stc');
        } else if ($data['stc']['id_product'] == 3) {

            $this->db->set('stc_date', $this->input->post('stc_date'));
            $this->db->set('quantity_stc', $this->input->post('quantity_stc'));
            $this->db->set('wp_1', $this->input->post('wp_1'));
            $this->db->set('wp_2', $this->input->post('wp_2'));
            $this->db->set('sp', $this->input->post('sp'));
            $this->db->set('sp_stc', $this->input->post('sp_stc'));
            $this->db->set('p_dp', $this->input->post('p_dp'));
            $this->db->set('p_t_dp', $this->input->post('p_t_dp'));
            $this->db->set('p_notes', $this->input->post('p_notes'));
            $this->db->set('s_ffa_max', $this->input->post('s_ffa_max'));
            $this->db->set('s_dirt_level', $this->input->post('s_dirt_level'));
            $this->db->set('s_water_level', $this->input->post('s_water_level'));
            $this->db->set('s_notes', $this->input->post('s_notes'));
            $this->db->where('id_stc', $data['stc']['id_stc']);
            $this->db->update('tb_stc');
        } else {
            redirect('Stc');
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Stc has been Updated successfully!</div>');
        redirect('Stc');
    }

    public function deleteStc($id_stc, $id_ltc, $quantity_stc)
    {
        $ltc = $this->db->get_where('tb_ltc', ['id_ltc' => $id_ltc])->row_array();

        $tambah = $ltc['quantity'] + $quantity_stc;

        $this->db->set('quantity', $tambah);
        $this->db->where('id_ltc', $id_ltc);
        $this->db->update('tb_ltc');

        $this->db->set('stc_status', 0);
        $this->db->where('id_stc', $id_stc);
        $this->db->update('tb_stc');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">STC has been Deleted successfully!</div>');
        redirect('Stc');
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