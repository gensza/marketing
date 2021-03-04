<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        require_once APPPATH . 'third_party/dompdf/dompdf_config.inc.php';

        if (!$this->session->userdata('email')) {
            redirect('Auth');
        }
    }

    public function index()
    {
        $data['title'] = "Reports LTC";

        $this->db->select('*');
        $this->db->from('tb_ltc');
        $this->db->join('tb_product', 'tb_product.id_product = tb_ltc.id_product');
        $this->db->join('tb_company', 'tb_company.id_company = tb_ltc.id_company');
        $this->db->join('tb_mitra', 'tb_mitra.id_mitra = tb_ltc.id_mitra');
        $this->db->where('is_active_ltc', 1);
        $this->db->order_by('id_ltc', 'DESC');
        $data['ltc'] = $this->db->get()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('report/data_ltc', $data);
        $this->load->view('templates/footer');
    }

    public function dataSpot()
    {
        $data['title'] = "Reports SPOT";

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
        $this->load->view('report/data_spot', $data);
        $this->load->view('templates/footer');
    }

    public function dataStc()
    {
        $data['title'] = "Reports Stc";

        $this->db->select('*');
        $this->db->from('tb_stc');
        $this->db->join('tb_product', 'tb_product.id_product = tb_stc.id_product');
        $this->db->join('tb_company', 'tb_company.id_company = tb_stc.id_company');
        $this->db->join('tb_mitra', 'tb_mitra.id_mitra = tb_stc.id_mitra');
        $this->db->join('tb_ltc', 'tb_ltc.id_ltc = tb_stc.id_ltc');
        $this->db->where('stc_status', 1);
        $this->db->order_by('id_stc', 'DESC');
        $data['stc'] = $this->db->get()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('report/data_stc', $data);
        $this->load->view('templates/footer');
    }

    public function reportLtc($id_ltc)
    {
        $dompdf = new Dompdf();

        $this->db->select('*');
        $this->db->from('tb_ltc');
        $this->db->join('tb_product', 'tb_product.id_product = tb_ltc.id_product');
        $this->db->join('tb_company', 'tb_company.id_company = tb_ltc.id_company');
        $this->db->join('tb_mitra', 'tb_mitra.id_mitra = tb_ltc.id_mitra');
        $this->db->where('id_ltc', $id_ltc);
        $this->db->order_by('id_ltc', 'DESC');
        $data['ltc'] = $this->db->get()->row_array();

        $data['ltc_date'] = $this->tgl_indo(date($data['ltc']['ltc_date']));
        $data['leki_date'] = $this->tgl_indo(date($data['ltc']['leki_date']));
        $data['lekf_date'] = $this->tgl_indo(date($data['ltc']['lekf_date']));
        $data['cp_dp_date'] = $this->tgl_indo(date($data['ltc']['cp_dp_date']));

        $data['total'] = $data['ltc']['quantity'] * $data['ltc']['unit_price'];

        if ($data['ltc']['ppn'] == 'on') {
            $cekppn = 10;
        } else {
            $cekppn = 0;
        }
        $data['ppn'] = $cekppn * $data['total'] / 100;

        $data['sp'] = $data['total'] + $data['ppn'];

        if($data['ltc']['id_product'] == 1)
        {
            $html = $this->load->view('report/report_ltc_cpo', $data, true);

        }else if($data['ltc']['id_product'] == 2){

            $html = $this->load->view('report/report_ltc_cgk', $data, true);

        }else if($data['ltc']['id_product'] == 3){

            $html = $this->load->view('report/report_ltc_pk', $data, true);

        }else{
            redirect('Report');
        }

        $dompdf->load_html($html);
        $dompdf->set_paper('A4', 'potrait');
        $dompdf->render();
        $pdf = $dompdf->output();
        $dompdf->stream('ltc-report.pdf', array('Attachment' => false));
    }

    public function reportStc($id_stc)
    {
        $dompdf = new Dompdf();

        $this->db->select('*');
        $this->db->from('tb_stc');
        $this->db->join('tb_product', 'tb_product.id_product = tb_stc.id_product');
        $this->db->join('tb_company', 'tb_company.id_company = tb_stc.id_company');
        $this->db->join('tb_mitra', 'tb_mitra.id_mitra = tb_stc.id_mitra');
        // $this->db->join('tb_ltc', 'tb_ltc.id_ltc = tb_stc.id_ltc');
        $this->db->where('id_stc', $id_stc);
        $this->db->order_by('id_stc', 'DESC');
        $data['stc'] = $this->db->get()->row_array();

        $data['data_ltc'] = $this->db->get_where('tb_ltc', ['id_ltc' => $data['stc']['id_ltc']])->row_array();

        $data['stc_date'] = $this->tgl_indo(date($data['stc']['stc_date']));
        $data['wp_1'] = $this->tgl_indo(date($data['stc']['wp_1']));
        $data['wp_2'] = $this->tgl_indo(date($data['stc']['wp_2']));
        $data['p_t_dp'] = $this->tgl_indo(date($data['stc']['p_t_dp']));

        $this->db->where(['id_ltc' => $data['stc']['id_ltc'], 'stc_status' => 1]);
        $this->db->from('tb_stc');
        $data['count_stc'] = $this->db->count_all_results();

        $cek_urut = $this->db->get_where('tb_stc', ['id_ltc' => $data['stc']['id_ltc'], 'stc_status' => 1])->result_array();
        
        $no = 0;
        foreach($cek_urut as $cek)
        {   
            $no++;

            if($cek['stc_number'] == $data['stc']['stc_number'])
            {
                $data['no_urut'] = $no++;
            }
        }

        $data['total'] = $data['stc']['quantity_stc'] * $data['data_ltc']['unit_price'];

        if ($data['data_ltc']['ppn'] == 'on') {
            $cekppn = 10;
        } else {
            $cekppn = 0;
        }
        $data['ppn'] = $cekppn * $data['total'] / 100;

        $data['sp'] = $data['total'] + $data['ppn'];

        if($data['stc']['id_product'] == 1)
        {
            $html = $this->load->view('report/report_stc_cpo', $data, true);

        }else if($data['stc']['id_product'] == 2){

            $html = $this->load->view('report/report_stc_cgk', $data, true);

        }else if($data['stc']['id_product'] == 3){

            $html = $this->load->view('report/report_stc_pk', $data, true);

        }else{
            redirect('Report');
        }

        $dompdf->load_html($html);
        $dompdf->set_paper('A4', 'potrait');
        $dompdf->render();
        $pdf = $dompdf->output();
        $dompdf->stream('stc-report.pdf', array('Attachment' => false));
    }

    public function reportSpot($id_spot)
    {
        $dompdf = new Dompdf();

        $this->db->select('*');
        $this->db->from('tb_spot');
        $this->db->join('tb_product', 'tb_product.id_product = tb_spot.id_product');
        $this->db->join('tb_company', 'tb_company.id_company = tb_spot.id_company');
        $this->db->join('tb_mitra', 'tb_mitra.id_mitra = tb_spot.id_mitra');
        $this->db->where('id_spot', $id_spot);
        $this->db->order_by('id_spot', 'DESC');
        $data['spot'] = $this->db->get()->row_array();

        $data['spot_date'] = $this->tgl_indo(date($data['spot']['spot_date']));
        $data['leki_date'] = $this->tgl_indo(date($data['spot']['leki_date']));
        $data['lekf_date'] = $this->tgl_indo(date($data['spot']['lekf_date']));
        $data['cp_dp_date'] = $this->tgl_indo(date($data['spot']['cp_dp_date']));

        $data['total'] = $data['spot']['quantity'] * $data['spot']['unit_price'];

        if ($data['spot']['ppn'] == 'on') {
            $cekppn = 10;
        } else {
            $cekppn = 0;
        }
        $data['ppn'] = $cekppn * $data['total'] / 100;

        $data['sp'] = $data['total'] + $data['ppn'];

        if($data['spot']['id_product'] == 1)
        {
            $html = $this->load->view('report/report_spot_cpo', $data, true);

        }else if($data['spot']['id_product'] == 2){

            $html = $this->load->view('report/report_spot_cgk', $data, true);

        }else if($data['spot']['id_product'] == 3){

            $html = $this->load->view('report/report_spot_pk', $data, true);

        }else{
            redirect('Report');
        }

        $dompdf->load_html($html);
        $dompdf->set_paper('A4', 'potrait');
        $dompdf->render();
        $pdf = $dompdf->output();
        $dompdf->stream('spot-report.pdf', array('Attachment' => false));
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
}