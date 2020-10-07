<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_returpenjualan extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_returpenjualan');
        $this->load->model('M_Setting');
        $this->load->model('M_penjualan');
        $this->load->model('M_barang');
        if(!$this->session->userdata('id_user')){
            redirect('C_Login');
        }
    }

    function index()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['returpenjualan'] = $this->M_returpenjualan->getall();
        $this->load->view('penjualan/v_vreturpenjualan',$data); 
        $this->load->view('template/footer');
    }

    function tambah(){
        $id = $this->session->userdata('id_user');
        $hasil_kode = $this->M_returpenjualan->tambahdata($id);
        $this->session->set_flashdata('SUCCESS', "Record Added Successfully!!");
        redirect('C_returpenjualan');

    }

    function add()
    {
        // echo $invoice;exit;
        $this->load->view('template/header');
        $id = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);

        $modul = 'returpenjualan';
        $kode = $this->M_Setting->cekkode($modul);
        foreach ($kode as $modul) {
            $a = $modul->kodefinal;
            if (strpos($a, 'ggal') != false) {
                date_default_timezone_set('Asia/Jakarta');
                $tgl = date('d-m-Y');
                $a = str_replace("tanggal", $tgl, $a);
                $data = $this->M_returpenjualan->cekreturpenjualantgl();
                $no = count($data) + 1;
                $kode2 = str_replace("no", $no, $a);
            } else {
                $data = $this->M_returpenjualan->cekkodereturpenjualan();
                foreach ($data as $id) {
                    $id = $id+1;
                    $kode2 = str_replace("no", $id, $a);
                }
            }
        }
        
        // $data['invoice']=$invoice;
        $idnama = $this->session->userdata('nama');
        $name = str_replace("username", $idnama, $kode2);
        $data['kode'] = $name;
        $data['penjualan'] = $this->M_penjualan->getpenjualan();
        $data['barang'] = $this->M_barang->getbarang();
        $this->load->view('penjualan/v_returpenjualan',$data); 
        $this->load->view('template/footer');
    }

    // function add($invoice='')
    // {
    //     // echo $invoice;exit;
    //     $this->load->view('template/header');
    //     $id = $this->session->userdata('id_user');
    //     $data['menu'] = $this->M_Setting->getmenu1($id);
    //     $this->load->view('template/sidebar.php', $data);

    //     $modul = 'returpenjualan';
    //     $kode = $this->M_Setting->cekkode($modul);
    //     foreach ($kode as $modul) {
    //         $a = $modul->kodefinal;
    //         if (strpos($a, 'ggal') != false) {
    //             date_default_timezone_set('Asia/Jakarta');
    //             $tgl = date('d-m-Y');
    //             $a = str_replace("tanggal", $tgl, $a);
    //             $data = $this->M_returpenjualan->cekreturpenjualantgl();
    //             $no = count($data) + 1;
    //             $kode2 = str_replace("no", $no, $a);
    //         } else {
    //             $data = $this->M_returpenjualan->cekkodereturpenjualan();
    //             foreach ($data as $id) {
    //                 $id = $id+1;
    //                 $kode2 = str_replace("no", $id, $a);
    //             }
    //         }
    //     }
        
    //     $data['invoice']=$invoice;
    //     $idnama = $this->session->userdata('nama');
    //     $name = str_replace("username", $idnama, $kode2);
    //     $data['kode'] = $name;
    //     $data['penjualan'] = $this->M_penjualan->getpenjualan();
    //     $data['barang'] = $this->M_barang->getbarang();
    //     $this->load->view('penjualan/v_returpenjualan',$data); 
    //     $this->load->view('template/footer');
    // }

    function view($ida)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['returpenjualan'] = $this->M_returpenjualan->getreturpenjualan($ida);
        $data['dtlreturpenjualan'] = $this->M_returpenjualan->getdetailreturpenjualan($ida);

        //$data['penjualan'] = $this->M_penjualan->getretur($ida);
        //$data['returpenjualan'] = $this->M_penjualan->getreturpenjualan($ida);

        $this->load->view('penjualan/v_viewreturpenjualan',$data); 
        $this->load->view('template/footer');
    }

    function ganti_status($id_returpenjualan)
    {
        $hasil = $this->M_returpenjualan->ganti_status($id_returpenjualan);
        if($hasil){
            $this->session->set_flashdata('SUCCESS', "Record status updated Successfully!!");
        }else{
            $this->session->set_flashdata('ERROR', "Approve gagal cek stok sebelum approve retur");
        }
        // print_r($hasil);exit;
        redirect('C_returpenjualan');
    }

}