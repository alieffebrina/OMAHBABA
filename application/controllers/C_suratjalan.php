<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_suratjalan extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_suratjalan');
        $this->load->model('M_pelanggan');
        $this->load->model('M_cabang');
        $this->load->model('M_sales');
        $this->load->model('M_Setting');
        $this->load->model('M_penjualan');
        $this->load->model('M_barang');
        // $this->load->library('pdf'); 
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
        $data['suratjalan'] = $this->M_suratjalan->getall();
        $this->load->view('penjualan/v_vsuratjalan',$data); 
        $this->load->view('template/footer');
    }

    function tambah()
    {
        $id = $this->session->userdata('id_user');
        $nota =  $this->input->post('nonota');
        $cek = $this->M_suratjalan->tambahdata($id);

        $id_submenu = '11';
        $ket = 'tambah data surat jalan';
        $this->M_Setting->userlog($id, $id_submenu, $ket);
        $this->session->set_flashdata('Sukses', "Data Berhasil DI Tambahkan");

        if ($this->input->post('cetak')== true){
            redirect('C_suratjalan/cetaksuratjalan/'.$nota);
        } else {
            redirect('C_suratjalan');
        }
    }

    function add($nota)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);

        $modul = 'suratjalan';
        $kode = $this->M_Setting->cekkode($modul);
        foreach ($kode as $modul) {
            $a = $modul->kodefinal;
            if (strpos($a, 'ggal') != false) {
                date_default_timezone_set('Asia/Jakarta');
                $tgl = date('d-m-Y');
                $a = str_replace("tanggal", $tgl, $a);
                $data = $this->M_suratjalan->ceksuratjalantgl();
                $no = count($data) + 1;
                $kode2 = str_replace("no", $no, $a);
            } else {
                $data = $this->M_suratjalan->cekkodesuratjalan();
                foreach ($data as $id) {
                    $id = $id+1;
                    $kode2 = str_replace("no", $id, $a);
                }
            }
        }

        $idnama = $this->session->userdata('nama');
        $name = str_replace("username", $idnama, $kode2);
        $data['kode'] = $name;
        $data['penjualan'] = $this->M_penjualan->getnota($nota);
        $data['suratjalan'] = $this->M_penjualan->getdetailpenjualan($nota);
        // echo '<pre>';print_r($data['penjualan']);exit;
        // $data['barang'] = $this->M_barang->getbarang();
        $this->load->view('penjualan/v_suratjalan',$data); 
        $this->load->view('template/footer');
    }

    function view($ida)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['suratjalan'] = $this->M_suratjalan->getsj($ida);
        $data['dtlpenjualan'] = $this->M_penjualan->getdetailpenjualan($data['suratjalan'][0]->id_penjualan);

        $this->load->view('penjualan/v_viewsuratjalan',$data); 
        $this->load->view('template/footer');
    }

     function laporan()
    {
        $tgla = $this->input->post('tgl');
        $tglb = str_replace(' ', '', $tgla);
        $excel = $this->input->post('excel');
        if ($excel == 'excel'){
            redirect('C_penjualan/excel/'.$tglb);
        } else {
        $this->load->view('template/header');
        $id = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['penjualan'] = $this->M_suratjalan->search($tglb);
        $this->load->view('penjualan/v_laporansuratjalan',$data); 
        $this->load->view('template/footer');
        }
    }

    function kirim($ida)
    {   
        // $id = $this->session->userdata('id_user');
        $this->M_suratjalan->edit($ida);
        $this->session->set_flashdata('SUCCESS', "Record Added Successfully!!");
        redirect('C_suratjalan');
    }

    // function cetak($ida)
    // {
    //     $this->load->view('penjualan/cetak'); 
    // }

    // function cetaksuratjalan($ida){
    //     // $this->load->view('master/setting/terbilang'); 
    //     $pdf = new FPDF('L','mm',array('110', '160'));
    //     // $pdf = new FPDF('L','mm',array('148', '210'));
    //     // membuat halaman baru
    //     $pdf->AddPage();
    //     // setting jenis font yang akan digunakan
    //     $pdf->SetFont('Arial','',8,'C');
    //     // mencetak string 
    //     $pdf->Cell(90,5,'OMAH BABA',0,0,'L');
    //     // $pdf->Cell(90,5,'JUAL PAVING MULTI',0,0,'L');   

    //     $suratjalan = $this->M_suratjalan->getsuratjalan($ida);
    //     $sj = $this->M_suratjalan->getsj($ida);
    //     //$admin = $this->M_suratjalan->getadmin($ida);

    //     foreach ($suratjalan as $key ) {

    //         // $originalDate = "2010-03-21";
    //         $newDate = date("d-m-Y h:i:s", strtotime($key->tglkirim));

    //         $pdf->Cell(28,4,'Brebes : '.$newDate,0,1,'R');
    //         $pdf->Cell(90,4,'OMAH BABA',0,0,'L');
    //         $pdf->Cell(34,4,'Tuan / Toko : '.$key->nama,0,1,'R');
    //         $pdf->Cell(90,4,'Brebes, Jawa Tengah',0,0,'L');
    //         $pdf->Cell(18,4,'Telp : '.$key->tlp,0,1,'R');
    //         $pdf->Cell(90,4,'Telp : 081376767574',0,0,'L');
    //         $pdf->Cell(53,4,'Alamat : '.$key->alamat,0,1,'R'); 
    //         $pdf->Cell(90,4,'Website : www.omahbaba.com',0,0,'L');
    //         $pdf->Cell(19,4,'Nama Pengirim : '.$key->namapengirim,0,1,'R'); 
    //         $pdf->Cell(110,4,'Alamat Pengiriman: ... ',0,1,'R');
    //         $pdf->Cell(143,4,''.$key->alamatkirim,0,1,'R'); 
    //         $pdf->Cell(28,4,'Admin : '.$key->username,0,0,'L');
    //         $pdf->Cell(96,4,'No. Reg. : '.$key->id_suratjalan,0,1,'R');
            
            
    //         $pdf->Cell(100,3,'',0,1,'L');
    //         // $pdf->Line(10,15,200,15);
    //     // Memberikan space kebawah agar tidak terlalu rapat
    //         $pdf->SetFont('Arial','B',8,'C');
    //         $pdf->Cell(100,4,'NOTA SURAT JALAN',0,2,'L');
    //         $pdf->SetFont('Arial','',8,'C');
    //         $pdf->Cell(10,2,'',0,1);
    //         $pdf->SetFont('Arial','',8,'C');
    //         $pdf->Cell(30,6,'Jumlah',1,0,'C');
    //         $pdf->Cell(30,6,'Satuan',1,0,'C');
    //         $pdf->Cell(82,6,'Keterangan',1,0,'C');
    //         $pdf->Cell(100,6,'',0,1);
    //     }
    //     $no =1;
    //     foreach ($sj as $dtl ) {
            
    //         $pdf->Cell(30,6,$dtl->qtt,1,0,'C');
    //         $pdf->Cell(30,6,$dtl->satuan,1,0,'C');
    //         $pdf->Cell(82,6,$dtl->kategori,1,0);
    //         $pdf->Cell(100,6,'',0,1);
        
    //     } 
    //     $pdf->Cell(30,5,'',0,1);
    //     $pdf->Cell(50,3,'Hormat Kami,',0,0,'L');
    //     $pdf->Cell(30,10,'',0,1);
    //     $pdf->Cell(50,3,'( Lina )',0,0,'L');
    //     // $pdf->AutoPrint(true);
    //     $pdf->Output();
    // }
}