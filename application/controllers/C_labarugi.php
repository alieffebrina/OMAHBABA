<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_Labarugi extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_labarugi');
        $this->load->model('M_Setting');
        if(!$this->session->userdata('id_user')){
            redirect('C_Login');
        }
        // $this->load->model('M_penjualan');
        // $this->load->model('M_pembelian');
        // $this->load->model('M_kas');
    }

    function index()
    {    
        $tgla = $this->input->post('tgl');
        $tglb = str_replace(' ', '', $tgla);
        $excel = $this->input->post('excel');
        if ($excel == 'excel'){
            redirect('C_Labarugi/excel/'.$tglb);
        } else {
            $this->load->view('template/header');
            $id = $this->session->userdata('id_user');
            $data['menu'] = $this->M_Setting->getmenu1($id);
            $this->load->view('template/sidebar.php', $data);
            // $data['laporanlabarugi'] = $this->M_labarugi->search();
            $data['laporanpenjualan'] = $this->M_labarugi->lbjual($tglb);
            $data['laporanpembelian'] = $this->M_labarugi->lbbeli($tglb);
            $data['totalkas'] = $this->M_labarugi->lbkas($tglb);
            $this->load->view('penjualan/v_laporanlabarugi', $data); 
            $this->load->view('template/footer');
        }
    }


    public function excel($tglb)
    {   
        
        $data['laporanpenjualan'] = $this->M_labarugi->lbjual($tglb);
        $data['laporanpembelian'] = $this->M_labarugi->lbbeli($tglb);
        $data['totalkas'] = $this->M_labarugi->lbkas($tglb);
        // $labarugi = $this->M_labarugi->search($tglb);
        $data['title'] = 'Laporan Data Laba Rugi';
        $dataa = array('title' => 'Laporan Data Laba Rugi',
                'excel' => $data);
        $this->load->view('penjualan/excellabarugi', $data);
    }
}