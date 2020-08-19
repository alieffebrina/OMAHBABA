<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_voucher extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_voucher');
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
        $data['voucher'] = $this->M_voucher->getvoucher();
        $this->load->view('master/voucher/v_voucher',$data); 
        $this->load->view('template/footer');
    }

    function add()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['voucher'] = $this->M_Setting->getvoucher();
        $this->load->view('master/voucher/v_addvoucher', $data); 
        $this->load->view('template/footer');
    }

    function cek_voucher(){
        # ambil Kualifikasiname dari form
        
        $kode = $this->input->post('id_voucher');
                # select ke model member Kualifikasiname yang diinput Kualifikasi
        $hasil_kode = $this->M_voucher->getspek($kode);
         
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
        $this->M_voucher->tambahdata($id);
        // $data = $this->M_voucher->cekkodevoucher();
        // foreach ($data as $id) {
        //     $id =$id;
        //     $this->M_voucher->tambahakses($id);
        // }
        $this->session->set_flashdata('SUCCESS', "Record Added Successfully!!");
        redirect('C_voucher');
    }

    function view($ida)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['voucher'] = $this->M_voucher->getspek($ida);
        $this->load->view('master/voucher/v_vvoucher',$data); 
        $this->load->view('template/footer');
    }

    function edit($iduser)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['voucher'] = $this->M_voucher->getspek($iduser);
        $this->load->view('master/voucher/v_evoucher',$data); 
        $this->load->view('template/footer');
    }

    function editvoucher()
    {   

        $id = $this->session->userdata('id_user');
        $this->M_voucher->edit($id);
        $this->session->set_flashdata('SUCCESS', "Record Added Successfully!!");
        redirect('C_voucher');
    }

    function hapus($id){
        $where = array('id_voucher' => $id);
        $this->M_Setting->delete($where,'tb_voucher');
        $this->session->set_flashdata('SUCCESS', "Record Added Successfully!!");
        redirect('C_voucher');
    }
}