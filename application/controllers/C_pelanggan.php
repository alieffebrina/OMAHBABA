<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_Pelanggan extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_pelanggan');
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
        $data['pelanggan'] = $this->M_pelanggan->getpelanggan();
        $this->load->view('master/pelanggan/v_pelanggan',$data); 
        $this->load->view('template/footer');
    }

    function add()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['provinsi'] = $this->M_Setting->getprovinsi();
        $this->load->view('master/pelanggan/v_addpelanggan', $data); 
        $this->load->view('template/footer');
    }

    function cek_pelanggan(){
        # ambil Kualifikasiname dari form
        
        $kode = $this->input->post('id_pelanggan');
                # select ke model member Kualifikasiname yang diinput Kualifikasi
        $hasil_kode = $this->M_pelanggan->getspek($kode);
         
                # pengecekan value $hasil_Kualifikasiname
        if(count($hasil_kode)!=0){
          # kalu value $hasil_Kualifikasiname tidak 0
                  # echo 1 untuk pertanda Kualifikasiname sudah ada pada db    
                       echo json_encode((object) array('list_alamat'=>$hasil_kode[0]->alamat,'limit_pelanggan'=>$hasil_kode[0]->limit_pelanggan));
        }else{
                  # kalu value $hasil_Kualifikasiname = 0
                  # echo 2 untuk pertanda Kualifikasiname belum ada pada db
            echo '2';
        }
         
    }

    public function tambah()
    {   

        $id = $this->session->userdata('id_user');
        $this->M_pelanggan->tambahdata($id);
        // $data = $this->M_pelanggan->cekkodepelanggan();
        // foreach ($data as $id) {
        //     $id =$id;
        //     $this->M_pelanggan->tambahakses($id);
        // }
        $this->session->set_flashdata('SUCCESS', "Record Added Successfully!!");
        redirect('C_pelanggan');
    }

    function view($ida)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['pelanggan'] = $this->M_pelanggan->getspek($ida);
        $this->load->view('master/pelanggan/v_vpelanggan',$data); 
        $this->load->view('template/footer');
    }

    function edit($iduser)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['provinsi'] = $this->M_Setting->getprovinsi();
        $data['pelanggan'] = $this->M_pelanggan->getspek($iduser);
        $this->load->view('master/pelanggan/v_epelanggan',$data); 
        $this->load->view('template/footer');
    }

    function editpelanggan()
    {   

        $id = $this->session->userdata('id_user');
        $this->M_pelanggan->edit($id);
        $this->session->set_flashdata('SUCCESS', "Record Added Successfully!!");
        redirect('C_pelanggan');
    }

    function hapus($id){
        $where = array('id_pelanggan' => $id);
        $this->M_Setting->delete($where,'tb_pelanggan');
        $this->session->set_flashdata('SUCCESS', "Record Added Successfully!!");
        redirect('C_pelanggan');
    }

    function get_limit(){
        echo json_encode($this->M_pelanggan->get_limit($this->input->post('id')));
    }
}