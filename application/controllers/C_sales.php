<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_sales extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('M_sales');
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
        $data['sales'] = $this->M_sales->getsales();
        $this->load->view('master/sales/v_sales',$data); 
        $this->load->view('template/footer');
    }

    function add()
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['provinsi'] = $this->M_Setting->getprovinsi();
        $data['cabang'] = $this->M_Setting->getcabangss();
        $this->load->view('master/sales/v_addsales', $data); 
        $this->load->view('template/footer');
    }

    function cek_sales(){
        # ambil Kualifikasiname dari form
        
        $kode = $this->input->post('id_sales');
                # select ke model member Kualifikasiname yang diinput Kualifikasi
        $hasil_kode = $this->M_sales->getspek($kode);
         
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
        $this->M_sales->tambahdata($id);
        // $data = $this->M_sales->cekkodesales();
        // foreach ($data as $id) {
        //     $id =$id;
        //     $this->M_sales->tambahakses($id);
        // }
        $this->session->set_flashdata('SUCCESS', "Record Added Successfully!!");
        redirect('C_sales');
    }

    function view($ida)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['sales'] = $this->M_sales->getspek($ida);
        $this->load->view('master/sales/v_vsales',$data); 
        $this->load->view('template/footer');
    }

    function edit($iduser)
    {
        $this->load->view('template/header');
        $id = $this->session->userdata('id_user');
        $data['menu'] = $this->M_Setting->getmenu1($id);
        $this->load->view('template/sidebar.php', $data);
        $data['provinsi'] = $this->M_Setting->getprovinsi();
        $data['cabang'] = $this->M_Setting->getcabangss();
        $data['sales'] = $this->M_sales->getspek($iduser);
        $this->load->view('master/sales/v_esales',$data); 
        $this->load->view('template/footer');
    }

    function editsales()
    {   

        $id = $this->session->userdata('id_user');
        $this->M_sales->edit($id);
        $this->session->set_flashdata('SUCCESS', "Record Added Successfully!!");
        redirect('C_sales');
    }

    function hapus($id){
        $where = array('id_sales' => $id);
        $this->M_Setting->delete($where,'tb_sales');
        $this->session->set_flashdata('SUCCESS', "Record Added Successfully!!");
        redirect('C_sales');
    }
}