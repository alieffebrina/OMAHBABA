<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_penjualan extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_penjualan');
        $this->load->model('M_Setting');
        $this->load->model('M_pelanggan');
        $this->load->model('M_cabang');
        $this->load->model('M_sales');
        $this->load->model('M_barang');
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
        $username = $this->session->userdata('username');
        $data['penjualan'] = $this->M_penjualan->getall($id,$username);
        $data['barang'] = $this->M_barang->getbarang();
        $this->load->view('penjualan/v_vpenjualan',$data); 
        $this->load->view('template/footer');
    }

    function tambah()
    {
        $id = $this->session->userdata('id_user');
        $nota =  $this->input->post('nonota');
        $cek = $this->M_penjualan->tambahdata($id);

        $id_submenu = '10';
        $ket = 'tambah data penjualan';
        $this->M_Setting->userlog($id, $id_submenu, $ket);
        $this->session->set_flashdata('Sukses', "Data Berhasil DI Tambahkan");

        if ($this->input->post('cetak')== true){
            redirect('C_penjualan/cetakpenjualan/'.$nota);
        } else {
            redirect('C_penjualan');
        }
    }

    function addcart()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);

        $modul = 'penjualan';
        $kode = $this->M_Setting->cekkode($modul);
        foreach ($kode as $modul) {
            $a = $modul->kodefinal;
            if (strpos($a, 'ggal') != false) {
                date_default_timezone_set('Asia/Jakarta');
                $tgl = date('d-m-Y');
                $a = str_replace("tanggal", $tgl, $a);
                $data = $this->M_penjualan->cekpenjualantgl();
                $no = count($data) + 1;
                $kode2 = str_replace("no", $no, $a);
            } else {
                $data = $this->M_penjualan->cekkodepenjualan();
                foreach ($data as $id) {
                    $id = $id+1;
                    $kode2 = str_replace("no", $id, $a);
                }
            }
        }
        
        $idnama = $this->session->userdata('nama');
        $name = str_replace("username", $idnama, $kode2);
        $data['kode'] = $name;
        $data['pelanggan'] = $this->M_pelanggan->getpelanggan();
        $data['cabang'] = $this->M_cabang->getcabang();
        $data['sales'] = $this->M_sales->getsales();
        $data['barang'] = $this->M_barang->getbarang();
        $this->load->view('penjualan/v_daftarbarang',$data); 
        $this->load->view('template/footer');
    }

    function edit()
    {
        $id = $this->session->userdata('id_user');
        $nota =  $this->input->post('nonota');
        $cek = $this->M_penjualan->tambahdata($id);

        $id_submenu = '10';
        $ket = 'edit penjualan';
        $this->M_Setting->userlog($id, $id_submenu, $ket);
        $this->session->set_flashdata('Sukses', "Data Berhasil DI Perbarui");

        if ($this->input->post('cetak')== true){
            redirect('C_penjualan/cetakpenjualan/'.$nota);
        } else {
            redirect('C_invoice/add/'.$nota);
        }
    }

    function search_catalog(){
        $data['barang'] = $this->M_barang->getbarang($_POST['keyword']);
        $this->load->view('penjualan/catalog',$data); 
    }

    function view($ida)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['penjualan'] = $this->M_penjualan->getdetail($ida);
        $data['dtljual'] = $this->M_penjualan->getdetailpenjualan($ida);

        // $this->load->view('penjualan/v_viewpenjualan',$data); 
        $this->load->view('penjualan/v_viewpenjualan',$data); 
        $this->load->view('template/footer');
    }

    function piutang()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['penjualan'] = $this->M_penjualan->getpiutang();
        $this->load->view('penjualan/v_accpiutang',$data); 
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
        $data['penjualan'] = $this->M_penjualan->search($tglb);
        $this->load->view('penjualan/v_laporanpenjualan',$data); 
        $this->load->view('template/footer');
        }
    }

     function lpiutang()
    {
        $tgla = $this->input->post('tgl');
        $tglb = str_replace(' ', '', $tgla);
        $excel = $this->input->post('excel');
        if ($excel == 'excel'){
            redirect('C_penjualan/excelpiutang/'.$tglb);
        }
        $this->load->view('template/header');
        $id = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['penjualan'] = $this->M_penjualan->lpiutang($tglb);
        $this->load->view('penjualan/v_laporanpiutang',$data); 
        $this->load->view('template/footer');
        
    }

    function get_info_penjualan()
    {// Ambil data ID Provinsi yang dikirim via ajax post
            $id_penjualan = $this->input->post('id_penjualan');
            $type = $this->input->post('type');
            if($id_penjualan!=''){
            $data['penjualan'] = $this->M_penjualan->getdetail($id_penjualan);
            $data['dtlpenjualan'] = $this->M_penjualan->getdetailpenjualan($id_penjualan);
            
            $no=1; $table='';
            if($type=='retur'){
                foreach ($data['dtlpenjualan'] as $key=>$dtl) {
                       $table.="<tr id='".$key."'>
                        <td><input type='hidden' name='id_detailpenjualan[]' value='".$dtl->id_detailpenjualan."'>". $no++ ."</td>
                        <td><input type='hidden' name='id_barang[]' value='".$dtl->id_barang."'>". $dtl->barang ."</td>
                        <td><input type='hidden' name='satuan[]' value='".$dtl->satuan."'>". $dtl->satuan ."</td>
                        <td>". $dtl->kategori ."</td>
                        <td><input type='hidden' id='qtt_".$key."' value='".$dtl->qtt."'>". $dtl->qtt ."</td>
                        <td><input type='text' name='jumlahretur[]' value='' onkeyup='check_retur(this);'></td>
                        <td><input type='hidden' name='harga[]' value='".$dtl->harga."'>". number_format($dtl->harga) ."</td>
                      </tr>";
                  } 
            }else{
                foreach ($data['dtlpenjualan'] as $dtl) {
                       $table.="<tr>
                        <td>". $no++ ."</td>
                        <td>". $dtl->barang ."</td>
                        <td>". $dtl->qtt ."</td>
                        <td>". $dtl->satuan ."</td>
                        <td>". number_format($dtl->harga) ."</td>
                        <td>". number_format($dtl->diskon) ."</td>
                        <td>". number_format($dtl->subtotal) ."</td>
                      </tr>";
                  } 
            }
                
            // $lists = " <input type='text' class='form-control' id='nama_suplier' name='nama_suplier' value='".$hasil_kode."' readonly>";

            $callback = array('id_pelanggan'=>$data['penjualan'][0]->id_pelanggan,'nama'=>$data['penjualan'][0]->nama, 'alamat'=>$data['penjualan'][0]->alamat, 'detail_penjualan' =>$table); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
            echo json_encode($callback); 
        }

    }

     function bayar($ida)
    {   
        // $id = $this->session->userdata('id_user');
        $this->M_penjualan->edit($ida);
        $this->session->set_flashdata('Sukses', "Data Berhasil Diperbarui");
        redirect('C_Penjualan/piutang');
    }

    function cetak($ida)
    {
        $this->load->view('penjualan/cetak'); 
    }

    function cetakpenjualan($ida){
        $this->load->view('master/setting/terbilang'); 
        $pdf = new FPDF('L','mm',array('148', '210'));
        // $pdf = new FPDF('L','mm',array('148', '210'));
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','',8,'C');
        // mencetak string 
        $pdf->Cell(90,5,'OMAH BABA',0,0,'L');
        // $pdf->Cell(90,5,'JUAL PAVING MULTI',0,0,'L');        

        $penjualan = $this->M_penjualan->getdetail($ida);
        $dtlpenjualan = $this->M_penjualan->getdetailpenjualan($ida);
        foreach ($penjualan as $key ) {

            // $originalDate = "2010-03-21";
            $newDate = date("d-m-Y h:i:s", strtotime($key->tglpojual));

            $pdf->Cell(79,4,'Brebes : '.$newDate,0,1,'R');
            $pdf->Cell(90,4,'OMAH BABA',0,0,'L');
            $pdf->Cell(85,4,'Tuan / Toko : '.$key->nama,0,1,'R');
            $pdf->Cell(90,4,'Brebes, Jawa Tengah',0,0,'L');
            $pdf->Cell(69,4,'Telp : '.$key->tlp,0,1,'R');
            $pdf->Cell(90,4,'Telp : 081376767574',0,0,'L');
            $pdf->Cell(57,4,'Alamat : ... ',0,1,'R'); 
            
            $pdf->Cell(183,4,$key->alamat,0,1,'R');
            $pdf->Cell(90,4,'Website : www.omahbaba.com',0,0,'L');
            $pdf->Cell(89,4,'No. Reg. : '.$key->id_penjualan,0,1,'R');
            
            $pdf->Cell(100,3,'',0,1,'L');
            // $pdf->Line(10,15,200,15);
        // Memberikan space kebawah agar tidak terlalu rapat
            $pdf->SetFont('Arial','B',8,'C');
            
            $pdf->Cell(190,4,'NOTA PENJUALAN',0,2,'C');
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
        foreach ($dtlpenjualan as $dtl ) {
            
            $pdf->Cell(20,6,$dtl->qtt,1,0,'C');
            $pdf->Cell(20,6,$dtl->satuan,1,0,'C');
            $pdf->Cell(65,6,$dtl->kategori,1,0);
            $pdf->Cell(30,6,'Rp. '.number_format($dtl->harga),1,0);
            $pdf->Cell(53,6,'Rp. '.number_format(($dtl->harga*$dtl->qtt)-$dtl->diskon),1,1);
        
        } 
        foreach ($penjualan as $key ) {
            
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

    public function excel($tglb)
    {   
        
        $penjualan = $this->M_penjualan->excel($tglb);
        $data = array('title' => 'Laporan Penjualan',
                'excel' => $penjualan);
        $this->load->view('penjualan/excelpenjualan', $data);
    }

    public function excelpiutang($tglb)
    {   
        
        $penjualan = $this->M_penjualan->excelpiutang($tglb);
        $data = array('title' => 'Laporan Piutang',
                'excel' => $penjualan);
        $this->load->view('penjualan/excelpenjualan', $data);
    }

}