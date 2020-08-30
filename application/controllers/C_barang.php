<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_barang extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_barang');
        $this->load->model('M_warna');
        $this->load->model('M_kategori');
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
        $data['barang'] = $this->M_barang->getbarang();
        $this->load->view('master/barang/v_barang',$data); 
        $this->load->view('template/footer');
    }

    function add()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['provinsi'] = $this->M_Setting->getprovinsi();
        $data['gudang'] = $this->M_Setting->getgudang();
        $data['cabang'] = $this->M_Setting->getcabang();
        $data['satuan'] = $this->M_Setting->getsatuan();
        $data['kategori'] = $this->M_kategori->getkategori();
        $data['warna'] = $this->M_warna->getwarna();
        $this->load->view('master/barang/v_addbarang', $data); 
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

    public function tambah()
    {   

        $id = $this->session->userdata('id_user');
        $this->M_barang->tambahdata($id);
        
        $id_submenu = '7';
        $ket = 'tambah data barang';
        $this->M_Setting->userlog($id, $id_submenu, $ket);

        $this->session->set_flashdata('Sukses', "Data Barang Berhasil Di Tambahkan.");
        redirect('C_barang');
    }

    function view($ida)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['barang'] = $this->M_barang->getspek($ida);
        $data['gudang'] = $this->M_Setting->getgudang();
        $data['satuan'] = $this->M_Setting->getsatuan();
        $data['kategori'] = $this->M_Setting->getkategori();
        $data['warna'] = $this->M_Setting->getwarna();
        $this->load->view('master/barang/v_vbarang',$data); 
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
        $data['barang'] = $this->M_barang->getspek($iduser);
        $this->load->view('master/barang/v_ebarang',$data); 
        $this->load->view('template/footer');
    }

    function editbarang()
    {   

        $id = $this->session->userdata('id_user');
        $this->M_barang->edit($id);

        $id_submenu = '7';
        $ket = 'edit data barang';
        $this->M_Setting->userlog($id, $id_submenu, $ket);

        $this->session->set_flashdata('Sukses', "Data Barang Berhasil Di Perbarui.");
        redirect('C_barang');
    }

    function hapus($id){
        $where = array('id_barang' => $id);
        $this->M_Setting->delete($where,'tb_barang');

        $id_submenu = '7';
        $ket = 'hapus data barang'.$id;
        $this->M_Setting->userlog($id, $id_submenu, $ket);

        $this->session->set_flashdata('Sukses', "Data Barang Berhasil Di Hapus.");
        redirect('C_barang');
    }

}