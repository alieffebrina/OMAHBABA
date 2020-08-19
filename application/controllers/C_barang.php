<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_barang extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_barang');
        $this->load->model('M_Setting');
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
        $data['barang'] = $this->M_barang->getbarang();
        // echo '<pre>';print_r( $data['barang']);exit;
        $this->load->view('master/barang/v_barang',$data); 
        $this->load->view('template/footer');
    }

    function add()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['satuan'] = $this->M_Setting->getsatuan();
        $data['konversi'] = $this->M_Setting->getkonversisatuan();
        $data['jenisbarang'] = $this->M_Setting->getjenisbarang();
        $this->load->view('master/barang/v_addbarang', $data); 
        $this->load->view('template/footer');
    }

    function cek_barang(){
        # ambil Kualifikasiname dari form
        
        $kode = $this->input->post('barang');
                # select ke model member Kualifikasiname yang diinput Kualifikasi
        $hasil_kode = $this->M_barang->cek_barang($kode);
         
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

    // function ceksatuan(){
    //         // Ambil data ID Provinsi yang dikirim via ajax post
    //         $idbarang = $this->input->post('id_barang');
            
    //         $hasil_kode = $this->M_barang->getspek($idbarang);
            
    //         // Buat variabel untuk menampung tag-tag option nya
    //         // Set defaultnya dengan tag option Pilih
    //         // $lists = " <input type='text' class='form-control' id='nama_suplier' name='nama_suplier' readonly>";
    //         $lists=$list_namabarang=$harga='';
    //         foreach($hasil_kode as $data){
    //           // $lists .= " <input type='text' class='form-control' id='nama_suplier' name='nama_suplier' value='".$data->satuan."' readonly>"; // Tambahkan tag option ke variabel $lists
    //           // $ala = $data->alamat;
    //             $harga = "<input type='hidden' id='harga' value='".$data->hargabeli."'><input type='text' class='form-control'  onkeyup='Calculate()' id='hargashow' value='".number_format($data->hargabeli)."'>";
    //             $lists = "<input type='hidden'  id='satuan' value='".$data->nama_satuan."'>".$data->nama_satuan;
    //             $list_namabarang = "<input type='hidden' id='stok' value='".$data->stok."'><input type='hidden'  id='namabarangshow' value='".$data->barang."'>";
    //         }
            
    //         // $lists = " <input type='text' class='form-control' id='nama_suplier' name='nama_suplier' value='".$hasil_kode."' readonly>";

    //         $callback = array('list_satuan'=>$lists, 'list_harga'=>$harga, 'list_namabarang' =>$list_namabarang); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
    //         echo json_encode($callback); // konversi varibael $callback menjadi JSON
    // }

     function ceksatuan(){
            // Ambil data ID Provinsi yang dikirim via ajax post
            $idbarang = $this->input->post('id_barang');
            
            $hasil_kode = $this->M_barang->getspek($idbarang);
            
            // Buat variabel untuk menampung tag-tag option nya
            // Set defaultnya dengan tag option Pilih
            // $lists = " <input type='text' class='form-control' id='nama_suplier' name='nama_suplier' readonly>";
            $lists=$list_namabarang=$harga=$jenisbarang='';
            foreach($hasil_kode as $data){
              // $lists .= " <input type='text' class='form-control' id='nama_suplier' name='nama_suplier' value='".$data->satuan."' readonly>"; // Tambahkan tag option ke variabel $lists
              // $ala = $data->alamat;
                $harga = "<input type='hidden' class='form-control' onfocus='startCalculate()' onblur='stopCalc()' name='harga' id='harga' value='".$data->hargabeli."'>
                    <input type='text' class='form-control' onfocus='startCalculate()' onblur='stopCalc()' name='hargashow' id='hargashow' value='".number_format($data->hargabeli)."'>";
                $lists = "<input type='hidden' class='form-control' name='satuan' id='satuan' value='".$data->nama_satuan."'><input type='hidden' class='form-control' name='kodesatuan' id='kodesatuan' value='".$data->id_satuan."'><input type='hidden' class='form-control' name='qttkonversi' id='qttkonversi' value='".$data->qttkonversi."'>".$data->nama_satuan;
                $list_namabarang = "<input type='hidden' class='form-control' name='namabarangshow' id='namabarangshow' value='".$data->barang."'>
                <input type='hidden' class='form-control' name='stokaw' id='stokaw' value='".$data->hasil_konversi."'>";
                $jenisbarang = $data->jenisbarang;
            }
            
            // $lists = " <input type='text' class='form-control' id='nama_suplier' name='nama_suplier' value='".$hasil_kode."' readonly>";

            $callback = array('list_satuan'=>$lists, 'list_harga'=>$harga, 'list_namabarang' =>$list_namabarang, 'jenisbarang' =>$jenisbarang); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
            echo json_encode($callback); // konversi varibael $callback menjadi JSON
    }

    //public function tambah()
    //{   
        //$this->M_barang->tambahdata();
       //$data = $this->M_barang->cekkodebarang();
        //foreach ($data as $id) {
            //$id =$id;
            //$this->M_barang->tambahakses($id);
        //}
        //$this->session->set_flashdata('SUCCESS', "Record Added Successfully!!");
        //redirect('C_barang');
    //}

    public function tambah()
    {   
        $modul = 'barang';
        $kode = $this->M_Setting->cekkode($modul);
        foreach ($kode as $modul) {
            $a = $modul->kodefinal;
            if (strpos($a, 'ggal') != false) {
                date_default_timezone_set('Asia/Jakarta');
                $tgl = date('d-m-Y');
                $a = str_replace("tanggal", $tgl, $a);
                $data = $this->M_barang->cekbarangtgl();

                // TAK COBA PAKAI INI KO
                //----------------------------------------------
                // $data = $this->M_barang->cekbarangtgl();
                $no = count($data) + 1;
                $kode2 = str_replace("no", $no, $a);
            } else {
                $data = $this->M_barang->cekkodebarang();
                foreach ($data as $id) {
                    $id = $id+1;
                    $kode2 = str_replace("no", $id, $a);
                }
            }

            $idnama = $this->session->userdata('nama');
            $name = str_replace("username", $idnama, $kode2);
            $kode = $name;
            $id = $this->session->userdata('id_user');
            $this->M_barang->tambahdata($id,$kode);
            $this->session->set_flashdata('Sukses', "Data Berhasil Ditambahkan.");
            redirect('C_barang');

        }
    }

    function view($ida)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['barang'] = $this->M_barang->getspek($ida);
        $this->load->view('master/barang/v_vbarang',$data); 
        $this->load->view('template/footer');
    }

    function edit($idbarang)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['provinsi'] = $this->M_Setting->getprovinsi();
        $data['barang'] = $this->M_barang->getspek($idbarang);
        $data['satuan'] = $this->M_Setting->getsatuan();
        $data['konversi'] = $this->M_Setting->getkonversisatuan();
        $data['jenisbarang'] = $this->M_Setting->getjenisbarang();
        $this->load->view('master/barang/v_ebarang',$data); 
        $this->load->view('template/footer');
    }

    function editbarang()
    {   
        $id = $this->session->userdata('id_user');
        $this->M_barang->edit($id);
        $this->session->set_flashdata('Sukses', "Data Berhasil Diperbarui.");
        redirect('C_barang');
    }

    function hapus($id){
        $where = array('id_barang' => $id);
        $this->M_Setting->delete($where,'tb_barang');
        $this->session->set_flashdata('Sukses', "Data Berhasil Dihapus.");
        redirect('C_barang');
    }

}