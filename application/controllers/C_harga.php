<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_harga extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_harga');
        $this->load->model('M_Setting');
    }

    function index()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['harga'] = $this->M_harga->getharga();
        $this->load->view('master/harga/v_harga',$data); 
        $this->load->view('template/footer');
    }

    function add()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['barang'] = $this->M_Setting->gethargabarang();
        // echo '<pre>';print_r($data['barang']);exit;
        $this->load->view('master/harga/v_addharga', $data); 
        $this->load->view('template/footer');
    }

    function cek_harga(){
        # ambil Kualifikasiname dari form
        
        $kode = $this->input->post('harga');
                # select ke model member Kualifikasiname yang diinput Kualifikasi
        $hasil_kode = $this->M_harga->cek_harga($kode);
         
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
        $this->M_harga->tambahdata($id);
        // $data = $this->M_pelanggan->cekkodepelanggan();
        // foreach ($data as $id) {
        //     $id =$id;
        //     $this->M_pelanggan->tambahakses($id);
        // }
        $this->session->set_flashdata('SUCCESS', "Record Added Successfully!!");
        redirect('C_harga');
    }

    function view($ida)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['harga'] = $this->M_harga->getspek($ida);
        $this->load->view('master/harga/v_vharga',$data); 
        $this->load->view('template/footer');
    }

    function edit($iduser)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['harga'] = $this->M_harga->getspek($iduser);
        $this->load->view('master/harga/v_eharga',$data); 
        $this->load->view('template/footer');
    }

    function editharga()
    {   

        $id = $this->session->userdata('id_user');
        $this->M_harga->edit($id);
        $this->session->set_flashdata('SUCCESS', "Record Added Successfully!!");
        redirect('C_harga');
    }

    function hapus($id){
        $where = array('id_harga' => $id);
        $this->M_Setting->delete($where,'tb_harga');
        $this->session->set_flashdata('SUCCESS', "Record Added Successfully!!");
        redirect('C_harga');
    }

}