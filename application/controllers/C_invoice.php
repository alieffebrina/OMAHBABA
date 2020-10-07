<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_invoice extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_invoice');
        $this->load->model('M_pelanggan');
        $this->load->model('M_cabang');
        $this->load->model('M_sales');
        $this->load->model('M_Setting');
        $this->load->model('M_penjualan');
        $this->load->model('M_barang');
        $this->load->model('M_voucher');
        $this->load->library('pdf'); 
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
        $data['invoice'] = $this->M_invoice->getall();
        $this->load->view('penjualan/v_vinvoice',$data); 
        $this->load->view('template/footer');
    }

    function tambah()
    {
        $id = $this->session->userdata('id_user');
        $nota =  $this->input->post('nonota');
        $cek = $this->M_penjualan->tambahdata($id);

        $id_submenu = '13';
        $ket = 'tambah data Invoice';
        $this->M_Setting->userlog($id, $id_submenu, $ket);
        $this->session->set_flashdata('Sukses', "Data Berhasil DI Tambahkan");

        if ($this->input->post('cetak')== true){
            redirect('C_invoice/cetakinvoice/'.$nota);
        } else {
            redirect('C_suratjalan/sj/'.$nota);
        }
    }

    function add($nota)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);

        $modul = 'invoice';
        $kode = $this->M_Setting->cekkode($modul);
        foreach ($kode as $modul) {
            $a = $modul->kodefinal;
            if (strpos($a, 'ggal') != false) {
                date_default_timezone_set('Asia/Jakarta');
                $tgl = date('d-m-Y');
                $a = str_replace("tanggal", $tgl, $a);
                $data = $this->M_invoice->cekinvoicetgl();
                $no = count($data) + 1;
                $kode2 = str_replace("no", $no, $a);
            } else {
                $data = $this->M_invoice->cekkodeinvoice();
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
        $data['invoice'] = $this->M_penjualan->getdetailpenjualan($nota);
        // echo '<pre>';print_r($data['penjualan']);exit;
        $data['barang'] = $this->M_barang->getbarang();
        $data['voucher'] = $this->M_voucher->getvoucher();
        $this->load->view('penjualan/v_invoice',$data); 
        $this->load->view('template/footer');
    }

    function view($ida)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['invoice'] = $this->M_invoice->getinvoice($ida);
        $data['dtlpenjualan'] = $this->M_penjualan->getdetailpenjualan($data['invoice'][0]->id_penjualan);

        $this->load->view('penjualan/v_viewinvoice',$data); 
        $this->load->view('template/footer');
    }

    function cetak($ida)
    {
        $this->load->view('penjualan/cetak'); 
    }

    function cetakinvoice($ida){
        // $this->load->view('master/setting/terbilang'); 
        $pdf = new FPDF('L','mm',array('110', '160'));
        // $pdf = new FPDF('L','mm',array('148', '210'));
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','',8,'C');
        // mencetak string 
        $pdf->Cell(90,5,'OMAH BABA',0,0,'L');
        // $pdf->Cell(90,5,'JUAL PAVING MULTI',0,0,'L');   

        $invoice = $this->M_invoice->getinvoicepenjualan($ida);
        $sdtlinvoice = $this->M_invoice->getinvoice($ida);
        //$admin = $this->M_invoice->getadmin($ida);

        foreach ($invoice as $key ) {

            // $originalDate = "2010-03-21";
            $newDate = date("d-m-Y h:i:s", strtotime($key->tglkirim));

            $pdf->Cell(28,4,'Brebes : '.$newDate,0,1,'R');
            $pdf->Cell(90,4,'OMAH BABA',0,0,'L');
            $pdf->Cell(34,4,'Tuan / Toko : '.$key->nama,0,1,'R');
            $pdf->Cell(90,4,'Brebes, Jawa Tengah',0,0,'L');
            $pdf->Cell(18,4,'Telp : '.$key->tlp,0,1,'R');
            $pdf->Cell(90,4,'Telp : 081376767574',0,0,'L');
            $pdf->Cell(53,4,'Alamat : '.$key->alamat,0,1,'R'); 
            $pdf->Cell(90,4,'Website : www.omahababa.com',0,0,'L');
            $pdf->Cell(19,4,'Nama Pengirim : '.$key->namapengirim,0,1,'R'); 
            $pdf->Cell(110,4,'Alamat Pengiriman: ... ',0,1,'R');
            $pdf->Cell(143,4,''.$key->alamatkirim,0,1,'R'); 
            $pdf->Cell(28,4,'Admin : '.$key->username,0,0,'L');
            $pdf->Cell(96,4,'No. Reg. : '.$key->id_invoicejual,0,1,'R');
            
            
            $pdf->Cell(100,3,'',0,1,'L');

            // $pdf->Line(10,15,200,15);
        // Memberikan space kebawah agar tidak terlalu rapat
            $pdf->SetFont('Arial','B',8,'C');
            $pdf->Cell(100,4,'NOTA INVOICE',0,2,'C');
            $pdf->Cell(10,2,'',0,1);
            $pdf->SetFont('Arial','',8,'C');
            $pdf->Cell(20,12,'Jumlah',1,0,'C');
            $pdf->Cell(20,12,'Satuan',1,0,'C');
            $pdf->Cell(65,12,'Keterangan',1,0,'C');
            $pdf->Cell(83,6,'Harga',1,0,'C');
            $pdf->Cell(100,6,'',0,1);
            $pdf->Cell(105,6,'',0,0);
            $pdf->Cell(30,6,'Satuan',1,0,'C');
            $pdf->Cell(53,6,'Total',1,0,'C');
            $pdf->Cell(100,6,'',0,1);
        }
        $no =1;
        foreach ($dtlinvoice as $dtl ) {

            $pdf->Cell(20,6,$dtl->qtt,1,0,'C');
            $pdf->Cell(20,6,$dtl->satuan,1,0,'C');
            $pdf->Cell(65,6,$dtl->kategori,1,0);
            $pdf->Cell(30,6,'Rp. '.number_format($dtl->harga),1,0);
            $pdf->Cell(53,6,'Rp. '.number_format(($dtl->harga*$dtl->qtt)-$dtl->diskon),1,1);
        
        } 
        foreach ($invoice as $key ) {
            
            $pdf->SetFont('Arial','B',8,'');
            $pdf->Cell(135,6,'Total Tagihan ',1,0,'C');
            $pdf->Cell(53,6,'Rp. '.number_format($key->subtotal),1,1);
            $pdf->Cell(188,6,'Terbilang : '.terbilang($key->subtotal)." rupiah",1,1);
            
        }
        $pdf->Cell(30,5,'',0,1);
        $pdf->Cell(50,3,'Hormat Kami,',0,0,'L');
        $pdf->Cell(30,10,'',0,1);
        $pdf->Cell(50,3,'( Lina )',0,0,'L');
    
        // $pdf->AutoPrint(true);
        $pdf->Output();
    }
}