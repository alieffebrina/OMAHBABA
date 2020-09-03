<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_hargagaram extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_hargagaram');
        $this->load->model('M_baranggaram');
        $this->load->model('M_Setting');
    }

    function index()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['harga'] = $this->M_hargagaram->gethargagaram();
        $this->load->view('master/harga/v_hargagaram',$data); 
        $this->load->view('template/footer');
    }

    function add()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        
        $data['barang'] = $this->M_Setting->gethargabaranggaram();
        $this->load->view('master/harga/v_addhargagaram', $data); 
        $this->load->view('template/footer');
    }

    function cek_harga(){
        # ambil Kualifikasiname dari form
        
        $kode = $this->input->post('harga');
                # select ke model member Kualifikasiname yang diinput Kualifikasi
        $hasil_kode = $this->M_hargagaram->cek_harga($kode);
         
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
        $this->M_hargagaram->tambahdata($id);
        
        $id_submenu = '41';
        $ket = 'tambah data harga';
        $this->M_Setting->userlog($id, $id_submenu, $ket);

        $this->session->set_flashdata('Sukses', "Data Harga Garam Berhasil Di Tambahkan.");
        redirect('C_hargagaram');
    }

    function view($ida)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['harga'] = $this->M_hargagaram->getspek($ida);
        $data['barang'] = $this->M_Setting->gethargabaranggaram();
        $this->load->view('master/harga/v_vhargagaram',$data); 
        $this->load->view('template/footer');
    }

    function edit($iduser)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['barang'] = $this->M_Setting->gethargabaranggaram();
        $data['harga'] = $this->M_hargagaram->getspek($iduser);
        $this->load->view('master/harga/v_ehargagaram',$data); 
        $this->load->view('template/footer');
    }

    function editharga()
    {   

        $id = $this->session->userdata('id_user');
        $this->M_hargagaram->edit($id);

        $id_submenu = '41';
        $ket = 'edit data harga';
        $this->M_Setting->userlog($id, $id_submenu, $ket);

        $this->session->set_flashdata('Sukses', "Data Harga Garam Berhasil Di Perbarui.");
        redirect('C_hargagaram');
    }

    function hapus($id){
        $where = array('id_harga' => $id);
        $this->M_Setting->delete($where,'tb_hargagaram');

        $id_submenu = '41';
        $ket = 'hapus data harga'.$id;
        $this->M_Setting->userlog($id, $id_submenu, $ket);

        $this->session->set_flashdata('Sukses', "Data Harga Garam Berhasil Di Hapus.");
        redirect('C_hargagaram');
    }

}
