<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_cabang extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_cabang');
        $this->load->model('M_Setting');
    }

    function index()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['cabang'] = $this->M_cabang->getcabang();
        $this->load->view('master/cabang/v_cabang',$data); 
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
        $this->load->view('master/cabang/v_addcabang', $data); 
        $this->load->view('master/user/v_modal');
        $this->load->view('template/footer');
    }

    function cek_cabang(){
        # ambil Kualifikasiname dari form
        
        $kode = $this->input->post('cabang');
                # select ke model member Kualifikasiname yang diinput Kualifikasi
        $hasil_kode = $this->M_cabang->cek_cabang($kode);
         
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
        $this->M_cabang->tambahdata($id);
        
        $id_submenu = '32';
        $ket = 'tambah data cabang';
        $this->M_Setting->userlog($id, $id_submenu, $ket);

        $this->session->set_flashdata('SUCCESS', "Record Added Successfully!!");
        redirect('C_cabang');
    }

    function view($ida)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['cabang'] = $this->M_cabang->getspek($ida);
        $this->load->view('master/cabang/v_vcabang',$data); 
        $this->load->view('template/footer');
    }

    function edit($iduser)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('tipeuser');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['provinsi'] = $this->M_Setting->getprovinsi();
        $data['gudang'] = $this->M_Setting->getgudang();
        $data['cabang'] = $this->M_cabang->getspek($iduser);
        $this->load->view('master/cabang/v_ecabang',$data); 
        $this->load->view('template/footer');
    }

    function editcabang()
    {   

        $id = $this->session->userdata('id_user');
        $this->M_cabang->edit($id);

        $id_submenu = '32';
        $ket = 'edit data cabang';
        $this->M_Setting->userlog($id, $id_submenu, $ket);

        $this->session->set_flashdata('SUCCESS', "Record Added Successfully!!");
        redirect('C_cabang');
    }

    function hapus($id){
        $where = array('id_cabang' => $id);
        $this->M_Setting->delete($where,'tb_cabang');

        $id_submenu = '32';
        $ket = 'hapus data cabang'.$id;
        $this->M_Setting->userlog($id, $id_submenu, $ket);

        $this->session->set_flashdata('SUCCESS', "Record Added Successfully!!");
        redirect('C_cabang');
    }

}