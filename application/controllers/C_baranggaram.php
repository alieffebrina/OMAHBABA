<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_baranggaram extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_baranggaram');
        $this->load->model('M_warna');
        $this->load->model('M_kategori');
        $this->load->model('M_konversi');
        // $this->load->model('M_satuan');
        // $this->load->model('M_gudang');
        // $this->load->model('M_cabang');
        $this->load->model('M_Setting');
    }

    function index()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['barang'] = $this->M_baranggaram->getbaranggaram();
        $this->load->view('master/barang/v_baranggaram',$data); 
        $this->load->view('template/footer');
    }

    function add()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        
        $data['gudang'] = $this->M_Setting->getgudang();
        $data['cabang'] = $this->M_Setting->getcabang();
        $data['satuan'] = $this->M_Setting->getsatuan();
        $data['kategori'] = $this->M_Setting->getkategori();
        $data['warna'] = $this->M_Setting->getwarna();
        $data['konversi'] = $this->M_Setting->getkonversisatuan();
        $this->load->view('master/barang/v_addbaranggaram', $data); 
        // $this->load->view('master/user/v_modal');
        // $this->load->view('master/user/v_modalcabang');
        $this->load->view('master/user/v_modalkategori');
        $this->load->view('master/user/v_modalsatuan');
        $this->load->view('master/user/v_modalwarna');
        $this->load->view('template/footer');
    }

    function cek_barang(){
        # ambil Kualifikasiname dari form
        
        $kode = $this->input->post('barang');
                # select ke model member Kualifikasiname yang diinput Kualifikasi
        $hasil_kode = $this->M_baranggaram->cek_barang($kode);
         
                # pengecekan value $hasil_Kualifikasiname
        if(count($hasil_kode)!=0){
          # kalu value $hasil_Kualifikasiname tidak 0
                  # echo 1 untuk pertanda Kualifikasiname sudah ada pada db    
                       echo '1';
        }else{
                  # kalu value $hasil_Kualifikasiname = 0
                  # echo 2 untuk pertanda Kualifikasiname belum ada pada db
            echo '2';
        }
         
    }

    function ceksatuan(){
            // Ambil data ID Provinsi yang dikirim via ajax post
            $idbarang = $this->input->post('id_barang');
            
            $hasil_kode = $this->M_baranggaram->getspek($idbarang);
            
            // Buat variabel untuk menampung tag-tag option nya
            // Set defaultnya dengan tag option Pilih
            // $lists = " <input type='text' class='form-control' id='nama_suplier' name='nama_suplier' readonly>";
            $lists=$list_namabarang=$harga=$kategori='';
            foreach($hasil_kode as $data){
              // $lists .= " <input type='text' class='form-control' id='nama_suplier' name='nama_suplier' value='".$data->satuan."' readonly>"; // Tambahkan tag option ke variabel $lists
              // $ala = $data->alamat;
                $harga = "<input type='hidden' class='form-control' onfocus='startCalculate()' onblur='stopCalc()' name='harga' id='harga' value='".$data->hargabeli."'>
                    <input type='text' class='form-control' onfocus='startCalculate()' onblur='stopCalc()' name='hargashow' id='hargashow' value='Rp. ".number_format($data->hargabeli)."'>";
                $lists = "<input type='hidden' class='form-control' name='satuan' id='satuan' value='".$data->nama_satuan."'><input type='hidden' class='form-control' name='kodesatuan' id='kodesatuan' value='".$data->id_satuan."'><input type='hidden' class='form-control' name='qttkonversi' id='qttkonversi' value='".$data->qttkonversi."'>".$data->nama_satuan;
                $list_namabarang = "<input type='hidden' class='form-control' name='namabarangshow' id='namabarangshow' value='".$data->barang.'/'.$data->kategori."'>
                <input type='hidden' class='form-control' name='stokaw' id='stokaw' value='".$data->hasil_konversi."'>";
                $kategori = $data->kategori;
            }
            
            // $lists = " <input type='text' class='form-control' id='nama_suplier' name='nama_suplier' value='".$hasil_kode."' readonly>";

            $callback = array('list_satuan'=>$lists, 'list_harga'=>$harga, 'list_namabarang' =>$list_namabarang, 'kategori' =>$kategori); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
            echo json_encode($callback); // konversi varibael $callback menjadi JSON
    }

    public function tambah()
    {   

        $id = $this->session->userdata('id_user');
        $this->M_baranggaram->tambahdata($id);
        
        $id_submenu = '40';
        $ket = 'tambah data barang garam';
        $this->M_Setting->userlog($id, $id_submenu, $ket);

        $this->session->set_flashdata('Sukses', "Data Barang Berhasil Di Tambahkan.");
        redirect('C_baranggaram');
    }

    function view($ida)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['barang'] = $this->M_baranggaram->getspek($ida);
        $data['gudang'] = $this->M_Setting->getgudang();
        $data['satuan'] = $this->M_Setting->getsatuan();
        $data['kategori'] = $this->M_Setting->getkategori();
        $data['warna'] = $this->M_Setting->getwarna();
        $data['konversi'] = $this->M_Setting->getkonversisatuan();
        $this->load->view('master/barang/v_vbaranggaram',$data); 
        $this->load->view('template/footer');
    }

    function edit($iduser)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        // $data['provinsi'] = $this->M_Setting->getprovinsi();
        $data['gudang'] = $this->M_Setting->getgudang();
        $data['satuan'] = $this->M_Setting->getsatuan();
        $data['kategori'] = $this->M_Setting->getkategori();
        $data['warna'] = $this->M_Setting->getwarna();
        $data['konversi'] = $this->M_Setting->getkonversisatuan();
        $data['barang'] = $this->M_baranggaram->getspek($iduser);
        $this->load->view('master/barang/v_ebaranggaram',$data); 
        $this->load->view('template/footer');
    }

    function editbarang()
    {   

        $id = $this->session->userdata('id_user');
        $this->M_baranggaram->edit($id);

        $id_submenu = '40';
        $ket = 'edit data barang garam';
        $this->M_Setting->userlog($id, $id_submenu, $ket);

        $this->session->set_flashdata('Sukses', "Data Barang Berhasil Di Perbarui.");
        redirect('C_baranggaram');
    }

    function hapus($id){
        $where = array('id_barang' => $id);
        $this->M_Setting->delete($where,'tb_baranggaram');

        $id_submenu = '40';
        $ket = 'hapus data barang garam'.$id;
        $this->M_Setting->userlog($id, $id_submenu, $ket);

        $this->session->set_flashdata('Sukses', "Data Barang Berhasil Di Hapus.");
        redirect('C_baranggaram');
    }

}
