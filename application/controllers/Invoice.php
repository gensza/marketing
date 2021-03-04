<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Invoice extends CI_Controller
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
        $data['title'] = 'Invoice';
        $data['filtered'] = 'no filter detected ..';

        $data['company'] = $this->db->get('tb_company')->result_array();

        if ($this->input->post('filter') == 0) {

            $this->db->select('*');
            $this->db->from('tb_invoice');
            $this->db->join('tb_product', 'tb_product.id_product = tb_invoice.id_product');
            $this->db->join('tb_company', 'tb_company.id_company = tb_invoice.id_company');
            $this->db->join('tb_mitra', 'tb_mitra.id_mitra = tb_invoice.id_mitra');
            $this->db->where('tb_invoice.status', 1);
            $this->db->order_by('id_invoice', 'DESC');
            $data['invoice'] = $this->db->get()->result_array();
        } else {
            $id = $this->input->post('filter');
            $data['filter'] = $this->db->get_where('tb_company', ['id_company' => $id])->row_array();
            $data['filtered'] = $data['filter']['company_name'];

            $this->db->select('*');
            $this->db->from('tb_invoice');
            $this->db->join('tb_product', 'tb_product.id_product = tb_invoice.id_product');
            $this->db->join('tb_company', 'tb_company.id_company = tb_invoice.id_company');
            $this->db->join('tb_mitra', 'tb_mitra.id_mitra = tb_invoice.id_mitra');
            $this->db->where(['tb_company.id_company' => $id, 'tb_invoice.status' => 1]);
            $this->db->order_by('id_invoice', 'DESC');
            $data['invoice'] = $this->db->get()->result_array();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('invoice/index', $data);
        $this->load->view('templates/footer');
    }

    public function pilih_kontrak()
    {
        $data['title'] = 'Invoice';

        $data['filtered'] = 'no filter detected ..';
        $data['date_1'] = '';
        $data['date_2'] = '';

        $this->db->select('*');
        $this->db->from('tb_stc');
        $this->db->where(['stc_status' => 1, 'invoice_stc' => 0]);
        $this->db->order_by('id_ltc', 'DESC');
        $data['stc_filter'] = $this->db->get()->result_array();

        $this->db->select('*');
        $this->db->from('tb_spot');
        $this->db->where(['invoice_spot' => 0, 'is_active_spot' => 1]);
        $this->db->order_by('id_spot', 'DESC');
        $data['spot_filter'] = $this->db->get()->result_array();

        if ($this->input->post('contract') == 2) {

            if ($this->input->post('filter') == 0) {
                $this->db->select('*');
                $this->db->from('tb_stc');
                $this->db->join('tb_product', 'tb_product.id_product = tb_stc.id_product');
                $this->db->join('tb_company', 'tb_company.id_company = tb_stc.id_company');
                $this->db->join('tb_mitra', 'tb_mitra.id_mitra = tb_stc.id_mitra');
                $this->db->join('tb_ltc', 'tb_ltc.id_ltc = tb_stc.id_ltc');
                $this->db->where(['stc_status' => 1, 'invoice_stc' => 0]);
                $this->db->order_by('id_stc', 'DESC');
                $data['data_stc'] = $this->db->get()->result_array();

                $this->load->view('templates/header', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('invoice/data_kontrak_stc', $data);
                $this->load->view('templates/footer');
            } else {
                $id = $this->input->post('filter');
                $data['filter'] = $this->db->get_where('tb_stc', ['id_stc' => $id])->row_array();
                $data['filtered'] = $data['filter']['stc_number'];

                $this->db->select('*');
                $this->db->from('tb_stc');
                $this->db->join('tb_product', 'tb_product.id_product = tb_stc.id_product');
                $this->db->join('tb_company', 'tb_company.id_company = tb_stc.id_company');
                $this->db->join('tb_mitra', 'tb_mitra.id_mitra = tb_stc.id_mitra');
                $this->db->join('tb_ltc', 'tb_ltc.id_ltc = tb_stc.id_ltc');
                $this->db->where(['tb_stc.id_stc' => $id, 'invoice_stc' => 0]);
                $this->db->order_by('id_stc', 'DESC');
                $data['data_stc'] = $this->db->get()->result_array();

                $this->load->view('templates/header', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('invoice/data_kontrak_stc', $data);
                $this->load->view('templates/footer');
            }
        } else if ($this->input->post('contract') == 3) {

            if ($this->input->post('filter') == 0) {

                $this->db->select('*');
                $this->db->from('tb_spot');
                $this->db->join('tb_product', 'tb_product.id_product = tb_spot.id_product');
                $this->db->join('tb_company', 'tb_company.id_company = tb_spot.id_company');
                $this->db->join('tb_mitra', 'tb_mitra.id_mitra = tb_spot.id_mitra');
                $this->db->where(['invoice_spot' => 0, 'is_active_spot' => 1]);
                $this->db->order_by('id_spot', 'DESC');
                $data['data_spot'] = $this->db->get()->result_array();

                $this->load->view('templates/header', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('invoice/data_kontrak_spot', $data);
                $this->load->view('templates/footer');
            } else {
                $id = $this->input->post('filter');
                $data['filter'] = $this->db->get_where('tb_spot', ['id_spot' => $id])->row_array();
                $data['filtered'] = $data['filter']['spot_number'];

                $this->db->select('*');
                $this->db->from('tb_spot');
                $this->db->join('tb_product', 'tb_product.id_product = tb_spot.id_product');
                $this->db->join('tb_company', 'tb_company.id_company = tb_spot.id_company');
                $this->db->join('tb_mitra', 'tb_mitra.id_mitra = tb_spot.id_mitra');
                $this->db->where(['tb_spot.id_spot' => $id, 'invoice_spot' => 0, 'is_active_spot' => 1]);
                $this->db->order_by('id_spot', 'DESC');
                $data['data_spot'] = $this->db->get()->result_array();

                $this->load->view('templates/header', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('invoice/data_kontrak_spot', $data);
                $this->load->view('templates/footer');
            }
        } else {
            redirect('Invoice');
        }
    }

    public function date_filter()
    {
        if ($this->input->post('contract') == 2) {
            $data['title'] = 'Invoice';
            $data = [
                'date_1' => $this->input->post('date_1'),
                'date_2' => $this->input->post('date_2')
            ];

            $this->db->select('*');
            $this->db->from('tb_stc');
            $this->db->where(['stc_status' => 1, 'invoice_stc' => 0]);
            $this->db->order_by('id_stc', 'DESC');
            $data['stc_filter'] = $this->db->get()->result_array();

            $data['filtered'] = 'no filter detected ..';

            $this->db->select('*');
            $this->db->from('tb_stc');
            $this->db->join('tb_product', 'tb_product.id_product = tb_stc.id_product');
            $this->db->join('tb_company', 'tb_company.id_company = tb_stc.id_company');
            $this->db->join('tb_ltc', 'tb_ltc.id_ltc = tb_stc.id_ltc');
            $this->db->join('tb_mitra', 'tb_mitra.id_mitra = tb_stc.id_mitra');
            $this->db->where(['stc_status' => 1, 'stc_date >=' => $data['date_1'], 'stc_date <=' => $data['date_2'], 'stc_status' => 1, 'invoice_stc' => 0]);
            $this->db->order_by('id_stc', 'DESC');
            $data['data_stc'] = $this->db->get()->result_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('invoice/data_kontrak_stc', $data);
            $this->load->view('templates/footer');
        } else if ($this->input->post('contract') == 3) {

            $data['title'] = 'Invoice';
            $data = [
                'date_1' => $this->input->post('date_1'),
                'date_2' => $this->input->post('date_2')
            ];

            $this->db->select('*');
            $this->db->from('tb_spot');
            $this->db->where(['invoice_spot' => 0, 'is_active_spot' => 1]);
            $this->db->order_by('id_spot', 'DESC');
            $data['spot_filter'] = $this->db->get()->result_array();

            $data['filtered'] = 'no filter detected ..';

            $this->db->select('*');
            $this->db->from('tb_spot');
            $this->db->join('tb_product', 'tb_product.id_product = tb_spot.id_product');
            $this->db->join('tb_company', 'tb_company.id_company = tb_spot.id_company');
            $this->db->join('tb_mitra', 'tb_mitra.id_mitra = tb_spot.id_mitra');
            $this->db->where(['spot_date >=' => $data['date_1'], 'spot_date <=' => $data['date_2'], 'invoice_spot' => 0, 'is_active_spot' => 1]);
            $this->db->order_by('id_spot', 'DESC');
            $data['data_spot'] = $this->db->get()->result_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('Invoice/data_kontrak_spot', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('Invoice');
        }
    }

    public function viewInvoiceStc($id_stc)
    {
        $data['title'] = "Invoice STC";

        $this->db->select('*');
        $this->db->from('tb_stc');
        $this->db->join('tb_product', 'tb_product.id_product = tb_stc.id_product');
        $this->db->join('tb_company', 'tb_company.id_company = tb_stc.id_company');
        $this->db->join('tb_mitra', 'tb_mitra.id_mitra = tb_stc.id_mitra');
        $this->db->join('tb_ltc', 'tb_ltc.id_ltc = tb_stc.id_ltc');
        $this->db->where('id_stc', $id_stc);
        $this->db->order_by('id_stc', 'DESC');
        $data['contract'] = $this->db->get()->row_array();

        $data['invoice_date'] = $this->tgl_indo(date($data['contract']['stc_date']));
        $data['dp_date'] = $this->tgl_indo(date($data['contract']['p_t_dp']));
        $month = $this->getRomawi(date('n', strtotime($data['contract']['stc_date'])));
        $years = date('Y', strtotime($data['contract']['stc_date']));
        $this->db->select_max('id_invoice');
        $query = $this->db->get('tb_invoice');
        $max_id = $query->row()->id_invoice;
        $numb = $max_id + 1;
        $kode =  sprintf("%03s", $numb);

        $data['invoice_no'] = $kode . '/' . $data['contract']['alias_name_c'] . '/' . 'INV-' . $data['contract']['product_name'] . '/' . $month . '/' . $years;

        $data['net_sales'] = $data['contract']['quantity_stc'] * $data['contract']['unit_price'];

        $data['dp'] = $data['contract']['p_dp'] * $data['net_sales'] / 100;

        $data['dpp'] = $data['net_sales'] - $data['dp'];

        if ($data['contract']['ppn'] == 'on') {
            $cekppn = 10;
        } else {
            $cekppn = 0;
        }
        $data['ppn'] = $cekppn * $data['net_sales'] / 100;

        $data['total'] = $data['dpp'] + $data['ppn'];

        $data['terbilang'] = $this->terbilang($data['total']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('invoice/invoice_stc', $data);
        $this->load->view('templates/footer');
    }

    public function viewInvoiceSpot($id_spot)
    {
        $data['title'] = "Invoice SPOT";

        $this->db->select('*');
        $this->db->from('tb_spot');
        $this->db->join('tb_product', 'tb_product.id_product = tb_spot.id_product');
        $this->db->join('tb_company', 'tb_company.id_company = tb_spot.id_company');
        $this->db->join('tb_mitra', 'tb_mitra.id_mitra = tb_spot.id_mitra');
        $this->db->where('id_spot', $id_spot);
        $this->db->order_by('id_spot', 'DESC');
        $data['contract'] = $this->db->get()->row_array();

        $data['invoice_date'] = $this->tgl_indo(date($data['contract']['spot_date']));
        $data['dp_date'] = $this->tgl_indo(date($data['contract']['cp_dp_date']));
        $month = $this->getRomawi(date('n', strtotime($data['contract']['spot_date'])));
        $years = date('Y', strtotime($data['contract']['spot_date']));
        $this->db->select_max('id_invoice');
        $query = $this->db->get('tb_invoice');
        $max_id = $query->row()->id_invoice;
        $numb = $max_id + 1;
        $kode =  sprintf("%03s", $numb);

        $data['invoice_no'] = $kode . '/' . $data['contract']['alias_name_c'] . '/' . 'INV-' . $data['contract']['product_name'] . '/' . $month . '/' . $years;

        $data['net_sales'] = $data['contract']['quantity'] * $data['contract']['unit_price'];

        $data['dp'] = $data['contract']['cp_dp'] * $data['net_sales'] / 100;

        $data['dpp'] = $data['net_sales'] - $data['dp'];

        if ($data['contract']['ppn'] == 'on') {
            $cekppn = 10;
        } else {
            $cekppn = 0;
        }
        $data['ppn'] = $cekppn * $data['net_sales'] / 100;

        $data['total'] = $data['dpp'] + $data['ppn'];

        $data['terbilang'] = $this->terbilang($data['total']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('invoice/invoice_spot', $data);
        $this->load->view('templates/footer');
    }

    public function viewPrintStc()
    {
        $data['title'] = "View Print STC";

        $data['contract'] = [
            'sp_stc' => $this->input->post('sp_stc')
        ];

        $data['print'] = [
            'invoice_number' => $this->input->post('invoice_number'),
            'contract_number' => $this->input->post('contract_number'),
            'contract_type' => $this->input->post('contract_type'),
            'id_contract_type' => $this->input->post('id_contract_type'),
            'id_product' => $this->input->post('id_product'),
            'id_company' => $this->input->post('id_company'),
            'id_mitra' => $this->input->post('id_mitra'),
            'sp_stc' => $this->input->post('sp_stc'),
            'invoice_date' => $this->input->post('invoice_date'),
            'dp_persen' => $this->input->post('dp_persen'),
            'due_date' => $this->input->post('due_date'),
            'qty' => $this->input->post('qty'),
            'unit' => $this->input->post('unit'),
            'price' => $this->input->post('price'),
            'net_sales' => $this->input->post('net_sales'),
            'message' => $this->input->post('message'),
            'uang_muka' => $this->input->post('uang_muka'),
            'dpp' => $this->input->post('dpp'),
            'ppn' => $this->input->post('ppn'),
            'ppn_on' => $this->input->post('ppn_on'),
            'total' => $this->input->post('total')
        ];

        if ($data['print']['invoice_date'] == NULL) {
            $data['invoice_date'] = 'null';
        } else {
            $data['invoice_date'] = $this->tgl_indo(date($data['print']['invoice_date']));
        }

        if ($data['print']['due_date'] == NULL) {
            $data['due_date'] = 'null';
        } else {
            $data['due_date'] = $this->tgl_indo(date($data['print']['due_date']));
        }

        $data['terbilang'] = $this->terbilang($data['print']['total']);

        $data['company'] = $this->db->get_where('tb_company', ['id_company' => $data['print']['id_company']])->row_array();
        $data['product'] = $this->db->get_where('tb_product', ['id_product' => $data['print']['id_product']])->row_array();
        $data['mitra'] = $this->db->get_where('tb_mitra', ['id_mitra' => $data['print']['id_mitra']])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('invoice/view_print_stc', $data);
        $this->load->view('templates/footer');
    }

    public function viewPrintSpot()
    {
        $data['title'] = "View Print SPOT";

        $data['print'] = [
            'invoice_number' => $this->input->post('invoice_number'),
            'contract_number' => $this->input->post('contract_number'),
            'contract_type' => $this->input->post('contract_type'),
            'id_contract_type' => $this->input->post('id_contract_type'),
            'id_product' => $this->input->post('id_product'),
            'id_company' => $this->input->post('id_company'),
            'id_mitra' => $this->input->post('id_mitra'),
            'invoice_date' => $this->input->post('invoice_date'),
            'dp_persen' => $this->input->post('dp_persen'),
            'due_date' => $this->input->post('due_date'),
            'qty' => $this->input->post('qty'),
            'unit' => $this->input->post('unit'),
            'price' => $this->input->post('price'),
            'net_sales' => $this->input->post('net_sales'),
            'message' => $this->input->post('message'),
            'uang_muka' => $this->input->post('uang_muka'),
            'dpp' => $this->input->post('dpp'),
            'ppn' => $this->input->post('ppn'),
            'ppn_on' => $this->input->post('ppn_on'),
            'total' => $this->input->post('total')
        ];

        if ($data['print']['invoice_date'] == NULL) {
            $data['invoice_date'] = 'null';
        } else {
            $data['invoice_date'] = $this->tgl_indo(date($data['print']['invoice_date']));
        }

        if ($data['print']['due_date'] == NULL) {
            $data['due_date'] = 'null';
        } else {
            $data['due_date'] = $this->tgl_indo(date($data['print']['due_date']));
        }

        $data['terbilang'] = $this->terbilang($data['print']['total']);

        $data['company'] = $this->db->get_where('tb_company', ['id_company' => $data['print']['id_company']])->row_array();
        $data['product'] = $this->db->get_where('tb_product', ['id_product' => $data['print']['id_product']])->row_array();
        $data['mitra'] = $this->db->get_where('tb_mitra', ['id_mitra' => $data['print']['id_mitra']])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('invoice/view_print_spot', $data);
        $this->load->view('templates/footer');
    }

    public function saveInvoiceStc()
    {
        $data = [
            'invoice_number' => $this->input->post('invoice_number'),
            'contract_number' => $this->input->post('contract_number'),
            'contract_type' => $this->input->post('contract_type'),
            'id_contract_type' => $this->input->post('id_contract_type'),
            'id_product' => $this->input->post('id_product'),
            'id_company' => $this->input->post('id_company'),
            'id_mitra' => $this->input->post('id_mitra'),
            'sp_stc' => $this->input->post('sp_stc'),
            'invoice_date' => $this->input->post('invoice_date'),
            'dp_persen' => $this->input->post('dp_persen'),
            'due_date' => $this->input->post('due_date'),
            'qty' => $this->input->post('qty'),
            'unit' => $this->input->post('unit'),
            'price' => $this->input->post('price'),
            'net_sales' => $this->input->post('net_sales'),
            'message' => $this->input->post('message'),
            'uang_muka' => $this->input->post('uang_muka'),
            'dpp' => $this->input->post('dpp'),
            'ppn' => $this->input->post('ppn'),
            'total' => $this->input->post('total'),
            'status' => 1,
            'date_created' => date("Y-m-d")
        ];
        $cari_stc = $this->db->get_where('tb_stc', ['id_stc' => $data['id_contract_type']])->row_array();
        $ltc = $this->db->get_where('tb_ltc', ['id_ltc' => $cari_stc['id_ltc']])->row_array();

        if ($data['qty'] > $cari_stc['quantity_stc']) {

            $this->db->set('quantity_stc', $data['qty']);
            $this->db->where('id_stc', $data['id_contract_type']);
            $this->db->update('tb_stc');

            $tambah = $data['qty'] - $cari_stc['quantity_stc'];

            $dikurangin = $ltc['quantity'] - $tambah;

            $this->db->set('quantity', $dikurangin);
            $this->db->where('id_ltc', $cari_stc['id_ltc']);
            $this->db->update('tb_ltc');
        } else if ($data['qty'] < $cari_stc['quantity_stc']) {

            $this->db->set('quantity_stc', $data['qty']);
            $this->db->where('id_stc', $data['id_contract_type']);
            $this->db->update('tb_stc');

            $kurang = $cari_stc['quantity_stc'] - $data['qty'];

            $ditambahin = $ltc['quantity'] + $kurang;

            $this->db->set('quantity', $ditambahin);
            $this->db->where('id_ltc', $cari_stc['id_ltc']);
            $this->db->update('tb_ltc');
        } else {
            // echo "tidak di ubah";
        }

        $this->db->set('invoice_stc', 1);
        $this->db->where('id_stc', $data['id_contract_type']);
        $this->db->update('tb_stc');

        $this->db->insert('tb_invoice', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Invoice has been added successfully!</div>');
        redirect('Invoice');
    }

    public function saveInvoiceSpot()
    {
        $data = [
            'invoice_number' => $this->input->post('invoice_number'),
            'contract_number' => $this->input->post('contract_number'),
            'contract_type' => $this->input->post('contract_type'),
            'id_contract_type' => $this->input->post('id_contract_type'),
            'id_product' => $this->input->post('id_product'),
            'id_company' => $this->input->post('id_company'),
            'id_mitra' => $this->input->post('id_mitra'),
            'sp_stc' => 0,
            'invoice_date' => $this->input->post('invoice_date'),
            'dp_persen' => $this->input->post('dp_persen'),
            'due_date' => $this->input->post('due_date'),
            'qty' => $this->input->post('qty'),
            'unit' => $this->input->post('unit'),
            'price' => $this->input->post('price'),
            'net_sales' => $this->input->post('net_sales'),
            'message' => $this->input->post('message'),
            'uang_muka' => $this->input->post('uang_muka'),
            'dpp' => $this->input->post('dpp'),
            'ppn' => $this->input->post('ppn'),
            'total' => $this->input->post('total'),
            'status' => 1,
            'date_created' => date("Y-m-d")
        ];

        $this->db->set('quantity', $data['qty']);
        $this->db->where('id_spot', $data['id_contract_type']);
        $this->db->update('tb_spot');

        $this->db->set('invoice_spot', 1);
        $this->db->where('id_spot', $data['id_contract_type']);
        $this->db->update('tb_spot');

        $this->db->insert('tb_invoice', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Invoice has been added successfully!</div>');
        redirect('Invoice');
    }

    public function rePrint($id_invoice, $contract_type)
    {
        $data['title'] = 're-print';

        if ($contract_type == 'stc') {

            $data['print'] = $this->db->get_where('tb_invoice', ['id_invoice' => $id_invoice])->row_array();

            $data['invoice_date'] = $this->tgl_indo(date($data['print']['invoice_date']));
            $data['due_date'] = $this->tgl_indo(date($data['print']['due_date']));

            $data['terbilang'] = $this->terbilang($data['print']['total']);

            $data['company'] = $this->db->get_where('tb_company', ['id_company' => $data['print']['id_company']])->row_array();
            $data['product'] = $this->db->get_where('tb_product', ['id_product' => $data['print']['id_product']])->row_array();
            $data['mitra'] = $this->db->get_where('tb_mitra', ['id_mitra' => $data['print']['id_mitra']])->row_array();


            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('invoice/view_re_print_stc', $data);
            $this->load->view('templates/footer');
        } else if ($contract_type == 'spot') {

            $data['print'] = $this->db->get_where('tb_invoice', ['id_invoice' => $id_invoice])->row_array();

            $data['invoice_date'] = $this->tgl_indo(date($data['print']['invoice_date']));
            $data['due_date'] = $this->tgl_indo(date($data['print']['due_date']));

            $data['terbilang'] = $this->terbilang($data['print']['total']);

            $data['company'] = $this->db->get_where('tb_company', ['id_company' => $data['print']['id_company']])->row_array();
            $data['product'] = $this->db->get_where('tb_product', ['id_product' => $data['print']['id_product']])->row_array();
            $data['mitra'] = $this->db->get_where('tb_mitra', ['id_mitra' => $data['print']['id_mitra']])->row_array();


            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('invoice/view_re_print_spot', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('Invoice');
        }
    }

    public function editInvoice($id_invoice, $contract_type)
    {
        if ($contract_type == 'stc') {

            $data['title'] = 'Edit Invoice STC';

            $this->db->select('*');
            $this->db->from('tb_invoice');
            $this->db->join('tb_product', 'tb_product.id_product = tb_invoice.id_product');
            $this->db->join('tb_company', 'tb_company.id_company = tb_invoice.id_company');
            $this->db->join('tb_mitra', 'tb_mitra.id_mitra = tb_invoice.id_mitra');
            $this->db->join('tb_stc', 'tb_stc.id_stc = tb_invoice.id_contract_type');
            $this->db->where('id_invoice', $id_invoice);
            $data['contract'] = $this->db->get()->row_array();

            $cari_stc = $this->db->get_where('tb_stc', ['id_stc' => $data['contract']['id_contract_type']])->row_array();
            $data['quantity_ltc'] = $this->db->get_where('tb_ltc', ['id_ltc' => $cari_stc['id_ltc']])->row_array();

            $data['terbilang'] = $this->terbilang($data['contract']['total']);

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('invoice/edit_invoice_stc', $data);
            $this->load->view('templates/footer');
        } else if ($contract_type == 'spot') {

            $data['title'] = 'Edit Invoice SPOT';

            $this->db->select('*');
            $this->db->from('tb_invoice');
            $this->db->join('tb_product', 'tb_product.id_product = tb_invoice.id_product');
            $this->db->join('tb_company', 'tb_company.id_company = tb_invoice.id_company');
            $this->db->join('tb_mitra', 'tb_mitra.id_mitra = tb_invoice.id_mitra');
            $this->db->where('id_invoice', $id_invoice);
            $data['contract'] = $this->db->get()->row_array();

            $data['spot'] = $this->db->get_where('tb_spot', ['id_spot' => $data['contract']['id_contract_type']])->row_array();

            $data['terbilang'] = $this->terbilang($data['contract']['total']);

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('invoice/edit_invoice_spot', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('Invoice');
        }
    }

    public function updateInvoiceStc()
    {
        $data = [
            'id_invoice' => $this->input->post('id_invoice'),
            'invoice_date' => $this->input->post('invoice_date'),
            'dp_persen' => $this->input->post('dp_persen'),
            'due_date' => $this->input->post('due_date'),
            'qty' => $this->input->post('qty'),
            'price' => $this->input->post('price'),
            'net_sales' => $this->input->post('net_sales'),
            'message' => $this->input->post('message'),
            'uang_muka' => $this->input->post('uang_muka'),
            'dpp' => $this->input->post('dpp'),
            'ppn' => $this->input->post('ppn'),
            'total' => $this->input->post('total')
        ];

        $invoice = $this->db->get_where('tb_invoice', ['id_invoice' => $data['id_invoice']])->row_array();

        $cari_stc = $this->db->get_where('tb_stc', ['id_stc' => $invoice['id_contract_type']])->row_array();
        $ltc = $this->db->get_where('tb_ltc', ['id_ltc' => $cari_stc['id_ltc']])->row_array();

        if ($data['qty'] > $cari_stc['quantity_stc']) {

            $this->db->set('quantity_stc', $data['qty']);
            $this->db->where('id_stc', $invoice['id_contract_type']);
            $this->db->update('tb_stc');

            $tambah = $data['qty'] - $cari_stc['quantity_stc'];

            $dikurangin = $ltc['quantity'] - $tambah;

            $this->db->set('quantity', $dikurangin);
            $this->db->where('id_ltc', $cari_stc['id_ltc']);
            $this->db->update('tb_ltc');
        } else if ($data['qty'] < $cari_stc['quantity_stc']) {

            $this->db->set('quantity_stc', $data['qty']);
            $this->db->where('id_stc', $invoice['id_contract_type']);
            $this->db->update('tb_stc');

            $kurang = $cari_stc['quantity_stc'] - $data['qty'];

            $ditambahin = $ltc['quantity'] + $kurang;

            $this->db->set('quantity', $ditambahin);
            $this->db->where('id_ltc', $cari_stc['id_ltc']);
            $this->db->update('tb_ltc');
        } else {
            // echo "tidak di ubah";
        }

        $this->db->set('invoice_date', $data['invoice_date']);
        $this->db->set('dp_persen', $data['dp_persen']);
        $this->db->set('due_date', $data['due_date']);
        $this->db->set('qty', $data['qty']);
        $this->db->set('price', $data['price']);
        $this->db->set('net_sales', $data['net_sales']);
        $this->db->set('message', $data['message']);
        $this->db->set('uang_muka', $data['uang_muka']);
        $this->db->set('dpp', $data['dpp']);
        $this->db->set('ppn', $data['ppn']);
        $this->db->set('total', $data['total']);
        $this->db->where('id_invoice', $data['id_invoice']);
        $this->db->update('tb_invoice');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Invoice has been updated successfully!</div>');
        redirect('Invoice');
    }

    public function updateInvoiceSpot()
    {
        $data = [
            'id_invoice' => $this->input->post('id_invoice'),
            'invoice_date' => $this->input->post('invoice_date'),
            'dp_persen' => $this->input->post('dp_persen'),
            'due_date' => $this->input->post('due_date'),
            'qty' => $this->input->post('qty'),
            'price' => $this->input->post('price'),
            'net_sales' => $this->input->post('net_sales'),
            'message' => $this->input->post('message'),
            'uang_muka' => $this->input->post('uang_muka'),
            'dpp' => $this->input->post('dpp'),
            'ppn' => $this->input->post('ppn'),
            'total' => $this->input->post('total')
        ];

        $invoice = $this->db->get_where('tb_invoice', ['id_invoice' => $data['id_invoice']])->row_array();

        $this->db->set('quantity', $data['qty']);
        $this->db->where('id_spot', $invoice['id_contract_type']);
        $this->db->update('tb_spot');

        $this->db->set('invoice_date', $data['invoice_date']);
        $this->db->set('dp_persen', $data['dp_persen']);
        $this->db->set('due_date', $data['due_date']);
        $this->db->set('qty', $data['qty']);
        $this->db->set('price', $data['price']);
        $this->db->set('net_sales', $data['net_sales']);
        $this->db->set('message', $data['message']);
        $this->db->set('uang_muka', $data['uang_muka']);
        $this->db->set('dpp', $data['dpp']);
        $this->db->set('ppn', $data['ppn']);
        $this->db->set('total', $data['total']);
        $this->db->where('id_invoice', $data['id_invoice']);
        $this->db->update('tb_invoice');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Invoice has been updated successfully!</div>');
        redirect('Invoice');
    }

    public function deleteInvoice($id_invoice)
    {
        $invoice = $this->db->get_where('tb_invoice', ['id_invoice' => $id_invoice])->row_array();

        if ($invoice['contract_type'] == 'stc') {

            $cari_stc = $this->db->get_where('tb_stc', ['id_stc' => $invoice['id_contract_type']])->row_array();
            $ltc = $this->db->get_where('tb_ltc', ['id_ltc' => $cari_stc['id_ltc']])->row_array();

            $tambah = $cari_stc['quantity_stc'] + $ltc['quantity'];

            $this->db->set('quantity', $tambah);
            $this->db->where('id_ltc', $ltc['id_ltc']);
            $this->db->update('tb_ltc');

            $this->db->set('invoice_stc', 0);
            $this->db->set('quantity_stc', NULL);
            $this->db->where('id_stc', $invoice['id_contract_type']);
            $this->db->update('tb_stc');
        } else if ($invoice['contract_type'] == 'spot') {
            $this->db->set('invoice_spot', 0);
            $this->db->set('quantity', NULL);
            $this->db->where('id_spot', $invoice['id_contract_type']);
            $this->db->update('tb_spot');
        } else {
            redirect('Invoice');
        }

        $this->db->set('status', 0);
        $this->db->set('qty', 0);
        $this->db->where('id_invoice', $id_invoice);
        $this->db->update('tb_invoice');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Invoice has been deleted successfully!</div>');
        redirect('Invoice');
    }

    function getRomawi($month)
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

    function tgl_indo($tanggal)
    {
        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember',
            00 => 'null'
        );
        $pecahkan = explode('-', $tanggal);

        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun

        return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
    }

    function penyebut($nilai)
    {
        $nilai = abs($nilai);
        $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        $temp = "";
        if ($nilai < 12) {
            $temp = " " . $huruf[$nilai];
        } else if ($nilai < 20) {
            $temp = $this->penyebut($nilai - 10) . " belas";
        } else if ($nilai < 100) {
            $temp = $this->penyebut($nilai / 10) . " puluh" . $this->penyebut($nilai % 10);
        } else if ($nilai < 200) {
            $temp = " seratus" . $this->penyebut($nilai - 100);
        } else if ($nilai < 1000) {
            $temp = $this->penyebut($nilai / 100) . " ratus" . $this->penyebut($nilai % 100);
        } else if ($nilai < 2000) {
            $temp = " seribu" . $this->penyebut($nilai - 1000);
        } else if ($nilai < 1000000) {
            $temp = $this->penyebut($nilai / 1000) . " ribu" . $this->penyebut($nilai % 1000);
        } else if ($nilai < 1000000000) {
            $temp = $this->penyebut($nilai / 1000000) . " juta" . $this->penyebut($nilai % 1000000);
        } else if ($nilai < 1000000000000) {
            $temp = $this->penyebut($nilai / 1000000000) . " milyar" . $this->penyebut(fmod($nilai, 1000000000));
        } else if ($nilai < 1000000000000000) {
            $temp = $this->penyebut($nilai / 1000000000000) . " trilyun" . $this->penyebut(fmod($nilai, 1000000000000));
        }
        return $temp;
    }

    function terbilang($nilai)
    {
        if ($nilai < 0) {
            $hasil = "minus " . trim($this->penyebut($nilai));
        } else {
            $hasil = trim($this->penyebut($nilai));
        }
        return $hasil;
    }
}